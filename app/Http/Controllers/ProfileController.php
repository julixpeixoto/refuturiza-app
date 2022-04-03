<?php

namespace App\Http\Controllers;
use App\Client\ApiClient;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index(ApiClient $client)
    {
        $user = User::find(Auth::user()->id);
        $userGitHub = $user->github_url ? explode('/', $user->github_url)[3] : '';
        $user->avatar_url = $client::getUserAvatarURL($userGitHub);
        return view('profile', compact('user'));
    }

    public function update(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->github_url = $request->github_url;
        $user->save();
        return redirect('/profile');
    }
}
