<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Game;
use App\Models\Post;
use App\Models\Testimonial;
use Artesaos\SEOTools\Facades\SEOMeta;

class HomeController extends Controller
{
    public function index()
    {
        SEOMeta::setTitle('RAVØX');
        SEOMeta::setDescription(
            'Portfolio, Indie Game Studio, and Digital Agency'
        );

        $projects = Project::where('status', 'published')
            ->where('is_featured', true)
            ->latest()
            ->take(6)
            ->get();

        $games = Game::where('status', 'released')
            ->latest()
            ->take(3)
            ->get();

        $posts = Post::where('status', 'published')
            ->latest()
            ->take(3)
            ->get();

        $testimonials = Testimonial::latest()
            ->take(6)
            ->get();

        // Hero Stats
        $projectCount = Project::where('status', 'published')->count();

        $gameCount = Game::where('status', 'released')->count();

        $postCount = Post::where('status', 'published')->count();

        $downloadCount = Game::sum('downloads');

        $viewCount = Game::sum('views') + Post::sum('views');

        $featuredGame = Game::where('featured', true)->first();

        return view('home', compact(
            'projects',
            'games',
            'posts',
            'testimonials',
            'projectCount',
            'gameCount',
            'postCount',
            'downloadCount',
            'viewCount',
            'featuredGame'
        ));
    }
}