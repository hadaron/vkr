<?php

use App\User;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::get('register', 'AuthController@index')->name('register');
//Route::get('users/{user}', 'UserController@show');
//Route::post('register2', 'UserController@store');
//Route::put('users/{user}', 'UserController@update');
//Route::delete('users/{user}', 'UserController@delete');


/*
Route::group(['middleware' => ['web']], function () {
    Route::get('register', function () {
        return view('admin.new_user');
    });
});
Route::post('register', 'AuthController@register')->name('register');
Route::post('login', 'AuthController@login');
Route::post('recover', 'AuthController@recover');
Route::group(['middleware' => ['jwt.auth']], function () {
    Route::get('logout', 'AuthController@logout');
});
                    Если хватит времени передать на REST API */