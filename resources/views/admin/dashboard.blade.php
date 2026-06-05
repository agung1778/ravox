@extends('admin.layouts.app')

@section('content')

<h1 class="text-5xl font-black">
    Dashboard
</h1>

<p class="text-gray-400 mt-4">
    Welcome back to RAVØX Admin Panel.
</p>
<div class="grid md:grid-cols-4 gap-6 mt-12">
    <div class="glass-card p-8">
        <h3 class="text-gray-400">
            Projects
        </h3>
        <p class="text-4xl font-bold mt-4">
            {{ \App\Models\Project::count() }}
        </p>
    </div>
    <div class="glass-card p-8">
        <h3 class="text-gray-400">
            Games
        </h3>
        <p class="text-4xl font-bold mt-4">
            {{ \App\Models\Game::count() }}
        </p>
    </div>
    <div class="glass-card p-8">
        <h3 class="text-gray-400">
            Articles
        </h3>
        <p class="text-4xl font-bold mt-4">
            {{ \App\Models\Post::count() }}
        </p>
    </div>
    <div class="glass-card p-8">
        <h3 class="text-gray-400">
            Messages
        </h3>
        <p class="text-4xl font-bold mt-4">
            0
        </p>
    </div>
</div>
<div class="glass-card p-8 mt-12">
    <h2 class="text-2xl font-bold">
        Recent Projects
    </h2>
    <div class="mt-8 space-y-4">
        @foreach(\App\Models\Project::latest() ->take(5) ->get() as $project)
        <div class="flex justify-between">
            <span>
                {{ $project->title }}
            </span>
            <span class="text-gray-500">
                {{ $project->created_at->diffForHumans() }}
            </span>
        </div>
        @endforeach
    </div>
</div>

@endsection