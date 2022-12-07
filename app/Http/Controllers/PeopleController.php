<?php

namespace App\Http\Controllers;

use App\Services\PeopleService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class PeopleController extends Controller
{
    private $peopleService;

    public function __construct(PeopleService $peopleService)
    {
        $this->peopleService = $peopleService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $response = $this->peopleService->all();
        return $response;
    }

    public function getPeople(Request $request){
        try {
            $people = $this->peopleService->getPeople($request);
            return \Response()->json(['data' => $people], 200);
        } catch (\Exception $e){
            return \Response()->json(['res' => false, 'message' => $e->getMessage()], 422);
        }
    }

    public function getPerson(int $id)
    {
        try {
            $people = $this->peopleService->getPerson($id);
            return \Response()->json(['data' => $people], 200);
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
