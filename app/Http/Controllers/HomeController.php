<?php

namespace App\Http\Controllers;

use App\Http\Requests\GameRequest;
use App\Http\Requests\UpdateGameRequest;
use App\Models\Game;
use App\Services\BracketServices;
use App\Services\GameService;
use App\Services\PlaceService;
use App\Services\TeamService;
use App\Services\ModalService;
use App\Services\StandingServices;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __construct(
        private readonly TeamService $teamService, 
        private readonly GameService $gameService,
        private readonly StandingServices $standingService,
    )
    {
    }


    public function index(): View
    {
        return view('teams-carousel', [
            'teams' => $this->teamService->getTeams(),
        ]);
    }


    public function homepage(string $section): View {
        $kidRanking = $this->teamService->getKidRanking();
        $teenRanking = $this->teamService->getTeenRanking();
        $teams = $this->teamService->getTeams();
        
        return view('homepage', [
            'kidRanking' => $kidRanking,
            'teenRanking' => $teenRanking,
            'teams' => $teams,
            'section' => $section,
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


    public function gamesEdit(int $game_id): View {
        $game = $this->gameService->getGame($game_id);
        return view('components.games-update', [
            'game' => $game,
            'editing' => true,
        ]);
    }


    public function gamesUpdateScore(UpdateGameRequest $request): RedirectResponse {
        if (Gate::denies('is-admin')) {
            abort(403);
        } else {
            $data = $request->validated();
            $game = $this->gameService->updateGameScore($data);
            // regra para atualizar a table de standings ou brackets.
            // $this->standingService->updateStandingsAfterGameScoreUpdate($game);

            return redirect()->back()->with('success', 'Placar atualizado com sucesso!');
        }
    }


     public function modal(int $modal_id): View {
        return view('modal', [
            'modal_id' => $modal_id,
        ]);
    }
}
