<?php

use App\Models\Etablissement;
use App\Models\EtablissementFiliere;
use App\Models\Matiere;
use App\Models\Niveau;
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
        Schema::create('etablissement_matiere', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable();
            $table->foreignIdFor(Etablissement::class)->nullable()->onDelete('cascade')->nullable();
            $table->string('nommatieretablissement')->nullable();
            $table->foreignIdFor(Matiere::class)->nullable();
            $table->foreignIdFor(Niveau::class)->nullable();
            $table->foreignIdFor(EtablissementFiliere::class)->nullable();
            $table->integer('coefficient')->default(1);
            $table->string('credit')->nullable();
            $table->string('volumehoraire')->nullable();
            $table->boolean('active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('etablissement_matiere');
    }
};
