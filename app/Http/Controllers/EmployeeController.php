<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    public function client_search(Request $request)
    {
        $query = Employee::all()->where("user_id", Auth::id())->first();
        \DB::table('checks')->insert([
            'time' => now('+3'),
            'employee_id' => "$query[id]",
            'log' => "$request[request]",
        ]);
        return \DB::table('clients')
            ->join('cards', 'clients.id', '=', 'cards.client_id')
            ->join('users', 'clients.user_id', '=', 'users.id')
            ->where('card_number', 'like', "%$request[request]%")
            ->orWhere('phone', 'like', "%$request[request]%")
            ->orWhere('last_name', 'like', "%$request[request]%")
            ->get(array('phone', 'last_name', 'first_name', 'middle_name', 'card_number', 'cashback', 'sum'));
    }
}
