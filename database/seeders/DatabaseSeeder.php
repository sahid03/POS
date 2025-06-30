<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'role' => 'Admin',
            'username' => 'admin',
            'password' => Hash::make('admin123')
        ]);
        User::create([
            'name' => 'Kasir',
            'role' => 'Cashier',
            'username' => 'kasir',
            'password' => Hash::make('kasir123')
        ]);
        User::create([
            'name' => 'Sahid',
            'role' => 'Admin',
            'username' => 'sahid',
            'password' => Hash::make('sahid123')
        ]);
    }
}
