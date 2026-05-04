<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Game extends Model
{
    use HasFactory;

    protected $fillable = [
        'place_id',
        'modal_id',
        'stage_type',
        'category',
        'team_one_id',
        'team_two_id',
        'team_one_points',
        'team_two_points',
        'date',
    ];


    protected $casts = [
        'date' => 'datetime',
    ];


    public function modal(): BelongsTo{
        return $this->belongsTo(Modal::class);
    }


    public function teamOne(): BelongsTo {
        return $this->belongsTo(Team::class, 'team_one_id');
    }


    public function teamTwo(): BelongsTo {
        return $this->belongsTo(Team::class, 'team_two_id');
    }


    public function place(): BelongsTo {
        return $this->belongsTo(Place::class);
    }


    public function brackets(): HasMany {
        return $this->hasMany(Bracket::class);
    }


    // HELPERS:
    public function wasSet(): bool {
        if($this->team_one_points !== null && $this->team_two_points !== null) {
            return true;
        };
        return false;
    }
}
