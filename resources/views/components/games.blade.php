<section class="mt-2">
    <!-- Navbar dias -->
    <form action="{{ route('games.filter') }}" method="POST">
        @csrf
        <div class="mb-6 flex justify-between rounded-2xl bg-slate-900/80 p-1 shadow-lg ring-1 ring-white/5 backdrop-blur">
            @foreach (['Seg', 'Ter', 'Qua', 'Qui', 'Sex'] as $dia)
                <button
                    type="submit"
                    name="day"
                    value="{{ $dia }}"
                    class="flex-1 rounded-xl px-3 py-2 text-sm font-medium text-slate-400 transition hover:bg-slate-800 hover:text-white"
                >
                    {{ $dia }}
                </button>
            @endforeach
        </div>
    </form>

    <!-- Lista de games -->
    <div class="space-y-4">
        @foreach ($games as $game)
            <div class="rounded-2xl bg-slate-900/80 p-4 shadow-lg ring-1 ring-white/5 backdrop-blur">

                <!-- Header info -->
                <div class="mb-3 flex items-center justify-between text-sm text-slate-400">
                    <span>🕒 {{ $game['date'] }}</span>
                    <span>📍 {{ $game['place'] }}</span>
                </div>

                <!-- Modalidade (destaque) -->
                <div class="mb-4 text-lg font-semibold text-indigo-400">
                    {{ $game['modal'] }}
                </div>

                <!-- Times -->
                <div class="flex items-center justify-center gap-4">

                    <!-- Time 1 -->
                    <img
                        src=""
                        class="h-12 w-12 rounded-full object-cover ring-2 ring-slate-700"
                    >
                    <span>{{ $game['team_one'] }}</span>

                    <span class="text-slate-400 text-sm">VS</span>

                    <!-- Time 2 -->
                    <img
                        src=""
                        class="h-12 w-12 rounded-full object-cover ring-2 ring-slate-700"
                    >
                    <span>{{ $game['team_two'] }}</span>
                </div>
                @if(Gate::allows('is-admin'))
                    <div class="flex justify-end mt-3">
                        <a href="{{ route('games.edit', ['game_id'=>$game['id']]) }}">
                            <img
                                src="{{ asset('assets/icons/pencil.png') }}"
                                alt="editar"
                                class="w-[20px] h-[20px] opacity-70 hover:opacity-100 transition"
                            >
                        </a>
                    </div>
                @endif
                
            </div>
        @endforeach

    </div>

</section>