<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
    public function card_number(){
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
    protected $fillable = ['client_id', 'card_number'];
}