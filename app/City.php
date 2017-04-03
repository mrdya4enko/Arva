<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function country()
    {
        $this->belongsTo('App\Country');
    }
    public function user()
    {
        $this->hasMany('App\User');
    }
}
