<div id="loading-screen"
    class="fixed inset-0 z-[9999] flex items-center justify-center bg-[#0b0f19] transition-opacity duration-700">

    <div class="text-center">

        <img loading="lazy" decoding="async"
            src="{{ asset('assets/logo-bgremove.png') }}"
            alt="RAVØX"
            class="w-32 mx-auto animate-pulse">

        <h1 class="text-4xl font-black mt-8 tracking-[8px]">
            RAVØX
        </h1>

        <p class="text-gray-400 mt-3">
            Build • Create • Innovate
        </p>

        <div class="w-72 h-2 bg-white/10 rounded-full mt-10 overflow-hidden">

            <div
                id="loading-bar"
                class="h-full bg-orange-500 w-0 transition-all duration-300">
            </div>

        </div>

        <p
            id="loading-text"
            class="mt-4 text-orange-500">

            Loading... 0%

        </p>

    </div>

</div>