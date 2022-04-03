<?php

namespace App\Http\Controllers;

use App\Client\ApiClient;
use App\Http\Requests\UserStoreRequest;
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

    public function create()
    {
        return view('users.create');
    }

    public function store(UserStoreRequest $request)
    {
        $user = User::create($request->all());
        $user->password = bcrypt(request('password'));
        $user->save();
        return redirect('/users');
    }

}
