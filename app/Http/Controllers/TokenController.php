<?php

namespace App\Http\Controllers;

use App\Services\TokenService;
use http\Client\Curl\User;
use Illuminate\Http\Request;

class TokenController
{
    private $tokenService;

    public function __construct(TokenService $tokenService)
    {
        $this->tokenService= $tokenService;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Request $request)
    {
        try {
            $token = $this->tokenService->create($request);
            return \Response()->json(['access_token' => $token, 'res' => true, 'message' => 'The Token was correctly created'], 200);
        }
        catch (\Exception $e){
            return \Response()->json(['res' => false, 'message' => $e->getMessage()], 422);

        }
    }

}
