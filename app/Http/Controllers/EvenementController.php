<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use Illuminate\Http\Request;
use App\Models\Commission;
use DB;

class EvenementController extends Controller
{


    public function __construct()

    {

        $this->middleware('auth');

    }
    public function index()
    {
        $evn=Evenement::orderBy('id','desc')-> paginate(2); // pour afficher les 2 dernières evenements
        $com=Commission::all();
        return view('evenement',['evenement'=>$evn ,'commission'=>$com]);

    }
    //public function show()
    //{
     //$evnt=Evenement::paginate(2);
     //return view('evenement',['evenement'=>$evnt]);
    //}
    // Le fonction store : Pour récuperer tt les données saisie dans le formulaire ajouter un évènement et les sauvgarder par la suite dans la BDD
    public function store(Request $request){
        //Pour valider le formulaire il faut controler et rendre ts les champs obligatoire
       $this->validate($request, [
            'titreE'=> 'required',
            'categorieE'=> 'required',
            'description'=> 'required',
            'dateD'=> 'required',
            'dateF'=> 'required',
            'heureD'=> 'required',
            'heureF'=> 'required',
            'typeE'=> 'required',
            'localisation'=> 'required',
            'logo'=> 'required',
        ]);
        $evenement= new Evenement();
          //dd($request->all());
             //Pour sauvgarder la photo selectionner dans le formulaire dans le dossier imagesEvenements qui se trouve dans public
            $file_extension= $request->logo->getClientOriginalExtension();
            $file_name=time().".".$file_extension;
            $path='images/imagesEvenements/';
            $request->logo->move($path,$file_name);
            //return 'okey';

                $evenement->titreE=request('titreE');
                $evenement->categorieE= request('categorieE');
                $evenement->description= request('description');
                $evenement->dateD= request('dateD');
                $evenement->dateF=request('dateF') ;
                $evenement->heureD=request('heureD') ;
                $evenement->heureF=request('heureF') ;
                $evenement->localisation=request('localisation') ;
                $evenement->typeE=request('typeE') ;
                $evenement->commission_id=request('commission_id') ;
                $evenement->logo=$file_name;

                $this->historique("Ajout d'un évènement");
           //$models->choix=implode(glue: ",",request('choix'));
                $evenement->save();

            return response()->json(
            [
                'success'=>'ok',
                'id' => $evenement->id,
                'logo' => $evenement->logo
            ]
        );

       }
       public function edit($id)
    {
       $edit=Evenement::find($id);
       $commission=commission::all();
       return view('Modifier_evenement',compact('edit','commission'));
    }
    public function update(Request $request, $id)
   {
            $evenement = Evenement::find($id);
            $file_extension= $request->logo->getClientOriginalExtension();
            $file_name=time().".".$file_extension;
            $path='images/imagesEvenements/';
            $request->logo->move($path,$file_name);
            //return 'okey';

                $evenement->titreE=request('titreE');
                $evenement->categorieE= request('categorieE');
                $evenement->description= request('description');
                $evenement->dateD= request('dateD');
                $evenement->dateF=request('dateF') ;
                $evenement->heureD=request('heureD') ;
                $evenement->heureF=request('heureF') ;
                $evenement->localisation=request('localisation') ;
                $evenement->typeE=request('typeE') ;
                $evenement->commission_id=request('commission_id') ;
                $evenement->logo=$file_name;

                $this->historique("Modification d'un évènement ");
           //$models->choix=implode(glue: ",",request('choix'));
                $evenement->save();
                return redirect ('admin/evenement')->withSuccess('Bien Modifiée!!');;

   }
       public function destroy($id)
    {
        Evenement::destroy($id);
        $this->historique("Suppression d'un évènement ");

        return response()->json(
            [
                'success'=>'yes',
            ]
        );
    }
}
