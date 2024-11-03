<?php

use App\Models\Classe;
use App\Models\Etablissement;
use App\Models\Filiere;
use App\Models\Matiere;
use App\Models\TypeSujet;
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
        Schema::create('calendrier_evaluations', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Matiere::class);
            $table->foreignIdFor(TypeSujet::class);
            $table->foreignIdFor(Filiere::class);
            $table->foreignIdFor(Classe::class);
            $table->time('debut');
            $table->time('fin');
            $table->date('date');
            $table->foreignIdFor(Etablissement::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calendrier_evaluations');
    }
};
