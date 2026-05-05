<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, viewport-fit=cover">

        <title>Escolha seu time</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="min-h-dvh bg-slate-950 text-slate-100 antialiased">
        <main class="mx-auto flex min-h-dvh w-full max-w-md flex-col justify-center px-4 py-6 sm:max-w-lg">
            <h1 class="mb-5 text-center text-2xl font-bold tracking-tight">Escolha um time</h1>

            <section class="relative w-full" aria-label="Carrossel de times">
                <div id="teams-carousel" class="relative overflow-hidden rounded-2xl border border-slate-700 bg-slate-900/80 shadow-2xl">
                    <ul class="flex touch-pan-y transition-transform duration-500 ease-out" data-track>
                        @foreach ($teams as $team)
                            <li class="w-full shrink-0 p-5">
                                <button
                                    type="button"
                                    class="mx-auto flex min-h-52 w-full items-center justify-center rounded-2xl border border-indigo-300/30 bg-indigo-500/10 px-5 py-8 text-center text-xl font-semibold leading-tight text-indigo-100 transition active:scale-[0.99]"
                                >
                                    <img 
                                        src="{{ asset('assets/images/' . $team->logo) }}" 
                                        alt=""
                                        class="max-h-24"
                                    >
                                </button>
                            </li>
                        @endforeach
                        <li class="w-full shrink-0 p-5">
                            <a
                                href="{{ route('login') }}"
                                type="button"
                                class="mx-auto block min-h-52 w-full rounded-2xl border border-indigo-300/30 bg-indigo-500/10 px-5 py-8 text-center text-xl font-semibold leading-tight text-indigo-100 transition active:scale-[0.99]">
                                <img src="" alt="">
                                <span>Coordenação</span>
                            </a>
                        </li>
                    </ul>

                    <button
                        type="button"
                        aria-label="Voltar time"
                        data-prev
                        class="absolute left-2 top-1/2 z-10 -translate-y-1/2 rounded-full bg-slate-900/70 p-3 text-white shadow-lg ring-1 ring-slate-500/70 backdrop-blur hover:bg-slate-800/90 active:scale-95"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M11.79 14.77a.75.75 0 0 1-1.06 0L6.5 10.53a.75.75 0 0 1 0-1.06l4.23-4.24a.75.75 0 1 1 1.06 1.06L8.09 10l3.7 3.71a.75.75 0 0 1 0 1.06Z" clip-rule="evenodd"/>
                        </svg>
                    </button>

                    <button
                        type="button"
                        aria-label="Avançar time"
                        data-next
                        class="absolute right-2 top-1/2 z-10 -translate-y-1/2 rounded-full bg-slate-900/70 p-3 text-white shadow-lg ring-1 ring-slate-500/70 backdrop-blur hover:bg-slate-800/90 active:scale-95"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M8.21 5.23a.75.75 0 0 1 1.06 0l4.23 4.24a.75.75 0 0 1 0 1.06l-4.23 4.24a.75.75 0 0 1-1.06-1.06L11.91 10 8.2 6.29a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd"/>
                        </svg>
                    </button>
                </div>
            </section>
            <div class="relative inline-flex items-center justify-center gap-4 group mt-6">
                <div
                    class="absolute inset-0 duration-1000 opacity-60 transitiona-all bg-gradient-to-r from-indigo-500 via-pink-500 to-yellow-400 rounded-xl blur-lg filter group-hover:opacity-100 group-hover:duration-200"
                ></div>
                <a
                    role="button"
                    class="group relative inline-flex items-center justify-center text-base rounded-xl bg-gray-900 px-8 py-3 font-semibold text-white transition-all duration-200 hover:bg-gray-800 hover:shadow-lg hover:-translate-y-0.5 hover:shadow-gray-600/30"
                    title="payment"
                    href="{{ route('homepage', ['section' => 'ranking']) }}"
                    >Selecionar<svg
                    aria-hidden="true"
                    viewBox="0 0 10 10"
                    height="10"
                    width="10"
                    fill="none"
                    class="mt-0.5 ml-2 -mr-1 stroke-white stroke-2"
                    >
                    <path
                        d="M0 5h7"
                        class="transition opacity-0 group-hover:opacity-100"
                    ></path>
                    <path
                        d="M1 1l4 4-4 4"
                        class="transition group-hover:translate-x-[3px]"
                    ></path>
                    </svg>
                </a>
            </div>

            

        </main>

        <script>
            (() => {
                const carousel = document.getElementById('teams-carousel');
                const track = carousel?.querySelector('[data-track]');
                const prevButton = carousel?.querySelector('[data-prev]');
                const nextButton = carousel?.querySelector('[data-next]');
                const counter = document.querySelector('[data-counter]');

                if (!track || !prevButton || !nextButton) {
                    return;
                }

                const slides = Array.from(track.children);
                let currentIndex = 0;
                let touchStartX = 0;
                let touchEndX = 0;

                const render = () => {
                    track.style.transform = `translateX(-${currentIndex * 100}%)`;
                };

                const goPrev = () => {
                    currentIndex = (currentIndex - 1 + slides.length) % slides.length;
                    render();
                };

                const goNext = () => {
                    currentIndex = (currentIndex + 1) % slides.length;
                    render();
                };

                prevButton.addEventListener('click', goPrev);
                nextButton.addEventListener('click', goNext);

                track.addEventListener('touchstart', (event) => {
                    touchStartX = event.changedTouches[0].clientX;
                }, { passive: true });

                track.addEventListener('touchend', (event) => {
                    touchEndX = event.changedTouches[0].clientX;
                    const distance = touchEndX - touchStartX;

                    if (Math.abs(distance) < 35) {
                        return;
                    }

                    if (distance > 0) {
                        goPrev();
                        return;
                    }

                    goNext();
                }, { passive: true });
            })();
        </script>
    </body>
</html>
