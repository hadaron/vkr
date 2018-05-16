<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        DB::table('users')->insert([
//            'name' => 'admin',
//            'email' => 'admin@example.com',
//            'password' => bcrypt('123456'),
//            'type' => 'admin',
//        ]);

        DB::table('users')->insert([
            'name' => 'user',
            'email' => 'user@example.com',
            'password' => bcrypt('123456'),
        ]);

    }
}