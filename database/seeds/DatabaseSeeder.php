<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(VehiclesTableSeeder::class);
        $this->call(MakersTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(OauthClientsTableSeeder::class);
    }
}
