<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commission;
use App\Models\Adherent;
use App\Models\Cotisation;
use App\Models\Evenement;
use App\Models\Rapport;
class HomeController extends Controller

{


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $nbrAdherent=Adherent::count();
       

        $nbrAdhAjour=Cotisation::where("Etat",'LIKE','%A Jour%' )->count();
        $RenouvelerAlrt=Cotisation::where("Etat",'LIKE','%A Renouveler Alert%' )->count();
        $Renouveler=Cotisation::where("Etat",'LIKE','%A Renouveler Info%' )->count();


        $nbrAdhAjour=$nbrAdhAjour+$RenouvelerAlrt+$Renouveler;
       
        $Depassement=Cotisation::where("Etat",'LIKE','%Dépassement Délai%' )->count();
        $Desactivé=Cotisation::where("Etat",'LIKE','%Désactivé%' )->count();

        $nbrEvent=Evenement::count();
        $nbrRapport=Rapport::count();
        $nbrcommis=Commission::where('type','LIKE','%commission%')->count();

        $nbrcommit=Commission::where('type','LIKE','%comite%')->count();
        $nbrfil=Commission::where('type','LIKE','%filière%')->count();
        $this->MiseajourEtatCots();
        return view('home',compact('nbrAdherent','nbrAdhAjour','Depassement','Desactivé','nbrEvent','nbrRapport','nbrcommit','nbrcommis','nbrfil'));
    }

}
