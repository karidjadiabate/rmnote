<?php

namespace App\Http\Controllers;

use App\Models\Etablissement;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ParametreController extends Controller
{
    public function index()
    {
        $listroles = DB::table('users AS u')
            ->join('roles AS r','r.id','=','u.role_id')
            ->where('role_id','!=',1)
            ->where('role_id','!=',4)
            ->select('r.nomrole', DB::raw("COUNT(u.id) AS nbutilisateur"))
            ->where('u.etablissement_id',auth()->user()->etablissement_id)
            ->groupBy('r.nomrole')
            ->get();

        return view('admin.parametre.index',compact('listroles'));
    }

    public function updateetablissement(Request $request, $id)
    {

        $etablissement = Etablissement::findOrFail($id);

        if ($request->hasFile('file')) {
            $media = $request->file('file');
            $name = $media->hashName();
            $media->storeAs('public/logo', $name);

            // Supprimer l'ancienne image de profil si elle existe
            if ($etablissement->logo) {
                Storage::delete('public/logo/' . $etablissement->logo);
            }

            $etablissement->logo = $name;
        }

        // Mettre à jour les autres informations de l'utilisateur
        $etablissement->nometablissement = $request->nometablissement;
        $etablissement->adresse = $request->adresse;
        $etablissement->email = $request->email;
        $etablissement->contact = $request->contact;
        $etablissement->description = $request->description;

        $etablissement->save();

        return back()->with('success', 'Etablissement modifié avec success.');
    }
}
