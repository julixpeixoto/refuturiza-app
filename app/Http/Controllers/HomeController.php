<?php

namespace App\Http\Controllers;

use App\Client\ApiClient;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct(ApiClient $client)
    {
        $this->client = $client;
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $queryParameter = 'followers:>=1000';

        if ($request->has('q') && $request->input('q') == 'repos') {
            $queryParameter = 'repos:>10';
        }

        $data = $this->client::getUserDataBySearch($queryParameter);

        $dataObj = json_decode($data, true);
        $dataJson = json_encode($dataObj['items']);

        $users = paginate($dataJson, 10);

        return view('home', compact('users'));
    }
}
