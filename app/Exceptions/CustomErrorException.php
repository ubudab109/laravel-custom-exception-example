<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class CustomErrorException extends Exception
{
    public $message, $error, $status;

    public function __construct(string $message, mixed $error, ?Response $status)
    {
        parent::__construct();
        $this->message = $message;
        $this->error = $error;
        $this->status = $status;
    }

    /**
     * The function returns a JSON response with success status, message, error, and status code.
     * 
     * @return JsonResponse A JsonResponse object is being returned.
     */
    public function render(): JsonResponse
    {
        return response()->json([
            'success' => false,
            'message' => $this->message,
            'error'   => $this->error ?? [],
            'status'  => $this->status ?? Response::HTTP_INTERNAL_SERVER_ERROR,
        ], $this->status ?? Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}
