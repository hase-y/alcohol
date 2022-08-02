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
        'store' => 'required',
        'recommendation' => 'required',
        'comment' => 'required',
    );
    
    public function user() {
        return $this->belongsTo('App\Models\User');
    }
}
