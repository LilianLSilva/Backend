<?php

namespace App\Services;

use App\Repositories\TokenRestRepository;
use App\Repositories\UserRepository;
use Http\Discovery\Exception\NotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TokenService
{
    private $tokenRestRepository;
    private $userRepository;

    public function __construct(TokenRestRepository $tokenRestRepository, UserRepository $userRepository)
    {
        $this->tokenRestRepository = $tokenRestRepository;
        $this->userRepository = $userRepository;
    }

    public function create(Request $request)
    {
        $user= $this->userRepository->getByEmail($request->get('email'));
        if (!empty($user) && password_verify($request->get('password'), $user->password)){
            $token = $this->tokenRestRepository->create();
            dd($token);
            return $token['access_token'];
        }
        throw new NotFoundException();
    }
}
