<?php

use Illuminate\Database\Seeder;
use App\User;

class FakeUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $numberRecord = 20;
        factory(User::class, $numberRecord)->create();
    }
}
