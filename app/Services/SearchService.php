<?php

namespace App\Services;

use App\Repositories\SearchRepository;
use App\Services\Traits\CrudMethods;
use Carbon\Carbon;

/**
 * Class BankAccountService
 * @package App\Services
 */
class SearchService extends AppService
{
    use CrudMethods;

    /**
     * @var SearchRepository
     */
    protected $repository;

    public function __construct(SearchRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param $search_id
     * @return bool
     */
    public function getSearchCurrent($search_id)
    {
        $search = $this->find($search_id, true);
        return Carbon::now()->format('Y-m') == $search->created_at->format('Y-m') ? false : true;
    }
}