<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')
    ->name('home');

Route::get('/admin', function () {
    return view('admin.admin');
})
    ->middleware('is_admin')
    ->name('admin');

Route::get('/admin/registration', function () {
    return view('admin.new_user');
})
    ->middleware('is_admin')
    ->name('admin_registration');

Route::post('/admin/registration', 'AdminController@user_registration')
    ->name('admin_registration_user');
/*
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.request');
Route::post('password/reset', 'Auth\ResetPasswordController@postReset')->name('password.reset');
REST API*/