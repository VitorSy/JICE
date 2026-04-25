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
}