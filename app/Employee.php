<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['user_id', 'shop_id', 'last_name', 'first_name', 'middle_name'];
    protected $hidden = [];

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

}