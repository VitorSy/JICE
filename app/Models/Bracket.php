<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Bracket extends Model
{
    use HasFactory;

    protected $table = 'brackets';


    protected $fillable = [
        'modal_id',
        'game_id',
        'stage',
        'match_order',
        'next_bracket_id',
        'winner_team_id',
    ];


    protected $casts = [
        'stage' => 'string',
    ];


    public function modal(): BelongsTo {
        return $this->belongsTo(Modal::class);
    }


    public function game(): BelongsTo {
        return $this->belongsTo(Game::class);
    }


    public function winner(): BelongsTo {
        return $this->belongsTo(
            Team::class,
            'winner_team_id'
        );
    }


    /*
      Quartas 1 -> Semi 1
    */
    public function nextBracket(): BelongsTo {
        return $this->belongsTo(
            Bracket::class,
            'next_bracket_id'
        );
    }


    /*
      Semi 1 <- Quartas 1,2
    */
    public function previousBrackets(): HasMany {
        return $this->hasMany(
            Bracket::class,
            'next_bracket_id'
        );
    }


    // HELPERS:
    public function isQuarter(): bool {
        return $this->stage === 'quarter';
    }

    
    public function isSemi(): bool {
        return $this->stage === 'semi';
    }


    public function isFinal(): bool {
        return $this->stage === 'final';
    }
}