<?php

namespace App\Exceptions;

use Exception;
use http\Exception\BadMethodCallException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


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
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
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

        if ($exception instanceof ModelNotFoundException &&
            $request->wantsJson())
        {
            return response()->json([
                'error' => 'Resource not found'
            ], 404);
        }
        if($exception instanceof NotFoundHttpException){
            return response()->json([
                'error' => 'Incorrect route'
            ], 404);
        }

        if ($exception instanceof BadMethodCallException ){
            return response()->json([
                'error' => 'Wrong method or method does not exists'
            ],404);
        }
       /* if ($exception instanceof  MethodNotAllowedHttpException ){
            return response()->json([
                'error' => 'Wrong method'
            ],404);
        }*/


        return parent::render($request, $exception);
    }
    protected function convertValidationExceptionToResponse(ValidationException $e, $request)
    {
        $errors = $e->validator->errors()->getMessages();

        return response()->json(['message' => $errors],200);
    }
}
