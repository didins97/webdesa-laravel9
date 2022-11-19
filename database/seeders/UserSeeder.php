<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['name' => 'admin_mallasoro', 'username' => 'admin', 'password' => bcrypt('password'), 'role' => 'admin'],
            ['name' => 'operator_mallasoro', 'username' => 'operator', 'password' => bcrypt('password'), 'role' => 'operator'],
        ]);
    }
}
