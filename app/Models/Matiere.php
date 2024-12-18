<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Matiere extends Model
{
    use HasFactory;

    protected $fillable = ['code','nommatiere'];

    public function classe()
    {
        return $this->belongsTo(Classe::class);
    }

    public function niveau()
    {
        return $this->belongsTo(Niveau::class);
    }

    //liste des matières par école
    public function listematierebyecole()
    {
        $ecoleId = auth()->user()->etablissement_id;

        $listematiere = DB::table('etablissement_matiere AS em')
            ->join('matieres AS m', 'm.id', '=', 'em.matiere_id')
            ->where('etablissement_id', '=', $ecoleId)
            ->select('m.id', 'nommatiere')
            ->get();

        return  $listematiere;
    }

    public function classes()
    {
        return $this->hasMany(Classe::class);
    }

    public function etablissementMatieres()
    {
        return $this->hasMany(EtablissementMatiere::class, 'matiere_id');
    }
}
