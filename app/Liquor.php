<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Liquor extends Model
{
    protected $guarded = array('id');

    public static $rules = array(
        'zyanru' => 'required',
        'name' => 'required|max:64',
        'comment' => 'required|max:255',
        'value' => 'required|numeric|max:1000000',
    );
    
    public function user() {
        return $this->belongsTo('App\Models\User');
    }
 
    public function nices() {
        return $this->hasMany('App\Nice');
    }
}
