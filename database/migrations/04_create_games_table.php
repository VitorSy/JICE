<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();

            $table->foreignId('place_id')->nullable()->constrained('places')->cascadeOnDelete(); //Ainda não testado
            $table->foreignId('modal_id')->constrained('modals')->cascadeOnDelete();
            
            $table->enum('stage_type', ['standing', 'knockout'])->default('standing'); // Ainda não testado.
            $table->enum('category', ['kid', 'teen'])->default('kid'); // Ainda não testado.

            $table->foreignId('team_one_id')->nullable()->constrained('teams')->cascadeOnDelete(); //Ainda não testado
            $table->foreignId('team_two_id')->nullable()->constrained('teams')->cascadeOnDelete(); //Ainda não testado

            $table->integer('team_one_points')->nullable();
            $table->integer('team_two_points')->nullable();

            $table->dateTime('date')->nullable();

            $table->timestamps();
        });
    }


    public function down(): void {
        Schema::dropIfExists('games');
    }
};
