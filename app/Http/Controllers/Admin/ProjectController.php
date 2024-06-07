<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::orderBy('name', 'asc')->get();

        return view('admin.projects.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {

        // $request->validate([
        //     'progetto' => 'required|string',
        //     'descrizione' => 'required|max:2000',
        //     'link' =>'required|string'
        // ]);

        $form_data = $request->validated();

        $base_slug = Str::slug($form_data['progetto']);
        $slug = $base_slug;
        $n = 0;

        do{
            $find = Project::where('slug', $slug)->first();
            if($find !== null){
                $n++;
                $slug = $base_slug . '_' . $n;
            }
        }while ($find !== null);
        $form_data['slug'] = $slug;

        $new_project = Project::create($form_data);
        return to_route('admin.projects.show', $new_project);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $types = Type::orderBy('name', 'asc')->get();

        return view('admin.projects.edit', compact('project', 'types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {

        // $request->validate([
        //     'progetto' => 'required|string',
        //     'descrizione' => 'required|max:2000',
        //     'link' =>'required|string'
        // ]);
        $form_data = $request->validated();
        $project->update($form_data);
 
        return to_route('admin.projects.show', $project);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return to_route('admin.projects.index');
    }
}
