<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Standing extends Model
{
    use HasFactory;

    protected $table = 'standings';

    protected $fillable = [
        'team_id',
        'modal_id',

        'played',
        'wins',
        'draws',
        'losses',

        'goals_for',
        'goals_against',
        'goal_difference',

        'points',

        'qualified',
        'group_name',
        'position',
    ];


    protected $casts = [
        'qualified' => 'boolean',
    ];

    
    public function team(): BelongsTo {
        return $this->belongsTo(Team::class);
    }


    public function modal(): BelongsTo {
        return $this->belongsTo(Modal::class);
    }

    
    /*
    |--------------------------------------------------------------------------
    | Helpers
    |--------------------------------------------------------------------------
    */

    public function addWin(): self {
        $this->wins++;
        $this->played++;
        $this->points += 3;
        $this->save();
        return $this;
    }


    public function addDraw(): self {
        $this->draws++;
        $this->played++;
        $this->points += 1;
        $this->save();
        return $this;
    }


    public function addLoss(): self {
        $this->losses++;
        $this->played++;
        $this->save();
        return $this;
    }


    public function updateGoals(int $goalsFor, int $goalsAgainst): self {
        $this->goals_for += $goalsFor;
        $this->goals_against += $goalsAgainst;
        $this->goal_difference = $this->goals_for - $this->goals_against;
        $this->save();
        return $this;
    }
}