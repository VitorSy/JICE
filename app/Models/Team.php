<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'logo',
        'level',
        'gold',
        'silver',
        'bronze',
        'points',
        'description'
    ];

    public function gamesAsTeamOne(){
        return $this->hasMany(Game::class, 'team_one_id');
    }

    public function gamesAsTeamTwo(){
        return $this->hasMany(Game::class, 'team_two_id');
    }


    public function standings() {
        return $this->hasMany(Standing::class);
    }


    public function wonBrackets() {
        return $this->hasMany(Bracket::class, 'winner_team_id');
    }
}
