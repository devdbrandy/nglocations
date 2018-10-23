<?php

namespace App\Http\Controllers\Api;

use App\Models\LGA;
use App\Models\State;
use Illuminate\Http\Request;
use App\Http\Resources\LgaResource;
use App\Http\Resources\CityResource;
use App\Http\Resources\LgaCollection;
use App\Http\Resources\StateResource;
use App\Http\Resources\StateCollection;
use Symfony\Component\HttpFoundation\Response;

class Controller extends BaseController
{
    /**
     * @OA\Get(
     *   path="/states",
     *   tags={"Get list of states"},
     *   summary="Get list of states",
     *   description="Returns list of state object",
     *   operationId="getStates",
     *   @OA\Response(
     *     response=200,
     *     description="Successful operation"
     *   )
     * )
     *
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getStates()
    {
        return StateCollection::collection(State::all());
    }

    /**
     * @OA\Get(
     *   path="/states/{state}",
     *   tags={"Get a single state"},
     *   summary="Retrieve a single states",
     *   description="Returns a state object",
     *   operationId="getState",
     *   @OA\Parameter(
     *      name="state",
     *      description="State alias",
     *      required=true,
     *      in="path",
     *      @OA\Schema(type="string")
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="Successful operation"
     *   ),
     *   @OA\Response(
     *     response=404,
     *     description="Resource not found"
     *   )
     * )
     *
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function getState(Request $request, State $state)
    {
        if ($request->has('capital')) {
            return response()->json($state->capital);
        }

        return new StateResource($state);
    }

    /**
     * @OA\Get(
     *   path="/states/{state}/cities",
     *   tags={"List Cities in a state"},
     *   summary="List Cities in a state",
     *   description="Returns list of City object",
     *   operationId="getCities",
     *   @OA\Parameter(
     *      name="state",
     *      description="State alias",
     *      required=true,
     *      in="path",
     *      @OA\Schema(type="string")
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="Successful operation"
     *   )
     * )
     *
     * Display a listing of the resource.
     *
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function getCities(State $state)
    {
        return CityResource::collection($state->cities);
    }

    /**
     * @OA\Get(
     *   path="/states/{state}/lgas",
     *   tags={"List Local Governament Areas in a state"},
     *   summary="List Local Governament Areas in a state",
     *   description="Returns list of LGA object",
     *   operationId="getLgas",
     *   @OA\Parameter(
     *      name="state",
     *      description="State alias",
     *      required=true,
     *      in="path",
     *      @OA\Schema(type="string")
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="Successful operation"
     *   )
     * )
     *
     * Display a listing of the resource.
     *
     * @param  \App\Models\State  $state
     * @return \Illuminate\Http\Response
     */
    public function getLgas(State $state)
    {
        return LgaResource::collection($state->lgas);
    }

    /**
     * @OA\Get(
     *   path="/lgas",
     *   tags={"Get list of local governemnt areas"},
     *   summary="Get list of local governemnt areas",
     *   description="Returns list of LGA object",
     *   operationId="getLgasAll",
     *   @OA\Response(
     *     response=200,
     *     description="Successful operation"
     *   )
     * )
     *
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getLgasAll()
    {
        return LgaCollection::collection(LGA::all());
    }

    /**
     * @OA\Get(
     *   path="/lgas/{lga}",
     *   tags={"Get a single Local Government Area"},
     *   summary="Retrieve a single Local Government Area",
     *   description="Returns a LGA object",
     *   operationId="getLga",
     *   @OA\Parameter(
     *      name="lga",
     *      description="Lga alias",
     *      required=true,
     *      in="path",
     *      @OA\Schema(type="string")
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="Successful operation"
     *   ),
     *   @OA\Response(
     *     response=404,
     *     description="Resource not found"
     *   )
     * )
     *
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LGA  $state
     * @return \Illuminate\Http\Response
     */
    public function getLga(Request $request, LGA $lga)
    {
        return new LgaResource($lga);
    }
}
