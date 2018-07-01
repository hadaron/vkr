<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Client extends Model
{

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function cashback_history()
    {
        return $this->hasMany(Cashback_history::class);
    }

    protected $fillable = ['last_name', 'first_name', 'user_id', 'card_number'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     * @return int|string
     */

    public function card_number()
    {
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
        return $ccnumber;
    }
}
//    /**
//     * Get the identifier that will be stored in the subject claim of the JWT.
//     *
//     * @return mixed
//     */
//    public function getJWTIdentifier()
//    {
//        return $this->getKey();
//    }
//    /**
//     * Return a key value array, containing any custom claims to be added to the JWT.
//     *
//     * @return array
//     */
//    public function getJWTCustomClaims()
//    {
//        return [];
//    }
