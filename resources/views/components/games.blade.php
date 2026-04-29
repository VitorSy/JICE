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

                <!-- Modalidade + local -->
                <div class="mb-4 flex items-center justify-between">

                    <div class="text-lg font-semibold text-indigo-400">
                        {{ $game['modal'] }}
                    </div>

                    <span class="text-base text-slate-400">
                        📍 {{ $game['place'] }}
                    </span>

                </div>

                <!-- Horário sozinho -->
                <div class="mb-2 text-base text-slate-400">
                    <span>
                        🕒 {{ $game['date'] }}
                    </span>
                </div>

                <!-- Times -->
                <div class="flex items-center justify-center gap-6">

                    <!-- Time 1 -->
                    <div class="flex flex-col items-center gap-2">
                        <img
                            src=""
                            class="h-12 w-12 rounded-full object-cover ring-2 ring-slate-700"
                        >

                        <span class="text-sm text-center">
                            {{ $game['team_one'] }}
                        </span>
                    </div>


                    <!-- placar -->
                    @if($game['was_set'])
                        <span class="rounded-lg bg-slate-800 px-3 py-1 font-semibold text-white">
                            {{ $game['team_one_points'] }}
                            x
                            {{ $game['team_two_points'] }}
                        </span>
                    @else

                        <span class="text-slate-400 text-sm">
                            VS
                        </span>

                    @endif


                    <!-- Time 2 -->
                    <div class="flex flex-col items-center gap-2">
                        <img
                            src=""
                            class="h-12 w-12 rounded-full object-cover ring-2 ring-slate-700"
                        >

                        <span class="text-sm text-center">
                            {{ $game['team_two'] }}
                        </span>
                    </div>

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