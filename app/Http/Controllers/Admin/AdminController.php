<?php

namespace App\Http\Controllers;

use App\Card;
use App\Client;
use App\Employee;
use App\Partner;
use App\Shop;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class AdminController extends Controller
{

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
            'role_id' => User::CLIENT_ROLE,

        ]);
        $client = new Client;
        $client->user_id = $user['id'];
        $client->last_name = $request['last_name'];
        $client->first_name = $request['first_name'];
        $client->middle_name = $request['middle_name'];
        $client->save();
        $card = new Card;
        $card->card_number = (new \App\Card)->card_number();
        $card->client_id = $client['id'];
        $card->save();
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
        Partner::create([
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

    public function employee_registration(Request $request)
    {
        $user = new User([
            'phone' => $request['phone'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            'role_id' => User::EMPLOYEE_ROLE,
        ]);
        $user->save();
        $user->employee()->create([
            'user_id' => $user['id'],
            'shop_id' => $request['shop'],
            'last_name' => $request['last_name'],
            'first_name' => $request['first_name'],
            'middle_name' => $request['middle_name'],
        ]);
        return redirect('/admin');
    }
    public function partners_list()
    {
        $partners = \DB::table('partners')
            ->get(array('name', 'full_name', 'inn', 'kpp', 'ogrn', 'rc', 'bank_name', 'bik', 'ks'));
        return View::make('admin.list_of_partners', compact('partners', $partners));
    }
    public function clients_list()
    {
        $clients = \DB::table('clients')
            ->join('users', 'clients.user_id', '=', 'users.id')
            ->join('cards', 'clients.id', '=', 'cards.client_id')
            ->get(array('card_number', 'cashback', 'sum', 'email', 'phone', 'last_name', 'first_name', 'middle_name'));
        return View::make('admin.list_of_clients', compact('clients', $clients));
    }
}