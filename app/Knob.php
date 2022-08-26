<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Knob extends Model
{
    protected $guarded = array('id');

    public static $rules = array(
        'zyanru' => 'required',
        'product' => 'required|max:64',
        'value' => 'required|numeric|max:1000000',
        'comment' => 'required|max:255',
        'matching_liquor' => 'required|max:64',
    );
    
    public function user() {
        return $this->belongsTo('App\Models\User');
    }
}
