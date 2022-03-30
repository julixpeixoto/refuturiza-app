<?php

namespace App\Client;

use Illuminate\Support\Facades\Http;

class ApiClient {   
    
    public static function getUsersData() : string
    {
        $response = Http::get(env('API_SOURCE_USERS'));

        return $response;
    }

}
