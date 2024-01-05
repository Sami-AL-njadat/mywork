<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'alnjadat',
            'email' => 'saminjadat@yahoo.com', 
            'image' => '/admin/assets/img/avatar/avatar-2.png',
            'phone' => '0776603907',
            'password' => bcrypt('password'),
        ]);
    }
}