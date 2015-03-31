<?php
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
/**
 * Created by PhpStorm.
 * User: Desarrollo Dell
 * Date: 20/03/2015
 * Time: 05:40 PM
 */

class ClientTableSeeder extends Seeder{
    public function run(){
        $faker = Faker::create();
        for($i = 0; $i < 30; $i++){
            \DB::table("clients")->insert(array(
                'client_firstname' => $faker->firstName,
                'client_lastname' => $faker->lastName,
                'user_id' => rand(1,32),
                'company_id' => rand(1,30)
            ));
        }
    }
}