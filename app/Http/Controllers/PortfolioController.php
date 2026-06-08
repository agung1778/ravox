<?php

namespace App\Http\Controllers;

use App\Models\Project;

class PortfolioController extends Controller
{
    public function index()
    {
        $query = Project::query()
            ->where('status', 'published');

        if(request('search'))
        {
            $query->where(
                'title',
                'like',
                '%' . request('search') . '%'
            );
        }

        if(request('category'))
        {
            $query->where(
                'category',
                request('category')
            );
        }

        $projects = $query
            ->latest()
            ->paginate(9);

        $featuredProject = Project::where(
                'is_featured',
                true
            )
            ->where(
                'status',
                'published'
            )
            ->latest()
            ->first();
            
        $categories = Project::where('status', 'published')
            ->select('category')
            ->distinct()
            ->pluck('category');
        return view(
            'portfolio.index',
            compact(
                'projects',
                'featuredProject',
                'categories'
            )
        );
    }

    public function show(Project $project)
    {
        $project->increment('views');
        $relatedProjects = Project::where(
                'category',
                $project->category
            )
            ->where(
                'id',
                '!=',
                $project->id
            )
            ->take(3)
            ->get();

        return view(
            'portfolio.show',
            compact(
                'project',
                'relatedProjects'
            )
        );
    }
}