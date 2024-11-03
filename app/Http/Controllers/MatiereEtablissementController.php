<?php

namespace App\Http\Controllers;

use App\Models\EtablissementFiliere;
use App\Models\EtablissementMatiere;
use App\Models\Matiere;
use App\Models\Niveau;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MatiereEtablissementController extends Controller
{
    public function index()
    {
        $etablissementId = auth()->user()->etablissement_id;

        // Requête pour récupérer les matières liées à la table 'matieres'
        $matiereLiees = DB::table('matieres AS m')
            ->leftJoin('etablissement_matiere AS em', function ($join) use ($etablissementId) {
                $join->on('m.id', '=', 'em.matiere_id')
                    ->where('em.etablissement_id', '=', $etablissementId);
            })
            ->leftJoin('etablissement_filiere AS ef', 'em.etablissement_filiere_id', '=', 'ef.id') // Jointure avec la table etablissement_filiere
            ->leftJoin('filieres AS f', 'ef.filiere_id', '=', 'f.id') // Jointure avec la table filieres
            ->leftJoin('niveaux AS n', 'em.niveau_id', '=', 'n.id') // Jointure avec la table filieres

            ->select(
                'm.id AS matiere_id',  // ID de la matière
                'n.code AS codeniveau',
                'ef.filiere_id',
                'em.niveau_id',
                DB::raw('COALESCE(em.nommatieretablissement, m.nommatiere) AS nommatiere'),
                DB::raw('COALESCE(em.code, m.code) AS code'),
                'em.id AS etablissement_matiere_id',  // ID de la relation dans etablissement_matiere
                'em.active',
                DB::raw('IFNULL(em.coefficient, 1) AS coefficient'),
                DB::raw('IFNULL(em.credit, 0) AS credit'),
                DB::raw('IFNULL(em.volumehoraire, 0) AS volumehoraire'),
                DB::raw('COALESCE(ef.nomfilieretablissement, f.nomfiliere) AS nomfiliere') // Récupérer le nom de la filière
            )
            ->groupBy(
                'm.id',
                'em.id',
                'm.nommatiere',
                'em.nommatieretablissement',
                'em.code',
                'em.active',
                'em.coefficient',
                'em.credit',
                'em.volumehoraire',
                'ef.nomfilieretablissement',
                'f.nomfiliere',
                'n.code',
                'm.code',
                'ef.filiere_id',
                'em.niveau_id'
            );

        // Requête pour récupérer les matières uniquement dans etablissement_matiere
        $matiereIndependantes = DB::table('etablissement_matiere AS em')
            ->leftJoin('etablissement_filiere AS ef', 'em.etablissement_filiere_id', '=', 'ef.id')
            ->leftJoin('filieres AS f', 'ef.filiere_id', '=', 'f.id')
            ->leftJoin('niveaux AS n', 'em.niveau_id', '=', 'n.id') // Jointure avec la table filieres

            ->select(
                DB::raw('NULL AS matiere_id'),  // Pas de lien direct avec 'matieres'
                'em.nommatieretablissement AS nommatiere',
                'em.code',
                'em.id AS etablissement_matiere_id',  // ID de la relation dans etablissement_matiere
                'em.active',
                'n.code AS codeniveau',
                'ef.filiere_id',
                'em.niveau_id',
                DB::raw('IFNULL(em.coefficient, 1) AS coefficient'),
                DB::raw('IFNULL(em.credit, 0) AS credit'),
                DB::raw('IFNULL(em.volumehoraire, 0) AS volumehoraire'),
                DB::raw('COALESCE(ef.nomfilieretablissement, f.nomfiliere) AS nomfiliere') // Inclure le nom de la filière
            )
            ->whereNull('em.matiere_id')  // Vérifie que la matière n'est pas liée directement à la table 'matieres'
            ->groupBy(
                'em.id',
                'em.nommatieretablissement',
                'em.code',
                'em.active',
                'em.coefficient',
                'em.credit',
                'em.volumehoraire',
                'ef.nomfilieretablissement',
                'f.nomfiliere',
                'n.code',
                'ef.filiere_id',
                'em.niveau_id',
            );

        // Union des deux requêtes
        $nosmatieres = $matiereLiees->union($matiereIndependantes)->get();

        // Récupérer toutes les matières pour le dropdown dans les modals
        $lesmatieres = Matiere::all();

        // Récupérer tous les niveaux disponibles
        $niveaux = Niveau::all();

        // Récupérer la liste des filières
        $listefilieres = EtablissementFiliere::with('filiere')->where('active', 1)->where('etablissement_id', $etablissementId)->get();

        return view('admin.etablissement.listematierebyschool', compact('nosmatieres', 'lesmatieres', 'niveaux', 'listefilieres'));
    }




    public function store(Request $request)
    {
        $request->validate([
            'matiere_id.*' => 'exists:matieres,id',
            'coefficient' => 'required|numeric|min:1',
        ]);

        $etablissementId = auth()->user()->etablissement_id;

        // Obtenir le dernier code de la table matieres
        $lastMatiereCode = Matiere::orderBy('code', 'desc')->first();

        // Récupérer le numéro du dernier code, ou 0 s'il n'existe pas
        $lastCodeNumber = $lastMatiereCode ? (int) substr($lastMatiereCode->code, 3) : 0;

        // Incrémenter le nombre pour le nouveau code
        $newCodeNumber = $lastCodeNumber + 1;

        // Générer le nouveau code
        $newCode = 'MAT' . str_pad($newCodeNumber, 4, '0', STR_PAD_LEFT);

        // Vérifier si le code existe déjà dans EtablissementMatiere
        while (EtablissementMatiere::where('etablissement_id', $etablissementId)->where('code', $newCode)->exists()) {
            $newCodeNumber++;
            $newCode = 'MAT' . str_pad($newCodeNumber, 4, '0', STR_PAD_LEFT);
        }

        // Créer la nouvelle matière
        EtablissementMatiere::create([
            'etablissement_id' => $etablissementId,
            'matiere_id' => $request->matiere_id,
            'coefficient' => $request->coefficient,
            'credit' => $request->credit,
            'volumehoraire' => $request->volumehoraire,
            'nommatieretablissement' => $request->nommatieretablissement,
            'etablissement_filiere_id' => $request->etablissement_filiere_id,
            'niveau_id' => $request->niveau_id,
            'code' => $newCode,
        ]);

        return to_route('admin.matiereindex')->with('success', 'Matières ajoutées avec succès!');
    }


    public function update(Request $request, $id)
    {

        $etablissementMatiere = EtablissementMatiere::findOrFail($id);

        $etablissementMatiere->update([
            'matiere_id' => $request->matiere_id,
            'coefficient' => $request->coefficient,
            'credit' => $request->credit,
            'volumehoraire' => $request->volumehoraire,
            'etablissement_filiere_id' => $request->etablissement_filiere_id,
            'niveau_id' => $request->niveau_id
        ]);

        return redirect()->route('admin.matiereindex')->with('success', 'Matière mise à jour avec succès!');
    }

    public function activate($id)
    {
        $etablissementId = auth()->user()->etablissement_id;

        // Trouver la matière à partir de la table 'matieres'
        $matiere = Matiere::findOrFail($id);

        // Vérifier si cette matière est déjà associée à l'établissement
        $etablissementMatiere = EtablissementMatiere::where('etablissement_id', $etablissementId)
            ->where('matiere_id', $id)
            ->first();

        if ($etablissementMatiere) {
            // Si elle existe déjà, basculer l'état actif
            $etablissementMatiere->active = !$etablissementMatiere->active;
        } else {
            // Si elle n'existe pas, créer une nouvelle entrée dans 'etablissement_matiere'
            $etablissementMatiere = EtablissementMatiere::create([
                'etablissement_id' => $etablissementId,
                'matiere_id' => $id,
                'nommatieretablissement' => $matiere->nommatiere,
                'etablissement_filiere_id' => null,
                'coefficient' => 1,
                'credit' => null,
                'volumehoraire' => null,
                'active' => true,
            ]);
        }

        // Sauvegarder la modification
        $etablissementMatiere->save();

        // Retourner une réponse JSON avec les informations mises à jour
        return response()->json([
            'active' => $etablissementMatiere->active,
            'code' => $etablissementMatiere->code,
            'nommatiere' => $etablissementMatiere->nommatieretablissement,
            'coefficient' => $etablissementMatiere->coefficient,
            'credit' => $etablissementMatiere->credit,
            'volumehoraire' => $etablissementMatiere->volumehoraire,
        ]);
    }




    public function destroy($id)
    {
        $etablissementMatiere = EtablissementMatiere::findOrFail($id);

        $etablissementMatiere->delete();

        return redirect()->route('admin.matiereindex')->with('danger', 'Matière supprimée avec succès!');
    }
}
