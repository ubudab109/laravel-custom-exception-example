<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class CustomValidationException extends ValidationException
{
    public $message, $error;

    public function __construct(string $message, mixed $error)
    {
        $this->message = $message;
        $this->error = $error;
    }

    /**
     * The function returns a JSON response with a success status of false, a message, an error (if
     * any), and a status code of 400 (Bad Request).
     * 
     * @return JsonResponse A JsonResponse object is being returned.
     */
    public function render(): JsonResponse
    {
        return response()->json([
            'success' => false,
            'message' => $this->message,
            'error'   => $this->error ?? [],
            'status'  => Response::HTTP_BAD_REQUEST,
        ], Response::HTTP_BAD_REQUEST);
    }
}
