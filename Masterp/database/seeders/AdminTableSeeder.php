<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'name' => 'Sami AL Njadat',
            'email' => 'sami.alnajadat@gmail.com',
            'image' => '/admin/assets/img/avatar/avatar-1.png',
            'phone' => '0777415591',
            'password' => bcrypt('password'),
        ]);
    }
}