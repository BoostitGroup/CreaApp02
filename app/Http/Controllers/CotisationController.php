<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cotisation;
use Notification;
use App\Models\User;
use App\Notifications\CotisationsNotification;
class CotisationController extends Controller
{
    public function __construct()

    {
        $this->middleware('auth');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $cts=Cotisation::all();
        $this->MiseajourEtatCots();
        return view('GestionCotisation',['cotisation'=>$cts]);
    }


    //envoyer notif
    public function sendNotif()
    {
        $userSchema = User::first();

        $cotisationData = [
            'Adherent' => 'Adrt1',
            'Contenu' => 'Dépassement de délai',
            'Type' => 'Alert',
            'cotisation_id' => 1
        ];

        //Notification::send($userSchema, new CotisationsNotification($cotisationData));


       $userSchema->notify(new CotisationsNotification($cotisationData));

        foreach ($userSchema->notifications as $key => $value) {
            dd($value->data['Contenu']);
        }



    }


    public function renouvelerCoisation(Request $request,$id)

    {

       $dateFin=date("Y-m-d", strtotime("+1 years",strtotime(request('DateCotisation'))));

              $cotisation=Cotisation::find($id);

              $cotisation->DateCotisation=request('DateCotisation');
              $cotisation->DateFin=$dateFin;
              $cotisation->Etat='A jour';

              $cotisation->save();

              $adrCompte=User::find($cotisation->adherent->user->id);
              $adrCompte->role="1";
              $adrCompte->save();

             return redirect("admin/cotisation")->withSuccess('Cotisation renouvelée');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showNotif($type)
    {
        $cts=Cotisation::where("Etat",'LIKE','%'.$type.'%' )->get();

        //$this->MiseajourEtatCots();

        return view('GestionCotisation',['cotisation'=>$cts]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
