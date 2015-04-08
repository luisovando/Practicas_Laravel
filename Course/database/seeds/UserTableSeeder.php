<?php
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
/**
 * Created by PhpStorm.
 * User: Desarrollo Dell
 * Date: 20/03/2015
 * Time: 05:40 PM
 */

class UserTableSeeder extends Seeder{
    public function run(){
        $faker = Faker::create();
        $gender_list = ['male', 'female'];
        for($i = 0; $i < 30; $i++){
            $id = \DB::table("users")->insertGetId(array(
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'email' => $faker->unique()->email,
                'password' => \Hash::make("123456"),
                'type' => 'users',
                'gender' => $gender_list[rand(0,1)],
                'active' => rand(0,1),
            ));

            \DB::table("user_profiles")->insert(array(
                'user_id' => $id,
                'bio' => $faker->paragraph(rand(2,5)),
                'birthdate' => $faker->dateTimeThisCentury->format('Y-m-d'),
                'website' => "http://www.". $faker->domainName,
                'twitter' => 'http://www.twitter.com/'.$faker->userName
            ));
        }
    }
}