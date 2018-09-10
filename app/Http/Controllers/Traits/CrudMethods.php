<?php

namespace App\Http\Controllers\Traits;

use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests;
use App\Services\AppService;

/**
 * Class CrudMethods
 * @package app\Http\Controllers\Traits
 */
trait CrudMethods
{
    /** @var  AppService $service */
    protected $service;

    /** @var  ValidatorInterface $validator */
    protected $validator;

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        return response()->json($this->service->all($request->query->get('limit', 15)));
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
     * @param Request $request
     * @return mixed
     * @throws ValidatorException
     */
    public function store(Request $request)
    {
        if($this->validator){
            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);
        }
        return $this->service->create($request->all());
    }

    /**
     * @param Request $request
     * @param $id
     * @return mixed
     * @throws ValidatorException
     */
    public function update(Request $request, $id)
    {
        if($this->validator){
            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);
        }
        return $this->service->update($request->all(), $id);
    }

    /**
     * Restore the specified resource from storage.
     *
     * @param $id
     * @return array
     */
    public function restore($id)
    {
        return $this->service->restore($id);
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->service->forceDelete($id);
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function findWhere(array $data)
    {
        return $this->service->findWhere($data);
    }

    public function template()
    {
        return view('welcome');
    }
}