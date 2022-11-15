<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nice_izakaya extends Model
{
    public function user() {
        return $this->belongsTo('App\User');
    }
 
    public function izakaya() {
        return $this->belongsTo('App\Izakaya');
    }
}
