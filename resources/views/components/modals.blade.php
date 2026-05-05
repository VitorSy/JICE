<main class="mx-auto min-h-dvh w-full max-w-lg pb-6">
    <!-- Header -->
    <header class="mb-8 text-center">
        <h1 class="text-3xl font-bold text-white">
            Esportes
        </h1>

        <!-- seletor campeonato -->
        <div class="mt-5 grid grid-cols-2 gap-3">
            @if($category === 'kid')
                <x-selected-category-button :category="'kid'" :text="'6º e 7º'"/>
                <x-no-selected-category-button :category="'teen'" :text="'8º e 9º'"/>
            @elseif($category === 'teen')
                <x-no-selected-category-button :category="'kid'" :text="'6º e 7º'"/>
                <x-selected-category-button :category="'teen'" :text="'8º e 9º'"/>
            @endif
        </div>

    </header>

    <!-- Lista -->
    <div class="space-y-4">

        @foreach ($modals as $modal)
            <a
                href="{{ route('modal', ['modal_id' => $modal->id, 'category' => $category]) }}"
                class="group flex w-full items-center justify-between rounded-2xl bg-slate-900/80 px-5 py-4 shadow-lg ring-1 ring-white/5 backdrop-blur transition-all duration-200 hover:bg-slate-800/90 hover:shadow-xl active:scale-[0.98]"
            >
                <div class="flex items-center gap-4">
                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-slate-800 text-xl shadow-inner">
                        {{ $modal->icon }}
                    </div>

                    <span class="text-base font-medium text-slate-200 group-hover:text-white">
                        {{ $modal->name }}
                    </span>
                </div>

                <div class="flex h-10 ml-1 w-10 items-center justify-center rounded-full bg-slate-800/70 text-slate-400 transition group-hover:bg-slate-700 group-hover:text-white">
                    <img src="{{ asset('assets/icons/right-arrow.png') }}" width="24px" height="24px" alt="">
                </div>

            </a>
        @endforeach

    </div>

</main>