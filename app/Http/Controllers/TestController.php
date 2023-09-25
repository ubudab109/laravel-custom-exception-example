<?php

namespace App\Http\Controllers;

use App\Exceptions\CustomErrorException;
use App\Exceptions\CustomValidationException;
use App\Http\Requests\ValidationRequestExample;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TestController extends Controller
{

    public function testValidationError(ValidationRequestExample $request)
    {
        $input = $request->all();
        Log::info($input);
        return response()->json(['this one should not be returned']);
    }

    public function testErrorExceptionExample()
    {
        try {
            $this->errorExceptionExample();
        } catch (CustomErrorException $e) {
            throw $e;
        }
    }

    protected function validationErrorExample(array $error)
    {
        throw new CustomValidationException('Validation Error', $error);
    }

    protected function errorExceptionExample()
    {
        throw new CustomErrorException('Server Error', [], null);
    }
}
