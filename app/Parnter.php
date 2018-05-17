<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parnter extends Model
{
    //
    protected $fillable = ['phone', 'email', 'password'];
    protected $hidden = ['password'];
}
