<?php

namespace App\Services;

use App\Repositories\ContactRepository;
use App\Services\Traits\CrudMethods;

/**
 * Class ContactService
 * @package App\Services
 */
class ContactService extends AppService
{
    use CrudMethods;

    /**
     * @var ContactRepository
     */
    protected $repository;

    public function __construct(ContactRepository $repository)
    {
        $this->repository = $repository;
    }

    
}