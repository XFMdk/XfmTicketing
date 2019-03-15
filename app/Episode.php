<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    public function RadioShow()
    {
        return $this->belongsTo('App\RadioShow');
    }
}
