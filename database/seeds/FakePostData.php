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
        $numberRecord = 500;
        factory(Post::class, $numberRecord)->create();
    }
}
