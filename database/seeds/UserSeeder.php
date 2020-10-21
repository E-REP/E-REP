<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Vote;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 5)->create()->each(function ($user) {
            $user->votes()->save(factory(Vote::class)->make());
        });
    }
}
