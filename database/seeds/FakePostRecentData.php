<?php

use Illuminate\Database\Seeder;
use App\PostRecent;

class FakePostRecentData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(PostRecent::class, PostRecent::$NUMBER_RECORD_FAKE)->create();
    }
}
