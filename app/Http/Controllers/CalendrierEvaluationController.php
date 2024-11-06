<?php

namespace App\Http\Controllers;

use App\Models\CalendrierEvaluation;
use App\Models\Classe;
use App\Models\EtablissementFiliere;
use App\Models\Matiere;
use App\Models\TypeSujet;
use Illuminate\Http\Request;

class CalendrierEvaluationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ecoleId = auth()->user()->etablissement_id;

        $fclasse = new Classe();
        $fmatiere = new Matiere();

        $classes = $fclasse->listeclassbyecole();
        $filieres = EtablissementFiliere::with('filiere')->where('active', 1)->where('etablissement_id', $ecoleId)->get();
        $matieres = $fmatiere->listematierebyecole();
        $typesujets = TypeSujet::all();
        $listecalendarevaluations = CalendrierEvaluation::with('matiere','classe','filiere','typeSujet')->where('etablissement_id',$ecoleId)->get();

        //Convertion pour pouvoir avoir accès à la variable dans le script du calendar
        $calendrierEvents = $listecalendarevaluations->map(function ($evaluation) {
            return [
                'id' => $evaluation->id,
                'title' => $evaluation->classe->nomclasse,
                'start' => $evaluation->date . 'T' . $evaluation->debut,
                'end' => $evaluation->date . 'T' . $evaluation->fin,
                'className' => 'event-' . strtolower(str_replace(' ', '-', $evaluation->matiere->nommatiere)),
                'matiere_id' => $evaluation->matiere_id,
                'type_sujet_id' => $evaluation->type_sujet_id,
                'filiere_id' => $evaluation->filiere_id,
                'classe_id' => $evaluation->classe_id,
                'duree' => $evaluation->duree,
            ];
        });

        return view('admin.calendrier.calendrier', compact('filieres', 'classes', 'matieres', 'calendrierEvents','typesujets'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        CalendrierEvaluation::create([
            'matiere_id' => $request->matiere_id,
            'type_sujet_id' => $request->type_sujet_id,
            'filiere_id' => $request->filiere_id,
            'classe_id' => $request->classe_id,
            'debut' => $request->debut,
            'fin' => $request->fin,
            'date' => $request->date,
            'etablissement_id' => auth()->user()->etablissement_id,
        ]);

        if (auth()->user()->role_id == 2) {
            return redirect()->route('calendrier.professeur')->with('success', 'Sujet créé avec succès.');
        } elseif (auth()->user()->role_id == 3) {
            return redirect()->route('calendrier.admin')->with('success', 'Sujet créé avec succès.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(CalendrierEvaluation $calendrierEvaluation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CalendrierEvaluation $calendrierEvaluation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {

        $event = CalendrierEvaluation::find($request->id);

        if ($event) {
            $event->debut = $request->debut;
            $event->fin = $request->fin;
            $event->date = $request->date;
            $event->save();

            return response()->json(['success' => 'Événement mis à jour avec succès.']);
        } else {
            return response()->json(['error' => 'Événement non trouvé.'], 404);
        }
    }




    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $event = CalendrierEvaluation::find($request->id);

        if ($event) {

            $event->delete();

            return response()->json(['success' => 'Événement supprimé avec succès.']);
        } else {
            return response()->json(['error' => 'Événement non trouvé.'], 404);
        }
    }
}
