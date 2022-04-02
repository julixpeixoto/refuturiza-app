<?php

namespace App\Client;

use Illuminate\Support\Facades\Http;

class ApiClient {

    public static function getUsersData($userUnit) : string
    {
        define("BASE_URL", env('API_SOURCE_USERS'));

        define("PARAMETER", "per_page");

        return Http::get(BASE_URL . "?" . PARAMETER . "=" . $userUnit);
    }

    public static function getUserData($user) : string
    {
        define("BASE_URL", env('API_SOURCE_USERS'));

        define("PARAMETER", "per_page");

        return Http::get(BASE_URL . "/" . $user);
    }

    public static function getUserAvatarURL(string $userGitHub) : string
    {
        try{
            $userGitHubData = json_decode(self::getUserData($userGitHub));
            return $userGitHubData->avatar_url;
        }catch (\Exception $e){
            error_log('Error to get GitHub info: ' . $e->getMessage());
            return "/img/generic_avatar.png";
        }
    }

}
