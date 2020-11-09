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
        $numberRecord = PostInterest::$NUMBER_RECORD_FAKE;
        factory(PostInterest::class, $numberRecord)->create();
    }
}
