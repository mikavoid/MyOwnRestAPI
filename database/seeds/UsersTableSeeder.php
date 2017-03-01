<?php

use App\User;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i = 0; $i < 10; $i++) {
            User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => bcrypt('toto'),
                'api_token' => str_random(60)
            ]);
        }
        User::create([
            'name' => 'mickael',
            'email' => 'mikou30@msn.com',
            'password' => bcrypt('toto'),
            'api_token' => str_random(60)
        ]);
    }
}
