<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasAPITokens;


class User extends Authenticatable
{
    use Notifiable, HasApiTokens, HasRoles;
    public static $GROUP_ID = [
        'admin' => 1, 'user' => 2
    ];

    public static $NUMBER_RECORD_FAKE = 20;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';
    public const GENDER = [
        'male' => 'nam',
        'female' => 'nu',
        'diff' => 'khac'
    ];
    protected $fillable = [
        'name', 'email', 'password','amount','phone',
        'gender', 'avatar_path', 'avatar_name'
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
}
