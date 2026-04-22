@extends('layouts.app')

@section('content')

<div class="flex min-h-[80vh] flex-col items-center justify-center">

    <!-- Título -->
    <h1 class="mb-8 text-2xl font-semibold text-white">
        Acesso administrativo
    </h1>

    <!-- Card -->
    <div class="w-full rounded-2xl border border-slate-700 bg-slate-900/80 p-6 shadow-lg backdrop-blur">

        <form method="POST" action="{{ route('submit.login') }}">
            @csrf

            <!-- Email -->
            <div class="mb-5">
                <label class="mb-2 block text-sm text-slate-400">
                    Email
                </label>

                <input
                    type="text"
                    name="email"
                    class="w-full rounded-xl bg-slate-800 px-4 py-3 text-white outline-none ring-1 ring-slate-600 focus:ring-slate-400"
                    placeholder="admin@email.com"
                >

                @error('email')
                    <p class="mt-2 text-sm text-red-500">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- Senha -->
            <div class="mb-6">
                <label class="mb-2 block text-sm text-slate-400">
                    Senha
                </label>

                <div class="relative">
                    <input
                        type="password"
                        name="password"
                        id="password"
                        class="w-full rounded-xl bg-slate-800 px-4 py-3 pr-12 text-white outline-none ring-1 ring-slate-600 focus:ring-slate-400"
                        placeholder="entre 8 e 16 caracteres"
                    >

                    <!-- Ícone simples -->
                    <button
                        type="button"
                        onclick="togglePassword()"
                        class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-500 hover:text-slate-300 transition"
                    >
                        <span id="eyeEmoji" style="font-size: 2em">
                            😐
                        </span>
                    </button>
                </div>

                @error('password')
                    <p class="mt-2 text-sm text-red-500">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            @if(session('loginError'))
                <div class="mb-4 rounded-lg bg-red-500/20 p-4 text-sm text-red-500">
                    {{ session('loginError') }}
                </div>
            @endif

            <!-- Botão -->
            <button
                type="submit"
                class="w-full rounded-xl bg-slate-800 px-6 py-3 font-medium text-white transition hover:bg-slate-700 active:scale-[0.99]"
            >
                Entrar
            </button>

        </form>
    </div>

</div>

@endsection


<script>
    function togglePassword() {
    const input = document.getElementById('password');
    const icon = document.getElementById('eyeEmoji');

    if (input.type === 'password') {
        input.type = 'text';
        icon.textContent = '😑';
    } else {
        input.type = 'password';
        icon.textContent = '😐';
    }
}
</script>