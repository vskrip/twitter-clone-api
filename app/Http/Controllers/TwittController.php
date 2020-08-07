<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Twitt;

class TwittController extends Controller
{
    public function index()
    {
        return Twitt::all();
    }

    public function show(Twitt $twitt)
    {
        return $twitt;
    }

    public function store(Request $request)
    {
        $twitt = Twitt::create($request->all());

        return response()->json($twitt, 201);
    }

    public function update(Request $request, Twitt $twitt)
    {
        $twitt->update($request->all());

        return response()->json($twitt, 200);
    }

    public function delete(Twitt $twitt)
    {
        $twitt->delete();

        return response()->json(null, 204);
    }
}
