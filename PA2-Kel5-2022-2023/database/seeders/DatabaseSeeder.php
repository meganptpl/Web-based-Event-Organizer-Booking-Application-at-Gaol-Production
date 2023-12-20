<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Role::create([
            'name' => 'admin',
            'guard_name' => 'web'
        ]);
        Role::create([
            'name' => 'kasir',
            'guard_name' => 'web'
        ]);
        Role::create([
            'name' => 'user',
            'guard_name' => 'web'
        ]);

        $admin =  User::create([
            'name' => 'Administrator',
            'email' => 'admin@gmail.com',
            'nohp' => '12345678901234',
            'password' => Hash::make('admin123')
        ]);

        $admin->assignRole('admin');

        $kasir = User::create([
            'name' => 'Kasir',
            'email' => 'kasir@gmail.com',
            'nohp' => '12341234',
            'password' => Hash::make('kasir123')
        ]);

        $kasir->assignRole('kasir');

        $user = User::create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'nohp' => '1234512345',
            'password' => Hash::make('user123')
        ]);

        $user->assignRole('user');
    }
}
