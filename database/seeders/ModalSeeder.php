<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Modal;

class ModalSeeder extends Seeder
{
    public function run()
    {
        $modalidades = [
            [
                'name' => 'Futebol masculino',
                'gender' => 'male',
                'icon' => '⚽',
            ],
            [
                'name' => 'Futebol feminino',
                'gender' => 'female',
                'icon' => '⚽',
            ],
            [
                'name' => 'Volei quadra misto',
                'gender' => 'mixed',
                'icon' => '🏐',
            ],
            [
                'name' => 'Volei areia misto',
                'gender' => 'mixed',
                'icon' => '🏖️',
            ],
            [
                'name' => 'Handball misto',
                'gender' => 'mixed',
                'icon' => '🤾',
            ],
            [
                'name' => 'Futsal masculino',
                'gender' => 'male',
                'icon' => '⚽',
            ],
            [
                'name' => 'Basquete misto',
                'gender' => 'mixed',
                'icon' => '🏀',
            ],
            [
                'name' => 'Queimada misto',
                'gender' => 'mixed',
                'icon' => '🔥',
            ],
            [
                'name' => 'Gincana misto',
                'gender' => 'mixed',
                'icon' => '🎯',
            ],
            [
                'name' => 'Arrecadação de alimentos',
                'gender' => 'mixed',
                'icon' => '❤️',
            ],
            [
                'name' => 'Arte Parede da Quadra',
                'gender' => 'mixed',
                'icon' => '🎨',
            ],
            [
                'name' => 'Xadrez',
                'gender' => 'mixed',
                'icon' => '♟️',
            ],
            [
                'name' => 'FIFA',
                'gender' => 'mixed',
                'icon' => '🎮',
            ],
        ];

        foreach ($modalidades as $modal) {
            Modal::create($modal);
        }
    }
}
