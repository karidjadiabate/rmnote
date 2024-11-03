<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Http\Requests\StoreClasseRequest;
use App\Http\Requests\UpdateClasseRequest;
use App\Models\EtablissementFiliere;
use App\Models\Filiere;
use App\Models\Niveau;
use Illuminate\Http\Request;

class ClasseController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $fclasse = new Classe();

        $listefilieres = EtablissementFiliere::with('filiere')->where('active',1)->where('etablissement_id', auth()->user()->etablissement_id)->get();

        $niveaux = Niveau::all();

        $classes = $fclasse->listeclassbyecole();

        return view('admin.classe.listeclasse',compact('classes','listefilieres','niveaux'));
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
        $lastClass = Classe::orderBy('code', 'desc')->first();
        $lastClassNumber = $lastClass ? (int) $lastClass->code : 0;

        // Générer le nouveau code au format 0001, 0002, etc.
        $newCode = str_pad(++$lastClassNumber, 4, '0', STR_PAD_LEFT);

        Classe::create([
            'code' => $request->code,
            'nomclasse' => $request->nomclasse,
            'etablissement_filiere_id' => $request->etablissement_filiere_id,
            'niveau_id' => $request->niveau_id,
            'nbclasse' => $request->nbclasse,
            'etablissement_id' => auth()->user()->etablissement_id,
            'code' => $newCode,
        ]);

        return to_route('classe.index')->with('success','Classe ajoutée avec success!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Classe $classe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Classe $classe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClasseRequest $request, Classe $classe)
    {
        $classe->update([
           'nomclasse' => $request->nomclasse,
            'filiere_id' => $request->filiere_id,
            'niveau_id' => $request->niveau_id,
            'nbclasse' => $request->nbclasse,
            'etablissement_id' => auth()->user()->etablissement_id,
        ]);

        return to_route('classe.index')->with('warning', 'Classe modifiée avec succès!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $classe = Classe::findOrFail($id);
        $classe->delete();

        return to_route('classe.index')->with('danger','Classe supprimé avec success');
    }
}
