<?php

namespace App\Repositories;

use App\Presenters\UserPresenter;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\UserRepository;
use App\Entities\User;
use App\Validators\UserValidator;

/**
 * Class UserRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class UserRepositoryEloquent extends AppRepository implements UserRepository
{

    protected $fieldSearchable = [
        'id',
        'name'  => 'like',
        'email' => 'like'
    ];

    /**
     * Regras para busca
     *
     * @var array
     */
    protected $fieldsRules = [
        'id'     => ['numeric', 'max:2147483647'],
        'name'   => ['max:100'],
        'email'  => ['max:100']
    ];
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return User::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return UserValidator::class;
    }

    /**
     * @return mixed
     */
   public function presenter()
   {
     return UserPresenter::class;
   }

}
