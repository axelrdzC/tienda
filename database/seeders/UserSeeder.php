<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'admin top',
            'name_completo' => 'admin top',
            'email' => 'admin@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password123'),
        ]);
        $admin->assignRole('super-admin');
        
        $empleadoTop = User::create([
            'name' => 'maluma bby',
            'name_completo' => 'maluma bebe',
            'email' => 'maluma@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password123'),
        ]);
        $empleadoTop->assignRole('admin');

        $empleado = User::create([
            'name' => 'julieta',
            'name_completo' => 'julieta venegas',
            'email' => 'julieta@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password123'),
        ]);
        $empleado->assignRole('empleado');
    }
}
