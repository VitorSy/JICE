
<div class="overflow-hidden rounded-xl border border-slate-700">
    <table class="w-full text-xs sm:text-sm">
        <thead class="bg-slate-800/90 text-slate-200">
            <tr>
                <th class="px-2 py-2 text-left">#</th>
                <th class="px-2 py-2 text-left">Equipe</th>
                <th class="px-2 py-2 text-center">🥇</th>
                <th class="px-2 py-2 text-center">🥈</th>
                <th class="px-2 py-2 text-center">🥉</th>
                <th class="px-2 py-2 text-center">Pts</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ranking as $index => $team)
                <tr class="border-t border-slate-700/80 {{ $index % 2 === 0 ? 'bg-slate-900/50' : 'bg-slate-900/30' }}">
                    <td class="px-2 py-2 font-semibold text-indigo-300">{{ $index + 1 }}</td>
                    <td class="px-2 py-2 font-medium">{{ $team->name }}</td>
                    <td class="px-2 py-2 text-center">{{ $team->gold }}</td>
                    <td class="px-2 py-2 text-center">{{ $team->silver }}</td>
                    <td class="px-2 py-2 text-center">{{ $team->bronze }}</td>
                    <td class="px-2 py-2 text-center font-semibold text-emerald-300">{{ $team->points }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
