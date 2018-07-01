<?php

namespace App\Http\Controllers;

use App\Client;
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
        $client = Client::with('user','cashback_history','cashback_history.shop')->where('clients.user_id', Auth::id())->first();
        return View::make('client_account', compact('client', $client));
    }

}
