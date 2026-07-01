@extends('layouts.app')

@section('content')

<section class="pt-40 pb-24">
    <div class="max-w-7xl mx-auto px-5 sm:px-6 lg:px-8">
        <span class="text-orange-500 uppercase">
            Contact
        </span>
        <h1 class="text-7xl font-black mt-4">
            Let's Build Something Amazing
        </h1>
        <p class="text-gray-400 text-xl mt-8 max-w-3xl">
            Interested in working together? Send a message and let's discuss your project.
        </p>
    </div>
</section>

<section class="pb-24">
    <div class="max-w-7xl mx-auto px-5 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-12">
            <div class="glass-card p-10">
                <h2 class="text-3xl font-bold">
                    Contact Information
                </h2>
                <div class="mt-8 space-y-6">
                    <div>
                        <h3 class="font-bold">
                            Email
                        </h3>
                        <p class="text-gray-400">
                            {{ setting('email') }}
                        </p>
                    </div>
                    <div>
                        <h3 class="font-bold">
                            WhatsApp
                        </h3>
                        <p class="text-gray-400">
                            {{ setting('phone') }}
                        </p>
                    </div>
                    <div>
                        <h3 class="font-bold">
                            Location
                        </h3>
                        <p class="text-gray-400">
                            {{ setting('address') }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="glass-card p-10">
                @if(session('success'))
                <div class="mb-6 p-4 rounded-xl bg-green-500/20 border border-green-500/30">
                    {{ session('success') }}
                </div>
                @endif
                <form action="{{ route('contact.store') }}" method="POST">
                    @csrf
                    <input type="text" name="name" placeholder="Your Name" class="w-full p-4 bg-black/20 rounded-xl mb-4">
                    <input type="text" name="subject" placeholder="Subject" class="w-full p-4 bg-black/20 rounded-xl mb-4">
                    <input type="email" name="email" placeholder="Your Email" class="w-full p-4 bg-black/20 rounded-xl mb-4">
                    <textarea name="message" rows="6" placeholder="Your Message" class="w-full p-4 bg-black/20 rounded-xl"></textarea>
                    <button class="mt-6 px-6 py-3 bg-orange-500 rounded-xl">
                        Send Message
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

<section class="pb-24">
    <div class="max-w-7xl mx-auto px-5 sm:px-6 lg:px-8">
        <h2 class="text-4xl font-bold text-center">
            Connect With Me
        </h2>
        <div class="grid md:grid-cols-4 gap-6 mt-12">
            <a href="#" class="glass-card p-8 text-center">
                GitHub
            </a>
            <a href="#" class="glass-card p-8 text-center">
                LinkedIn
            </a>
            <a href="#" class="glass-card p-8 text-center">
                Instagram
            </a>
            <a href="#" class="glass-card p-8 text-center">
                WhatsApp
            </a>
        </div>
    </div>
</section>

<section class="pb-24">
    <div class="max-w-5xl mx-auto px-6">
        <h2 class="text-5xl font-bold text-center">
            FAQ
        </h2>
        <div class="space-y-6 mt-16">
            <div class="glass-card p-8">
                <h3 class="font-bold">
                    What services do you offer?
                </h3>
                <p class="mt-3 text-gray-400">
                    Web development, game development,
                    UI/UX design, and software solutions.
                </p>
            </div>
            <div class="glass-card p-8">
                <h3 class="font-bold">
                    Do you work remotely?
                </h3>
                <p class="mt-3 text-gray-400">
                    Yes, I can work with clients worldwide.
                </p>
            </div>
        </div>
    </div>
</section>

@endsection