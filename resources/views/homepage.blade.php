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
            

            <section data-section="ranking" class="rounded-2xl border border-slate-700 bg-slate-900/70 p-3 shadow-xl">
                <header class="mb-4">
                    <h1 class="text-xl font-bold">Classificação de Equipes</h1>
                    <p class="text-sm text-slate-400">Ouro, prata, bronze e pontuação total.</p>
                </header>
                <x-ranking :ranking="$kidRanking" />
                <br>
                <br>
                <br>
                <x-ranking :ranking="$teenRanking" />
            </section>
            <section data-section="option-2" class="hidden rounded-2xl border border-slate-700 bg-slate-900/70 p-5 shadow-xl">
                <x-teams :teams="$teams" />
            </section>
            <section data-section="option-3" class="hidden rounded-2xl border border-slate-700 bg-slate-900/70 p-5 shadow-xl">
                <p class="text-sm text-slate-300">Jogos</p>
                <x-games />
            </section>
            <section data-section="option-4" class="hidden rounded-2xl border border-slate-700 bg-slate-900/70 p-5 shadow-xl">
                <x-modals />
            </section>
            @if (Gate::allows('is-admin'))
                <section data-section="option-5" class="hidden rounded-2xl border border-slate-700 bg-slate-900/70 p-5 shadow-xl">
                <h2>Admin</h2>
                <x-logout />
                <x-create-game :teams="$teams"/>
                </section>
            @endif
        </main>

        <nav class="fixed inset-x-0 bottom-0 z-20 border-t border-slate-700 bg-slate-900/95 backdrop-blur" aria-label="Navegação inferior">
            @if (Gate::allows('is-admin'))
                <ul class="mx-auto grid w-full max-w-lg grid-cols-5 gap-1 p-2">
            @else
                <ul class="mx-auto grid w-full max-w-lg grid-cols-4 gap-1 p-2">
            @endif
                <li><button type="button" data-tab="ranking" class="w-full rounded-lg bg-indigo-500/20 px-2 py-2 text-[11px] font-medium text-indigo-200">Home</button></li>
                <li><button type="button" data-tab="option-2" class="w-full rounded-lg px-2 py-2 text-[11px] font-medium text-slate-300">Times</button></li>
                <li><button type="button" data-tab="option-3" class="w-full rounded-lg px-2 py-2 text-[11px] font-medium text-slate-300">Calendário</button></li>
                <li><button type="button" data-tab="option-4" class="w-full rounded-lg px-2 py-2 text-[11px] font-medium text-slate-300">Modalidades</button></li>
                @if (Gate::allows('is-admin'))
                    <li><button type="button" data-tab="option-5" class="w-full rounded-lg px-2 py-2 text-[11px] font-medium text-slate-300">Admin</button></li>    
                @endif
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
