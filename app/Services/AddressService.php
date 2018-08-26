<?php

namespace App\Services;

use App\Repositories\AddressRepository;
use App\Services\Traits\CrudMethods;

/**
 * Class BankAccountService
 * @package App\Services
 */
class AddressService extends AppService
{
    use CrudMethods;

    /**
     * @var UserRepository
     */
    protected $repository;

    public function __construct(AddressRepository $repository)
    {
        $this->repository = $repository;
    }

    
}