<?php

use Illuminate\Database\Seeder;
use App\PostInterest;

class FakePostInterestData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(PostInterest::class, PostInterest::$NUMBER_RECORD_FAKE)->create();
    }
}
