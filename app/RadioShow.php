<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RadioShow extends Model
{
    protected $fillable = [];

    public function Episodes()
    {
        return $this->hasMany('App\Episode');
    }
}
