<?php

namespace App\Client;

use Illuminate\Support\Facades\Http;

class ApiClient {

    public static function getUsersData($userUnit) : string
    {
        define("BASE_URL", env('API_SOURCE_USERS'));

        define("PARAMETER", "per_page");

        $response = Http::get(BASE_URL . "?" . PARAMETER . "=" . $userUnit);

        return $response;
    }

}
