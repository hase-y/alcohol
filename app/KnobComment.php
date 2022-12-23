<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KnobComment extends Model
{
    public static $rules = array(
        'comment' => 'max:255',
    );
    
    public function user() {
        return $this->belongsTo('App\User');
    }
 
    public function knob() {
        return $this->belongsTo('App\Knob');
    }
}
