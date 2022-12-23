<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LiquorComment extends Model
{
    public static $rules = array(
        'comment' => 'max:255',
    );
    
    public function user() {
        return $this->belongsTo('App\User');
    }
 
    public function liquor() {
        return $this->belongsTo('App\Liquor');
    }
}
