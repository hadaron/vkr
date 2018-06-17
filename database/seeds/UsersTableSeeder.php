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
            'user_id' => '2',
            'card_number' => (new \App\Client())->card_number()
        ]);

        DB::table('partners')->insert([
            'name' => 'Админ',
            'full_name' => 'Админ',
        ]);
        DB::table('percents')->insert([
            'percent' => '0',
            'partner_id' => '1'
        ]);

        DB::table('shops')->insert([
            'name' => 'Админ',
            'address' => 'Админ',
            'partner_id' => '1',
        ]);

        DB::table('users')->insert([
            'phone' => '79856987458',
            'email' => 'employee@example.com',
            'password' => bcrypt('123456'),
            'role_id' => User::EMPLOYEE_ROLE,
        ]);
        DB::table('employees')->insert([
            'last_name' => 'Админ',
            'first_name' => 'Админ',
            'middle_name' => 'Админ',
            'shop_id' => '1',
            'user_id' => '3',
        ]);
        DB::table('cashback_histories')->insert([
            'client_id' => '1',
            'percent_id' => '1',
            'shop_id' => '1',
            'sum' => 0,
            'cashback' => 0,
            'created_at' => now(),
            'updated_at' => now(),
            ]);

    }
}