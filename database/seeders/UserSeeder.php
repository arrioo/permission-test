<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
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
        $data=[
            'name' => 'SuperAdmin',
            'email' => 'superadmin@gmail.com',
            'password' => Hash::make('12345678'),
        ];

        $user = User::create($data);
        $user->assignRole('superadmin');


        $data=[
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678'),
        ];

        $user = User::create($data);
        $user->assignRole('admin');


        $data=[
            'name' => 'Arrio',
            'email' => 'arrio@gmail.com',
            'password' => Hash::make('12345678'),
        ];

        $user = User::create($data);
        $user->assignRole('user');
    }
}
