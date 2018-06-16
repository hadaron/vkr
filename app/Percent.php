<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Percent extends Model
{
    protected $fillable = ['partner_id', 'percent', 'name'];
    public function partner()
    {
        return $this->belongsTo(Partner::class);
    }
}
