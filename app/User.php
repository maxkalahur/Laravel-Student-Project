<?php

namespace App;
//use Illuminate\Support\Facades\Auth;
//use DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

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

//    public static function isAdmin(){
//        $user = DB::table('users')
//            ->where('id', '=', Auth::user()->id)
//            ->where('is_admin', '=', 1)
//            ->first();
//        return $user;
//    }
}
