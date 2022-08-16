<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Historique;

class HistoriqueController extends Controller
{


public function __construct()

    {

        $this->middleware('auth');

    }
   public function histo(){

        //chargement historique
        $histo=Historique::all();
        return view('historique',['histo'=>$histo]);

    }
}
