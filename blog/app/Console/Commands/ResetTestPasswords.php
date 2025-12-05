<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class ResetTestPasswords extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:reset-passwords';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reset passwords for test users and verify login credentials';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('🔍 Diagnostic et réinitialisation des mots de passe...');
        $this->newLine();

        $users = [
            ['email' => 'auteur@test.com', 'name' => 'Auteur Test', 'is_admin' => false],
            ['email' => 'auteur2@test.com', 'name' => 'Auteur 2 Test', 'is_admin' => false],
            ['email' => 'admin@test.com', 'name' => 'Admin Test', 'is_admin' => true],
        ];

        foreach ($users as $userData) {
            $user = User::where('email', $userData['email'])->first();

            if ($user) {
                // Vérifier le mot de passe actuel
                $passwordCorrect = Hash::check('password', $user->password);

                if ($passwordCorrect) {
                    $this->line("✅ {$userData['email']} - Mot de passe déjà correct");
                } else {
                    // Réinitialiser le mot de passe
                    $user->password = bcrypt('password');
                    $user->save();
                    $this->warn("🔄 {$userData['email']} - Mot de passe réinitialisé");
                }

                // Afficher les infos
                $this->line("   ID: {$user->id} | is_admin: " . ($user->is_admin ? '1' : '0'));
            } else {
                $this->error("❌ {$userData['email']} - Utilisateur non trouvé");
                $this->line("   Création de l'utilisateur...");

                User::create([
                    'name' => $userData['name'],
                    'email' => $userData['email'],
                    'password' => bcrypt('password'),
                    'is_admin' => $userData['is_admin'],
                ]);

                $this->info("✅ {$userData['email']} - Utilisateur créé");
            }
        }

        $this->newLine();
        $this->info('✅ Terminé !');
        $this->newLine();
        $this->line('📝 Identifiants de connexion :');
        $this->line('   Email    : auteur@test.com');
        $this->line('   Password : password');
        $this->line('   URL      : http://127.0.0.1:8000/login');
        $this->newLine();

        return Command::SUCCESS;
    }
}
