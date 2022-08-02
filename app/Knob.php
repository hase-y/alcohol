<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Knob extends Model
{
    protected $guarded = array('id');

    public static $rules = array(
        'zyanru' => 'required',
        'product' => 'required',
        'value' => 'required|numeric',
        'comment' => 'required',
        'matching_liquor' => 'required',
    );
    
    public function user() {
        return $this->belongsTo('App\Models\User');
    }
}
