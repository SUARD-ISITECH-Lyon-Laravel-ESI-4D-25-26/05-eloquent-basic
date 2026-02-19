<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // TÂCHE : transformez cette requête SQL en Eloquent
        // select * from users
        //   where email_verified_at is not null
        //   order by created_at desc
        //   limit 3

        $users = User::all(); // remplacez cette ligne par la requête Eloquent

        return view('users.index', compact('users'));
    }

    public function show($userId)
    {
        $user = NULL; // TÂCHE : trouvez l'utilisateur par $userId ou affichez la page "404 not found"

        return view('users.show', compact('user'));
    }

    public function check_create($name, $email)
    {
        // TÂCHE : trouvez un utilisateur par $name et $email
        //   s'il n'existe pas, créez-le avec $name, $email et un mot de passe aléatoire
        $user = NULL;

        return view('users.show', compact('user'));
    }

    public function check_update($name, $email)
    {
        // TÂCHE : trouvez un utilisateur par $name et mettez à jour son $email
        //   s'il n'existe pas, créez-le avec $name, $email et un mot de passe aléatoire
        $user = NULL; // utilisateur mis à jour ou créé

        return view('users.show', compact('user'));
    }

    public function destroy(Request $request)
    {
        // TÂCHE : supprimez plusieurs utilisateurs par leurs IDs
        // SQL : delete from users where id in ($request->users)
        // $request->users est un tableau d'IDs, ex. [1, 2, 3]

        // Votre code ici

        return redirect('/')->with('success', 'Users deleted');
    }

    public function only_active()
    {
        // TÂCHE : le scope "active()" n'existe pas encore.
        //   Créez ce scope pour filtrer "where email_verified_at is not null"
        $users = User::active()->get();

        return view('users.index', compact('users'));
    }

}
