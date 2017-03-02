<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;


class OauthClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i = 1; $i <= 10; $i++) {
            DB::table('oauth_clients')->insert([
                'id' => 'id' . $i,
                'secret' => 'secret' . $i,
                'name' => 'client' . $i
            ]);
        }
    }
}
