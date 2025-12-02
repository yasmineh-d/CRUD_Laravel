# 🛡️ Security and Authorization Plan (V6)

## 🔐 1. Zones principales du blog

| 🌍 Zone / Page                 | 🔗 URL                      | 🚦 Type d’accès       |
| ------------------------------ | --------------------------- | --------------------- |
| 🏠 Accueil du blog             | /                           | 🟢 Public             |
| 📚 Liste des articles          | /articles                   | 🟢 Public             |
| 📝 Page d’un article           | /articles/{slug}            | 🟢 Public             |
| 🛠️ Dashboard d’administration | /admin                      | 🔒 Protégé (connecté) |
| ✍️ Création d’article          | /admin/articles/create      | 🔐 Auteur uniquement  |
| ✏️ Modification d’article      | /admin/articles/{id}/edit   | 🔐 Auteur / Admin     |
| 🗑️ Suppression d’article      | /admin/articles/{id}/delete | 🔐 Auteur / Admin     |



## 👥 2. Rôles du blog

| 🎭 Rôle         | 📝 Description                                                                         |
| --------------- | -------------------------------------------------------------------------------------- |
| 👀 **Visiteur** | Personne non connectée qui peut consulter les pages publiques.                         |
| ✍️ **Auteur**   | Utilisateur connecté capable de créer, modifier et supprimer **ses propres articles**. |
| 🛡️ **Admin**   | Gère tout le blog (articles, utilisateurs…).                                           |

---

## ✔️ 3. Qui a le droit de faire quoi ?

| ⚙️ Action / Rôle                    | 👀 Visiteur | ✍️ Auteur | 🛡️ Admin |
| ----------------------------------- | ----------- | --------- | --------- |
| 📖 Lire les articles publics        | ✔️          | ✔️        | ✔️        |
| 🔑 Accéder à /admin                 | ❌           | ✔️        | ✔️        |
| ✍️ Créer un article                 | ❌           | ✔️        | ❌         |
| ✏️ Modifier ses propres articles    | ❌           | ✔️        | ✔️        |
| 🗑️ Supprimer ses propres articles  | ❌           | ✔️        | ✔️        |
| 🔥 Supprimer n’importe quel article | ❌           | ❌         | ✔️        |


---

## 🧩 4. Comment Laravel va gérer ça ?

- **🔐Authentification (Qui es-tu ?)**  
  → via *Laravel UI* (login, logout, utilisateur connecté).

- **🚧 Protection des pages admin**  
  → Assurée par le *middleware `auth`* qui bloque les visiteurs non connectés.

- **🏷️ Différencier Auteur / Admin**  
  → Via un champ `is_admin` dans la base de données. Accessible avec `Auth::user()->is_admin`.

- **🛂 Autorisation fine (créer / modifier / supprimer)**  
  → Gérée avec les **Gates** et **Policies** pour contrôler précisément les actions selon le rôle.

---

## 5. Synthèse

✔️ Authentification = répondre à “Qui es‑tu ?”  
✔️ Autorisation = répondre à “Qu’as‑tu le droit de faire ?”  
✔️ Trois rôles clés : Visiteur, Auteur, Admin  
✔️ Le tableau rôle × actions sert de base à toutes les règles de sécurité  
✔️ Les tutoriels suivants implémentent : Laravel UI, middleware `auth`, Gates, Policy  

---
