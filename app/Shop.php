<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $fillable = ['partner_id', 'address','name'];
    protected $hidden = [];

    public function shop()
    {
        return $this->hasOne(Partner::class);
    }
}