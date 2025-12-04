# 🛡️ Security & Authorization Plan (V6)

## 🔐 1. Zones principales du blog

| 🌍 Zone / Page                     | 🔗 URL                           | 🚦 Type d’accès           |
|-----------------------------------|----------------------------------|----------------------------|
| 🏠 Accueil du blog                 | /                                | 🟢 Public                  |
| 📚 Liste des articles              | /articles                        | 🟢 Public                  |
| 📝 Page d’un article               | /articles/{slug}                 | 🟢 Public                  |
| 🛠️ Dashboard d’administration      | /admin                           | 🔒 Protégé (connecté)     |
| ✍️ Création d’article              | /admin/articles/create           | 🔐 Auteur uniquement       |
| ✏️ Modification d’article          | /admin/articles/{id}/edit        | 🔐 Auteur / Admin          |
| 🗑️ Suppression d’article           | /admin/articles/{id}/delete      | 🔐 Auteur / Admin          |

---

## 👥 2. Rôles du blog

| 🎭 Rôle      | 📝 Description |
|--------------|----------------|
| 👀 Visiteur  | Personne non connectée qui peut consulter les pages publiques. |
| ✍️ Auteur    | Utilisateur connecté capable de créer, modifier et supprimer ses propres articles. |
| 🛡️ Admin     | Utilisateur connecté responsable de la gestion globale du blog. |

---

## ✔️ 3. Qui a le droit de faire quoi ?

| ⚙️ Action / Rôle                       | 👀 Visiteur | ✍️ Auteur | 🛡️ Admin |
|---------------------------------------|------------|-----------|-----------|
| 📖 Lire les articles publics          | ✔️         | ✔️        | ✔️        |
| 🔑 Accéder à /admin                   | ❌         | ✔️        | ✔️        |
| ✍️ Créer un article                   | ❌         | ✔️        | ❌        |
| ✏️ Modifier ses propres articles      | ❌         | ✔️        | ✔️        |
| 🗑️ Supprimer ses propres articles     | ❌         | ✔️        | ✔️        |
| 🔥 Supprimer n’importe quel article   | ❌         | ❌        | ✔️        |

---

## 🧩 4. Comment Laravel va gérer ça ?

- 🔐 **Authentification (Qui es‑tu ?)**  
  → Gérée par *Laravel UI* : login, logout, profil connecté.

- 🚧 **Protection des routes /admin**  
  → via le *middleware `auth`*.

- 🏷️ **Différence Auteur / Admin**  
  → champ `is_admin` dans la base de données, accessible via `Auth::user()->is_admin`.

- 🛂 **Autorisation fine** (modifier, supprimer…)  
  → gérée par les **Gates** et **Policies** Laravel.

---

## 📝 5. Synthèse

- ✔️ Authentification = “Qui es‑tu ?”
- ✔️ Autorisation = “Qu’as‑tu le droit de faire ?”
- ✔️ Trois rôles clés : Visiteur, Auteur, Admin
- ✔️ Tableau rôle × action = base des règles V6
- ✔️ Laravel appliquera ça avec : Laravel UI, middleware auth, Gates, Policies

---

_Fichier généré automatiquement — Tutoriel 3.2.1 (Sécurité & Admin — Projet Fil Rouge Laravel)_
