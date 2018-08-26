<?php

namespace App\Http\Controllers;


use App\Http\Requests;
use App\Services\AddressService;
use App\Validators\AddressValidator;
use App\Http\Controllers\Traits\CrudMethods;
/**
 * Class AddressesController.
 *
 * @package namespace App\Http\Controllers;
 */
class AddressesController extends Controller
{
    use CrudMethods;
    /**
     * @var AddressRepository
     */
    protected $service;

    /**
     * @var AddressValidator
     */
    protected $validator;

    /**
     * AddressesController constructor.
     *
     * @param AddressService $repository
     * @param AddressValidator $validator
     */
    public function __construct(AddressService $service, AddressValidator $validator)
    {
        $this->service    = $service;
        $this->validator  = $validator;
    }

}
