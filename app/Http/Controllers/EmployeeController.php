<?php

namespace App\Http\Controllers;

use App\Cashback_history;
use App\Client;
use App\Employee;
use App\Partner;
use App\Percent;
use App\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    public function client_search(Request $request)
    {
        $query = Employee::all()->where("user_id", Auth::id())->first();
        \DB::table('checks')->insert([
            'employee_id' => "$query[id]",
            'log' => "$request[request]",
        ]);
        return Client::with('user', 'cashback_history')->get();
    }

    public function transaction(Request $request)
    {
        $query = Employee::all()->where("user_id", Auth::id())->first();
        $shop = Shop::all()->where('id', $query['shop_id'])->first();
        $card = Client::all()->where('card_number', $request['card'])->first();
        $partner = Partner::all()->where("id", $shop['partner_id'])->first();
        $percent = Percent::all()->where("partner_id", $partner['id'])->last();
        if ($request['sum'] <= 0) {
            $cashback = 0;
        } else {
            $cashback = $request['sum'] * $percent['percent'];
        }
        Cashback_history::create([
            'shop_id' => "$shop[id]",
            'client_id' => "$card[id]",
            'percent_id' => "$percent[id]",
            'sum' => "$request[sum]",
            'cashback' => "$cashback",
        ]);
        return view('transaction_page');
    }

}
