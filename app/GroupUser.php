<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupUser extends Model
{
    protected $table = 'group_users';

    public static $GROUP = [
        'users' => 'User',
        'admin' => 'Admin'
    ];
}
