<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Validators\CompanyValidator;
use App\Http\Controllers\Traits\CrudMethods;
use App\Services\CompanyService;

/**
 * Class CompaniesController.
 *
 * @package namespace App\Http\Controllers;
 */
class CompaniesController extends Controller
{
    use CrudMethods;
    /**
     * @var CompanyRepository
     */
    protected $service;

    /**
     * @var CompanyValidator
     */
    protected $validator;

    /**
     * CompaniesController constructor.
     *
     * @param CompanyRepository $repository
     * @param CompanyValidator $validator
     */
    public function __construct(CompanyService $service, CompanyValidator $validator)
    {
        $this->service    = $service;
        $this->validator  = $validator;
    }

}
