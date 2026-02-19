## Testez vos compétences Laravel — Eloquent : CRUD, scopes, observers

Ce dépôt est un exercice pratique : réalisez les tâches listées ci-dessous
et faites passer les tests PHPUnit, qui échouent volontairement pour le moment.

Pour vérifier votre progression, les tests se trouvent dans `tests/Feature/EloquentTest.php`.

Au départ, si vous exécutez `php artisan test`, tous les tests échouent.
Votre objectif est de les faire passer un par un.

> ⚠️ **Vous n'avez pas le droit de modifier les fichiers de tests.**


## Installation du projet

```sh
git clone <url-du-depot> projet
cd projet
cp .env.example .env  # Éditez vos variables d'environnement
composer install
php artisan key:generate
```

Puis lancez `php artisan test` pour voir les erreurs à corriger.


## Soumettre votre solution

Créez une Pull Request (ou Merge Request) vers la branche `main`.

---

## Tâche 1. Model avec un nom de table personnalisé

Dans le fichier `app/Models/Morningnews.php`, modifiez le model pour qu'il utilise
la table `morning_news` (telle que définie dans la migration), et non la table
par défaut que Laravel déduit du nom de la classe.

Méthode de test : `test_create_model_incorrect_table()`.

---

## Tâche 2. Récupérer une liste filtrée et ordonnée

Dans la méthode `index()` du fichier `app/Http/Controllers/UserController.php`,
écrivez la requête Eloquent équivalente à ce SQL :

```sql
select * from users where email_verified_at is not null order by created_at desc limit 3
```

Méthode de test : `test_get_filtered_list()`.

---

## Tâche 3. Récupérer un enregistrement ou afficher une erreur 404

Dans la méthode `show($userId)` du fichier `app/Http/Controllers/UserController.php`,
trouvez l'utilisateur dont l'`id` correspond à `$userId`.
Si l'utilisateur n'existe pas, affichez la page 404 par défaut de Laravel.

Méthode de test : `test_find_user_or_show_404_page()`.

---

## Tâche 4. Trouver ou créer un enregistrement (firstOrCreate)

Dans la méthode `check_create($name, $email)` du fichier `app/Http/Controllers/UserController.php`,
trouvez un utilisateur par `$name` et `$email`.
S'il n'existe pas, créez-le avec ces informations et un mot de passe aléatoire.

Méthode de test : `test_check_or_create_user()`.

---

## Tâche 5. Création d'un enregistrement (mass assignment)

Dans la méthode `store()` du fichier `app/Http/Controllers/ProjectController.php`,
la création du projet échoue. Trouvez et corrigez le problème sous-jacent dans le model.

Méthode de test : `test_create_project()`.

---

## Tâche 6. Mise à jour en masse (mass update)

Dans la méthode `mass_update()` du fichier `app/Http/Controllers/ProjectController.php`,
écrivez la requête Eloquent équivalente à ce SQL :

```sql
update projects set name = $request->new_name where name = $request->old_name
```

Méthode de test : `test_mass_update_projects()`.

---

## Tâche 7. Mettre à jour ou créer un enregistrement (updateOrCreate)

Dans la méthode `check_update($name, $email)` du fichier `app/Http/Controllers/UserController.php`,
trouvez un utilisateur par `$name` et mettez à jour son email avec `$email`.
S'il n'existe pas, créez-le avec `$name`, `$email` et un mot de passe aléatoire.

Méthode de test : `test_check_or_update_user()`.

---

## Tâche 8. Suppression en masse (mass delete)

Dans la méthode `destroy()` du fichier `app/Http/Controllers/UserController.php`,
supprimez tous les utilisateurs dont les IDs sont présents dans `$request->users`
(tableau d'IDs, ex. `[1, 2, 3]`).

Méthode de test : `test_mass_delete_users()`.

---

## Tâche 9. Suppression logique (soft delete)

Dans la méthode `destroy($projectId)` du fichier `app/Http/Controllers/ProjectController.php`,
modifiez la requête Eloquent pour que la liste des projets inclue également
les enregistrements supprimés via soft delete.

Méthode de test : `test_soft_delete_projects()`.

---

## Tâche 10. Scope de filtrage (Eloquent scope)

Dans la méthode `only_active()` du fichier `app/Http/Controllers/UserController.php`,
le scope `active()` est appelé mais n'existe pas encore.
Créez ce scope dans le model `User` pour filtrer les utilisateurs
dont le champ `email_verified_at` n'est pas null.

Méthode de test : `test_active_users()`.

---

## Tâche 11. Observer Eloquent

Dans la méthode `store_with_stats()` du fichier `app/Http/Controllers/ProjectController.php`,
créez un Observer pour le model `Project`. Lors de la création d'un nouveau projet,
l'observer doit incrémenter le champ `projects_count` dans la table `stats` :

```sql
update stats set projects_count = projects_count + 1
```

N'oubliez pas d'enregistrer l'observer dans un service provider.

Méthode de test : `test_insert_observer()`.

---

## Questions / Problèmes ?

Si vous rencontrez des difficultés ou avez des suggestions, créez une Issue.

Bon courage !
