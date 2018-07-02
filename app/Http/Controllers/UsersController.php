<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Services\UserService;
use App\Validators\UserValidator;
use App\Http\Controllers\Traits\CrudMethods;
use App\Http\Requests\UserCreateRequest;

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
    protected $createRequest = UserCreateRequest::class;
    /**
     * UsersController constructor.
     * @param UserService $service
     */
    public function __construct(UserService $service)
    {
        $this->service = $service;
    }
}
