<?php

namespace App\Http\Controllers;

use App\Models\Project;

class HomeController extends Controller
{
    public function index()
    {
        $projects = Project::where('is_active', true)
                          ->latest()
                          ->take(6)
                          ->get();

        return view('home', compact('projects'));
    }
}


