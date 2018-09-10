<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Validators\ContactValidator;
use App\Http\Controllers\Traits\CrudMethods;
use App\Services\ContactService;

/**
 * Class ContactsController.
 *
 * @package namespace App\Http\Controllers;
 */
class ContactsController extends Controller
{
    use CrudMethods;
    /**
     * @var $service
     */
    protected $service;

    /**
     * @var ContactValidator
     */
    protected $validator;

    /**
     * ContactsController constructor.
     * @param ContactService $service
     * @param ContactValidator $validator
     */
    public function __construct(ContactService $service, ContactValidator $validator)
    {
        $this->service   = $service;
        $this->validator = $validator;
    }


}
