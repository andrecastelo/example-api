<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Let's clear the users table first
        User::truncate();

        // Initialize the Faker package. We can use several different locales for it, so
        // let's use the german locale to play with it.
        $faker = \Faker\Factory::create('de_DE');

        // Let's make sure everyone has the same password and let's hash it before the loop,
        // or else our seeder will be too slow.
        $password = Hash::make('toptal');

        // And now let's generate a few dozen users for our app:
        for ($i = 0; $i < 48; $i++) {
            User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => $password,
            ]);
        }
    }
}
