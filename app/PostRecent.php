<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostRecent extends Model
{
    protected $table = 'post_recent';

    protected $guarded = [];

    public static $NUMBER_RECORD_FAKE = 100;
}
