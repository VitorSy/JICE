<?php

namespace Database\Seeders;

use App\Models\Team;
use App\Models\Modal;
use App\Models\Standing;
use Illuminate\Database\Seeder;

class StandingSeeder extends Seeder
{
    public function run(): void
    {
        /*
        Campeonatos e grupos
        */
        $groups = [

            '67' => [

                'A' => [
                    '6A',
                    '6B',
                    '6C',
                    '6D'
                ],

                'B' => [
                    '7A',
                    '7B',
                    '7C',
                    '7D'
                ],
            ],


            '89' => [

                'A' => [
                    '8A',
                    '8B',
                    '8C',
                    '8D',
                    '8E'
                ],

                'B' => [
                    '9A',
                    '9B',
                    '9C',
                    '9D'
                ],
            ],

        ];


        $modals = Modal::all();



        foreach ($groups as $championship => $tournamentGroups) {

            foreach ($tournamentGroups as $groupName => $teamNames) {

                $teams = Team::whereIn(
                    'name',
                    $teamNames
                )->get();


                foreach ($modals as $modal) {

                    foreach ($teams as $team) {

                        Standing::firstOrCreate(

                            [
                                'team_id'  => $team->id,
                                'modal_id' => $modal->id,
                            ],

                            [
                                'played' => 0,
                                'wins' => 0,
                                'draws' => 0,
                                'losses' => 0,

                                'goals_for' => 0,
                                'goals_against' => 0,
                                'goal_difference' => 0,

                                'points' => 0,

                                'qualified' => false,

                                'group_name' => $groupName,

                                /*
                                 se você adicionar coluna championship
                                 descomente:
                                */
                                // 'championship' => $championship,

                                'position' => null,
                            ]

                        );

                    }

                }

            }

        }

    }
}