<section id="testimonials" class="py-24 lg:py-32">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="text-center">

            <span class="uppercase tracking-[0.3em] text-orange-500 text-sm">
                TESTIMONIALS
            </span>

            <h2 class="text-4xl lg:text-6xl font-black mt-4">

                What Clients Say

            </h2>

            <p class="mt-6 text-gray-400 max-w-2xl mx-auto">

                Feedback from clients and collaborators who have worked with RAVØX.

            </p>

        </div>

        <div class="grid md:grid-cols-2 xl:grid-cols-3 gap-8 mt-20">

            @forelse($testimonials as $testimonial)

                <div class="glass-card rounded-3xl p-8 hover:-translate-y-2 transition">

                    <div class="flex items-center gap-1 text-orange-500 text-lg">

                        ★★★★★

                    </div>

                    <p class="text-gray-300 mt-6 leading-8">

                        "{{ $testimonial->message }}"

                    </p>

                    <div class="flex items-center mt-8">

                        @if($testimonial->avatar)

                            <img
                                src="{{ asset('storage/'.$testimonial->avatar) }}"
                                class="w-14 h-14 rounded-full object-cover">

                        @else

                            <div class="w-14 h-14 rounded-full bg-orange-500 flex items-center justify-center font-bold">

                                {{ strtoupper(substr($testimonial->name,0,1)) }}

                            </div>

                        @endif

                        <div class="ml-4">

                            <h3 class="font-bold">

                                {{ $testimonial->name }}

                            </h3>

                            <p class="text-sm text-gray-400">

                                {{ $testimonial->position }}

                            </p>

                            @if($testimonial->company)

                                <span class="text-orange-500 text-sm">

                                    {{ $testimonial->company }}

                                </span>

                            @endif

                        </div>

                    </div>

                </div>

            @empty

                <div class="col-span-full text-center text-gray-500">

                    No testimonials available yet.

                </div>

            @endforelse

        </div>

    </div>

</section>