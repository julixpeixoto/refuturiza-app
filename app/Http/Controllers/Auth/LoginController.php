<?php

namespace App\Http\Controllers\Auth;

use App\Client\ApiClient;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    protected function authenticated(Request $request, $user)
    {
        $this->setUserSession($user);
    }

    protected function setUserSession()
    {
        $user = User::find(Auth::user()->id);
        $userGitHub = $user->github_url ? explode('/', $user->github_url)[3] : '';
        $avatarUrl = ApiClient::getUserAvatarURL($userGitHub);
        session(['avatar_url' => $avatarUrl]);
    }
}
