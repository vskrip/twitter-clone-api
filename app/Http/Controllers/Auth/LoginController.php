<?php

/*
|--------------------------------------------------------------------------
| Login Controller
|--------------------------------------------------------------------------
|
| This controller handles authenticating users for the application and
| redirecting them to your home screen. The controller uses a trait
| to conveniently provide its functionality to your applications.
|
*/

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Auth\BaseController as BaseController;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends BaseController
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * The method will provide login functionality for an user
     *
     * @var \Illuminate\Http\Request
     */
    public function login(Request $request)
    {
        $loginCredentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($loginCredentials)) {
            $user = Auth::user();
            $success['token'] =  $user->generateToken()->accessToken;
            $success['name'] =  $user->name;

            return $this->sendResponse($success, 'User logged in successfully.');
        } else {
            return $this->sendError('Unauthorised.', ['error' => 'Unauthorised'], 401); // HTTP_STATUS_CODE_UNAUTHORIZED_ERROR
        }
    }

    /**
     * The method will set the api token of logged in user to NULL (logout)
     */
    public function logout()
    {
        $user = Auth::guard('api')->user();

        if ($user) {
            $user->api_token = null;
            $user->save();

            $data = "";
            $message = "User logged out successfully.";

            return $this->sendResponse($data, $message);
        } else {
            return $this->sendError('Unauthorised.', ['error' => 'Unauthorised'], 401); // HTTP_STATUS_CODE_UNAUTHORIZED_ERROR
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
