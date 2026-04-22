@extends('layouts.app')

<main class="mx-auto min-h-dvh w-full max-w-md px-4 py-6">

    <!-- Top bar -->
    <div class="mb-6 flex items-center justify-between">

        <!-- Voltar -->
        <a href="{{ route('homepage', ['section' => 'option-2']) }}"
           class="flex h-10 w-10 items-center justify-center rounded-full bg-slate-900/80 text-white shadow ring-1 ring-white/10 hover:bg-slate-800">
            ←
        </a>

        <!-- Instagram -->
        <a href="{{ $team->instagram }}"
           target="_blank"
           class="flex h-10 w-10 items-center justify-center rounded-full bg-slate-900/80 text-pink-400 shadow ring-1 ring-white/10 hover:bg-slate-800">
            📸
        </a>

    </div>

    <!-- Logo + Nome -->
    <div class="mb-6 text-center">
        <img src="{{ $team->logo }}"
             class="mx-auto mb-4 h-20 w-20 rounded-full ring-4 ring-slate-700">

        <h1 class="text-2xl font-bold text-white">
            {{ $team->name }}
        </h1>
    </div>

    <!-- Descrição -->
    <div class="mb-6 rounded-2xl bg-slate-900/80 p-4 text-slate-300 shadow-lg ring-1 ring-white/5">
        {{ $team->description }}
    </div>

    <!-- Navbar inferior -->
    <div class="fixed bottom-4 left-1/2 w-full max-w-md -translate-x-1/2 px-4">
        <div class="flex justify-between rounded-2xl bg-slate-900/90 p-2 shadow-2xl ring-1 ring-white/10 backdrop-blur">

            <button class="flex-1 rounded-xl py-2 text-sm text-slate-400 hover:text-white">
                Calendário
            </button>

            <button class="flex-1 rounded-xl bg-indigo-500 py-2 text-sm text-white">
                Descrição
            </button>

            <button class="flex-1 rounded-xl py-2 text-sm text-slate-400 hover:text-white">
                Resultados
            </button>

        </div>
    </div>