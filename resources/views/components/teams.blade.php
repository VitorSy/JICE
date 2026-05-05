<section class="mt-2">

    <h2 class="mb-6 text-center text-3xl font-bold text-white">
        Times
    </h2>

    <div class="space-y-4">

        @foreach ($teams as $team)
            <a
                href="{{ route('team.show', $team->id) }}"
                class="flex items-center justify-between rounded-2xl bg-slate-900/80 px-5 py-4 shadow-lg ring-1 ring-white/5 backdrop-blur transition hover:bg-slate-800"
            >
                <div class="flex items-center gap-4">

                    <!-- Logo -->
                    <img src="{{ asset('assets/images/' . $team->logo) }}"
                         class="h-12 w-12 rounded-full object-cover ring-2 ring-slate-700">

                    <!-- Nome -->
                    <span class="text-base font-medium text-white">
                        {{ $team->name }}
                    </span>
                </div>

                <div class="flex h-10 ml-1 w-10 items-center justify-center rounded-full bg-slate-800/70 text-slate-400 transition group-hover:bg-slate-700 group-hover:text-white">
                    <img src="{{ asset('assets/icons/right-arrow.png') }}" width="24px" height="24px" alt="">
                </div>
            </a>
        @endforeach

    </div>

</section>