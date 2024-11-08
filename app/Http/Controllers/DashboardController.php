<?php

namespace App\Http\Controllers;

use App\Models\CalendrierEvaluation;
use App\Models\DemandeInscription;
use App\Models\EtablissementFiliere;
use App\Models\Sujet;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $fuser = new User();
        $nbetudiant = $fuser->nbetudiantparecole();
        $nbprofesseur = $fuser->nbprofesseurparecole();
        $nbfiliere = EtablissementFiliere::with('filiere')->where('active',1)->where('etablissement_id', auth()->user()->etablissement_id)->count();
        $nbsujetgenere = Sujet::where('etablissement_id', auth()->user()->etablissement_id)->count();
        $sujetgenererecents = Sujet::with('filiere','matiere','classe','typeSujet')->where('etablissement_id', auth()->user()->etablissement_id)->latest()->limit(4)->get();
        $listecalendarevaluations = CalendrierEvaluation::with('matiere','classe','filiere','typeSujet')
        ->where('is_deleted',0)
        ->where('etablissement_id',auth()->user()->etablissement_id)->limit(3)->get();
        $nbetablissementaccepte = DemandeInscription::where('accepted', 1)->count();
        $nbetablissementrefuse = DemandeInscription::where('rejected', 1)->count();

        $nbadmin = User::where('role_id', 3)->count();

        return view('admin.dashboard', compact(
            'nbetablissementaccepte',
            'nbetablissementrefuse',
            'nbadmin',
            'nbetudiant',
            'nbprofesseur',
            'nbfiliere',
            'nbsujetgenere',
            'sujetgenererecents',
            'listecalendarevaluations'
        ));
    }
}
