<?php
 
namespace App\Http\Controllers;
 
use App\Http\Controllers\Controller;
use App\Client\ApiClient;
 
class PanelController extends Controller
{
    public function show(ApiClient $client)
    {
        $data = $client::getUsersData();
        return $data;
    }
}