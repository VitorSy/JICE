<?php

namespace Database\Seeders;

use App\Models\Game;
use App\Models\Modal;
use App\Models\Place;
use App\Models\Team;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class GameSeeder extends Seeder
{
    public function run(): void
    {
        $groups = [
            '67' => [
                'A' => [
                    '6A','6B','6C','6D'
                ],

                'B' => [
                    '7A','7B','7C','7D'
                ],
            ],

            '89' => [
                'A' => [
                    '8A','8B','8C','8D','8E'
                ],

                'B' => [
                    '9A','9B','9C','9D'
                ],
            ],
        ];


        $modals = Modal::all();

        $places = Place::pluck('id')->toArray();

        if(empty($places)){
            return;
        }

        $baseDate = Carbon::create(
            2026,
            6,
            15,
            8,
            0,
            0
        );

        $matchCounter = 0;


        foreach($groups as $championship => $tournamentGroups){
            foreach($tournamentGroups as $groupName => $teamNames){

                if($championship===67){
                    $category = 'kid';
                } else if($championship===89){
                    $category = 'teen';
                }
                
                $teams = Team::whereIn(
                    'name',
                    $teamNames
                )
                ->orderBy('name')
                ->get()
                ->values();


                foreach($modals as $modal){

                    for($i=0; $i < $teams->count(); $i++){

                        for(
                            $j = $i + 1;
                            $j < $teams->count();
                            $j++
                        ){

                            $gameDate = $baseDate
                                ->copy()
                                ->addDays($matchCounter)
                                ->setHour(
                                    8 + ($matchCounter % 5)
                                );


                            Game::firstOrCreate(

                                [
                                    'modal_id' => $modal->id,
                                    'team_one_id' => $teams[$i]->id,
                                    'team_two_id' => $teams[$j]->id,
                                ],

                                [
                                    'place_id' => $places[
                                        $matchCounter % count($places)
                                    ],

                                    // 'team_one_points' => 0,
                                    // 'team_two_points' => 0,

                                    'date' => $gameDate,

                                    // 'group_name' => $groupName,
                                    // 'championship' => $championship,
                                    // 'stage_type' => 'group',
                                    'category' => $category,
                                ]

                            );

                            $matchCounter++;
                        }
                    }
                }
            }
        }
    }
}