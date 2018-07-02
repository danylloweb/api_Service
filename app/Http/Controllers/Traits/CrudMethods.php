<?php

namespace App\Http\Controllers\Traits;

use Illuminate\Http\Request;
use App\Http\Requests\CreateRequest;
use App\Services\AppService;

/**
 * Class CrudMethods
 * @package app\Http\Controllers\Traits
 */
trait CrudMethods
{
    /** @var  AppService $service */
    protected $service;


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $limit = $request->query->get('limit', 15);

        return response()->json($this->service->all($limit));
    }

    /**
     * Display the specified resource.
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        return response()->json($this->service->find($id));
    }

    /**
     * @param CreateRequest $request
     * @return mixed
     */
    public function store(CreateRequest $request)
    {
        return $this->service->create($request->all());
    }

    /**
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function update(Request $request, $id)
    {
        return $this->service->update($request->all(), $id);
    }

    /**
     * Softdeletes the specified resource from storage.
     *
     * @param $id
     * @return array
     */
    public function trash($id)
    {
        return $this->service->delete($id);
    }
}