<?php

namespace App\Services;

use App\Http\Request\CreateUserRequest;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserService
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function save(Request $request)
    {

        $request = [
            'password' => Hash::make($request->get('password')),
            'name' => $request->get('name'),
            'email' => $request->get('email')
        ];

        $user = New User($request);
        $this->userRepository->save($user);
        return $user;
    }
}
