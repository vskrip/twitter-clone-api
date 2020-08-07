<?php

/*
|--------------------------------------------------------------------------
| Register Controller
|--------------------------------------------------------------------------
|
| This controller handles the registration of new users as well as their
| validation and creation. By default this controller uses a trait to
| provide this functionality without requiring any additional code.
|
*/

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Auth\BaseController as BaseController;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class RegisterController extends BaseController
{
    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * The method will register new user
     *
     * @return \Illuminate\Http\Response
     */
    public function register()
    {
        //  Request Data POST:
        //
        //  [name] => required, string, the username
        //  [email] => required, string, the  primary email of the user
        //  [password] => required, string, the password
        //  [c_password] => required, string, the password confirmation

        // get data from request
        $inputRequestData = $this->request->all();

        $validator = Validator::make($inputRequestData, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'c_password' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        // create new user
        unset($input);
        $input['name'] = (empty($inputRequestData['username'])) ? "" : $inputRequestData['username'];
        $input['email'] = (empty($inputRequestData['email'])) ? "" : $inputRequestData['email'];
        $input['password'] = (empty($inputRequestData['password'])) ? "" : bcrypt($inputRequestData['password']);
        $user = User::create($input);
        // $userId = $user->id; // if it will be need to use somewhere

        $userToken = $user->generateToken()->accessToken;
        $userName = $user->name;

        // structure the api response
        unset($response); // to be a json response
        $response = array();
        $response['result'] = TRUE;
        // -------------------------
        $response['token'] = $userToken;
        $response['name'] = $userName;
        // -------------------------

        return $this->sendResponse($response, 'User registered successfully.', 200); // HTTP_STATUS_CODE_STANDARD_SUCCESS
    }
}
