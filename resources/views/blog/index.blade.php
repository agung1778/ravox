@extends('layouts.app')

@section('content')

<section class="pt-40 pb-24">
    <div class="max-w-7xl mx-auto px-6">
        <span class="text-orange-500 uppercase">
            Blog
        </span>
        <h1 class="text-7xl font-black mt-4">
            Insights, Devlogs, & Articles
        </h1>
        <p class="text-gray-400 text-xl mt-8 max-w-3xl">
            Follow development updates, tutorials, and project stories from RAVØX.
        </p>
    </div>
</section>

<section class="pb-16">
    <div class="max-w-7xl mx-auto px-6">
        <form method="GET">
            <input type="text" name="search" placeholder="Search article..." class="w-full glass-card p-4">
        </form>
    </div>
</section>

<section class="pb-24">
    <div class="max-w-7xl mx-auto px-6">
        @if($posts->count())
        @php
            $featured = $posts->first();
        @endphp
        <a href="{{ route('blog.show',$featured->slug) }}" class="glass-card overflow-hidden block">
            <div class="grid lg:grid-cols-2">
                <img src="{{ asset('storage/'.$featured->thumbnail) }}" class="w-full h-full object-cover">
                <div class="p-10">
                    <span class="text-orange-500">
                        Featured Article
                    </span>
                    <h2 class="text-5xl font-bold mt-4">
                        {{ $featured->title }}
                    </h2>
                    <p class="mt-6 text-gray-400">
                        {{ $featured->excerpt }}
                    </p>
                </div>
            </div>
        </a>
        @endif
    </div>
</section>

<section class="pb-24">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($posts as $post)
            <a href="{{ route('blog.show',$post->slug) }}" class="glass-card overflow-hidden group">
                <img src="{{ asset('storage/'.$post->thumbnail) }}" class="w-full h-56 object-cover group-hover:scale-105 transition duration-500">
                <div class="p-6">
                    <h3 class="text-2xl font-bold">
                        {{ $post->title }}
                    </h3>
                    <p class="text-gray-400 mt-3">
                        {{ $post->excerpt }}
                    </p>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>

<section class="pb-24">
    <div class="max-w-7xl mx-auto px-6">
        {{ $posts->links() }}
    </div>
</section>

@endsection