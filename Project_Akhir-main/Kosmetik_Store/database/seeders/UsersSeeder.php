<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userData = [
            [
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'role' => '1',
                'password' => bcrypt('admin'),
            ],
            [
                'name' => 'Regular User',
                'email' => 'user@mail.com',
                'role' => '0',
                'password' => bcrypt('user'),
            ],
        ];

        foreach ($userData as $key => $val) {
            User::create($val);
        }
    }
}