<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Modal extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'gender'];

    public function games(): HasMany {
        return $this->hasMany(Game::class);
    }


    public function standings(): HasMany {
        return $this->hasMany(Standing::class);
    }

    public function brackets(): HasMany {
        return $this->hasMany(Bracket::class);
    }
}