<?php

namespace App\Http\Controllers;

use App\Project;

class projectsController extends Controller
{
    public function index() {
        $projects = Project::all();

        // return $projects;

        return view('projects.index', ['projects' => $projects]);
    }
}
