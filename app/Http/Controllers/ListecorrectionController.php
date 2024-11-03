<?php

namespace App\Http\Controllers;

use App\Models\Sujet;

use Illuminate\Http\Request;

class ListecorrectionController extends Controller
{
    public function index()
    {
        $flistesujet = new Sujet();

        $ecoleId = intval(auth()->user()->etablissement_id);

        if (intval(auth()->user()->role_id) === 2) {
            $listesujets = $flistesujet->listesujetbyprof();
        } elseif (intval(auth()->user()->role_id) === 3) {
            $listesujets = $flistesujet->listesujetbyadmin();
        }

        return view('admin.correction.correctionlist', compact('listesujets'));
    }
}
