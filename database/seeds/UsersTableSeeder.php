<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'phone' => '79999999999',
            'email' => 'admin@example.com',
            'password' => bcrypt('123456'),
            'role_id' => User::ADMIN_ROLE,
        ]);
        DB::table('users')->insert([
            'phone' => '79999999991',
            'email' => 'client@example.com',
            'password' => bcrypt('123456'),
            'role_id' => User::CLIENT_ROLE,
        ]);
        DB::table('clients')->insert([
            'last_name' => 'Иванов',
            'first_name' => 'Иван',
            'middle_name' => 'Иванович',
            'user_id' => '2',
        ]);
        DB::table('cards')->insert([
            'card_number' => (new \App\Card)->card_number(),
            'client_id' =>'1',
        ]);


    }
}