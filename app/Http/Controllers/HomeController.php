<?php

namespace App\Http\Controllers;

use App\User;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        switch (Auth::user()->role_id) {
            case User::CLIENT_ROLE:
                return view('client_account');
            case User::EMPLOYEE_ROLE:
                return view('employee_account');
            case User::ADMIN_ROLE:
                return view('admin.admin');
            default:
                return view('welcome');
        }
    }
}
