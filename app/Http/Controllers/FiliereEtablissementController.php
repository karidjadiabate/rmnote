<?php

namespace App\Http\Controllers;

use App\Models\EtablissementFiliere;
use App\Models\Filiere;
use App\Models\Niveau;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FiliereEtablissementController extends Controller
{
    public function index()
    {
        $etablissementId = auth()->user()->etablissement_id;

        // Requête pour récupérer les filières liées à la table filieres
        $filiereLiees = DB::table('filieres AS f')
            ->leftJoin('etablissement_filiere AS ef', function ($join) use ($etablissementId) {
                $join->on('f.id', '=', 'ef.filiere_id')
                    ->where('ef.etablissement_id', '=', $etablissementId);
            })
            ->leftJoin('niveaux AS n', function ($join) {
                $join->whereRaw("JSON_CONTAINS(ef.niveau_id, CONCAT('\"', n.id, '\"'))");
            })
            ->select(
                'f.id AS filiere_id',
                DB::raw('COALESCE(ef.nomfilieretablissement, f.nomfiliere) AS nomfiliere'),
                DB::raw('COALESCE(ef.code, f.code) AS code'),
                'ef.id AS etablissement_filiere_id',
                'ef.active',
                DB::raw('IFNULL(ef.niveau_id, "[]") AS niveau_id'),
                DB::raw('GROUP_CONCAT(DISTINCT n.code SEPARATOR ", ") AS niveaux'),
                DB::raw('IFNULL(ef.nbclasse, 0) AS nbclasse'),
                DB::raw('IFNULL(ef.directeurfiliere, "") AS directeurfiliere')
            )
            ->groupBy(
                'f.id',
                'f.nomfiliere',
                'f.code',
                'ef.nomfilieretablissement',
                'ef.code',
                'ef.id',
                'ef.active',
                'ef.niveau_id',
                'ef.nbclasse',
                'ef.directeurfiliere'
            );

        // Requête pour récupérer les filières qui sont uniquement dans etablissement_filiere
        $filiereIndependantes = DB::table('etablissement_filiere AS ef')
            ->leftJoin('niveaux AS n', function ($join) {
                $join->whereRaw("JSON_CONTAINS(ef.niveau_id, CONCAT('\"', n.id, '\"'))");
            })
            ->select(
                DB::raw('NULL AS filiere_id'),
                'ef.nomfilieretablissement AS nomfiliere',
                'ef.code',
                'ef.id AS etablissement_filiere_id',
                'ef.active',
                DB::raw('IFNULL(ef.niveau_id, "[]") AS niveau_id'),
                DB::raw('GROUP_CONCAT(DISTINCT n.code SEPARATOR ", ") AS niveaux'),
                DB::raw('IFNULL(ef.nbclasse, 0) AS nbclasse'),
                DB::raw('IFNULL(ef.directeurfiliere, "Non défini") AS directeurfiliere')
            )
            ->whereNull('ef.filiere_id') // Pour s'assurer que ces filières ne sont pas liées à la table filieres
            ->groupBy(
                'ef.id',
                'ef.nomfilieretablissement',
                'ef.code',
                'ef.active',
                'ef.niveau_id',
                'ef.nbclasse',
                'ef.directeurfiliere'
            );

        // Union des deux requêtes
        $nosfilieres = $filiereLiees->union($filiereIndependantes)->get();

        // Récupérer toutes les filières (pour le dropdown dans les modals)
        $lesfilieres = Filiere::all();

        // Récupérer tous les niveaux disponibles
        $niveaux = Niveau::all();

        return view('admin.etablissement.listefilierebyschool', compact('nosfilieres', 'lesfilieres', 'niveaux'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'niveau_id' => 'required|array',
            'niveau_id.*' => 'exists:niveaux,id',
            'nbclasse' => 'required',
            'directeurfiliere' => 'required',
            'nomfilieretablissement' => 'required'
        ]);

        $etablissementId = auth()->user()->etablissement_id;

        // Obtenir le dernier code de la table filières
        $lastFiliereCode = Filiere::orderBy('code', 'desc')->first();

        // Récupérer le numéro du dernier code, ou 0 s'il n'existe pas
        $lastCodeNumber = $lastFiliereCode ? (int) substr($lastFiliereCode->code, 3) : 0;

        // Générer le nouveau code
        $newCode = 'FIL' . str_pad(++$lastCodeNumber, 3, '0', STR_PAD_LEFT);

        // Créer l'entrée avec les niveaux en JSON
        EtablissementFiliere::create([
            'etablissement_id' => $etablissementId,
            'niveau_id' => json_encode($request->niveau_id), // Convertir les niveaux en JSON
            'directeurfiliere' => $request->directeurfiliere,
            'nbclasse' => $request->nbclasse,
            'code' => $newCode,
            'nomfilieretablissement' => $request->nomfilieretablissement
        ]);

        return to_route('admin.filiereindex')->with('success', 'Filière et niveaux ajoutés avec succès!');
    }



    public function update(Request $request, $id)
    {
        $etablissementFiliere = EtablissementFiliere::findOrFail($id);

        $etablissementFiliere->update([
            'filiere_id' => $request->filiere_id,
            'niveau_id' => json_encode($request->niveau_id),
            'directeurfiliere' => $request->directeurfiliere,
            'nbclasse' => $request->nbclasse,
        ]);

        // Redirection après la mise à jour avec un message de succès
        return redirect()->route('admin.filiereindex')->with('success', 'Filière mise à jour avec succès!');
    }

    public function activate($id)
    {
        $etablissementId = auth()->user()->etablissement_id;

        // Trouver la filière à partir de la table 'filieres'
        $filiere = Filiere::findOrFail($id);

        // Vérifier si cette filière est déjà associée à l'établissement
        $etablissementFiliere = EtablissementFiliere::where('etablissement_id', $etablissementId)
            ->where('filiere_id', $id)
            ->first();

        if ($etablissementFiliere) {
            // Si elle existe déjà, basculer l'état actif
            $etablissementFiliere->active = !$etablissementFiliere->active;
        } else {

            $etablissementFiliere = EtablissementFiliere::create([
                'etablissement_id' => $etablissementId,
                'filiere_id' => $id,
                'nomfilieretablissement' => $filiere->nomfiliere,
                'niveau_id' => null,
                'directeurfiliere' => null,
                'nbclasse' => 0,
                'active' => true,
            ]);
        }

        $etablissementFiliere->save();

        return response()->json([
            'active' => $etablissementFiliere->active,
            'code' => $etablissementFiliere->code,
            'nomfiliere' => $etablissementFiliere->nomfilieretablissement,
            'nbclasse' => $etablissementFiliere->nbclasse,
        ]);
    }


    public function destroy($id)
    {
        $etablissementFiliere = EtablissementFiliere::findOrFail($id);

        $etablissementFiliere->delete();

        return redirect()->route('admin.filiereindex')->with('danger', 'Filière supprimée avec succès!');
    }
}
