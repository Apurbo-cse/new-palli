<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Mr. admin',
            'email' => 'apurboka@gmail.com',
            'phone' => '01408137111',
            'password' => Hash::make('12345'),
            'user_type' => 'admin',
        ]);

        User::create([
            'name' => 'Mr. user',
            'email' => 'user@gmail.com',
            'phone' => '01732955937',
            'password' => Hash::make('12345'),
            'user_type' => '',
        ]);
    }
}
