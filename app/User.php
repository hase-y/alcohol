<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function liquors() {
        return $this->hasMany('App\Models\Liquor');
    }
    
    public function izakayas() {
        return $this->hasMany('App\Models\Izakaya');
    }
    
    public function knobs() {
        return $this->hasMany('App\Models\Knob');
    }
 
    public function nices() {
        return $this->hasMany('App\Models\Nice');
    }
    
    public function nice_izakayas() {
        return $this->hasMany('App\Models\Nice_izakaya');
    }
    
    public function nice_knobs() {
        return $this->hasMany('App\Models\Nice_knob');
    }
    
    public function liquor_comments() {
        return $this->hasMany('App\Models\LiquorComment');
    }
    
    public function izakaya_comments() {
        return $this->hasMany('App\Models\IzakayaComment');
    }
    
    public function knob_comments() {
        return $this->hasMany('App\Models\KnobComment');
    }
}
