<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function handleResponse($result = [], $msg, $code = 200)
    {
        $res = [
            'success' => true,
            'data' => $result,
            'message' => $msg,
        ];

        return response()->json($res, $code);
    }


    public function handleError($error, $msg = [], $code = 500)
    {
        $res = [
            'success' => false,
            'message' => $error,
        ];

        if (!empty($msg)) {
            $res['data'] = $msg;
        }

        return response()->json($res, $code);
    }
}
