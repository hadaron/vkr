<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cashback_history extends Model
{
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }
    protected $fillable = ['shop_id', 'percent_id', 'client_id', 'sum', 'cashback'];
}
