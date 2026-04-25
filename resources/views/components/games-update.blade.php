@extends('layouts.app')

@section('content')

<div class="space-y-5">

    <!-- Voltar -->
    <div>
        <a
            href="{{ route('homepage', ['section' => 'option-3']) }}"
            class="inline-flex items-center gap-2 rounded-xl bg-slate-900/80 px-4 py-2 text-sm text-slate-300 ring-1 ring-white/5"
        >
            ← Voltar
        </a>
    </div>


    <div class="rounded-2xl bg-slate-900/80 p-4 shadow-lg ring-1 ring-white/5 backdrop-blur">

        <form method="POST" action="{{ route('games.updateScore', ['game_id' => $game->id]) }}">
            @csrf
            @method('PATCH')

            <!-- header -->
            <div class="mb-3 flex items-center justify-between text-sm text-slate-400">

                <span>
                    🕒 {{ $game->date }}
                </span>

                <span>
                    📍 {{ $game->place->name }}
                </span>

            </div>


            <!-- modalidade -->
            <div class="mb-6 text-lg font-semibold text-indigo-400">
                {{ $game->modal->name }}
            </div>



            <!-- confronto -->
            <div class="flex items-center justify-center gap-4">

                <!-- TIME 1 -->
                <div class="flex flex-col items-center gap-2">

                    <img
                        src="{{ $game->teamOne->logo }}"
                        class="h-14 w-14 rounded-full object-cover ring-2 ring-slate-700"
                    >

                    <span class="text-white">
                        {{ $game->teamOne->name }}
                    </span>

                    <input
                        name="team_one_points"
                        value="{{ old('team_one_points',$game->team_one_points) }}"
                        @disabled(!$editing)
                        class="
                            w-14 rounded-lg
                            bg-slate-800
                            text-center
                            text-lg
                            font-semibold
                            text-white
                            ring-1 ring-slate-700
                            disabled:opacity-90
                            disabled:bg-slate-800
                        "
                    >
                </div>



                <div class="mt-6 text-slate-400 font-semibold">
                    VS
                </div>



                <!-- TIME 2 -->
                <div class="flex flex-col items-center gap-2">

                    <img
                        src="{{ $game->teamTwo->logo }}"
                        class="h-14 w-14 rounded-full object-cover ring-2 ring-slate-700"
                    >

                    <span class="text-white">
                        {{ $game->teamTwo->name }}
                    </span>

                    <input
                        name="team_two_points"
                        value="{{ old('team_two_points',$game->team_two_points) }}"
                        @disabled(!$editing)
                        class="
                            w-14 rounded-lg
                            bg-slate-800
                            text-center
                            text-lg
                            font-semibold
                            text-white
                            ring-1 ring-slate-700
                            disabled:opacity-90
                            disabled:bg-slate-800
                        "
                    >
                </div>
            </div>


            <!-- ação canto inferior direito -->
            <div class="mt-5">
                @if(!$editing)
                    <a
                        href="{{ route('games.edit',[
                            'game'=>$game->id,
                            'edit'=>1
                        ]) }}"
                        class="
                            block w-full rounded-2xl
                            bg-indigo-500/20
                            py-4
                            text-center
                            font-semibold
                            text-indigo-200
                            ring-1 ring-indigo-400/30
                            transition
                            hover:bg-indigo-500/30
                        "
                    >
                        Editar placar
                    </a>
                @else
                    <button
                        type="submit"
                        class="
                            w-full rounded-2xl
                            bg-emerald-500/20
                            py-4
                            font-semibold
                            text-emerald-300
                            ring-1 ring-emerald-400/30
                            transition
                            hover:bg-emerald-500/30
                        "
                    >
                        Salvar placar
                    </button>
                @endif
            </div>

            @error('game_id')
                <p class="mt-2 text-sm text-red-500">
                    {{ $message }}
                </p>
            @enderror
            @error('team_one_points')
                <p class="mt-2 text-sm text-red-500">
                    {{ $message }}
                </p>
            @enderror
            @error('team_two_points')
                <p class="mt-2 text-sm text-red-500">
                    {{ $message }}
                </p>
            @enderror
            @if(session('success'))
                <p class="mt-2 text-sm text-green-500">
                    {{ session('success') }}
                </p>
            @endif
        </form>


    </div>

</div>

@endsection