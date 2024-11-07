<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Sujet extends Model
{
    use HasFactory;

    protected $fillable = ['code', 'type_sujet_id', 'filiere_id', 'matiere_id', 'classe_id', 'noteprincipale', 'heure', 'consigne', 'status', 'user_id', 'etablissement_id','image_section','is_deleted'];

    public function sections()
    {
        return $this->hasMany(Section::class);
    }

    public function classe()
    {
        return $this->belongsTo(Classe::class);
    }

    public function filiere()
    {
        return $this->belongsTo(Filiere::class);
    }

    public function etablissement()
    {
        return $this->belongsTo(Etablissement::class);
    }

    public function matiere()
    {
        return $this->belongsTo(Matiere::class);
    }

    public function typeSujet()
    {
        return $this->belongsTo(TypeSujet::class);
    }

    /* public function listesujetbyprof()
    {

        $listesujet = DB::table('sujets AS s')
            ->join('matieres AS m', 'm.id', '=', 's.matiere_id')
            ->join('filieres AS f', 'f.id', '=', 's.filiere_id')
            ->join('classes AS c', 'c.id', '=', 's.classe_id')
            ->join('users AS u', 'u.id', '=', 's.user_id')
            ->select('s.id', 's.code', 'm.nommatiere', 'f.nomfiliere', 'c.nomclasse', DB::raw("DATE(s.created_at) as created_date"), 's.status')
            ->where('s.user_id', auth()->user()->id)
            ->get();

        return $listesujet;
    } */

    public function listesujetbyadmin()
    {

        $ecoleId = auth()->user()->etablissement_id;

        $listesujet = DB::table('sujets AS s')
            ->join('matieres AS m', 'm.id', '=', 's.matiere_id')
            ->join('filieres AS f', 'f.id', '=', 's.filiere_id')
            ->join('classes AS c', 'c.id', '=', 's.classe_id')
            ->join('users AS u', 'u.id', '=', 's.user_id')
            ->select('s.id', 's.code', 'm.nommatiere', 'f.nomfiliere', 'c.nomclasse', DB::raw("DATE(s.created_at) as created_date"), 's.status', 'u.nom', 'u.prenom')
            ->where('s.etablissement_id', $ecoleId)
            ->get();

        return $listesujet;
    }

}
