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
        $projects = Project::where('status', 'published')->where('is_featured', true)->latest()->take(6)->get();
        $games = Game::latest()->take(3)->get();
        $posts = Post::latest()->take(3)->get();
        $testimonials = Testimonial::latest()->take(6)->get();

        return view('home', compact(
            'projects',
            'games',
            'posts',
            'testimonials'
        ));
    }
    
    
}