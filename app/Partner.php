<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{

    protected $fillable = ['name', 'full_name', 'inn', 'kpp', 'ogrn', 'rc', 'bank_name', 'bik', 'ks',];
    protected $hidden = ['password'];

    public function user()
    {
        return $this->hasOne('App/User');
    }

}
