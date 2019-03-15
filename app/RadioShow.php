<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RadioShow extends Model
{
    protected $fillable = ['name', 'active', 'user_id', 'season'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function episodes()
    {
        return $this->hasMany('App\Episode');
    }
}
