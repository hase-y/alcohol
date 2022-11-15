<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nice_knob extends Model
{
    public function user() {
        return $this->belongsTo('App\User');
    }
 
    public function knob() {
        return $this->belongsTo('App\Knob');
    }
}
