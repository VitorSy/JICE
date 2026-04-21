<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Escolha seu time</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="min-h-screen bg-slate-950 text-slate-100">
        <main class="mx-auto flex min-h-screen w-full max-w-6xl flex-col items-center justify-center px-4 py-10">
            <h1 class="mb-8 text-center text-3xl font-bold tracking-tight md:text-4xl">Escolha um time</h1>

            <section class="relative w-full" aria-label="Carrossel de times">
                <div id="teams-carousel" class="overflow-hidden rounded-2xl border border-slate-700 bg-slate-900/60 shadow-2xl">
                    <ul class="flex transition-transform duration-500 ease-in-out" data-track>
                        @foreach ($teams as $team)
                            <li class="w-full shrink-0 p-8 sm:p-12">
                                <button
                                    type="button"
                                    class="mx-auto block w-full max-w-md rounded-xl border border-indigo-400/30 bg-indigo-500/10 px-6 py-10 text-center text-2xl font-semibold text-indigo-100 transition hover:border-indigo-300 hover:bg-indigo-500/20 focus:outline-none focus:ring-2 focus:ring-indigo-300"
                                >
                                    {{ $team }}
                                </button>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="mt-6 flex items-center justify-center gap-3">
                    <button
                        type="button"
                        data-prev
                        class="rounded-lg border border-slate-600 bg-slate-800 px-4 py-2 text-sm font-medium hover:bg-slate-700"
                    >
                        Anterior
                    </button>
                    <span class="text-sm text-slate-300" data-counter>1 / {{ count($teams) }}</span>
                    <button
                        type="button"
                        data-next
                        class="rounded-lg border border-slate-600 bg-slate-800 px-4 py-2 text-sm font-medium hover:bg-slate-700"
                    >
                        Próximo
                    </button>
                </div>
            </section>
        </main>

        <script>
            (() => {
                const carousel = document.getElementById('teams-carousel');
                const track = carousel?.querySelector('[data-track]');
                const prevButton = document.querySelector('[data-prev]');
                const nextButton = document.querySelector('[data-next]');
                const counter = document.querySelector('[data-counter]');

                if (!track || !prevButton || !nextButton || !counter) {
                    return;
                }

                const slides = Array.from(track.children);
                let currentIndex = 0;

                const render = () => {
                    track.style.transform = `translateX(-${currentIndex * 100}%)`;
                    counter.textContent = `${currentIndex + 1} / ${slides.length}`;
                };

                prevButton.addEventListener('click', () => {
                    currentIndex = (currentIndex - 1 + slides.length) % slides.length;
                    render();
                });

                nextButton.addEventListener('click', () => {
                    currentIndex = (currentIndex + 1) % slides.length;
                    render();
                });
            })();
        </script>
    </body>
</html>
