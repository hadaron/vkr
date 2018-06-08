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

Route::post('/admin/registration_client', 'AdminController@client_registration')
    ->name('admin_registration_client');

Route::get('/admin/registration_partner', function () {
    return view('admin.partner_register');
})
    ->middleware('is_admin')
    ->name('admin_registration_partner');

Route::post('/admin/registration_partner', 'AdminController@partner_registration')
    ->name('admin_registration_partner');

Route::get('/admin/registration_shop', function () {
    $partners = \App\Partner::all(['id', 'name']);
    return View::make('admin.shop_register', compact('partners', $partners));
})
    ->middleware('is_admin')
    ->name('admin_registration_shop');

Route::post('/admin/registration_shop', 'AdminController@shop_registration')
    ->name('admin_registration_shop');

Route::get('/admin/registration_employee', function () {
    $shops = \App\Shop::all(['id','name']);
    return View::make('admin.employee_register', compact('shops', $shops));
})
    ->middleware('is_admin')
    ->name('admin_registration_employee');

Route::post('/admin/registration_employee', 'AdminController@employee_registration')
    ->name('admin_registration_employee');





Route::get('/admin/list_of_clients', function () {
    $clients = DB::table('clients')
        ->join('users', 'clients.user_id', '=', 'users.id')
        ->join('cards','clients.id','=','cards.client_id')
        ->get(array('card_number','cashback','sum', 'email', 'phone', 'last_name', 'first_name', 'middle_name'));
    return View::make('admin.list_of_clients', compact('clients', $clients));
})
    ->middleware('is_admin')
    ->name('admin_list_of_clients');

Route::get('/admin/list_of_partners', function () {
    $partners = DB::table('partners')
        ->join('users', 'partners.user_id', '=', 'users.id')
        ->get(array('email', 'phone', 'name', 'full_name'));
    return View::make('admin.list_of_partners', compact('partners', $partners));
})
    ->middleware('is_admin')
    ->name('admin_list_of_partners');

/*
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.request');
Route::post('password/reset', 'Auth\ResetPasswordController@postReset')->name('password.reset');
REST API*/