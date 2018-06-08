<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{

    public function user(){return $this->hasOne(User::class);}

    public function card(){return $this->hasOne(Card::class);}

    protected $fillable = ['last_name', 'first_name', 'middle_name', 'user_id',];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['remember_token'];
//    /**
//     * Get the identifier that will be stored in the subject claim of the JWT.
//     *
//     * @return mixed
//     */
//    public function getJWTIdentifier()
//    {
//        return $this->getKey();
//    }
//    /**
//     * Return a key value array, containing any custom claims to be added to the JWT.
//     *
//     * @return array
//     */
//    public function getJWTCustomClaims()
//    {
//        return [];
//    }
}

