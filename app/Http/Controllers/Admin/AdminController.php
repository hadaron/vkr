<?php

namespace App\Http\Controllers;

use App\Shop;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('is_admin');
    }

    public function admin()
    {
        return view('admin');
    }

    public function client_registration(Request $request)
    {
        $this->validate($request, [
            'last_name' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'middle_name' => 'required|string|max:255',
            'phone' => 'required|string|max:11|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        $user = User::create([
            'phone' => $request['phone'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            'type' => User::DEFAULT_TYPE,
        ]);

        $user->client()->create([
            'user_id' => $user['id'],
            'last_name' => $request['last_name'],
            'first_name' => $request['first_name'],
            'middle_name' => $request['middle_name'],
        ]);


        return redirect('/admin');
    }

    public function partner_registration(Request $request)
    {
//        $this->validate($request, [
//            'last_name' => 'required|string|max:255',
//            'first_name' => 'required|string|max:255',
//            'middle_name' => 'required|string|max:255',
//            'phone' => 'required|string|max:11|unique:users',
//            'email' => 'required|string|email|max:255|unique:users',
//            'password' => 'required|string|min:6',
//        ]);

        $user = new User([
            'phone' => $request['phone'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            'type' => User::DEFAULT_TYPE,
        ]);
        $user->save();
        $user->partner()->create([
            'user_id' => $user['id'],
            'name' => $request['name'],
            'full_name' => $request['full_name'],
            'inn' => $request['inn'],
            'kpp' => $request['kpp'],
            'ogrn' => $request['ogrn'],
            'rc' => $request['rc'],
            'bank_name' => $request['bank_name'],
            'bik' => $request['bik'],
            'ks' => $request['ks'],
        ]);
        return redirect('/admin');
    }

    public function shop_registration(Request $request)
    {
        Shop::create([
            'name' => $request['name'],
            'address' => $request['address'],
            'partner_id' => $request['partner'],
        ]);
        return redirect('/admin');
    }
}