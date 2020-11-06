<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

// https://doc.laravue.dev/vi/guide/development/work-with-permission.html#create-permissions
// https://viblo.asia/p/phan-quyen-don-gian-voi-package-laravel-permission-gGJ59oOjZX2#_3-ung-dung-2
class User extends Authenticatable
{
    use Notifiable, HasApiTokens, HasRoles;
    public static $GROUP_ID = [
        'admin' => 1, 'user' => 2
    ];


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'address', 'password', 'phone', 'url_avatar', 'group_id', 'gender'
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
