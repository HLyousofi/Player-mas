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
        Schema::create('team__match__statistics', function (Blueprint $table) {
            $table->id();
            $table->integer('team_Id');
            $table->integer('match_Id');
            $table->json('team_Static');
            $table->json('adv_Static');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('team__match__statistics');
    }
};
