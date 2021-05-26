<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->truncate();
        DB::table('categories')->insert([
        	[
        		'title' => 'books',
        		'slug' => 'web-books'
        	],
        	[
        		'title' => 'mobile',
        		'slug' => 'web-mobile'
        	],
        	[
        		'title' => 'desktop',
        		'slug' => 'web-desktop'
        	],
        	[
        		'title' => 'web',
        		'slug' => 'web-web'
        	],
        	[
        		'title' => 'TV',
        		'slug' => 'web-TV'
        	],
        ]);

    }
}
