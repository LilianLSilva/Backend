<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Http\Request;

class UserRepository
{

    public function save(User $request)
    {
        return $request->save();
    }

    public function getByEmail($email){
        return User::where('email', $email)->first();
    }
}
