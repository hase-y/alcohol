<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Knob extends Model
{
    protected $guarded = array('id');

    public static $rules = array(
        'zyanru' => 'required',
        'product' => 'required',
        // 'comment_shihanhin' => 'required',
        // 'comment_tedukuri' => 'required',
        // 'value' => 'required',
        'matching-liquor' => 'required',
    );
}
