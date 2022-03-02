<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Validation\ValidationException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    // public function register()
    // {
	// 	dd($this->attribute);
	// 	$this->reportable(function (Throwable $e) {
	// 		dd("saas");
    //         if ($e instanceof ValidationException && $request->expectsJson()) {
	// 			return response()->json([
	// 				'message' => $e->getMessage(),
	// 				'errors' => $e->errors(),
	// 			], 422);
	// 		}

    //     });
    // }

	// protected function invalidJson($request, ValidationException $exception)
    // {
    //     return response()->json([
    //         'message' => $exception->getMessage(),
    //         'errors' => $exception->errors(),
    //     ], 422);
    // }
}
