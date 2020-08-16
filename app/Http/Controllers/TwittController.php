<?php

/*
|--------------------------------------------------------------------------
| Twitt Controller
|--------------------------------------------------------------------------
|
| This controller contains all methods for processing twitts
|
*/

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Auth\BaseController as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Twitt;
use App\Http\Resources\Twitt as TwittResource;

class TwittController extends BaseController
{
    /**
     * Display all twitts.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $twitts = Twitt::all();

        if (is_null($twitts)) {
            return $this->sendError('Twitts list is empty or invalid.');
        }

        return $this->sendResponse(TwittResource::collection($twitts), 'Twitts list retrieved successfully.');
    }

    /**
     * Display all list of twitts of current logged in user.
     *
     * @return \Illuminate\Http\Response
     */
    public function getUsersTwitts()
    {
        $currentUserIs = Auth::id();
        $twitts = Twitt::where('user_id', $currentUserIs)->get();

        if (is_null($twitts)) {
            return $this->sendError('Users list of twitts is empty or invalid.');
        }

        return $this->sendResponse(TwittResource::collection($twitts), 'Users list of twitts retrieved successfully.');
    }

    /**
     * Display list of latest twitts of current logged in user.
     *
     * @param int user's identifier
     * @return \Illuminate\Http\Response
     */
    public function getLatestTwitts($id)
    {
        $latestTwitts = Twitt::latestTwitts($id);

        if (is_null($latestTwitts)) {
            return $this->sendError('Users list of latest twitts is empty or invalid.');
        }

        return $this->sendResponse(TwittResource::collection($latestTwitts), 'Users list of latest twitts retrieved successfully.');
    }

    /**
     * Display the specified twitt.
     *
     * @param  int  identifier of requested twitt
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $twitt = Twitt::find($id);

        if (is_null($twitt)) {
            return $this->sendError('Twitt not found.');
        }

        return $this->sendResponse(new TwittResource($twitt), 'Twitt retrieved successfully.');
    }


    /**
     * Store a newly created twitt in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'user_id' => 'required',
            'body' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $id = (empty($input['user_id'])) ? null : $input['user_id'];

        if ($id) {
            $user = User::find($id);
        }

        $input['name'] = (empty($user && $user->name)) ? "" : $user->name;
        $input['email'] = (empty($user && $user->email)) ? "" : $user->email;
        $input['avatarImgFileName'] = (empty($user && $user->avatarImgFileName)) ? "" : $user->avatarImgFileName;

        $twitt = Twitt::create($input);

        return $this->sendResponse(new TwittResource($twitt), 'Twitt created successfully.', 201);
    }


    /**
     * Update the specified twitt in the storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Twitt $twitt)
    {
        // get data from request
        $inputData = $request->all();

        $validator = Validator::make($inputData, [
            'body' => 'required'
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $twitt->update($inputData);

        $twittResource = new TwittResource($twitt);
        $twittId = (empty($twitt->id)) ? "unknown" : $twitt->id;

        return $this->sendResponse($twittResource, 'Twitt with ID ' . $twittId . ' updated successfully.');
    }

    /**
     * Remove the specified twitt from storage.
     *
     * @param  \App\Models\Twitt  $twitt
     * @return \Illuminate\Http\Response
     */
    public function delete(Twitt $twitt)
    {
        $twitt->delete();

        return $this->sendResponse([], 'Twitt deleted successfully.', 204);
    }
}
