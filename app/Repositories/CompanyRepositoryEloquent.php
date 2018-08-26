<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\CompanyRepository;
use App\Entities\Company;
use App\Validators\CompanyValidator;

/**
 * Class CompanyRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class CompanyRepositoryEloquent extends AppRepository implements CompanyRepository
{
    protected $fieldSearchable = [
        'razao'    => 'like',
        'cnpj'     => 'like',
        'fantasia '=> 'like'
    ];

    protected $fieldsRules = [
        'cnpj'     => ['numeric', 'max:2147483647'],
        'razao'    => ['max:100'],
        'fantasia' => ['max:100']
    ];
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Company::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return CompanyValidator::class;
    }


    /**
     * @return mixed
     */
    public function presenter()
    {
      return CompanyPresenter::class;
    }
    
}
