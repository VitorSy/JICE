<section class="mt-10">

    <h2 class="mb-6 text-center text-2xl font-semibold text-white">
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
                    <img src="{{ $team->logo }}"
                         class="h-12 w-12 rounded-full object-cover ring-2 ring-slate-700">

                    <!-- Nome -->
                    <span class="text-base font-medium text-white">
                        {{ $team->name }}
                    </span>
                </div>

                <span class="text-slate-400">→</span>
            </a>
        @endforeach

    </div>

</section>