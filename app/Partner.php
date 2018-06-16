<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{

    protected $fillable = ['name', 'full_name', 'inn', 'kpp', 'ogrn', 'rc', 'bank_name', 'bik', 'ks'];
    protected $hidden = [];

    public function shop()
    {
        return $this->hasMany(Shop::class);
    }

    public function percent()
    {
        return $this->hasMany(Percent::class);
    }
}
