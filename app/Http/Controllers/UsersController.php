<?php

namespace App\Http\Controllers;

use App\Client\ApiClient;
use App\Models\User;

class UsersController extends Controller
{
    public function index(ApiClient $client)
    {
        $users = User::all();

        foreach ($users as $user) {
            $user->avatar_url = $client::getUserAvatarURL($user->getGitHubUser());
        }

        return view('users.index', compact('users'));
    }
}
