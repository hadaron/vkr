<?php
namespace App\Http\Controllers;
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
    public function user_registration(Request $request)
    {
        $this->validate($request, [
            'last_name' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'middle_name' => 'required|string|max:255',
            'phone' => 'required|string|max:11|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        User::create([
            'last_name' => $request['last_name'],
            'first_name' => $request['first_name'],
            'middle_name' => $request['middle_name'],
            'phone' => $request['phone'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            'type' => User::DEFAULT_TYPE,
        ]);

        return redirect('/admin');
    }
}