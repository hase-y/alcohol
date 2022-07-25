<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shihanknob extends Model
{
    protected $guarded = array('id');
    public static $rules = array(
        'zyanru' => 'required',
        'product' => 'required',
        'value' => 'required',
        'comment' => 'required',
        'matching-liquor' => 'required',
    );
}
