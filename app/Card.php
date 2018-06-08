<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
    protected $fillable = ['client_id', 'card_number'];
}