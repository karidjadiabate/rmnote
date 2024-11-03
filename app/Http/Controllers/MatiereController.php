<?php

namespace App\Http\Controllers;

use App\Models\Matiere;
use App\Http\Requests\StoreMatiereRequest;
use App\Http\Requests\UpdateMatiereRequest;
use App\Imports\MatiereImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class MatiereController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $matieres = Matiere::all();

        return view('admin.matiere.listematiere',compact('matieres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation des données de la requête
        $request->validate([
            'nommatiere' => 'required|string', // Assurez-vous que c'est une chaîne
        ]);

        // Obtenir le dernier code de matière
        $lastCode = Matiere::orderBy('code', 'desc')->first();
        $lastCodeNumber = $lastCode ? (int) substr($lastCode->code, 3) : 0;

        // Incrémenter le nombre
        $lastCodeNumber++;

        // Générer le nouveau code
        $newCode = 'MAT' . str_pad($lastCodeNumber, 4, '0', STR_PAD_LEFT);

        // Créer la nouvelle matière
        Matiere::create([
            'nommatiere' => $request->nommatiere,
            'code' => $newCode,
        ]);

        return to_route('matiere.index')->with('success', 'Matière ajoutée avec succès!');
    }


    /**
     * Display the specified resource.
     */
    public function show(Matiere $matiere)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Matiere $matiere)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMatiereRequest $request, Matiere $matiere)
    {
        $matiere->update([
            'nommatiere' => $request->nommatiere,
        ]);

        return to_route('matiere.index')->with('warning', 'Matière modifiée avec succès!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $matiere = Matiere::findOrFail($id);

        $matiere->delete();

        return to_route('matiere.index')->with('danger','Matière supprimée avec success!');
    }

    public function importMatiereExcelData(Request $request)
    {
        // Valider le fichier d'importation
        $request->validate([
            'import_file' => [
                'required',
                'file'
            ],
        ]);

        try {
            // Importer les données Excel
            Excel::import(new MatiereImport, $request->file('import_file'));

            return redirect()->back()->with('status', 'Importation réussie avec succès !');
        } catch (\Exception $e) {
            // En cas d'erreur, rediriger avec un message d'erreur
            return redirect()->back()->with('error', 'Erreur lors de l\'importation : ' . $e->getMessage());
        }
    }

}