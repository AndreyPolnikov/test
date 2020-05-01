<?php

namespace App\Http\Controllers;
use App\BadUsers;


class BadUsersController extends Controller
{
    public function check($ip)
    {
        $userID = BadUsers::where('userIP', $ip)->first();
        return $userID;
    }
}
