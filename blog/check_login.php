<?php

use App\Models\User;
use Illuminate\Support\Facades\Hash;

echo "\n🔍 DIAGNOSTIC DE CONNEXION\n";
echo "==========================\n\n";

// Vérifier l'utilisateur auteur@test.com
$auteur = User::where('email', 'auteur@test.com')->first();

if ($auteur) {
    echo "✅ Utilisateur trouvé :\n";
    echo "   - ID: {$auteur->id}\n";
    echo "   - Name: {$auteur->name}\n";
    echo "   - Email: {$auteur->email}\n";
    echo "   - is_admin: " . ($auteur->is_admin ? '1 (true)' : '0 (false)') . "\n\n";

    // Tester le mot de passe
    $testPassword = 'password';
    if (Hash::check($testPassword, $auteur->password)) {
        echo "✅ Le mot de passe 'password' est CORRECT\n\n";
    } else {
        echo "❌ Le mot de passe 'password' est INCORRECT\n";
        echo "   Réinitialisation du mot de passe...\n";
        $auteur->password = bcrypt('password');
        $auteur->save();
        echo "✅ Mot de passe réinitialisé à 'password'\n\n";
    }
} else {
    echo "❌ Utilisateur auteur@test.com NON TROUVÉ\n\n";
}

// Vérifier l'utilisateur admin@test.com
$admin = User::where('email', 'admin@test.com')->first();

if ($admin) {
    echo "✅ Admin trouvé :\n";
    echo "   - ID: {$admin->id}\n";
    echo "   - Name: {$admin->name}\n";
    echo "   - Email: {$admin->email}\n";
    echo "   - is_admin: " . ($admin->is_admin ? '1 (true)' : '0 (false)') . "\n\n";

    // Tester le mot de passe
    if (Hash::check('password', $admin->password)) {
        echo "✅ Le mot de passe 'password' est CORRECT\n\n";
    } else {
        echo "❌ Le mot de passe 'password' est INCORRECT\n";
        echo "   Réinitialisation du mot de passe...\n";
        $admin->password = bcrypt('password');
        $admin->save();
        echo "✅ Mot de passe réinitialisé à 'password'\n\n";
    }
}

echo "📝 RÉSUMÉ DES IDENTIFIANTS :\n";
echo "============================\n";
echo "Email    : auteur@test.com\n";
echo "Password : password\n";
echo "URL      : http://127.0.0.1:8000/login\n\n";
