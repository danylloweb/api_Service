<?php

namespace App\Criterias;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Prettus\Repository\Criteria\RequestCriteria as RepositoryRequestCriteria;
use Prettus\Repository\Contracts\RepositoryInterface;
use App\AppHelper;

/**
 * Class AppRequestCriteria
 * @package namespace App\Criteria;
 */
class AppRequestCriteria extends RepositoryRequestCriteria
{
    /**
     * @var \Illuminate\Http\Request
     */
    protected $request;

    /**
     * RequestCriteria constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        parent::__construct($request);
    }

    /**
     * Apply criteria in query repository
     *
     * @param Builder    $model
     * @param RepositoryInterface $repository
     *
     * @return mixed
     * @throws \Exception
     */
    public function apply($model, RepositoryInterface $repository)
    {
        $fieldsSearchable = $repository->getFieldsSearchable();
        $fieldRules = method_exists($repository, 'getFieldsRules') ? $repository->getFieldsRules() : [];//@todo fix on interface
        $search = $this->request->get(config('repository.criteria.params.search', 'search'), null);
        $searchFields = $this->request->get(config('repository.criteria.params.searchFields', 'searchFields'), null);
        $filter = $this->request->get(config('repository.criteria.params.filter', 'filter'), null);
        $orderBy = $this->request->get(config('repository.criteria.params.orderBy', 'orderBy'), null);
        $sortedBy = $this->request->get(config('repository.criteria.params.sortedBy', 'sortedBy'), 'asc');
        $with = $this->request->get(config('repository.criteria.params.with', 'with'), null);
        $sortedBy = !empty($sortedBy) ? $sortedBy : 'asc';


        if ($search && is_array($fieldsSearchable) && count($fieldsSearchable)) {

            $searchFields = is_array($searchFields) || is_null($searchFields) ? $fieldsSearchable : explode(';', $searchFields);

            $fields = $this->parserFieldsSearch($fieldsSearchable, array_keys($searchFields));

            $isFirstField = true;

            $searchData = $this->parserSearchData($search);
            $search = $this->parserSearchValue($search);

            $modelForceAndWhere = false;

            $model = $model->where(function ($query) use ($fields, $search, $searchData, $isFirstField, $modelForceAndWhere, $fieldRules) {
                /** @var Builder $query */

                foreach ($fields as $field => $condition) {

                    $fieldName = is_numeric($field) ? $condition : $field;

                    if(!empty($fieldRules[$fieldName]) && !$this->canSearch($fieldName, $search, $fieldRules[$field])){
                        continue;
                    }

                    if (is_numeric($field)) {
                        $field = $condition;
                        $condition = "=";
                    }

                    $value = null;

                    $condition = trim(strtolower($condition));

                    if (isset($searchData[$field])) {
                        $value = ($condition == "like" || $condition == "ilike") ? "%{$searchData[$field]}%" : $searchData[$field];
                    } else {
                        if (!is_null($search)) {
                            $value = ($condition == "like" || $condition == "ilike") ? "%{$search}%" : $search;
                        }
                    }

                    $relation = null;
                    if(stripos($field, '.')) {
                        $explode = explode('.', $field);
                        $field = array_pop($explode);
                        $relation = implode('.', $explode);
                    }
                    $modelTableName = $query->getModel()->getTable();

                    $parsedValue = AppHelper::removeSpecialCharacters(AppHelper::removeAccentuation($value));

                    if ( $isFirstField || $modelForceAndWhere ) {
                        if (!is_null($value)) {
                            if(!is_null($relation)) {
                                $query->whereHas($relation, function($query) use ($field,$condition,$value, $parsedValue) {

                                    if(!strcmp($value, $parsedValue)){
                                        $query->where($field,$condition,$value);
                                    }else{
                                        $query->where(function($q) use ($field,$condition,$value, $parsedValue) {
                                            $q->where($field,$condition,$value)
                                                ->orWhere(DB::raw("normalize_search($field)"),$condition, "%$parsedValue%");
                                        });
                                    }

                                });
                            } else {
                                if(!strcmp($value, $parsedValue)){
                                    $query->where($modelTableName.'.'.$field,$condition,$value);
                                }else{
                                    $query->where(function($q) use ($modelTableName, $field,$condition,$value, $parsedValue) {
                                        $q->where($modelTableName.'.'.$field,$condition,$value)
                                            ->orWhere(DB::raw('normalize_search('.$modelTableName.'.'.$field.')'), $condition, "%$parsedValue%");
                                    });
                                }

                            }
                            $isFirstField = false;
                        }
                    } else {
                        if (!is_null($value)) {
                            if(!is_null($relation)) {
                                $query->orWhereHas($relation, function($query) use($field,$condition,$value, $parsedValue) {

                                    if(!strcmp($value, $parsedValue)){
                                        $query->where($field,$condition,$value);
                                    }else{
                                        $query->where(function($q) use ($field,$condition,$value, $parsedValue) {
                                            $q->where($field,$condition,$value)
                                                ->orWhere(DB::raw("normalize_search($field)"),$condition, "%$parsedValue%");
                                        });
                                    }

                                });
                            } else {

                                if(!strcmp($value, $parsedValue)){
                                    $query->orWhere($modelTableName.'.'.$field,$condition,$value);
                                }else{
                                    $query->orWhere(function($q) use ($modelTableName, $field,$condition,$value, $parsedValue) {
                                        $q->where($modelTableName.'.'.$field,$condition,$value)
                                            ->orWhere(DB::raw('normalize_search('.$modelTableName.'.'.$field.')'),$condition, "%$parsedValue%");
                                    });
                                }
                            }
                        }
                    }
                }
            });
        }

        if (isset($orderBy) && !empty($orderBy)) {
            $split = explode('|', $orderBy);
            if(count($split) > 1) {
                $table = $model->getModel()->getTable();
                $sortTable = $split[0];
                $sortColumn = $split[1];


                $split = explode(':', $sortTable);
                if(count($split) > 1) {
                    $sortTable = $split[0];
                    $keyName = $table.'.'.$split[1];
                } else {
                    $match = [];
                    preg_match('/_status$/', $sortTable, $match);



                    if(count($match)){
                        $prefix = $sortTable;
                    }else{
                        $prefix = rtrim($sortTable, 's');
                    }

                    $keyName = $table.'.'.$prefix.'_id';
                }

                $model = $model
                    ->leftJoin($sortTable, $keyName, '=', $sortTable.'.id')
                    ->orderBy($sortColumn, $sortedBy)
                    ->addSelect($table.'.*');

                \Log::info($model->toSql());
            } else {
                $model = $model->orderBy($orderBy, $sortedBy);
            }
        }

        if (isset($filter) && !empty($filter)) {
            if (is_string($filter)) {
                $filter = explode(';', $filter);
            }

            $model = $model->select($filter);
        }

        if ($with) {
            $with = explode(';', $with);
            $model = $model->with($with);
        }
        return $model;
    }

    /**
     * @param $field
     * @param $search
     * @param $rules
     * @return mixed
     */
    protected function canSearch($field, $search, $rules)
    {
        return Validator::make(['field' => $search], ['field' => implode('|', $rules)])->passes();
    }

}
