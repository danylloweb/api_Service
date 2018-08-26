<?php

namespace App\Services;

use App\Repositories\CompanyRepository;
use App\Services\Traits\CrudMethods;

/**
 * Class BankAccountService
 * @package App\Services
 */
class CompanyService extends AppService
{
    use CrudMethods;

    /**
     * @var UserRepository
     */
    protected $repository;

    public function __construct(CompanyRepository $repository)
    {
        $this->repository = $repository;
    }

    
}