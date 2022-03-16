<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

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
    public function register()
    {
        $this->renderable(function (Exception $e, $request) {
            return $this->handleException($request, $e);
        });
    }

    public function handleException($request, Exception $e)
    {

        $controller = new Controller();
        $data = '';
        if ($e instanceof \Illuminate\Auth\AuthenticationException) {
            $error =  [
                "status" => 403,
                "type" => "Token_invalid",
                "body" => $e->getMessage(),
            ];
            $error;
            $response = $controller->formatJsonResponse([
                "errors" => $error,
            ], $data);
            return response()->json($response, 403);
        }
        if ($e instanceof \League\OAuth2\Server\Exception\OAuthServerException && $e->getCode() == 9) {
            $error =  [
                'metodo' => 'PASSPORT',
                "status" => 403,
                "type" => "Oauth",
                "body" => $e->getMessage(),
            ];
            \Log::debug(json_encode($error));
            $error;
            $response = $controller->formatJsonResponse([
                "errors" => $error,
            ], $data);
            return response()->json($response, 403);
        }
        if ($e instanceof \Illuminate\Validation\ValidationException) {
            $messages = $e->validator->errors()->getMessages();
            $errors = [];
            foreach ($messages as $field => $rules) {
                if (count($rules) > 1) {
                    foreach ($rules as $message) {
                        $message = explode("|", $message);
                        $rule = $message[0];
                        if (count($message) > 1) {
                            $params = str_replace(["[", "]"], "", $message[1]);
                            $params = explode(",", $params);
                            $error = [
                                "status" => $e->status,
                                "type" => "validation_exception",
                                "field" => $field,
                                "body" => $rule,
                                "params" => $params,


                            ];
                        } else {
                            $error = [
                                "status" => $e->status,
                                "type" => "validation_exception",
                                "field" => $field,
                                "body" => $rule,

                            ];
                        }
                        $errors[] = $error;
                    }
                } else {
                    $errors = $error = [
                        "status" => $e->status,
                        "type" => "validation_exception",
                        "field" => $field,
                        "body" => $rules[0],


                    ];
                }
            }

            $response = $controller->formatJsonResponse([
                "errors" => $errors,
            ], $data);

            return response()->json($response, 422);
        } else {
            if ($request->ajax()) {
                $status = 500;
                if ($e instanceof \Symfony\Component\HttpKernel\Exception\HttpException) {
                    $status = $e->getStatusCode();
                }
                $response = $controller->formatJsonResponse([
                    "errors" => [
                        [
                            "type" => $e->getMessage(),
                            "status" => $status,
                        ],
                    ],
                ], $data);

                return response()->json($response, $status);
            } else {
                $status = 500;
                if ($e instanceof \Symfony\Component\HttpKernel\Exception\HttpException) {
                    $status = $e->getStatusCode();
                }

                $response = $controller->formatJsonResponse([
                    "errors" => [
                        [
                            "status" => $status,
                            "body" => $e->getMessage() == "" ? "Route not found" :  $e->getMessage(),
                            "line" => $e->getLine(),
                            "file" => $e->getFile(),
                        ],
                    ],
                ], $data);
                return response()->json($response, $status);
            }
        }
    }
}
