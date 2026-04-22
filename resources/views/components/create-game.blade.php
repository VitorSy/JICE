<div class="w-full rounded-2xl border border-slate-700 bg-slate-900/80 p-6 shadow-lg backdrop-blur">

    <h2 class="mb-6 text-lg font-semibold text-white">
        Criar jogo
    </h2>

    <form method="POST" action="{{ route('games.store') }}" class="space-y-5">
        @csrf

        <!-- Modalidade -->
        <div>
            <label class="mb-2 block text-sm text-slate-400">Modalidade</label>
            <select name="modal_id"
                class="w-full rounded-xl bg-slate-800 px-4 py-3 text-white ring-1 ring-slate-600 focus:ring-slate-400">
                @foreach ($modals as $modal)
                    <option value="{{ $modal->id }}">{{ $modal->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Time 1 -->
        <div>
            <label class="mb-2 block text-sm text-slate-400">Time 01</label>
            <select name="team_one_id"
                class="w-full rounded-xl bg-slate-800 px-4 py-3 text-white ring-1 ring-slate-600 focus:ring-slate-400">
                @foreach ($teams as $team)
                    <option value="{{ $team->id }}">{{ $team->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Time 2 -->
        <div>
            <label class="mb-2 block text-sm text-slate-400">Time 02</label>
            <select name="team_two_id"
                class="w-full rounded-xl bg-slate-800 px-4 py-3 text-white ring-1 ring-slate-600 focus:ring-slate-400">
                @foreach ($teams as $team)
                    <option value="{{ $team->id }}">{{ $team->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Local -->
        <div>
            <label class="mb-2 block text-sm text-slate-400">Local</label>
            <select name="place_id"
                class="w-full rounded-xl bg-slate-800 px-4 py-3 text-white ring-1 ring-slate-600 focus:ring-slate-400">
                @foreach ($places as $place)
                    <option value="{{ $place->id }}">{{ $place->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Data e Hora -->
        <div>
            <label class="mb-2 block text-sm text-slate-400">Dia e hora</label>
            <input type="datetime-local" name="date"
                class="w-full rounded-xl bg-slate-800 px-4 py-3 text-white ring-1 ring-slate-600 focus:ring-slate-400">
        </div>

        <!-- Botão -->
        <button type="submit"
            class="w-full rounded-xl bg-slate-800 px-6 py-3 font-medium text-white transition hover:bg-slate-700 active:scale-[0.99]">
            Criar jogo
        </button>

    </form>
</div>