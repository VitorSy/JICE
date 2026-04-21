<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, viewport-fit=cover">

        <title>Escolha seu time</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* From Uiverse.io by PriyanshuGupta28 */ 
        .pushable {
        position: relative;
        background: transparent;
        padding: 0px;
        border: none;
        cursor: pointer;
        outline-offset: 4px;
        outline-color: deeppink;
        transition: filter 250ms;
        -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
        }

        .shadow {
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
        background: hsl(226, 25%, 69%);
        border-radius: 8px;
        filter: blur(2px);
        will-change: transform;
        transform: translateY(2px);
        transition: transform 600ms cubic-bezier(0.3, 0.7, 0.4, 1);
        }

        .edge {
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
        border-radius: 8px;
        background: linear-gradient(
            to right,
            hsl(248, 39%, 39%) 0%,
            hsl(248, 39%, 49%) 8%,
            hsl(248, 39%, 39%) 92%,
            hsl(248, 39%, 29%) 100%
        );
        }

        .front {
        display: block;
        position: relative;
        border-radius: 8px;
        background: hsl(248, 53%, 58%);
        padding: 16px 32px;
        color: white;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        font-size: 1rem;
        transform: translateY(-4px);
        transition: transform 600ms cubic-bezier(0.3, 0.7, 0.4, 1);
        }

        .pushable:hover {
        filter: brightness(110%);
        }

        .pushable:hover .front {
        transform: translateY(-6px);
        transition: transform 250ms cubic-bezier(0.3, 0.7, 0.4, 1.5);
        }

        .pushable:active .front {
        transform: translateY(-2px);
        transition: transform 34ms;
        }

        .pushable:hover .shadow {
        transform: translateY(4px);
        transition: transform 250ms cubic-bezier(0.3, 0.7, 0.4, 1.5);
        }

        .pushable:active .shadow {
        transform: translateY(1px);
        transition: transform 34ms;
        }

        .pushable:focus:not(:focus-visible) {
        outline: none;
        }

    </style>
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
                                    class="mx-auto block min-h-52 w-full rounded-2xl border border-indigo-300/30 bg-indigo-500/10 px-5 py-8 text-center text-xl font-semibold leading-tight text-indigo-100 transition active:scale-[0.99]"
                                >
                                    {{ $team }}
                                </button>
                            </li>
                        @endforeach
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
            <!-- From Uiverse.io by PriyanshuGupta28 --> 
            <div class="text-center mt-5">
                <a href="{{ route('homepage') }}" class="pushable">
                    <span class="shadow"></span>
                    <span class="edge"></span>
                    <span class="front"> Continuar </span>
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

                if (!track || !prevButton || !nextButton || !counter) {
                    return;
                }

                const slides = Array.from(track.children);
                let currentIndex = 0;
                let touchStartX = 0;
                let touchEndX = 0;

                const render = () => {
                    track.style.transform = `translateX(-${currentIndex * 100}%)`;
                    counter.textContent = `${currentIndex + 1} / ${slides.length}`;
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
