<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    public function responseSuccess($result, $message )
    {
        $response = [
            'success' => true,
            'message' => $message,
            'data'    => $result,
        ];

        return response()->json($response, 200);
    }

    public function responseSuccessWhitoutData( $message )
    {
        $response = [
            'success' => true,
            'message' => $message,
        ];

        return response()->json($response, 200);
    }

    public function responseError($error, $code = 404)
    {
    	$response = [
            'success' => false,
            'message' => $error,
        ];

        return response()->json($response, $code);
    }

    public function serverError()
    {
    	$response = [
            'success' => false,
            'message' => 'Server error',
        ];

        return response()->json($response, 500);
    }
}
