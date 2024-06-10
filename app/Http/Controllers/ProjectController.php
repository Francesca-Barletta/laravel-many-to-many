<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Type;
use App\Models\Technology;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $technologies = Technology::all();
        $types = Type::all();

        $query = Project::with(['type', 'type.projects']);

        $filter = $request->all();

        if(isset($filter['type_id'])){

            $query->where('type_id', $filter['type_id']);
        }

           $projects = $query->get();
        return view('guest.projects.index', compact('projects', 'types', 'technologies'));
    }


    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('guest.projects.show', compact('project'));
    }
}