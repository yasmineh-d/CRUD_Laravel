<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class TestUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Auteur 1
        $auteur1 = User::updateOrCreate(
            ['email' => 'auteur@test.com'],
            [
                'name' => 'Auteur Test',
                'password' => bcrypt('password'),
                'is_admin' => false,
            ]
        );

        // Auteur 2 (pour tester le scénario 3)
        $auteur2 = User::updateOrCreate(
            ['email' => 'auteur2@test.com'],
            [
                'name' => 'Auteur 2 Test',
                'password' => bcrypt('password'),
                'is_admin' => false,
            ]
        );

        // Admin
        $admin = User::updateOrCreate(
            ['email' => 'admin@test.com'],
            [
                'name' => 'Admin Test',
                'password' => bcrypt('password'),
                'is_admin' => true,
            ]
        );

        echo "\n✅ Utilisateurs de test créés/mis à jour :\n\n";
        echo "┌─────────────────────────────────────────────────────────┐\n";
        echo "│ AUTEUR 1                                                │\n";
        echo "├─────────────────────────────────────────────────────────┤\n";
        echo "│ Email    : auteur@test.com                             │\n";
        echo "│ Password : password                                     │\n";
        echo "│ is_admin : 0 (false)                                    │\n";
        echo "│ ID       : {$auteur1->id}                                                       │\n";
        echo "└─────────────────────────────────────────────────────────┘\n\n";

        echo "┌─────────────────────────────────────────────────────────┐\n";
        echo "│ AUTEUR 2                                                │\n";
        echo "├─────────────────────────────────────────────────────────┤\n";
        echo "│ Email    : auteur2@test.com                            │\n";
        echo "│ Password : password                                     │\n";
        echo "│ is_admin : 0 (false)                                    │\n";
        echo "│ ID       : {$auteur2->id}                                                       │\n";
        echo "└─────────────────────────────────────────────────────────┘\n\n";

        echo "┌─────────────────────────────────────────────────────────┐\n";
        echo "│ ADMIN                                                   │\n";
        echo "├─────────────────────────────────────────────────────────┤\n";
        echo "│ Email    : admin@test.com                              │\n";
        echo "│ Password : password                                     │\n";
        echo "│ is_admin : 1 (true)                                     │\n";
        echo "│ ID       : {$admin->id}                                                       │\n";
        echo "└─────────────────────────────────────────────────────────┘\n\n";

        echo "🔑 Vous pouvez maintenant vous connecter avec ces identifiants !\n\n";
    }
}
