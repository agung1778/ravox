<?php

namespace App\Http\Controllers;

use App\Models\Project;

class PortfolioController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->paginate(9);

        return view(
            'portfolio.index',
            compact('projects')
        );
    }

    public function show(Project $project)
    {
        return view(
            'portfolio.show',
            compact('project')
        );
    }
}