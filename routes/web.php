<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Response;

Route::get('/', function () {
    return view('welcome');
});
// Route::get('/test-macro', function () {
//     return Response::validationError(['foo' => 'bar'], 'It works!');
// });

Route::get('/test-macro', function () {
    return Response::validationError(['foo' => 'bar'], 'It works!');
});
