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


Route::get('/admin/registration_client', function () {
    return view('admin.client_register');
})
    ->middleware('is_admin')
    ->name('admin_registration_client');

Route::get('/admin/registration_partner', function () {
    return view('admin.partner_register');
})
    ->middleware('is_admin')
    ->name('admin_registration_partner');


Route::get('/admin/registration_shop', function () {
    $partners = \App\Partner::all(['id', 'name']);
    return View::make('admin.shop_register', compact('partners', $partners));
})
    ->middleware('is_admin')
    ->name('admin_registration_shop');

Route::post('/admin/registration_client', 'AdminController@client_registration')
    ->name('admin_registration_client');

Route::post('/admin/registration_partner', 'AdminController@partner_registration')
    ->name('admin_registration_partner');

Route::post('/admin/registration_shop', 'AdminController@shop_registration')
    ->name('admin_registration_shop');

/*
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.request');
Route::post('password/reset', 'Auth\ResetPasswordController@postReset')->name('password.reset');
REST API*/