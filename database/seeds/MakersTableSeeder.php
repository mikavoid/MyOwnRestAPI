<?php

use App\Maker;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class MakersTableSeeder extends Seeder
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
            Maker::create([
                'name' => $faker->word,
                'phone' => $faker->phoneNumber
            ]);
        }
    }
}
