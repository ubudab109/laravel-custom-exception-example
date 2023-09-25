<?php

namespace Tests\Feature;

use Illuminate\Http\Response;
use Tests\TestCase;

class ExceptionTest extends TestCase
{
    /**
     * Error exception validation example.
     * This error will throw CustomValidationException with json response
     */
    public function test_example_validation_error(): void
    {
        $response = $this->post('api/validation', []);

        $response->assertJsonStructure([
            'success',
            'message',
            'error'   => [
                'name',
                'email'
            ],
            'status',
        ]);
    }

    /**
     * Error exception server example.
     * This error will throw CustomErrorException with json response
     */
    public function test_example_server_error(): void
    {
        $response = $this->post('api/error-exception', []);

        $response->assertJson([
            'success' => false,
            'message' => 'Server Error',
            'error'   => [],
            'status' => Response::HTTP_INTERNAL_SERVER_ERROR,
        ]);
    }
}
