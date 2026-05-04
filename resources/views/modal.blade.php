@extends('layouts.app')

@section('content')

<div class="space-y-8 pb-8">
    <!-- Botão voltar -->
    <div>
        <a
            href="{{ route('homepage', ['section' => 'option-4', 'category' => $category]) }}"
            class="
                inline-flex items-center gap-2
                rounded-xl
                bg-slate-900/80
                px-4 py-2
                text-sm text-slate-300
                ring-1 ring-white/5
                transition
                hover:bg-slate-800
            "
        >
            ← Voltar
        </a>
    </div>

    <!-- HEADER -->
    <section class="text-center pt-2">
        <h1 class="text-2xl mb-5 font-bold text-white">
            {{$modalName}}
        </h1>

        <!-- NOVOS BOTÕES TOPO -->
        @if ($modalType === 'group')
            @if ($type_selected === 'groups')
                <div class="flex gap-2 rounded-2xl bg-slate-800 p-1 shadow-inner w-full max-w-md">
                    <a
                        href="{{ 
                            route(
                                'modal', [
                                    'modal_id' => $modal_id, 
                                    'category' => $category, 
                                    'type_selected' => 'groups'
                                ]
                            )
                        }}"
                        class="flex-1 rounded-xl bg-indigo-500 px-4 py-3 text-center font-bold text-white shadow-md ring-2 ring-indigo-300 transition"
                    >
                        Grupos
                    </a>

                    <a
                        href="{{ 
                            route(
                                'modal', [
                                    'modal_id' => $modal_id, 
                                    'category' => $category, 
                                    'type_selected' => 'knockout'
                                ]
                            )
                        }}"
                        class="flex-1 rounded-xl px-4 py-3 text-center font-semibold text-slate-300 hover:bg-slate-700 transition"
                    >
                        Mata-mata
                    </a>
                </div>
            @elseif ($type_selected === 'knockout')
                <div class="flex gap-2 rounded-2xl bg-slate-800 p-1 shadow-inner w-full max-w-md">
                    <a
                        href="{{ route('modal', ['modal_id' => $modal_id, 'category' => $category, 'type_selected' => 'groups']) }}"
                        class="flex-1 rounded-xl px-4 py-3 text-center font-semibold text-slate-300 hover:bg-slate-700 transition"
                    >
                        Grupos
                    </a>

                    <a
                        href="{{ route('modal', ['modal_id' => $modal_id, 'category' => $category, 'type_selected' => 'knockout']) }}"
                        class="flex-1 rounded-xl bg-indigo-500 px-4 py-3 text-center font-bold text-white shadow-md ring-2 ring-indigo-300 transition"
                    >
                        Mata-mata
                    </a>

                </div>
            @endif
        @endif

        @if(Gate::allows('is-admin') && $modalType === 'group' && $type_selected === 'knockout')
            <div class="mt-3 mb-6 flex justify-center">
                <a
                    href=" {{ route('process.knockout', ['modal_id' => $modal_id, 'category' => $category]) }}"
                    class="
                        inline-flex items-center gap-2
                        rounded-xl
                        bg-yellow-400
                        px-5 py-2
                        text-sm font-bold text-slate-900
                        shadow-md
                        ring-2 ring-yellow-300
                        transition
                        hover:bg-yellow-500
                    "
                >
                    Gerar mata-mata
                </a>
            </div>
        @endif
    </section>

    @if ($modalType === 'group' && $type_selected === 'groups')   
        @foreach($groups as $key =>$group)
            <section class="rounded-2xl bg-slate-900/80 p-4 shadow-lg ring-1 ring-white/5">
                <!-- título + adicionar time -->
                <div class="mb-4 flex items-center justify-between">
                    <h2 class="text-lg font-semibold text-indigo-300">
                        Grupo {{ $key }}
                    </h2>

                    @if(Gate::allows('is-admin'))
                        <a
                            href="#"
                            class="rounded-xl bg-slate-800 px-3 py-2 text-xs font-semibold text-slate-300"
                        >
                            + Adicionar time
                        </a>
                    @endif
                </div>

                <!-- Ranking -->
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-slate-200">
                        <thead class="border-b border-slate-700 text-slate-400">
                            <tr>
                                <th class="py-3 text-left">Time</th>
                                <th class="px-2">Pts</th>
                                <th class="px-2">J</th>
                                <th class="px-2">V</th>
                                <th class="px-2">E</th>
                                <th class="px-2">D</th>
                                <th class="px-2">P:C</th>
                            </tr>
                        </thead>

                        <tbody>
                        @foreach($group['teams'] as $row)
                            <tr class="border-b border-slate-800 last:border-none">
                                <td class="py-3 font-medium text-white">
                                    {{ $row->team->name }}
                                </td>
                                <td class="text-center font-semibold text-indigo-300">
                                    {{ $row->points }}
                                </td>
                                <td class="text-center">{{ $row->played }}</td>
                                <td class="text-center">{{ $row->wins }}</td>
                                <td class="text-center">{{ $row->draws }}</td>
                                <td class="text-center">{{ $row->losses }}</td>
                                <td class="text-center">{{ $row->goals_for }}:{{ $row->goals_against}}</td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                </div>


                <!-- NOVO CARD JOGOS DO GRUPO -->
                <div class="mt-6">
                    <h3 class="mb-3 text-sm font-semibold uppercase tracking-wide text-indigo-300">
                        Jogos do Grupo
                    </h3>

                    <div class="space-y-3">
                        @foreach($group['games'] as $game)
                            <div class="rounded-xl bg-slate-800 p-3">
                                <div class="flex items-center justify-between">
                                    <span>
                                        {{ $game->teamOne->name }}
                                    </span>
                                    <!-- placar clicável -->
                                    @if(Gate::allows('is-admin'))
                                        <a
                                            href="{{ route('games.edit', ['game_id' => $game->id, 'category' => $category]) }}"
                                            class="rounded-lg bg-slate-700 px-3 py-1 font-semibold hover:bg-slate-600 transition"
                                        >
                                            {{ $game->team_one_points }} x {{ $game->team_two_points }}
                                        </a>
                                    @else
                                        <span class="rounded-lg bg-slate-700 px-3 py-1 font-semibold">
                                            {{ $game->team_one_points }} x {{ $game->team_two_points }}
                                        </span>
                                    @endif
                                    <span>
                                        {{ $game->teamTwo->name }}
                                    </span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endforeach
    @endif




    <!-- =========================
         MATA-MATA
    ==========================-->

    @if( ($modalType === 'group' && $type_selected === 'knockout') || $modalType === 'knockout')
        <section class="rounded-2xl bg-slate-900/80 p-5 shadow-lg ring-1 ring-white/5">
            <!-- QUARTAS -->
            {{-- <div class="mb-6">
                <h3 class="mb-3 text-sm font-semibold uppercase tracking-wide text-indigo-300">
                    Quartas
                </h3>

                <div class="space-y-3">

                    @foreach([
                        [21,'6A',3,'7D',1],
                        [22,'6B',2,'7C',0],
                        [23,'7A',1,'6D',0],
                        [24,'7B',4,'6C',2],
                    ] as $jogo)

                    <div class="rounded-xl bg-slate-800 p-3">
                        <div class="flex items-center justify-between">

                            <span>{{ $jogo[1] }}</span>

                            <a
                                href="{{ route('games.updateScore',$jogo[0]) }}"
                                class="rounded-lg bg-slate-700 px-3 py-1 font-semibold hover:bg-slate-600 transition"
                            >
                                {{ $jogo[2] }} x {{ $jogo[4] }}
                            </a>

                            <span>{{ $jogo[3] }}</span>

                        </div>
                    </div>

                    @endforeach

                </div>
            </div> --}}



            <!-- SEMI -->
            <div class="mb-6">
                <h3 class="mb-3 text-sm font-semibold uppercase tracking-wide text-indigo-300">
                    Semifinal
                </h3>

                <div class="space-y-3">

                    <div class="rounded-xl bg-slate-800 p-3">
                        <div class="flex items-center justify-between">
                            @if(!$knockoutGames->isEmpty())
                                <span>
                                    {{ $knockoutGames->get(0)->game->teamOne->name }}
                                </span>
                                <!-- placar clicável -->
                                @if(Gate::allows('is-admin'))
                                    <a
                                        href="{{ route('games.edit', ['game_id' => $knockoutGames->get(0)->game->id, 'category' => $category]) }}"
                                        class="rounded-lg bg-slate-700 px-3 py-1 font-semibold hover:bg-slate-600 transition"
                                    >
                                        {{ $knockoutGames->get(0)->game->team_one_points }} x {{ $knockoutGames->get(0)->game->team_two_points }}
                                    </a>
                                @else
                                    <span class="rounded-lg bg-slate-700 px-3 py-1 font-semibold">
                                        {{ $knockoutGames->get(0)->game->team_one_points }} x {{ $knockoutGames->get(0)->game->team_two_points }}
                                    </span>
                                @endif
                                <span>
                                    {{ $knockoutGames->get(0)->game->teamTwo->name }}
                                </span>
                            @else
                                <span>1º Grupo A</span>
                                    X
                                <span>2º Grupo B</span>
                            @endif
                        </div>
                    </div>


                    <div class="rounded-xl bg-slate-800 p-3">
                        <div class="flex items-center justify-between">
                            @if(!$knockoutGames->isEmpty())
                                <span>
                                    {{ $knockoutGames->get(1)->game->teamOne->name }}
                                </span>
                                <!-- placar clicável -->
                                @if(Gate::allows('is-admin'))
                                    <a
                                        href="{{ route('games.edit', ['game_id' => $knockoutGames->get(1)->game->id, 'category' => $category]) }}"
                                        class="rounded-lg bg-slate-700 px-3 py-1 font-semibold hover:bg-slate-600 transition"
                                    >
                                        {{ $knockoutGames->get(1)->game->team_one_points }} x {{ $knockoutGames->get(1)->game->team_two_points }}
                                    </a>
                                @else
                                    <span class="rounded-lg bg-slate-700 px-3 py-1 font-semibold">
                                        {{ $knockoutGames->get(1)->game->team_one_points }} x {{ $knockoutGames->get(1)->game->team_two_points }}
                                    </span>
                                @endif
                                <span>
                                    {{ $knockoutGames->get(1)->game->teamTwo->name }}
                                </span>
                            @else
                                <span>1º Grupo B</span>
                                X                                
                                <span>2º Grupo A</span>
                            @endif
                        </div>
                    </div>

                </div>
            </div>



            <!-- FINAL -->
            <div>
                <h3 class="mb-3 text-sm font-semibold uppercase tracking-wide text-yellow-300">
                    Final 🏆
                </h3>

                <div class="rounded-2xl bg-gradient-to-r from-slate-800 to-slate-700 p-4 shadow-lg">

                    <div class="flex items-center justify-between text-lg font-semibold">
                        @if(!$knockoutGames->isEmpty())
                            @if($knockoutGames->get(1)->winner !== null && $knockoutGames->get(0)->winner !== null)
                                <span>
                                    {{ $knockoutGames->get(2)->game->teamOne->name }}
                                </span>
                                <!-- placar clicável -->
                                @if(Gate::allows('is-admin'))
                                    <a
                                        href="{{ route('games.edit', ['game_id' => $knockoutGames->get(2)->game->id, 'category' => $category]) }}"
                                        class="rounded-lg bg-slate-700 px-3 py-1 font-semibold hover:bg-slate-600 transition"
                                    >
                                        {{ $knockoutGames->get(2)->game->team_one_points }} x {{ $knockoutGames->get(2)->game->team_two_points }}
                                    </a>
                                @else
                                    <span class="rounded-lg bg-slate-700 px-3 py-1 font-semibold">
                                        {{ $knockoutGames->get(2)->game->team_one_points }} x {{ $knockoutGames->get(2)->game->team_two_points }}
                                    </span>
                                @endif
                                <span>
                                    {{ $knockoutGames->get(2)->game->teamTwo->name }}
                                </span>
                            @else
                                <span>Semifinal 01</span>
                                X
                                <span>Semifinal 02</span>
                            @endif
                        @else
                            <span>Semifinal 01</span>
                            X
                            <span>Semifinal 02</span>
                        @endif
                    </div>

                    {{-- <p class="mt-3 text-center text-sm text-yellow-300">
                        {{$knockoutGames->get(2)->winner ?? 'Campeão ainda não definido'}}
                    </p> --}}

                </div>
            </div>

        </section>
    @endif
</div>

@endsection