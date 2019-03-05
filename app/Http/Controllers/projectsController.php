<?php

namespace App\Http\Controllers;

use App\Project;
use App\Services\Twitter;

class projectsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // auth->id(); // 4
        // auth->user(); // User
        // auth->check(); // bool
        // if (auth()->guest())

        $projects = Project::where('owner_id', auth()->id())->get();

        // return $projects;

        return view('projects.index', ['projects' => $projects]); // or compact('projects')
    }

    public function show(Project $project, Twitter $twitter)
    {
        // abort_if();
        // abort_unless();
        // if (\Gate::denies('update', $project)) {
        //     abort(403);
        // }
        // abort_if(\Gate::denies('update', $project), 403);
        $this->authorize('update', $project); // Goto unless need otherwise
        // auth()->user()->can('update', $project); // or cannot()
        // dd($twitter);

        return view('projects.show', compact('project'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store()
    {
        $this->authorize('update', $project);

        $attributes = request()->validate([
            'title' => ['required', 'min:3', 'max:255'],
            'description' => 'required',
        ]);

        $attributes['owner_id'] = auth()->id();

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
        $this->authorize('update', $project);

        // VALIDATE

        // $project->title = request('title');
        // $project->description = request('description');

        // $project->save();

        Project::update(['title', 'description']);

        return redirect('/projects');
    }

    public function destroy(Project $project)
    {
        $this->authorize('update', $project);

        $project->delete();
        return redirect('/projects');
    }
}
