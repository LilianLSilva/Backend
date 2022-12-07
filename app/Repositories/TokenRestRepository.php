<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TokenRestRepository
{
    public function create()
    {
        $body = [
            'client_id' => env('AUTH0_CLIENT_ID'),
            'client_secret' => env('AUTH0_SECRET'),
            'audience' => env('AUTH0_AUDIENCE'),
            'grant_type' => env('AUTH0_GRANT_TYPE')
        ];
        return Http::post('https://'.env('AUTH0_DOMAIN').'/oauth/token', $body)->json();
    }
}
