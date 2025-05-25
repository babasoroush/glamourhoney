<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public function success($code , $message=null , $responseData){
        return response()->json([
            'status' => 'success',
            'message' => $message,
            'data' => $responseData
        ] , $code);
    }

    public function error($code , $message=null){
        return response()->json([
            'status' => 'error',
            'message' => $message,
        ] , $code);
    }
}
