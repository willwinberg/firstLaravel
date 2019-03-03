<?php

namespace App\Http\Controllers;

use App\Task;
use App\Project;

class ProjectTaskController extends Controller
{
    public function store(Project $project)
    {
        $validated = request()->validate(['description' => 'required|max:255']);

        // Task::create([
        //     'project_id' => $project->id,
        //     'description' => request('description')
        // ]);
        $project->addTask($validated);

        return back();
    }

    // public function update(Task $task)
    // {
    //     $method = request()->has('completed') ? 'complete' : 'incomplete';

    //     $task->$method();

    //     // $task->update([
    //     //     'completed' => request()->has('completed')
    //     // ]);

    //     return back();
    // }
}
