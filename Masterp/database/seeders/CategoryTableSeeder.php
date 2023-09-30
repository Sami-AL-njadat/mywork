<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'categoryName' => 'Seeds',
            'description' => 'This service is designed for individuals and organizations who want to contribute financially to support our green area planting initiatives. ',
            'image' => 'http://127.0.0.1:8000/image/mas/img/cdc-wz3ijPHvL54-unsplash.jpg',
        ]);
        DB::table('categories')->insert([
            'categoryName' => 'Seedlings and Trees',
            'description' => 'In this service you can choose to donate one or more of many items including trees, fertilizer, and equipment.',
            'image' => 'http://127.0.0.1:8000/image/mas/img/pexels-kaboompics-com-5808.jpg',
        ]);
        DB::table('categories')->insert([
            'categoryName' => 'Soils',
            'description' => 'This service is designed for who want to contribute their skills, time, and services to support our green area planting initiatives. ',
            'image' => 'http://127.0.0.1:8000/image/mas/img/seeds1.jpg',
        ]);
        DB::table('categories')->insert([
            'categoryName' => 'Fertilizer',
            'description' => 'This service is designed for who want to contribute their skills, time, and services to support our green area planting initiatives. ',
            'image' => 'http://127.0.0.1:8000/image/mas/img/pexels-annija-u-16047143.jpg',
        ]);
    }
}
