<?php

namespace App\Http\Controllers\Auth;

use App\Card;
use App\Client;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'last_name' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'middle_name' => 'required|string|max:255',
            'phone' => 'required|string|max:11|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'phone' => $data['phone'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'type' => User::DEFAULT_TYPE,

        ]);
        $client = new Client;
        $client->user_id = $user['id'];
        $client->last_name = $data['last_name'];
        $client->first_name = $data['first_name'];
        $client->middle_name = $data['middle_name'];
//        $user->client()->create([
//            'user_id' => $user['id'],
//            'last_name' => $data['last_name'],
//            'first_name' => $data['first_name'],
//            'middle_name' => $data['middle_name'],
//        ]);
        $client->save();
        $ccnumber = 7918;
        $length = 16;
        # generate digits
        while (strlen($ccnumber) < ($length - 1)) {
            $ccnumber .= rand(0, 9);
        }
        # Calculate sum
        $sum = 0;
        $pos = 0;
        $reversedCCnumber = strrev($ccnumber);
        while ($pos < $length - 1) {
            $odd = $reversedCCnumber[$pos] * 2;
            if ($odd > 9) {
                $odd -= 9;
            }
            $sum += $odd;
            if ($pos != ($length - 2)) {

                $sum += $reversedCCnumber[$pos + 1];
            }
            $pos += 2;
        }
        $checkdigit = ((floor($sum / 10) + 1) * 10 - $sum) % 10;
        $ccnumber .= $checkdigit;
//        $rel->number = $ccnumber;
//        $rel->cvv = rand(100, 999);
//        $rel->validity = date('Y n d', strtotime("+2 years"));
        $card = new Card;
        $card->card_number = $ccnumber;
        $card->client_id = $client['id'];
        $card->save();
        return $user;
    }
}
