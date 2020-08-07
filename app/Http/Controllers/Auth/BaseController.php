<?php

/*
 * Twitter Clone API Server
 * 
 * The BaseController contains methods, which will be used in others controllers
 *
 * @filename: 	    app/Http/Controllers/Auth/BaseController.php
 * @description:    The base controller contains all common methods, used in other controllers
*/

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller as Controller;

class BaseController extends Controller
{
    private $techMessage;

    public function __construct()
    {
        $this->techMessage = array();
    }

    /**
     * The method forms a response in JSON format in case of success
     *
     * @return \Illuminate\Http\Response
     */
    public function sendResponse($result, $message)
    {
        $response = [
            'success' => true,
            'data'    => $result,
            'message' => $message,
        ];

        return response()->json($response, 200); // HTTP_STATUS_CODE_STANDARD_SUCCESS by default
    }

    /**
     * The method forms a response in JSON format in case of error
     *
     * @return \Illuminate\Http\Response
     */
    public function sendError($error, $errorMessages = [], $code = 404)
    {
        $response = [
            'success' => false,
            'message' => $error,
        ];

        if (!empty($errorMessages)) {
            $response['data'] = $errorMessages;
        }

        return response()->json($response, $code);
    }
}
