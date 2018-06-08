<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $fillable = ['partner_id', 'address','name'];
    protected $hidden = [];

    public function partner()
    {
        return $this->belongsTo(Partner::class);
    }
    public function employee()
    {
        return $this->hasMany(Employee::class);
    }
}