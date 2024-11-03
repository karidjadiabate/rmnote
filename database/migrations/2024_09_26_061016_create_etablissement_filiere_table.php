<?php

use App\Models\Etablissement;
use App\Models\Filiere;
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
        Schema::create('etablissement_filiere', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable();
            $table->string('nomfilieretablissement')->nullable();
            $table->foreignIdFor(Etablissement::class)->nullable()->constrained()->onDelete('cascade');
            $table->foreignIdFor(Filiere::class)->nullable()->constrained()->onDelete('cascade');
            $table->text('niveau_id')->nullable();
            $table->string('directeurfiliere')->nullable();
            $table->string('nbclasse')->nullable();
            $table->boolean('active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('etablissement_filiere');
    }
};
