<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostInterest extends Model
{
    protected $table = 'post_interest';

    protected $guarded = [];

    public static $NUMBER_RECORD_FAKE = 100;

}
