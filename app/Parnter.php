<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parnter extends Model
{
    //
    protected $fillable = ['phone_number', 'email', 'password'];
    protected $hidden = ['password'];
}
