<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RadioShow extends Model
{
    protected $fillable = [];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function episodes()
    {
        return $this->hasMany('App\Episode');
    }
}
