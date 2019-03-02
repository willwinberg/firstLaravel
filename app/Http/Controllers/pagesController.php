<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pagesController extends Controller
{
    public function home() {
        $tasks = [
            "go to store",
            "go to market",
            "go to work",
        ];
        return view('welcome', ["tasks" => $tasks, "foo" => "foobar"]);
    }

    public function contacts() {
        return view('contacts');
    }

    public function about() {
        return view('about');
    }
}
