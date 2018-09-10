<?php

namespace App\Repositories;

use App\Presenters\ContactPresenter;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\ContactRepository;
use App\Entities\Contact;
use App\Validators\ContactValidator;

/**
 * Class ContactRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class ContactRepositoryEloquent extends AppRepository implements ContactRepository
{

    protected $fieldSearchable = [
        'email' => 'like',
        'name'  => 'like',
        'phone' => 'like'
    ];

    protected $fieldsRules = [
        'email' => ['max:2147483647'],
        'name'  => ['max:100'],
        'phone' => ['max:100']
    ];
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Contact::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {
        return ContactValidator::class;
    }

    /**
     * @return mixed
     */
    public function presenter()
    {
        return ContactPresenter::class;
    }

}
