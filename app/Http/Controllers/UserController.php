<?php

/*
 * Twitts Clone API Server
 * 
 * The UserController contains methods for processing of users
 *
 * @filename: 	    app/Http/Controllers/UserController.php
 * @description:    The controller contains all methods, used for users
*/

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\BaseController as BaseController;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\User as UserResource;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class UserController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        if (is_null($users)) {
            return $this->sendError('Users list is empty or invalid.');
        }

        return $this->sendResponse(UserResource::collection($users), 'Users list retrieved successfully.');
    }

    /**
     * Display a listing of the clients from user resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAllClients()
    {
        $clients = User::where('is_client', 1)->get();

        if (is_null($clients)) {
            return $this->sendError('Clients list is empty or invalid.');
        }

        return $this->sendResponse(UserResource::collection($clients), 'Clients list retrieved successfully.');
    }

    /**
     * Display a listing of the users from user resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAllUsers()
    {
        $users = User::where('is_user', 1)->get();

        if (is_null($users)) {
            return $this->sendError('Users list is empty or invalid.');
        }

        return $this->sendResponse(UserResource::collection($users), 'Users list retrieved successfully.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'user_code' => 'required',
            'contact_id' => 'required',
            'account_id' => 'required',
            'name' => 'required',
            'email' => 'required|email'
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $user = User::create($input);

        return $this->sendResponse(new UserResource($user), 'User created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        if (is_null($user)) {
            return $this->sendError('User not found.');
        }

        return $this->sendResponse(new UserResource($user), 'User retrieved successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //  Request Data PUT:
        //
        //  [id] => required, string, the user identifier
        //  [name] => optional, string, the API user name
        //  [email] => optional, string, the user email
        //  [avatarImgFileName] => optional, string, the user's avatar image file name

        // get data from request
        $inputData = $request->all();

        $userName = (empty($inputData['name'])) ? null : $inputData['name'];
        $email = (empty($inputData['email'])) ? null : $inputData['email'];
        $avatarImgFileName = (empty($inputData['avatarImgFileName'])) ? null : $inputData['avatarImgFileName'];

        $user = User::find($id);

        if (empty($user)) {
            return $this->sendError('Retrieving user with ID ' . $id . ' failed.');
        }

        (!empty($userName)) ? $user->name = $userName : null;
        (!empty($email)) ? $user->email = $email : null;
        (isset($avatarImgFileName)) ? $user->avatarImgFileName = $avatarImgFileName : null;
        $user->save();

        $userResource = new UserResource($user);

        return $this->sendResponse($userResource, 'User with ID ' . $id . ' updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return $this->sendResponse([], 'User deleted successfully.');
    }
}
