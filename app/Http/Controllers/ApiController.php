<?php

namespace App\Http\Controllers;

use App\Models\LGA;
use App\Models\State;
use Illuminate\Http\Request;
use App\Http\Resources\LgaResource;
use App\Http\Resources\CityResource;
use App\Http\Resources\LgaCollection;
use App\Http\Resources\StateResource;
use App\Http\Resources\StateCollection;
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
        return StateCollection::collection(State::all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function state(Request $request, State $state)
    {
        if ($request->has('capital')) {
            return response()->json($state->capital);
        }

        return new StateResource($state);
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function lgas(State $state)
    {
        return LgaResource::collection($state->lgas);
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function cities(State $state)
    {
        return CityResource::collection($state->cities);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function localGovAreas()
    {
        return LgaCollection::collection(LGA::all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LGA  $state
     * @return \Illuminate\Http\Response
     */
    public function showLga(Request $request, LGA $lga)
    {
        return new LgaResource($lga);
    }
}
