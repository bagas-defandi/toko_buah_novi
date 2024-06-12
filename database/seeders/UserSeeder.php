<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'no_telp' => '081234567890',
            'alamat' => 'Jalan Indonesia No.1',
            'email_verified_at' => now(),
            'password' => bcrypt('admin123'),
        ])->assignRole('admin');

        User::create([
            'name' => 'Bagas',
            'email' => 'bagasdefandi31@gmail.com',
            'no_telp' => '082180246367',
            'alamat' => 'Jalan Haji No.1',
            'email_verified_at' => now(),
            'password' => bcrypt('bagas123'),
        ])->assignRole('pembeli');
    }
}
