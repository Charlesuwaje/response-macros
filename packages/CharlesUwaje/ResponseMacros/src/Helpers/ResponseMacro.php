<?php

namespace CharlesUwaje\ResponseMacros\Helpers;

use Illuminate\Support\Facades\Response;

class ResponseMacro
{
    public static function register(): void
    {
        //  Success Response

        Response::macro('success', function (
            string $message = 'Success',
            array $data = [],
            int $code = 200
        ) {
            return response()->json([
                'status' => 'success',
                'message' => $message,
                'data' => $data,
            ], $code);
        });

        // Error Response
        Response::macro('error', function (
            string $message = 'An error occurred',
            int $code = 400,
            array $errors = []
        ) {
            return response()->json([
                'status' => 'error',
                'message' => $message,
                'errors' => $errors,
            ], $code);
        });

        // Created Response
        Response::macro('created', function (
            string $message = 'Resource created successfully',
            array $data = []
        ) {
            return response()->json([
                'status' => 'success',
                'message' => $message,
                'data' => $data,
            ], 201);
        });

        // Unauthorized Response
        Response::macro('unauthorized', function (
            string $message = 'Unauthorized'
        ) {
            return response()->json([
                'status' => 'error',
                'message' => $message,
            ], 401);
        });

        // Forbidden Response
        Response::macro('forbidden', function (
            string $message = 'Forbidden'
        ) {
            return response()->json([
                'status' => 'error',
                'message' => $message,
            ], 403);
        });

        //  Not Found Response
        Response::macro('notFound', function (
            string $message = 'Resource not found'
        ) {
            return response()->json([
                'status' => 'error',
                'message' => $message,
            ], 404);
        });

        //  Validation Error
        Response::macro('validationError', function (
            string $message = 'Validation failed',
            array $errors = []
        ) {
            return response()->json([
                'status' => 'error',
                'message' => $message,
                'errors' => $errors,
            ], 422);
        });

        //  No Content
        Response::macro('noContent', function () {
            return response()->json(null, 204);
        });

           //  No Content
        Response::macro('ok', function (
            string $message,
            ?array $headers = []
        ) {
            return response()->json([
                'status' => 'success',
                'message' => $message,
            ], SymfonyResponse::HTTP_OK, $headers);
        });
    }
}
