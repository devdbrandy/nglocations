<?php

namespace App\Http\Controllers;

use App\Models\State;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $states = State::all();
        return response()
            ->json(['data' => $states])
            ->setStatusCode(Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function state(State $state)
    {
        return response()
            ->json($state)
            ->setStatusCode(Response::HTTP_OK);
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function lgas(State $state)
    {
        $lgas = $state->lgas;
        return response()
            ->json(['data' => $lgas])
            ->setStatusCode(Response::HTTP_OK);
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function cities(State $state)
    {
        $cities = $state->cities;
        return response()
            ->json(['data' => $cities])
            ->setStatusCode(Response::HTTP_OK);
    }
}
