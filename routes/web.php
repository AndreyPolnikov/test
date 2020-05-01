<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middlewara' => ['auth']], function (){
    Route::get('/', 'DashboardController@dashboard')->name('admin.index');
    Route::resource('/category/', 'Category2Controller', ['as'=>'admin']);
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', 'TestCon@index');
Route::post('/form', 'TestCon@form');
Route::post('/auth', 'AdminController@auth');
Route::post('/updateUser', 'AdminController@updateUser');
Route::post('/adminPage/insertUserForm', 'AdminController@insertUserForm');
Route::post('/registerUser', 'AdminController@registerUser');

Route::get('/cat/{cat_name}', 'TestCon@cat');
Route::get('/cat/{cat_name}/{tovar_name}', 'TestCon@tovar');
Route::get('/cat/{cat_name}/{tovar_name}/{type}', 'TestCon@tovarType');
Route::get('/info', 'TestCon@info');
Route::get('/updateUser/{id}', 'TestCon@updateUser');
Route::get('/deleteUser/{id}', 'TestCon@deleteUser');
Route::get('/insert/{name}/{email}/{password}', 'TestCon@insert');
Route::get('/testUser', 'TestCon@testUser');
Route::get('/admin', 'AdminController@admin');
Route::get('/adminPage', 'AdminController@adminPage');
Route::get('/adminPage/editUsers', 'AdminController@editUsers');
Route::get('/adminPage/editUsers/{id}', 'AdminController@editUser');
Route::get('/adminPage/removeUsers', 'AdminController@removeUsers');
Route::get('/adminPage/removeUser/{id}', 'AdminController@removeUser');
Route::get('/adminPage/insertUser', 'AdminController@insertUser');
Route::get('/registerNew', 'AdminController@registerNew');

Route::get('/logout', 'AdminController@logout');




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
