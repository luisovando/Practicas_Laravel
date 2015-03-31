<?php
use Illuminate\Database\Seeder;

/**
 * Created by PhpStorm.
 * User: Desarrollo Dell
 * Date: 20/03/2015
 * Time: 05:40 PM
 */
class AdminTableSeeder extends Seeder
{
    public function run()
    {
        \DB::table("users")->insert([
            [
                'first_name' => 'Luis',
                "last_name" => 'Ovando',
                'email' => 'luis.ovando@gmail.com',
                'password' => \Hash::make("secret"),
                'type' => 'admin',
                'gender' => 'male'
            ], [
                'first_name' => 'Diana',
                "last_name" => 'Prado',
                'email' => 'diana.prado@gmail.com',
                'password' => \Hash::make("secret"),
                'type' => 'admin',
                'gender' => 'female'
            ]
        ]);
    }
}