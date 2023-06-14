<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        // si vede tutto
        // $projects = Project::all();

        // così se vuoi portare solo alcuni valori
        // $projects = Project::with('name', 'type')->paginate(5);
        // stessa cosa senza paginate
        // $projects = Project::with('name', 'type')->get();


        // si vedono le pagine con paginate
        $projects = Project::paginate(5);
        return response()->json([
            'success' => true,
            'results' => $projects
        ]);
    }

    // questo è per la show
    public function show($slug)
    {
        $project = Project::where('slug', $slug)->first();

        if ($project) {
            return response()->json([
                'success' => true,
                'results' => $project
            ]);
        } else {
            return response()->json([
                'success' => false,
                'results' => 'Project not found!'
            ]);
        }
    }
}
