<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('brackets', function (Blueprint $table) {

            $table->id();

            // Modalidade do mata-mata
            $table->foreignId('modal_id')
                ->constrained('modals')
                ->cascadeOnDelete();

            // Jogo associado nessa chave
            $table->foreignId('game_id')
                ->constrained('games')
                ->cascadeOnDelete();

            // Fase
            $table->enum('stage', [
                'quarter',
                'semi',
                'final'
            ]);

            $table->integer('match_order');

            $table->foreignId('next_bracket_id')
                ->nullable()
                ->constrained('brackets')
                ->nullOnDelete();

            // vencedor do confronto
            $table->foreignId('winner_team_id')
                ->nullable()
                ->constrained('teams')
                ->nullOnDelete();

            $table->timestamps();


            // evita duplicar posição da chave
            $table->unique([
                'modal_id',
                'stage',
                'match_order'
            ]);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('brackets');
    }
};
