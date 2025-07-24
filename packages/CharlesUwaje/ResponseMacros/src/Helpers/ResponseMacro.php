<?php

namespace CharlesUwaje\ResponseMacros\Helpers;

use Illuminate\Support\Facades\Response;

class ResponseMacro
{

    public static function register(): void
    {
        // Success Response
        Response::macro('success', function (array $data = [], string $message = 'Success', int $status = 200) {
            return response()->json([
                'status' => 'success',
                'message' => $message,
                'data' => $data,
            ], $status);
        });



        // Error Response
        Response::macro('error', function (array $data = [], string $message = 'Error', int $status = 400) {
            return response()->json([
                'status' => 'error',
                'message' => $message,
                'data' => $data,
            ], $status);
        });

        // Created Response
        Response::macro('created', function (array $data = [], string $message = 'Resource created successfully') {
            return response()->json([
                'status' => 'created',
                'message' => $message,
                'data' => $data,
            ], 201);
        });

        // Unauthorized Response
        Response::macro('unauthorized', function (array $data = [], string $message = 'Unauthorized') {
            return response()->json([
                'status' => 'unauthorized',
                'message' => $message,
                'data' => $data,
            ], 401);
        });


        // Forbidden Response
        Response::macro('forbidden', function (array $data = [], string $message = 'Forbidden') {
            return response()->json([
                'status' => 'forbidden',
                'message' => $message,
                'data' => $data,
            ], 403);
        });


        // Not Found Response
        Response::macro('notFound', function (array $data = [], string $message = 'Not Found') {
            return response()->json([
                'status' => 'notFound',
                'message' => $message,
                'data' => $data,
            ], 404);
        });


        // Validation Error
        Response::macro('validationError', function (array $errors = [], string $message = 'Validation failed') {
            return response()->json([
                'status' => 'validationError',
                'message' => $message,
                'errors' => $errors,
            ], 422);
        });

        // No Content
        
        Response::macro('customNoContent', function (array $data = [], string $message = 'No Content') {
            return response()->json([
                'status' => 'success',
                'message' => $message,
                'data' => $data,
            ], 204);
        });
    }
}
