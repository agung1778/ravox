<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $featuredPost = Post::where('is_featured', true)
            ->where('status', 'published')
            ->latest()
            ->first();
        $posts = Post::query()
            ->where('status', 'published')
            ->when(
                $request->search,
                fn ($query) =>
                    $query->where(
                        'title',
                        'like',
                        '%' . $request->search . '%'
                    )
            )
            ->when(
                $request->category,
                fn ($query) =>
                    $query->where(
                        'category',
                        $request->category
                    )
            )
            ->latest()
            ->paginate(9)
            ->withQueryString();
        return view(
            'blog.index',
            compact(
                'posts',
                'featuredPost'
            )
        );
    }

    public function show(Post $post)
    {
        $post->increment('views');

        $relatedPosts = Post::where(
            'category',
            $post->category
        )
        ->where('id', '!=', $post->id)
        ->where('status', 'published')
        ->latest()
        ->take(3)
        ->get();

        return view(
            'blog.show',
            compact(
                'post',
                'relatedPosts'
            )
        );
    }
}