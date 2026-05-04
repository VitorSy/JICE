<?php

namespace App\Http\Controllers;

use App\Http\Requests\GameRequest;
use App\Http\Requests\UpdateGameRequest;
use App\Models\Game;
use App\Models\Standing;
use App\Services\BracketService;
use App\Services\GameService;
use App\Services\PlaceService;
use App\Services\TeamService;
use App\Services\ModalService;
use App\Services\StandingService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __construct(
        private readonly TeamService $teamService, 
        private readonly GameService $gameService,
        private readonly BracketService $bracketService,
        private readonly ModalService $modalService,
    )
    {
    }


    public function index(): View
    {
        return view('teams-carousel', [
            'teams' => $this->teamService->getTeams(),
        ]);
    }


    public function homepage(string $section, string $category = 'kid'): View {
        $kidRanking = $this->teamService->getKidRanking();
        $teenRanking = $this->teamService->getTeenRanking();
        $teams = $this->teamService->getTeams();
        
        return view('homepage', [
            'kidRanking' => $kidRanking,
            'teenRanking' => $teenRanking,
            'teams' => $teams,
            'section' => $section,
            'category' => $category ,
        ]);
    }


    public function showTeam(int $id): View {
        $team = $this->teamService->getTeam($id);
        return view('components.team', [
            'team' => $team,
        ]);
    }


    public function gamesStore(GameRequest $request): RedirectResponse {
        if (Gate::denies('is-admin')) {
            abort(403);
        } else {
            $data = $request->validated();
            $game = $this->gameService->createGame($data);
            return redirect()->route('homepage', ['section' => 'option-5']);
        }
    }


    public function gamesFilter(Request $request): RedirectResponse {
        return redirect()->route('homepage', ['section' => 'option-3'])->with('day', $request->day);
    }


    public function gamesEdit(int $game_id, string $category): View {
        $game = $this->gameService->getGame($game_id);
        return view('components.games-update', [
            'game' => $game,
            'category' => $category,
            'stage_type' => $game->stage_type,
        ]);
    }


    public function gamesUpdateScore(UpdateGameRequest $request): RedirectResponse {
        if (Gate::denies('is-admin')) {
            abort(403);
        } else {
            $data = $request->validated();
            DB::transaction(function () use ($data) {
                $this->gameService->updateGameScore($data);
            });

            return redirect()->back()->with('success', 'Placar atualizado com sucesso!');
        }
    }


     public function modal(int $modal_id, string $category, string $type_selected = 'groups'): View {
        if($type_selected !== 'groups' && $type_selected !== 'knockout') {
            abort(404);
        }
        $modal = $this->modalService->getModal($modal_id);
        $knockoutGames = $this->bracketService->getKnockoutGames($modal_id, $category);

        return view('modal', [
            'modal_id' => $modal_id,
            'modalName' => $modal->name,
            'modalType' => $modal->type,
            'groups' => $this->groupByCategory($modal_id, $category),
            'category' => $category,
            'type_selected' => $type_selected,
            'knockoutGames' => $knockoutGames,
        ]);
    }


    public function processKnockout(int $modal_id, string $category): RedirectResponse {
        $knockoutTeams = $this->bracketService->getKnockoutTeams($modal_id, $category);
        
        $semiOne = [
            'stage_type' => 'knockout',
            'team_one_id' => $knockoutTeams->get(0)->team->id,
            'team_two_id' => $knockoutTeams->get(3)->team->id,
            'place_id' => null,
            'modal_id' => $modal_id,
            'date' => now(),
        ];

        $semiTwo = [
            'stage_type' => 'knockout',
            'team_one_id' => $knockoutTeams->get(1)->team->id,
            'team_two_id' => $knockoutTeams->get(2)->team->id,
            'place_id' => null,
            'modal_id' => $modal_id,
            'date' => now(),
        ];

        $gameFinal = [
            'stage_type' => 'knockout',
            'team_one_id' => null,
            'team_two_id' => null,
            'place_id' => null,
            'modal_id' => $modal_id,
            'date' => now(),
        ];

        DB::transaction(function () use ($modal_id, $category, $semiOne, $semiTwo, $gameFinal) {
            $games = $this->gameService->getKnockoutGames($modal_id, $category);
            if(!$games->isEmpty()){
                foreach ($games as $game) {
                    $game->delete();
                    $game->brackets()->delete();
                }
            }

            $gameSemiOne = $this->gameService->createGame($semiOne);
            $this->bracketService->createOrUpdateBracket($modal_id, $gameSemiOne->id, 'semi', 1);

            $gameSemiTwo = $this->gameService->createGame($semiTwo);
            $this->bracketService->createOrUpdateBracket($modal_id, $gameSemiTwo->id, 'semi', 2);

            // Final Game:
            $gameFinal = $this->gameService->createGame($gameFinal);
            $this->bracketService->createOrUpdateBracket($modal_id, $gameFinal->id, 'final', 3);

            $gameSemiOne->brackets()->update(['next_bracket_id' => $gameFinal->brackets()->first()->id]);
            $gameSemiTwo->brackets()->update(['next_bracket_id' => $gameFinal->brackets()->first()->id]);
        });
        

        return redirect()
                ->route('modal', ['modal_id' => $modal_id, 'category' => $category, 'type_selected' => 'knockout'])
                ->with('success', 'Chaveamento atualizado com sucesso!');
    }


    // private function bracketByCategory(int $modal_id, string $category): array {
    //     if($category==='kid'){
    //         $brackets = $this->bracketService->getBracketsByModalAndCategory($modal_id, 'kid');
    //     } elseif($category==='teen') {
    //         $brackets = $this->bracketService->getBracketsByModalAndCategory($modal_id, 'teen');
    //     } else {
    //         abort(404);
    //     }
    //     return $brackets;
    // }


    private function groupByCategory(int $modal_id, string $category): array {
        if($category==='kid'){
            $groups = [
                'A' => [
                    'teams' => $this->teamService->getTeamsByGroup($modal_id, '6'),
                    'games' => $this->gameService->getGamesByGroup($modal_id, '6'),
                ],
                'B' => [
                    'teams' => $this->teamService->getTeamsByGroup($modal_id, '7'),
                    'games' => $this->gameService->getGamesByGroup($modal_id, '7'),
                ],
            ];

        } elseif($category==='teen') {
            $groups = [
                'A' => [
                    'teams' => $this->teamService->getTeamsByGroup($modal_id, '8'),
                    'games' => $this->gameService->getGamesByGroup($modal_id, '8'),
                ],
                'B' => [
                    'teams' => $this->teamService->getTeamsByGroup($modal_id, '9'),
                    'games' => $this->gameService->getGamesByGroup($modal_id, '9'),
                ],
            ];
        } else {
            abort(404);
        }
        return $groups;
    }


}
