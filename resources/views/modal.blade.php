@extends('layouts.app')

@section('content')

<div class="space-y-8 pb-8">

    <!-- HEADER -->
    <section class="text-center pt-2">
        <h1 class="text-2xl font-bold text-white">
            Tabela do Campeonato
        </h1>

        <p class="mt-2 text-sm text-slate-400">
            Fase de grupos e mata-mata
        </p>
    </section>


    <!-- =========================
         PARTE 1 — FASE DE GRUPOS
    ==========================-->

    @php
        $grupoA = [
            ['time'=>'6A','pts'=>9,'j'=>3,'v'=>3,'e'=>0,'d'=>0,'pc'=>'8:2'],
            ['time'=>'6B','pts'=>6,'j'=>3,'v'=>2,'e'=>0,'d'=>1,'pc'=>'6:4'],
            ['time'=>'6C','pts'=>3,'j'=>3,'v'=>1,'e'=>0,'d'=>2,'pc'=>'3:5'],
            ['time'=>'6D','pts'=>0,'j'=>3,'v'=>0,'e'=>0,'d'=>3,'pc'=>'1:7'],
        ];

        $grupoB = [
            ['time'=>'7A','pts'=>7,'j'=>3,'v'=>2,'e'=>1,'d'=>0,'pc'=>'7:3'],
            ['time'=>'7B','pts'=>5,'j'=>3,'v'=>1,'e'=>2,'d'=>0,'pc'=>'5:4'],
            ['time'=>'7C','pts'=>3,'j'=>3,'v'=>1,'e'=>0,'d'=>2,'pc'=>'4:6'],
            ['time'=>'7D','pts'=>1,'j'=>3,'v'=>0,'e'=>1,'d'=>2,'pc'=>'2:5'],
        ];
    @endphp


    @foreach([
        'Grupo A' => $grupoA,
        'Grupo B' => $grupoB
    ] as $nomeGrupo => $grupo)

    <section class="rounded-2xl bg-slate-900/80 p-4 shadow-lg ring-1 ring-white/5">

        <div class="mb-4 flex items-center justify-between">
            <h2 class="text-lg font-semibold text-indigo-300">
                {{ $nomeGrupo }}
            </h2>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm text-slate-200">
                <thead class="border-b border-slate-700 text-slate-400">
                    <tr>
                        <th class="py-3 text-left">Time</th>
                        <th class="px-2">Pts</th>
                        <th class="px-2">J</th>
                        <th class="px-2">V</th>
                        <th class="px-2">E</th>
                        <th class="px-2">D</th>
                        <th class="px-2">P:C</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($grupo as $row)
                    <tr class="border-b border-slate-800 last:border-none">
                        <td class="py-3 font-medium text-white">
                            {{ $row['time'] }}
                        </td>

                        <td class="text-center font-semibold text-indigo-300">
                            {{ $row['pts'] }}
                        </td>

                        <td class="text-center">{{ $row['j'] }}</td>
                        <td class="text-center">{{ $row['v'] }}</td>
                        <td class="text-center">{{ $row['e'] }}</td>
                        <td class="text-center">{{ $row['d'] }}</td>
                        <td class="text-center">{{ $row['pc'] }}</td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>

    </section>

    @endforeach



    <!-- =========================
         PARTE 2 — MATA-MATA
    ==========================-->

    <section class="rounded-2xl bg-slate-900/80 p-5 shadow-lg ring-1 ring-white/5">

        <div class="mb-6 text-center">
            <h2 class="text-xl font-semibold text-white">
                Mata-mata
            </h2>
        </div>


        <!-- QUARTAS -->
        <div class="mb-6">
            <h3 class="mb-3 text-sm font-semibold uppercase tracking-wide text-indigo-300">
                Quartas
            </h3>

            <div class="space-y-3">
                @foreach([
                    ['6A',3,'7D',1],
                    ['6B',2,'7C',0],
                    ['7A',1,'6D',0],
                    ['7B',4,'6C',2],
                ] as $jogo)

                <div class="rounded-xl bg-slate-800 p-3">
                    <div class="flex items-center justify-between">
                        <span>{{ $jogo[0] }}</span>

                        <span class="rounded-lg bg-slate-700 px-3 py-1 font-semibold">
                            {{ $jogo[1] }} x {{ $jogo[3] }}
                        </span>

                        <span>{{ $jogo[2] }}</span>
                    </div>
                </div>

                @endforeach
            </div>
        </div>


        <!-- SEMI -->
        <div class="mb-6">
            <h3 class="mb-3 text-sm font-semibold uppercase tracking-wide text-indigo-300">
                Semifinal
            </h3>

            <div class="space-y-3">

                <div class="rounded-xl bg-slate-800 p-3">
                    <div class="flex items-center justify-between">
                        <span>6A</span>
                        <span class="rounded-lg bg-slate-700 px-3 py-1 font-semibold">
                            2 x 1
                        </span>
                        <span>6B</span>
                    </div>
                </div>

                <div class="rounded-xl bg-slate-800 p-3">
                    <div class="flex items-center justify-between">
                        <span>7B</span>
                        <span class="rounded-lg bg-slate-700 px-3 py-1 font-semibold">
                            3 x 2
                        </span>
                        <span>7A</span>
                    </div>
                </div>

            </div>
        </div>


        <!-- FINAL -->
        <div>
            <h3 class="mb-3 text-sm font-semibold uppercase tracking-wide text-yellow-300">
                Final 🏆
            </h3>

            <div class="rounded-2xl bg-gradient-to-r from-slate-800 to-slate-700 p-4 shadow-lg">
                <div class="flex items-center justify-between text-lg font-semibold">
                    <span>6A</span>

                    <span class="rounded-xl bg-yellow-400 px-4 py-2 text-slate-900">
                        2 x 1
                    </span>

                    <span>7B</span>
                </div>

                <p class="mt-3 text-center text-sm text-yellow-300">
                    Campeão: 6A
                </p>
            </div>
        </div>

    </section>

</div>

@endsection