<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupUser extends Model
{
    public static $GROUP = [
        'user' => 'User',
        'admin' => 'Admin'
    ];
}
