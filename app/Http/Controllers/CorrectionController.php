<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CorrectionController extends Controller
{
    public function index()
    {
    return view('admin.correction.correction');
    }
}
