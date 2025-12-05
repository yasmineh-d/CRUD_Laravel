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
        // Créer ou mettre à jour un utilisateur Auteur (is_admin = false)
        User::updateOrCreate(
            ['email' => 'auteur@test.com'],
            [
                'name' => 'Auteur Test',
                'password' => bcrypt('password'),
                'is_admin' => false,
            ]
        );

        // Créer ou mettre à jour un utilisateur Admin (is_admin = true)
        User::updateOrCreate(
            ['email' => 'admin@test.com'],
            [
                'name' => 'Admin Test',
                'password' => bcrypt('password'),
                'is_admin' => true,
            ]
        );

        echo "✅ Utilisateurs de test créés/mis à jour :\n";
        echo "   - Auteur : auteur@test.com / password (is_admin = 0)\n";
        echo "   - Admin  : admin@test.com / password (is_admin = 1)\n";
    }
}
