<section id="contact" class="py-24 lg:py-32 reveal">

    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="glass-card rounded-[40px] overflow-hidden relative">

            <div class="absolute inset-0 bg-orange-500/10 blur-3xl"></div>

            <div class="relative p-10 lg:p-20 text-center">

                <span class="uppercase tracking-[0.3em] text-orange-500 text-sm">

                    CONTACT

                </span>

                <h2 class="text-4xl lg:text-4xl sm:text-5xl lg:text-7xl leading-tight font-black mt-6">

                    Ready To Build Something Amazing?

                </h2>

                <p class="text-gray-400 mt-8 max-w-3xl mx-auto leading-8">

                    Whether you need a modern website, a custom application,
                    or an indie game, RAVØX is ready to turn your ideas into reality.

                </p>

                <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4 mt-12">

                    @if(setting('whatsapp'))

                        <a
                            href="https://wa.me/{{ preg_replace('/[^0-9]/','',setting('whatsapp')) }}"
                            target="_blank"
                            class="bg-green-600 hover:bg-green-500 rounded-2xl py-4 font-semibold transition">

                            WhatsApp

                        </a>

                    @endif

                    @if(setting('email'))

                        <a
                            href="mailto:{{ setting('email') }}"
                            class="bg-orange-500 hover:bg-orange-400 rounded-2xl py-4 font-semibold transition">

                            Email

                        </a>

                    @endif

                    @if(setting('github'))

                        <a
                            href="{{ setting('github') }}"
                            target="_blank"
                            class="border border-white/10 rounded-2xl py-4 hover:bg-white/5 transition">

                            GitHub

                        </a>

                    @endif

                    @if(setting('linkedin'))

                        <a
                            href="{{ setting('linkedin') }}"
                            target="_blank"
                            class="border border-white/10 rounded-2xl py-4 hover:bg-white/5 transition">

                            LinkedIn

                        </a>

                    @endif

                </div>

            </div>

        </div>

    </div>

</section>