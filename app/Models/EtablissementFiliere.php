<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EtablissementFiliere extends Model
{
    use HasFactory;

    protected $table = 'etablissement_filiere';

    protected $fillable = ['code', 'etablissement_id', 'filiere_id', 'niveau_id', 'directeurfiliere', 'nbclasse', 'active',
    'nomfilieretablissement'];

    public function etablissement()
    {
        return $this->belongsTo(Etablissement::class);
    }

    public function filiere()
    {
        return $this->belongsTo(Filiere::class, 'filiere_id');
    }

    public function niveaux()
    {
        if (is_null($this->niveau_id)) {
            return collect();
        }

        $niveauxIds = json_decode($this->niveau_id, true);

        if (!is_array($niveauxIds)) {
            return collect(); // Ou gérer l'erreur selon votre besoin
        }

        return Niveau::whereIn('id', $niveauxIds)->get();
    }



    public function classes()
    {
        return $this->hasMany(Classe::class);
    }
}
