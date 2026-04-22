<?php

namespace App\Http\Controllers;

use App\Http\Requests\GameRequest;
use App\Services\GameService;
use App\Services\PlaceService;
use App\Services\TeamService;
use App\Services\ModalService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __construct(
        private readonly TeamService $teamService, 
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


    public function gamesStore(GameRequest $request, GameService $gameService): RedirectResponse {
        if (Gate::denies('is-admin')) {
            abort(403);
        } else {
            $gameService->createGame($request->validated());
            return redirect()->route('homepage', ['section' => 'option-5']);
        }
    }


    public function gamesFilter(Request $request): RedirectResponse {
        return redirect()->route('homepage', ['section' => 'option-3'])->with('day', $request->day);
    }
}
