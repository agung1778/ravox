@extends('layouts.app')

@section('content')

<section class="pt-32 pb-24">
<div class="max-w-6xl mx-auto px-6">
    <img loading="lazy" decoding="async"
        src="{{ asset('storage/' . ($post->banner ?? $post->thumbnail)) }}"
        class="w-full h-[500px] object-cover rounded-3xl">
    <div class="mt-12">
        <span class="text-orange-500 uppercase">
            {{ ucfirst($post->category) }}
        </span>
        <h1 class="text-4xl sm:text-5xl lg:text-7xl leading-tight font-black mt-4">
            {{ $post->title }}
        </h1>
        <div class="flex gap-6 mt-6 text-gray-400">
            <span>
                📅 {{ optional($post->published_at)->format('d M Y') }}
            </span>
            <span>
                👁 {{ $post->views }} Views
            </span>
        </div>
    </div>
</div>
</section>

<section class="pb-24">
<div class="max-w-4xl mx-auto px-6">
    <article class="glass-card p-10 prose prose-invert max-w-none">
        {!! $post->content !!}
    </article>
</div>
</section>

@if($post->gallery)
<section class="pb-24">
<div class="max-w-7xl mx-auto px-5 sm:px-6 lg:px-8">
    <h2 class="text-4xl font-bold mb-10">
        Gallery
    </h2>
    <div class="grid lg:grid-cols-2 gap-12 items-center lg:grid-cols-3 gap-6">
        @foreach($post->gallery as $image)
        <img loading="lazy" decoding="async"
            src="{{ asset('storage/'.$image) }}"
            class="rounded-2xl h-64 object-cover w-full">
        @endforeach
    </div>
</div>
</section>
@endif

@if($relatedPosts->count())
<section class="pb-24">
<div class="max-w-7xl mx-auto px-5 sm:px-6 lg:px-8">
    <h2 class="text-4xl font-bold mb-10">
        Related Articles
    </h2>
    <div class="grid  sm:grid-cols-2  xl:grid-cols-3  gap-8">
        @foreach($relatedPosts as $related)
        <a
            href="{{ route('blog.show',$related->slug) }}"
            class="glass-card overflow-hidden">
            <img loading="lazy" decoding="async"
                src="{{ asset('storage/'.$related->thumbnail) }}"
                class="w-full h-56 object-cover">
            <div class="p-6">
                <h3 class="text-xl font-bold">
                    {{ $related->title }}
                </h3>
            </div>
        </a>
        @endforeach
    </div>
</div>
</section>

@endif

@endsection
