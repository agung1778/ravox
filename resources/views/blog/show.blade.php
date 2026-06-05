@extends('layouts.app')

@section('content')

<section class="pt-40 pb-24">
    <div class="max-w-4xl mx-auto px-6">
        <h1 class="text-6xl font-black">
            {{ $post->title }}
        </h1>
        <img src="{{ asset('storage/'.$post->thumbnail) }}" class="w-full rounded-3xl mt-12">
        <article class="glass-card p-10 mt-10 prose prose-invert max-w-none">
            {!! $post->content !!}
        </article>
    </div>
</section>

@endsection