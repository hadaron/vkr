<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{

    protected $fillable = ['name', 'full_name', 'inn', 'kpp', 'ogrn', 'rc', 'bank_name', 'bik', 'ks','user_id',];
    protected $hidden = [];

    public function user()
    {
        return $this->hasOne(User::class);
    }

}
