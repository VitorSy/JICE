<main class="mx-auto min-h-dvh w-full max-w-md px-4 py-6">

    <!-- Header -->
    <header class="mb-8 text-center">
        <h1 class="text-3xl font-bold text-white">Modalidades</h1>
    </header>

    <!-- Lista -->
    <div class="space-y-4">

        @php
            $modalidades = [
                ['nome' => 'Futebol masculino', 'icon' => '⚽'],
                ['nome' => 'Futebol feminino', 'icon' => '⚽'],
                ['nome' => 'Volei quadra misto', 'icon' => '🏐'],
                ['nome' => 'Volei areia misto', 'icon' => '🏖️'],
                ['nome' => 'Handball misto', 'icon' => '🤾'],
                ['nome' => 'Futsal masculino', 'icon' => '⚽'],
                ['nome' => 'Basquete misto', 'icon' => '🏀'],
                ['nome' => 'Queimada misto', 'icon' => '🔥'],
                ['nome' => 'Gincana misto', 'icon' => '🎯'],
                ['nome' => 'Arrecadação de alimentos', 'icon' => '❤️'],
                ['nome' => 'Arte Parede da Quadra', 'icon' => '🎨'],
                ['nome' => 'Xadrez', 'icon' => '♟️'],
                ['nome' => 'FIFA', 'icon' => '🎮'],
            ];
        @endphp

        @foreach ($modalidades as $modalidade)
            <a
                href="{{ route('modal', ['modal_id' => 1]) }}"
                class="group flex w-full items-center justify-between rounded-2xl bg-slate-900/80 px-5 py-4 shadow-lg ring-1 ring-white/5 backdrop-blur transition-all duration-200 hover:bg-slate-800/90 hover:shadow-xl active:scale-[0.98]"
            >
                <!-- Esquerda -->
                <div class="flex items-center gap-4">

                    <!-- Ícone -->
                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-slate-800 text-xl shadow-inner">
                        {{ $modalidade['icon'] }}
                    </div>

                    <!-- Nome -->
                    <span class="text-base font-medium text-slate-200 group-hover:text-white">
                        {{ $modalidade['nome'] }}
                    </span>
                </div>

                <!-- Seta -->
                <div class="flex h-10 w-10 items-center justify-center rounded-full bg-slate-800/70 text-slate-400 transition group-hover:bg-slate-700 group-hover:text-white">
                    →
                </div>
            </a>
        @endforeach

    </div>
</main>