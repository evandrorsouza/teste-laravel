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
        // User::factory(10)->create();
        User::create([
        'name' => 'Administrador',
        'email' => 'admin1@teste.com',
        'password' => Hash::make('12345678'),
        'tipo' => 'admin',
        ]);

        User::create([
            'name' => 'Usuário Comum',
            'email' => 'comum@teste.com',
            'password' => Hash::make('12345678'),
            'tipo' => 'comum',
        ]);
    }
    
}
