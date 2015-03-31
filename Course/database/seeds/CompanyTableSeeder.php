<?php
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

/**
 * Created by PhpStorm.
 * User: Desarrollo Dell
 * Date: 20/03/2015
 * Time: 05:40 PM
 */
class CompanyTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        for($i = 0; $i < 30; $i++){
            \DB::table("companies")->insert([
                'company_name' => $faker->company
            ]);
        }
    }
}