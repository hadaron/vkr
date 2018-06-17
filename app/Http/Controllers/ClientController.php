<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('is_client');
    }

    public function client()
    {
        return view('client');
    }

    public function client_account()
    {
        $auth = Auth::id();
        $clients = \DB::table('clients')
            ->join('users', 'clients.user_id', '=', 'users.id')
            ->join('cashback_histories','clients.id','=','cashback_histories.clients_id')
            ->where("clients.user_id", "=", "$auth")
            ->get(array('card_number', 'cashback', 'sum', 'email', 'phone', 'last_name', 'first_name'));
        return View::make('client_account', compact('clients', $clients));
    }

}
