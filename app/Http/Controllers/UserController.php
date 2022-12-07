<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;

class UserController {
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService= $userService;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        try {
            $this->userService->save($request);
            return \Response()->json(['res' => true, 'message' => 'The User was correctly created'], 200);
        }
        catch (\Exception $e){
            return \Response()->json(['res' => false, 'message' => $e->getMessage()], 422);

        }
    }
}
