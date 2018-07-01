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

Route::group(['middleware' => 'is_admin'], function () {

    Route::get('/admin', function () {
        return view('admin.admin');
    })
        ->name('admin');

    Route::get('/admin/registration_client', function () {
        return view('admin.client_register');
    })
        ->name('admin_registration_client');

    Route::post('/admin/registration_client', 'AdminController@client_registration')
        ->name('admin_registration_client');

    Route::get('/admin/registration_partner', function () {
        return view('admin.partner_register');
    })
        ->name('admin_registration_partner');

    Route::post('/admin/registration_partner', 'AdminController@partner_registration')
        ->name('admin_registration_partner');

    Route::get('/admin/registration_shop', function () {
        $partners = \App\Partner::all(['id', 'name']);
        return View::make('admin.shop_register', compact('partners', $partners));
    })
        ->name('admin_registration_shop');

    Route::post('/admin/registration_shop', 'AdminController@shop_registration')
        ->name('admin_registration_shop');

    Route::get('/admin/registration_employee', function () {
        $shops = \App\Shop::all(['id', 'name']);
        return View::make('admin.employee_register', compact('shops', $shops));
    })
        ->name('admin_registration_employee');

    Route::post('/admin/registration_employee', 'AdminController@employee_registration')
        ->name('admin_registration_employee');

    Route::get('/admin/list_of_clients', 'AdminController@clients_list')
        ->name('admin_list_of_clients');

    Route::get('/admin/list_of_partners', 'AdminController@partners_list')
        ->name('admin_list_of_partners');

    Route::post('/admin/list_of_partners', 'AdminController@change_value_percent')
        ->name('admin_change_percent');
    Route::post('/admin/report','AdminController@report')
        ->name('report');
    Route::post('/admin/list_of_clients','AdminController@client_remove')
        ->name('client_remove');
});

Route::get('account/', 'ClientController@client_account');
Route::group(['middleware' => 'is_employee'], function () {

    Route::get('c_account/', function () {
        return view('employee_account');
    });

    Route::get('c_account/transaction', function () {
        return view('transaction_page');
    });

    Route::post('c_account/', 'EmployeeController@client_search')
        ->name('search_client');

    Route::post('c_account/transaction', 'EmployeeController@transaction')
        ->name('transaction');
});
