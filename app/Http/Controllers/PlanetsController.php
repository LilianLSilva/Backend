<?php

namespace App\Http\Controllers;

use App\Services\PlanetService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class PlanetsController extends Controller
{
    private $planetService;

    public function __construct(PlanetService $planetService)
    {
        $this->planetService = $planetService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $response = $this->planetService->all();
        return $response;
    }

    public function getPlanets(Request $request){
        try {
            $planets = $this->planetService->getplanets($request);
            return \Response()->json(['data' => $planets], 200);
        } catch (\Exception $e){
            return \Response()->json(['res' => false, 'message' => $e->getMessage()], 422);
        }
    }

    public function getPlanet(int $id)
    {
        try {
            $planet = $this->planetService->getPlanet($id);
            return \Response()->json(['data' => $planet], 200);
        } catch (\Exception $e){
            return \Response()->json(['res' => false, 'message' => $e->getMessage()], 422);
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
    }
}
