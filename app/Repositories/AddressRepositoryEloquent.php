<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\AddressRepository;
use App\Entities\Address;
use App\Validators\AddressValidator;

/**
 * Class AddressRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class AddressRepositoryEloquent extends AppRepository implements AddressRepository
{

    protected $fieldSearchable = [
        'id',
        'zip_code' => 'like',
        'city'     => 'like'
    ];

    /**
     * Regras para busca
     *
     * @var array
     */
    protected $fieldsRules = [
        'id'       => ['numeric', 'max:2147483647'],
        'zip_code' => ['max:100'],
        'city'     => ['max:100']
    ];

    
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Address::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return AddressValidator::class;
    }


   public function presenter()
   {
       return AddressPresenter::class;
   }
    
}
