<?php

namespace Database\Seeders;

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
        $param = [
            'name' => 'TestUser',
            'email' => 'testuser@test',
            'password' => 'testuser'
        ];
        User::create($param);
    }
}
