<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable // implements JWTSubject
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    const ADMIN_TYPE = 'admin';
    const DEFAULT_TYPE = 'default';

    public function client()
    {
        return $this->belongsTo(Client::class);

    }

    public function partner()
    {
        return $this->belongsTo(Partner::class);

    }

    public function isAdmin()
    {
        return $this->type === self::ADMIN_TYPE;
    }

    protected $fillable = [
        'phone', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
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
