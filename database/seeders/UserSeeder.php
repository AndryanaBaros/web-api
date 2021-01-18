<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        User::create([
            'name' => 'Benazio Putra',
            'level' => 'admin',
            'email' => 'benazio@gmail.com',
            'phone_number' => '0812345678',
            'department' => 'IOC',
            'password' => bcrypt('12345'),
            'remember_token' => Str::random(60),
        ]);
    }
}
