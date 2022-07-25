<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tezukuriknob extends Model
{
    protected $guarded = array('id');
    public static $rules = array(
        'zyanru' => 'required',
        'cooking' => 'required',
        'recipe' => 'required',
        'comment' => 'required',
        'matching-liquor' => 'required',
    );
}
