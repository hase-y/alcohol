<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Liquor extends Model
{
    protected $guarded = array('id');

    public static $rules = array(
        'zyanru' => 'required',
        'name' => 'required',
        'comment' => 'required',
        'value' => 'required',
    );
}
