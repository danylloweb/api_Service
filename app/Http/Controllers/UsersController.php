<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Services\UserService;
use App\Validators\UserValidator;
use App\Http\Controllers\Traits\CrudMethods;

/**
 * Class UsersController.
 *
 * @package namespace App\Http\Controllers;
 */
class UsersController extends Controller
{
    use CrudMethods;
    /**
     * @var UserService
     */
    protected $service;

    /**
     * @var UserValidator
     */
    protected $validator;

    /**
     * UsersController constructor.
     * @param UserService $service
     * @param UserValidator $validator
     */
    public function __construct(UserService $service, UserValidator $validator)
    {
        $this->service   = $service;
        $this->validator = $validator;
    }
}
