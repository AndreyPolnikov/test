<?php


namespace App;

use Illuminate\Database\Eloquent\Model;

class TestCon extends Model
{
    public function getUser($login, $password)
    {
        $users = DB::select('select * from users', [1]);

        return $users;
    }
}
