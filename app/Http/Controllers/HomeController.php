<?php

namespace App\Http\Controllers;

use App\Services\TeamService;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __construct(private readonly TeamService $teamService)
    {
    }

    public function index(): View
    {
        return view('homepage', [
            'ranking' => $this->teamService->getMedalRanking(),
        ]);
    }
        return view('teams-carousel', [
            'teams' => $this->teamService->getTeams(),
        ]);
    }

    public function homepage(): View {
        return view('home');
    }
}
