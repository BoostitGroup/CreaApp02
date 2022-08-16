<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\Cotisation;
use Session;
use Auth;
class LoginSuccessful
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \Illuminate\Auth\Events\Login  $event
     * @return void
     */
    public function handle(Login $event)
    {
        $Renouveler=Cotisation::where("Etat",'LIKE','%A Renouveler Info' )->count();
        $RenouvelerAlrt=Cotisation::where("Etat",'LIKE','%A Renouveler Alert%' )->count();

        $Depassement=Cotisation::where("Etat",'LIKE','%Dépassement Délai%' )->count();
        $Desactivé=Cotisation::where("Etat",'LIKE','%Désactivé%' )->count();
         
        $Etat=Cotisation::whereHas("adherent",function($query){
            return $query->where('user_id',Auth::user()->id);

           })->first()
           ;
if($Etat){
        Session(['etat' => $Etat->Etat]);

    }
        Session(['depassement' => $Depassement]);

        Session(['renouvAlert' => $RenouvelerAlrt]);

        Session(['renouveler' => $Renouveler]);

        Session(['desactivé' => $Desactivé]);

}

}
