<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Izakaya extends Model
{
    protected $guarded = array('id');

    public static $rules = array(
        'use' => 'required',
        'atmosphere' => 'required',
        'zyanru' => 'required',
        'store' => 'required|max:30',
        'recommendation' => 'required|max:30',
        'comment' => 'required|max:255',
    );
    
    public function user() {
        return $this->belongsTo('App\Models\User');
    }
    
    public function nice_izakayas() {
        return $this->hasMany('App\Nice_izakaya');
    }
}
