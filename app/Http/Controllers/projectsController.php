<?php

namespace App\Http\Controllers;

use App\Project;
use App\Services\Twitter;

class projectsController extends Controller
{
    public function index()
    {
        $projects = Project::all();

        // return $projects;

        return view('projects.index', ['projects' => $projects]); // or compact('projects')
    }

    public function show(Project $project, Twitter $twitter)
    {
        dd($twitter);

        return view('projects.show', compact('project'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'title' => ['required', 'min:3', 'max:255'],
            'description' => 'required',
        ]);

        // Dangerous
        // Project::create(request()->all());


        // Project::create([
        //     'title' => request('title'),
        //     'description' => request('description')
        // ]);

        // ===

        Project::create($attributes);

        return redirect('/projects');
    }

    public function edit(Project $project)
    {
        return view('projects.edit', ['project' => $project]);
    }

    public function update(Project $project)
    {
        // $project->title = request('title');
        // $project->description = request('description');

        // $project->save();

        Project::update(['title', 'description']);

        return redirect('/projects');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect('/projects');
    }
}
