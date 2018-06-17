<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cashback_history extends Model
{
    public function client()
    {
        $this->belongsTo(Client::class);
    }

    protected $fillable = ['shop_id', 'percent_id', 'client_id', 'sum', 'cashback'];
}
