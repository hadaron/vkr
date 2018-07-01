<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;


    // 1,2,3 - are ids of role in roles table
    const CLIENT_ROLE = 1;
    const EMPLOYEE_ROLE = 2;
    const ADMIN_ROLE = 3;

    public function client()
    {
        return $this->hasOne(Client::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);

    }

    public function isAdmin()
    {
        return $this->role_id === self::ADMIN_ROLE;
    }

    public function isClient()
    {
        return $this->role_id === self::CLIENT_ROLE;
    }

    public function isEmployee()
    {
        return $this->role_id === self::EMPLOYEE_ROLE;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'phone', 'email', 'password', 'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
