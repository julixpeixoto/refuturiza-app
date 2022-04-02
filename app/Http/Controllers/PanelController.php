<?php

namespace App\Http\Controllers;

use App\Client\ApiClient;

class PanelController extends Controller
{
    public function show(ApiClient $client)
    {
        $data = $client::getUsersData(100);
        return $data;
    }
}
