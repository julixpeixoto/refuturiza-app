<?php

namespace App\Client;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ApiClient {

    public static function getUsersData($userUnit) : string
    {
        try {
            define("BASE_URL", env('API_SOURCE_USERS'));
            define("PARAMETER", "per_page");

            $response = Http::get(BASE_URL . "?" . PARAMETER . "=" . $userUnit);

            if($response->getStatusCode() == 200) {
                return $response;
            } else {
                error_log("Error on API call:". $response->body());
                return "";
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public static function getUserData($user) : string
    {
        try {
            define("BASE_URL", env('API_SOURCE_USERS'));

            $url = BASE_URL . "/" . $user;

            $response = Http::get($url);

            if($response->getStatusCode() == 200) {
                return $response;
            } else {
                Log::error("Error on API call:". $response->body());
                return "";
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public static function getUserDataBySearch($param) : string
    {
        try {
            define("BASE_URL", env('API_SOURCE_USERS_SEARCH'));

            $url = BASE_URL . "?q=" . $param . '&per_page=100';

            $response = Http::get($url);

            if($response->getStatusCode() == 200) {
                return $response;
            } else {
                error_log("Error on API call:". $response->body());
                return "";
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
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
