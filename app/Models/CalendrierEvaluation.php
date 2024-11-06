<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalendrierEvaluation extends Model
{
    use HasFactory;

    protected $fillable = ['matiere_id', 'type_sujet_id', 'filiere_id', 'classe_id', 'debut', 'fin','date','duree','etablissement_id'];

    public function matiere()
    {
        return $this->belongsTo(Matiere::class);
    }

    public function typeSujet()
    {
        return $this->belongsTo(TypeSujet::class);
    }

    public function filiere()
    {
        return $this->belongsTo(Filiere::class);
    }

    public function classe()
    {
        return $this->belongsTo(Classe::class);
    }
}
