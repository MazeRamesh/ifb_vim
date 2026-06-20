<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Hash;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
 //    protected $table = 'users';
 // protected $primaryKey = 'id';
    protected $fillable = [
        'name', 'email', 'password','role_id','user_plant','empcode','empname'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function setPasswordAttribute($input)
    {
        if ($input)
            $this->attributes['password'] = app('hash')->needsRehash($input) ? Hash::make($input) : $input;
    }
    public function MappedUsers()
    {
       return $this->belongsTo('App\Role','role_id','id');
    }
    // public function user_plant()
    // {
    //   return $this->belongsToMany('App\Models\company','plantname','userplant');
    // }
}
