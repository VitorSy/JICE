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
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('instagram')->nullable();
            $table->text('logo')->nullable();
            $table->enum('level', ['kid', 'teen']);
            $table->integer('gold')->default(0);
            $table->integer('silver')->default(0);
            $table->integer('bronze')->default(0);
            $table->integer('points')->default(0);
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teams');
    }
};
