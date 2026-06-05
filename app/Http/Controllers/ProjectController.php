<?php

namespace App\Http\Controllers;
use App\Models\Project;
use App\Models\Game;
use App\Models\Post;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function show($slug)
{
    $project = Project::where('slug',$slug)
        ->firstOrFail();

    return view(
        'portfolio.show',
        compact('project')
    );
}
}
