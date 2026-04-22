<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Modal;

class ModalSeeder extends Seeder
{
    public function run()
    {
        $modalidades = [
            ['name' => 'Futebol masculino', 'gender' => 'male'],
            ['name' => 'Futebol feminino', 'gender' => 'female'],
            ['name' => 'Volei quadra misto', 'gender' => 'mixed'],
            ['name' => 'Volei areia misto', 'gender' => 'mixed'],
            ['name' => 'Handball misto', 'gender' => 'mixed'],
            ['name' => 'Futsal masculino', 'gender' => 'male'],
            ['name' => 'Basquete misto', 'gender' => 'mixed'],
            ['name' => 'Queimada misto', 'gender' => 'mixed'],
            ['name' => 'Gincana misto', 'gender' => 'mixed'],
            ['name' => 'Arrecadação de alimentos', 'gender' => 'mixed'],
            ['name' => 'Arte Parede da Quadra', 'gender' => 'mixed'],
            ['name' => 'Xadrez', 'gender' => 'mixed'],
            ['name' => 'FIFA', 'gender' => 'mixed'],
        ];

        foreach ($modalidades as $modal) {
            Modal::create($modal);
        }
    }
}
