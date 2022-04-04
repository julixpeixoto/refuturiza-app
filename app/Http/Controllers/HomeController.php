<?php

namespace App\Http\Controllers;

use App\Client\ApiClient;

class HomeController extends Controller
{
    public function __construct(ApiClient $client)
    {
        $this->client = $client;
        $this->middleware('auth');
    }

    public function index()
    {
        $users = paginate($this->client::getUsersData(100), 25);

        return view('home', compact('users'));
    }
}
