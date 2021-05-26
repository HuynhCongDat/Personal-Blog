<?php

use Illuminate\Database\Seeder;
use Faker\Factory;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //reset the users table
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('users')->truncate();

        $faker = Factory::create();

        //generate 3 users/author
        DB::table('users')->insert([
        	[
        		'name'     => "CongDat",
                'slug'     => "Cong-Dat",
        		'email'    => "huynhcongdat1999@gmail.com",
        		'password' => bcrypt('secret'),
                'bio'      => $faker->text(rand(250,300))
        	],
        	[
        		'name'     => "ThaiAn",
                'slug'     => "Thai-An",
        		'email'    => "hothaian@gmail.com",
        		'password' => bcrypt('secret'),
                'bio'      => $faker->text(rand(25,250))
        	],
        	[
        		'name'     => "DatAn",
                'slug'     => "Dat-An",
        		'email'    => "DatAn@gmail.com",
        		'password' => bcrypt('secret'),
                'bio'      => $faker->text(rand(25,250))
        	],
        ]);
    }
}
