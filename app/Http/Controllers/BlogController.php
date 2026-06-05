<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::query()
            ->when($request->search, function ($query) use ($request) {
                $query->where('title', 'like', '%' . $request->search . '%');
            })
            ->latest()
            ->paginate(9);

        return view('blog.index', compact('posts'));
    }

    public function show(Post $post)
    {
        return view('blog.show', compact('post'));
    }
}