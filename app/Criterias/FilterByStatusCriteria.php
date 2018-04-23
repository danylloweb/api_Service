<?php

namespace App\Criterias;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class FilterByAgencyCriteria
 * @package namespace App\Criteria;
 */
class FilterByStatusCriteria extends AppCriteria implements CriteriaInterface
{

    /**
     * @param $model
     * @param RepositoryInterface $repository
     * @return mixed
     */
    public function apply($model, RepositoryInterface $repository)
    {
        $status    = $this->request->query->get('status');
        $search_id = $this->request->query->get('search_id');
        if (is_numeric($search_id)) {
            $model = $model->where('search_id', $search_id);
        }
        if (is_numeric($status)) {
            $model = $model->where('status', $status);
        }else {
            $model = $model->where('status', '!=', 1);
        }
        return $model;
    }
}
