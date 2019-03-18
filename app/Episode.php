<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    protected $fillable = ['name', 'episode_number', 'radio_show_id', 'description'];

    public function RadioShow()
    {
        return $this->belongsTo('App\RadioShow');
    }
}
