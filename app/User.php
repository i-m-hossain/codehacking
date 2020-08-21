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
        'name', 'email', 'password', 'role_id','is_active', 'photo_id'
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
    public function role(){
        return $this->belongsTo('App\Role'); //inverse relationship
    }
    public function photo(){
        return $this->belongsTo('App\Photo'); //inverse relationship
    }

    public function isAdmin(){
        if( $this->role->name == "Administrator" && $this->is_active == 1){

            return true;

        }
        return false;
    }
    public function posts(){
        return $this->hasMany('App\Post');
    } //one to many relationship  ****This relationship tells that a user can have many posts that's why one to many relationship is applied



}
