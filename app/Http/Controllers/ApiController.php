<?php

namespace App\Http\Controllers;

use App\Client\ApiClient;

class ApiController extends Controller
{

    public function show()
    {
        return ApiClient::getUsersData(100);
    }
}
