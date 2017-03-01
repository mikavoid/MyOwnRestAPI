<?php

use App\Vehicle;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class VehiclesTableSeeder extends Seeder
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
            Vehicle::create([
                'color' => $faker->hexColor,
                'power' => $faker->randomFloat(),
                'capacity' => $faker->randomFloat(),
                'speed' => $faker->randomFloat(),
            ]);
        }
    }
}
