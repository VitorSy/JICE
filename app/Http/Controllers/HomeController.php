<?php

namespace App\Http\Controllers;

use App\Services\TeamService;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __construct(private readonly TeamService $teamService){
    }


    public function index(): View
    {
        return view('teams-carousel', [
            'teams' => $this->teamService->getTeams(),
        ]);
    }


    public function homepage(): View {
        $kidRanking = $this->teamService->getKidRanking();
        $teenRanking = $this->teamService->getTeenRanking();
        $teams = $this->teamService->getTeams();
        return view('homepage', [
            'kidRanking' => $kidRanking,
            'teenRanking' => $teenRanking,
            'teams' => $teams,
        ]);
    }


    public function showTeam(int $id): View {
        $team = $this->teamService->getTeam($id);
        return view('components.team', [
            'team' => $team,
        ]);
    }
}
