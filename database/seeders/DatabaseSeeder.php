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

        User::truncate();
        // User::factory(10)->create();
        User::create([
        'name' => 'Administrador',
        'email' => 'admin1@teste.com',
        'password' => Hash::make('12345678'),
        'tipo' => 'admin',
        'role' => 'admin',
        'gestao_produtos' => 0,
        'gestao_categorias' => 0,
        'gestao_marcas' => 0,
        ]);

        User::create([
            'name' => 'Usuário Comum',
            'email' => 'comum@teste.com',
            'password' => Hash::make('12345678'),
            'tipo' => 'comum',
            'role' => 'comum',
            'gestao_produtos' => 1,
            'gestao_categorias' => 0,
            'gestao_marcas' => 0,
        ]);

        User::create([
            'name' => 'Usuário Comum 2',
            'email' => 'comum2@teste.com',
            'password' => Hash::make('12345678'),
            'tipo' => 'comum',
            'role' => 'comum',
            'gestao_produtos' => 0,
            'gestao_categorias' => 1,
            'gestao_marcas' => 1,
        ]);
    }
    
}
