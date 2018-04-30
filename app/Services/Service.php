<?php

namespace App\Services;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


/**
 * Class Service
 * @package App\Services
 */
class Service 
{
    /**
     * @param bool $object
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public static function getUser($object = false)
    {

        if ($object) {
            return Auth::user();
        } else {
            $user = Auth::user();
            return $user->email;
        }
    }
    /**
     * @return mixed
     */
    public static function logout()
    {
        $user = self::getUser(true);
        $accessToken = DB::table('oauth_access_tokens')
            ->where('user_id', '=', $user->id)
            ->latest()->get();

        return DB::table('oauth_access_tokens')
            ->where('id', '=', $accessToken[0]->id)
            ->delete();

    }

    /**
     * @return mixed
     */
    public static function authorizationUser($id = false)
    {
        $user = Auth::user();
        if ($id) {
            return $user->id;
        }
        return $user->email;
    }

    /**
     * @return mixed
     */
    public static function typeUserLogged()
    {
        $user = self::getUser(true);
        return $user->type;
    }
}