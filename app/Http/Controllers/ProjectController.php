<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Stat;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function store(Request $request)
    {
        // TÂCHE : cette instruction échoue actuellement. Corrigez le problème sous-jacent.
        Project::create([
            'name' => $request->name
        ]);

        return redirect('/')->with('success', 'Project created');
    }

    public function mass_update(Request $request)
    {
        // TÂCHE : transformez cette requête SQL en Eloquent
        // update projects
        //   set name = $request->new_name
        //   where name = $request->old_name

        // Votre code ici

        return redirect('/')->with('success', 'Projects updated');
    }

    public function destroy($projectId)
    {
        Project::destroy($projectId);

        // TÂCHE : modifiez cette instruction Eloquent pour inclure les enregistrements soft-deleted
        $projects = Project::all();

        return view('projects.index', compact('projects'));
    }

    public function store_with_stats(Request $request)
    {
        // TÂCHE : lors de la création d'un nouveau projet, créez un Observer pour exécuter le SQL suivant :
        //   update stats set projects_count = projects_count + 1
        $project = new Project();
        $project->name = $request->name;
        $project->save();

        return redirect('/')->with('success', 'Project created');
    }

}
