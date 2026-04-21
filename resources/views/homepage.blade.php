<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, viewport-fit=cover">

        <title>Homepage</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="min-h-dvh bg-slate-950 text-slate-100 antialiased">
        <main class="mx-auto min-h-dvh w-full max-w-lg px-4 pb-24 pt-5">
            <header class="mb-4">
                <h1 class="text-xl font-bold">Classificação de Equipes</h1>
                <p class="text-sm text-slate-400">Ouro, prata, bronze e pontuação total.</p>
            </header>

            <section data-section="ranking" class="rounded-2xl border border-slate-700 bg-slate-900/70 p-3 shadow-xl">
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
                                    <td class="px-2 py-2 font-medium">{{ $team['team'] }}</td>
                                    <td class="px-2 py-2 text-center">{{ $team['gold'] }}</td>
                                    <td class="px-2 py-2 text-center">{{ $team['silver'] }}</td>
                                    <td class="px-2 py-2 text-center">{{ $team['bronze'] }}</td>
                                    <td class="px-2 py-2 text-center font-semibold text-emerald-300">{{ $team['points'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </section>

            <section data-section="option-2" class="hidden rounded-2xl border border-slate-700 bg-slate-900/70 p-5 shadow-xl">
                <p class="text-sm text-slate-300">Opção 2 (placeholder)</p>
            </section>
            <section data-section="option-3" class="hidden rounded-2xl border border-slate-700 bg-slate-900/70 p-5 shadow-xl">
                <p class="text-sm text-slate-300">Opção 3 (placeholder)</p>
            </section>
            <section data-section="option-4" class="hidden rounded-2xl border border-slate-700 bg-slate-900/70 p-5 shadow-xl">
                <p class="text-sm text-slate-300">Opção 4 (placeholder)</p>
            </section>
            <section data-section="option-5" class="hidden rounded-2xl border border-slate-700 bg-slate-900/70 p-5 shadow-xl">
                <p class="text-sm text-slate-300">Opção 5 (placeholder)</p>
            </section>
        </main>

        <nav class="fixed inset-x-0 bottom-0 z-20 border-t border-slate-700 bg-slate-900/95 backdrop-blur" aria-label="Navegação inferior">
            <ul class="mx-auto grid w-full max-w-lg grid-cols-5 gap-1 p-2">
                <li><button type="button" data-tab="ranking" class="w-full rounded-lg bg-indigo-500/20 px-2 py-2 text-[11px] font-medium text-indigo-200">Função 1</button></li>
                <li><button type="button" data-tab="option-2" class="w-full rounded-lg px-2 py-2 text-[11px] font-medium text-slate-300">Função 2</button></li>
                <li><button type="button" data-tab="option-3" class="w-full rounded-lg px-2 py-2 text-[11px] font-medium text-slate-300">Função 3</button></li>
                <li><button type="button" data-tab="option-4" class="w-full rounded-lg px-2 py-2 text-[11px] font-medium text-slate-300">Função 4</button></li>
                <li><button type="button" data-tab="option-5" class="w-full rounded-lg px-2 py-2 text-[11px] font-medium text-slate-300">Função 5</button></li>
            </ul>
        </nav>

        <script>
            (() => {
                const tabs = Array.from(document.querySelectorAll('[data-tab]'));
                const sections = Array.from(document.querySelectorAll('[data-section]'));

                const activate = (target) => {
                    sections.forEach((section) => {
                        section.classList.toggle('hidden', section.dataset.section !== target);
                    });

                    tabs.forEach((tab) => {
                        const active = tab.dataset.tab === target;
                        tab.classList.toggle('bg-indigo-500/20', active);
                        tab.classList.toggle('text-indigo-200', active);
                        tab.classList.toggle('text-slate-300', !active);
                    });
                };

                tabs.forEach((tab) => {
                    tab.addEventListener('click', () => activate(tab.dataset.tab));
                });

                activate('ranking');
            })();
        </script>
    </body>
</html>
<div>
    <!-- I have not failed. I've just found 10,000 ways that won't work. - Thomas Edison -->
</div>
