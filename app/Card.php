<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    public function client()
    {
        return $this->hasOne(Client::class);
    }

}
