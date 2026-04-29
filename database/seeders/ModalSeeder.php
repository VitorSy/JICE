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
                'type' => 'group',
            ],
            [
                'name' => 'Futebol feminino',
                'gender' => 'female',
                'icon' => '⚽',
                'type' => 'group',
            ],
            [
                'name' => 'Volei quadra misto',
                'gender' => 'mixed',
                'icon' => '🏐',
                'type' => 'group',
            ],
            [
                'name' => 'Volei areia misto',
                'gender' => 'mixed',
                'icon' => '🏖️',
                'type' => 'group',
            ],
            [
                'name' => 'Handball misto',
                'gender' => 'mixed',
                'icon' => '🤾',
                'type' => 'group',
            ],
            [
                'name' => 'Futsal masculino',
                'gender' => 'male',
                'icon' => '⚽',
                'type' => 'group',
            ],
            [
                'name' => 'Basquete misto',
                'gender' => 'mixed',
                'icon' => '🏀',
                'type' => 'group',
            ],
            [
                'name' => 'Queimada misto',
                'gender' => 'mixed',
                'icon' => '🔥',
                'type' => 'group',
            ],
            [
                'name' => 'Gincana misto',
                'gender' => 'mixed',
                'icon' => '🎯',
                'type' => 'group',
            ],
            [
                'name' => 'Arrecadação de alimentos',
                'gender' => 'mixed',
                'icon' => '❤️',
                'type' => 'group',
            ],
            [
                'name' => 'Arte Parede da Quadra',
                'gender' => 'mixed',
                'icon' => '🎨',
                'type' => 'group',
            ],
            [
                'name' => 'Xadrez',
                'gender' => 'mixed',
                'icon' => '♟️',
                'type' => 'knockout',
            ],
            [
                'name' => 'FIFA',
                'gender' => 'mixed',
                'icon' => '🎮',
                'type' => 'knockout',
            ],
        ];

        foreach ($modalidades as $modal) {
            Modal::create($modal);
        }
    }
}
