<section class="mt-10">

    <!-- Navbar dias -->
    <div class="mb-6 flex justify-between rounded-2xl bg-slate-900/80 p-1 shadow-lg ring-1 ring-white/5 backdrop-blur">
        @foreach (['Seg', 'Ter', 'Qua', 'Qui', 'Sex'] as $dia)
            <button
                class="flex-1 rounded-xl px-3 py-2 text-sm font-medium text-slate-400 transition hover:bg-slate-800 hover:text-white"
            >
                {{ $dia }}
            </button>
        @endforeach
    </div>

    <!-- Lista de jogos -->
    <div class="space-y-4">

        @php
            $jogos = [
                [
                    'hora' => '08:00',
                    'local' => 'Quadra A',
                    'modalidade' => 'Futsal',
                    'time1' => '/img/time1.png',
                    'time2' => '/img/time2.png',
                ],
                [
                    'hora' => '09:30',
                    'local' => 'Quadra B',
                    'modalidade' => 'Basquete',
                    'time1' => '/img/time3.png',
                    'time2' => '/img/time4.png',
                ],
            ];
        @endphp

        @foreach ($jogos as $jogo)
            <div class="rounded-2xl bg-slate-900/80 p-4 shadow-lg ring-1 ring-white/5 backdrop-blur">

                <!-- Header info -->
                <div class="mb-3 flex items-center justify-between text-sm text-slate-400">
                    <span>🕒 {{ $jogo['hora'] }}</span>
                    <span>📍 {{ $jogo['local'] }}</span>
                </div>

                <!-- Modalidade (destaque) -->
                <div class="mb-4 text-lg font-semibold text-indigo-400">
                    {{ $jogo['modalidade'] }}
                </div>

                <!-- Times -->
                <div class="flex items-center justify-center gap-4">

                    <!-- Time 1 -->
                    <img
                        src="{{ $jogo['time1'] }}"
                        class="h-12 w-12 rounded-full object-cover ring-2 ring-slate-700"
                    >

                    <span class="text-slate-400 text-sm">VS</span>

                    <!-- Time 2 -->
                    <img
                        src="{{ $jogo['time2'] }}"
                        class="h-12 w-12 rounded-full object-cover ring-2 ring-slate-700"
                    >

                </div>

            </div>
        @endforeach

    </div>

</section>