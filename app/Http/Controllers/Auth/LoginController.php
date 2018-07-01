<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     * @return string
     */
    protected function redirectTo()
    {
        switch (Auth::user()->role_id) {
            case User::CLIENT_ROLE:
                return $redirectTo = '/account';
            case User::EMPLOYEE_ROLE:
                return $redirectTo = '/c_account';
            case User::ADMIN_ROLE:
                return $redirectTo = '/admin';
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
