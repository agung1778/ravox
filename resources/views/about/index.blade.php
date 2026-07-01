@extends('layouts.app')

@section('title','About | RAVØX')
@section('content')

<section class="pt-40 pb-24">
    <div class="max-w-7xl mx-auto px-5 sm:px-6 lg:px-8">
        <span class="text-orange-500 uppercase tracking-widest">
            About RAVØX
        </span>
        <h1 class=" text-4xl sm:text-5xl lg:text-7xl leading-tight lg:text-7xl font-black mt-4">
            Building Digital Products, Games, and Experiences.
        </h1>
        <p class="text-xl text-gray-400 mt-8 max-w-3xl">
            RAVØX is a personal brand founded by Agung Gumelar, focused on web development, software engineering, and indie game creation.
        </p>
    </div>
</section>

<section class="py-24">
    <div class="max-w-7xl mx-auto px-5 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <div>
                <img loading="lazy" decoding="async" src="{{ asset('assets/logo-bgremove.png') }}" class="w-80 mx-auto">
            </div>
            <div>
                <h2 class="text-5xl font-bold">
                    Who Am I?
                </h2>
                <p class="mt-6 text-gray-400 leading-8">
                    My name is Agung Gumelar. I am passionate about technology, software development, and creating digital experiences.
                </p>
                <p class="mt-4 text-gray-400 leading-8">
                    My goal is to build RAVØX into a professional game studio and digital technology company in the future.
                </p>
            </div>
        </div>
    </div>
</section>

<section class="py-24">
    <div class="max-w-6xl mx-auto px-6">
        <h2 class="text-5xl font-bold text-center">
            Development Journey
        </h2>
        <div class="mt-20 space-y-10">
            <div class="glass-card p-8">
                <h3 class="text-orange-500 font-bold">
                    2024
                </h3>
                <p class="mt-3">
                    Started learning programming and web development.
                </p>
            </div>
            <div class="glass-card p-8">
                <h3 class="text-orange-500 font-bold">
                    2025
                </h3>
                <p class="mt-3">
                    Built personal projects and started game development.
                </p>
            </div>
            <div class="glass-card p-8">
                <h3 class="text-orange-500 font-bold">
                    2026
                </h3>
                <p class="mt-3">
                    Founded RAVØX and developed professional portfolio projects.
                </p>
            </div>
        </div>
    </div>
</section>

<section class="py-24">
    <div class="max-w-7xl mx-auto px-5 sm:px-6 lg:px-8">
        <h2 class="text-5xl font-bold text-center">
            Skills & Technologies
        </h2>
        <div class="grid lg:grid-cols-2 gap-12 items-center gap-8 mt-16">
            <div class="glass-card p-8">
                <h3 class="text-2xl font-bold">
                    Web Development
                </h3>
                <ul class="mt-6 space-y-3">
                    <li>Laravel</li>
                    <li>PHP</li>
                    <li>MySQL</li>
                    <li>JavaScript</li>
                </ul>
            </div>
            <div class="glass-card p-8">
                <h3 class="text-2xl font-bold">
                    Game Development
                </h3>
                <ul class="mt-6 space-y-3">
                    <li>Unity</li>
                    <li>C#</li>
                    <li>Game Design</li>
                    <li>Level Design</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="py-24">
    <div class="max-w-5xl mx-auto px-6 text-center">
        <h2 class="text-5xl font-bold">
            Future Vision
        </h2>
        <p class="text-gray-400 mt-8 leading-8">
            The long-term vision of RAVØX is to become an independent game studio and software development company creating innovative products for global audiences.
        </p>
    </div>
</section>

<section class="py-24">
    <div class="max-w-4xl mx-auto px-6">
        <div class="glass-card p-16 text-center">
            <h2 class="text-4xl font-bold">
                Interested In My Work?
            </h2>
            <p class="text-gray-400 mt-4">
                Download my CV and explore my experience.
            </p>
            <a href="#" class="inline-block mt-8 px-8 py-4 bg-orange-500 rounded-xl">
                Download CV
            </a>
        </div>
    </div>
</section>

@endsection