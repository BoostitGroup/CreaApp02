<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Historique;
use App\Models\User;
use App\Models\Cotisation;
use DateTime;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function historique($histo){
        $hst=new Historique();
        $hst->histo=$histo;
        $hst->user_id= Auth::user()->id;
        $hst->save();
        }


     public function MiseajourEtatCots()
        {
           //Recup cotisation

        	$cotisations=Cotisation::all();

           foreach ($cotisations as $cot) {
           	
           
             $datetime1 = new DateTime($cot->DateFin); 

             $now= new DateTime(date("Y-m-d")); 
                       
        //diff entre 2 dates

         if($now >= $datetime1){$var="true";}else{$var="false";}
         $interval = $datetime1->diff($now);
        
        $nbday= $interval->format('%d');
        $nbmois= $interval->format('%m');
        $nbyear= $interval->format('%Y');
        if($var=="false")
        {
        if(($nbday<=15) && ($nbday>=0) && ($nbyear==0) && ($nbmois==0))
          {$cot->Etat="A Renouveler Alert ";
         
          }elseif(($nbday>15) && ($nbday<=30) && ($nbyear==0) && ($nbmois==0) ){

          $cot->Etat="A Renouveler Info";

      }else{
        $cot->Etat="A Jour";
      }
         $cot->save();  
      }
       
        elseif($var=="true")
        {
          if(($nbday<=30) && ($nbday>=0) && ($nbmois==0))
          {
            $cot->Etat="Dépassement Délai";
            
          }else{
            $cot->Etat="Désactivé";
            
            $adrCompte=User::find($cot->adherent->user->id);
            $adrCompte->role="8";
            $adrCompte->save();

          }


          $cot->save();
        
        }
         
        

    }


    //nbr notif
       
        $Renouveler=Cotisation::where("Etat",'LIKE','%A Renouveler Info%' )->count();
        
        $RenouvelerAlrt=Cotisation::where("Etat",'LIKE','%A Renouveler Alert%' )->count();
       
        $Depassement=Cotisation::where("Etat",'LIKE','%Dépassement Délai%' )->count();
        $Desactivé=Cotisation::where("Etat",'LIKE','%Désactivé%' )->count();

   Session(['depassement' => $Depassement]);

        Session(['renouvAlert' => $RenouvelerAlrt]);

        Session(['renouveler' => $Renouveler]);

        Session(['desactivé' => $Desactivé]);
      

        }
        
}
