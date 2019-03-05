<?php

namespace App\Http\Controllers;

use App\Project;
// use App\Services\Twitter;
use App\Events\ProjectCreated;
// use App\Mail\ProjectCreated;

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

        $projects = auth()->user()->projects;
        // $projects = Project::where('owner_id', auth()->id())->get();

        // cache()->rememberForever('stats', function () {
        //     return ['lessons' => 1300, 'hours' => 112];
        // });

        // $data = cache()->get('stats');

        // dump($data);

        return view('projects.index', ['projects' => $projects]); // or compact('projects')
    }

    public function show(Project $project)
    {
        // abort_if();
        // abort_unless();
        // if (\Gate::denies('update', $project)) {
        //     abort(403);
        // }
        // abort_if(\Gate::denies('update', $project), 403);
        // $this->authorize('update', $project); // Goto unless need otherwise
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
        // $this->authorize('update', $project);

        $attributes = $this->validateProject();

        $attributes['owner_id'] = auth()->id();

        // Dangerous
        // Project::create(request()->all());


        // Project::create([
        //     'title' => request('title'),
        //     'description' => request('description')
        // ]);

        // ===

        $project = Project::create($attributes);

        // \Mail::to($project->owner->email)->send(
        //     new ProjectCreated($project)
        // );
        // event(new ProjectCreated($project));

        return redirect('/projects');
    }

    public function edit(Project $project)
    {
        return view('projects.edit', ['project' => $project]);
    }

    public function update(Project $project)
    {
        // $this->authorize('update', $project);

        // VALIDATE

        // $project->title = request('title');
        // $project->description = request('description');

        // $project->save();

        $project->update($this->validateProject());

        return redirect('/projects');
    }

    public function destroy(Project $project)
    {
        $this->authorize('update', $project);

        $project->delete();
        return redirect('/projects');
    }

    protected function validateProject()
    {
        return request()->validate([
            'title' => [
                'required', 'min:3',
                'max:255'
            ],
            'description' =>
            'required',
        ]);

        $project->delete();
        return redirect('/projects');
    }
}
