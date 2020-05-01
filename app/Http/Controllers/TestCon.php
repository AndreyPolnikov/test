<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\category;
use Illuminate\Support\Facades\DB;
use App\User;

class TestCon extends Controller
{

    public function testUser()
    {
        $users = User::all();

        $flight = User::find(2);

// Получение первой модели, удовлетворяющей условиям...
$flight = User::where('active', 1)->first();

       print_r($flight->name);
      //  return view('users', $data) ;
    }

    public function index(){
        $a = category::all();
        $array =  [
            'ipnoe' => [
                'name' => 'Iphone',
                'price' => 500
            ],
            'samsung' => [
                'name' => 'Samsung',
                'price' => 200
            ]
        ];
        $array2 = ['iphone', 'samsung', 'xiomi'];

     //   $this->insert('Ivana', 'ivana2@gmail.com', 1111111111);

        $result = DB::select('select * from users');
        $resultArr = (array)$result;
        $data = ['products' => $array, 'users' => $resultArr, 'tests' => 5];

        return view('test', $data);
    }

    public function updateUser($id) {
        DB::table('users')
            ->where('id', $id)
            ->update(['updated_at' => '2020-04-17 20:37:47']);

        $result = DB::select('select * from users');
        $resultArr = (array)$result;

        return $resultArr;
    }

    public function deleteUser($id) {
        DB::table('users')
            ->where('id', '=', $id)
            ->delete();

        $result = DB::select('select * from users');
        $resultArr = (array)$result;

        return $resultArr;
    }

    public function insert($name, $email, $password) {
         DB::table('users')->insert(
            ['name' => $name, 'email' => $email, 'password' => $password]
        );

        $result = DB::select('select * from users');
        $resultArr = (array)$result;

        return $resultArr;
    }

    public function myTest(){
        $array =  [
            'ipnoe' => [
                'name' => 'Iphone',
                'price' => 500
            ],
            'samsung' => [
                'name' => 'Samsung',
                'price' => 200
            ]
        ];

        $data = ['products' => $array];
        return view('test', $data);
    }

    public function tovarArr() {
        $array =  [
            'ipnoe' => [
                'name' => 'Iphone',
                'price' => 500
            ],
            'samsung' => [
                'name' => 'Samsung',
                'price' => 200
            ]
        ];

        $result = DB::select('select * from users');
        $resultArr = (array)$result;
        $data = ['products' => $array, 'data' => $result];

        return view('test', $data);
    }

    public function cat($cat_name) {
        return $cat_name;
    }

    public function tovar($cat_name, $tovar) {
        return $tovar;
    }

    public function tovarType($cat_name, $tovar, $type) {
        echo $cat_name;
        return $type;
    }

    public function info(Request $request){
        $page = $request->page;

        $html = 'Page ' . $page;

        $result = DB::select('select * from users');
        $resultArr = (array)$result;


        $html = ['page' => $page, 'data' => $resultArr[0]];
        return view('page', $html);
    }

    public function form(Request $request){
        $method =  $request->post();
        $data = explode('&', $method['form']);
        $login = explode('login=', $data[0])[1];
        $password = explode('password=', $data[1])[1];
        $result = DB::select('select * from users');
        $resultArr = (array)$result;
        print_r($resultArr[0]->name);
        // $name = $resultArr['name'];
    }
}
