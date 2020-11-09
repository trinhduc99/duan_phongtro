<?php

use Illuminate\Database\Seeder;
use App\Post;

class FakePostData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $numberRecord = Post::$NUMBER_RECORD_FAKE;
        factory(Post::class, $numberRecord)->create();
    }
}
