<?php

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
        $admin = [
            'name' => 'Hà Văn Quang',
            'email' => 'quanghavan96@gmail.com',
            'phone' => '01638161533',
            'level' => 1, 
            'password' => bcrypt('123456'),
            'remember_token' => str_random(10),
            'address_id' => 37, 
        ];
        DB::table('users')->insert($admin);
    }
}
