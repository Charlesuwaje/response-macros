<?php

use CharlesUwaje\ResponseMacros\Providers\ResponseMacrosServiceProvider;
use Tests\TestCase;

class ResponseMacroTest extends TestCase
{
    protected function getPackageProviders($app)
    {
        return [
            ResponseMacrosServiceProvider::class,
        ];
    }

    public function test_it_returns_success_response()
{
    $response = response()->success(['foo' => 'bar'], 'Operation successful');

    $this->assertEquals(200, $response->getStatusCode());
    $this->assertEquals([
        'status' => 'success',
        'message' => 'Operation successful',
        'data' => ['foo' => 'bar'],
    ], $response->getData(true));
}

public function test_it_returns_error_response()
{
    $response = response()->error(['field' => 'Invalid'], 'Something went wrong', 400);

    $this->assertEquals(400, $response->getStatusCode());
    $this->assertEquals([
        'status' => 'error',
        'message' => 'Something went wrong',
        'data' => ['field' => 'Invalid'],
    ], $response->getData(true));
}

public function test_it_returns_unauthorized_response()
{
    $response = response()->unauthorized([], 'Not allowed');

    $this->assertEquals(401, $response->getStatusCode());
    $this->assertEquals([
        'status' => 'unauthorized',
        'message' => 'Not allowed',
        'data' => [],
    ], $response->getData(true));
}

public function test_it_returns_no_content_response()
{
    $response = response()->customNoContent([], 'No Content');

    $this->assertEquals(204, $response->getStatusCode());
    $this->assertEquals([
        'status' => 'success',
        'message' => 'No Content',
        'data' => [],
    ], $response->getData(true));
}
}