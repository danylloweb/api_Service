<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Prettus\Validator\Exceptions\ValidatorException;
use Symfony\Component\HttpFoundation\Response;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * @param Exception $exception
     * @return mixed|void
     * @throws Exception
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        if ($exception instanceof ValidationException) {
            return $this->renderValidationException($exception);
        }

        if ($exception instanceof ValidatorException) {
            return $this->renderValidatorException($exception);
        }

        return parent::render($request, $exception);
    }

    /**
     * @param $exception
     * @return mixed
     */
    private function renderValidationException($exception)
    {
        $bag = $exception->validator->getMessageBag();

        return response()->json([
            'error'   => true,
            'message' => implode(', ', $this->parseMessages($bag))
        ], Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    /**
     * @param $exception
     * @return mixed
     */
    private function renderValidatorException($exception)
    {
        $bag = $exception->getMessageBag();

        return response()->json([
            'error'   => true,
            'message' => implode(', ', $this->parseMessages($bag))
        ], Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    /**
     * @param $bag
     * @return array
     */
    private function parseMessages($bag)
    {
        $messages = [];

        if(is_object($bag)){
            $bag = json_decode(json_encode($bag), true);
            foreach($bag as $field){
                foreach($field as $m){
                    $messages[] = $m;
                }
            }
        }

        return $messages;
    }
}
