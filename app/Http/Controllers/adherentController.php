<?php

namespace App\Http\Controllers;

use App\Models\Adherent;
use Illuminate\Http\Request;
use App\Models\Commission;
use App\Models\Adher_Commi;
use App\Models\Cotisation;
use App\Models\Evenement;
use App\Models\Rapport;
use App\Models\User;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use DB;
use DateTime;

class adherentController extends Controller
{
    public function __construct()

    {
        $this->middleware('auth');
    }
    public function index()
    {
        $adr = Adherent::all();
        $com = Commission::all();
        $this->MiseajourEtatCots();

        return view('adherent', ['adherent' => $adr, 'commission' => $com]);
    }
    public function formAdherent()
    {

        $com = Commission::all();
        return view('FormAdherent', ['commission' => $com]);
    }
    public function index2()
    {

        $us = User::where('role', '1')->orWhere('role', '8')->get();
        return view('CompteAdherent', ['user' => $us]);
    }
    //Récupperer les évenements dans la page d'acceuil adherent
    public function dashAdherent()
    {

        $Etat = Cotisation::whereHas("adherent", function ($query) {
            return $query->where('user_id', Auth::user()->id);
        })->first();
        if ($Etat) {

            Session(['etat' => $Etat->Etat]);
        }
        $evn = Evenement::orderBy('id', 'desc')->paginate(2); // pour afficher les 2 dernières evenements
        $rap = Rapport::paginate(5);
        $com = Commission::all();
        $ct = Cotisation::all();
        return view('homeAdherent', ['evenement' => $evn, 'commission' => $com, 'rapport' => $rap, 'cotisation' => $ct]);
        // pour afficher les 2 dernières evenements



    }


    public function create()
    {
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        //validate formulaire

        $this->validate($request, [


            'nomS' => 'required|unique:adherents,nomS',
            'formeJ' => 'required',
            'secteurA' => 'required',
            'effectif' => 'required',
            'adresse' => 'required',
            'wilaya' => 'required',
            'nomA' => 'required',
            'typeA' => 'required',
            'type' => 'required',
            'email' => 'required|email|unique:users,email|unique:adherents,email',
            'password' => 'required',
            'mobile' => 'required',
            'site' => 'required',
            'DateCreation' => 'required',
            'typeAd' => 'required',
            'fax' => 'required',
            'fix1' => 'required',
            'type_paiment' => 'required',
            //'logo'=> 'required',





        ]);


        $adherent = new Adherent();
        //dd($request->all());
        //save photo on file
        //$file_extension= $request->logo->getClientOriginalExtension();
        //$file_name=time().".".$file_extension;
        //$path='images/imagesLogoAdherents';
        //$request->logo->move($path,$file_name);
        //return 'okey';

        $adherent->nomS = request('nomS');
        $adherent->formeJ = request('formeJ');
        $adherent->secteurA = request('secteurA');
        $adherent->adresse = request('adresse');
        $adherent->type = request('type');
        $adherent->wilaya = request('wilaya');
        $adherent->nomA = request('nomA');
        $adherent->typeA = request('typeA');
        $adherent->email = request('email');
        $adherent->mobile = request('mobile');
        $adherent->site = request('site');
        $adherent->DateCreation = request('DateCreation');
        $adherent->typeAd = request('typeAd');
        $adherent->mobile2 = request('mobile2');
        $adherent->fix1 = request('fix1');
        $adherent->fix2 = request('fix2');
        $adherent->fax = request('fax');

        if (!empty($request->input('effectifent'))) {
            $adherent->effectif = request('effectifent');
        } else {
            $adherent->effectif = request('effectifstart');
        }



        //Pour creer un compte a un adhérent et lui affecter son role
        $user = User::create([
            'name' => request('username'),
            'email' => request('email'),
            'role' => 1,
            'password' => Hash::make(request('password')),
        ]);

        $adherent->user_id = $user->id;

        $adherent->save();

        for ($i = 0; $i < count($request->input('commission_id')); $i++) {

            $enl = new Adher_Commi();
            $enl->commission_id = $request->input('commission_id')[$i];
            $enl->adherent_id = $adherent->id;
            $enl->save();
        }


        if (request('type') == "Startup") {
        } else {
            if (request('effectifent') >= 1 && request('effectifent') <= 20) {
                $montant = "100 000 DA";
            } else {
                if (request('effectifent') >= 21 && request('effectifent') <= 300) {
                    $montant = "200 000 DA";
                } else {
                    $montant = "500 000 DA";
                }
            }
        }

        $dateFin = date("Y-m-d", strtotime("+1 years", strtotime(request('DateCotisation'))));
        $cotisation = Cotisation::create([
            'DateCotisation' => request('DateCotisation'),
            'type_paiment' => request('type_paiment'),
            'DateFin' => $dateFin,
            'montant' => $montant,
            'Durée' => 1,
            'Etat' => 'A jour',
            'adherent_id' => $adherent->id,
        ]);

        $this->historique("Ajout d'un adhérent");
        return redirect('admin/adherent')->withSuccess('Adhérent Enregistré!!');
    }

    public function show($id)
    {
        $detail = Adherent::find($id);
        $this->historique("Voir détails d'un adhérent");
        return view('detail_adhernet', compact('detail'));
    }
    // detail de l'adherent dans la page de gestion des adherents
    public function show1($id)
    {
        $detail = Adherent::where('user_id', $id)->first();
        $this->historique("Voir détails d'un adhérent");
        return view('detail_adherentCPT', compact('detail'));
    }



    public function edit($id)
    {
        $edit = Adherent::find($id);
        $commission = Commission::whereNOTIn('id', function ($query) use ($id) {
            $query->select('commission_id')->from('adher_commis')->where('adherent_id', $id);
        })->get();




        return view('Modifier_adherent', compact('edit', 'commission'));
    }

    public function editform($id)
    {
        $edit = User::find($id);
        return view('Modifier_CompteAdherent', compact('edit'));
    }


    //la fonction update pour modifier les adhérents
    public function update(Request $request, $id)
    {

        //dd($request->image->getClientOriginalExtension());
        $adherent = Adherent::find($id);
        //dd($request->all());
        //save photo on file
        //$file_extension= $request->logo->getClientOriginalExtension();
        //$file_name=time().".".$file_extension;
        //$path='images/imagesLogoAdherents';
        //$request->logo->move($path,$file_name);
        //return 'okey';

        $adherent->nomS = request('nomS');
        $adherent->formeJ = request('formeJ');
        $adherent->secteurA = request('secteurA');
        $adherent->effectif = request('effectif');
        $adherent->adresse = request('adresse');
        $adherent->type = request('type');
        $adherent->wilaya = request('wilaya');
        $adherent->nomA = request('nomA');
        $adherent->typeA = request('typeA');
        $adherent->email = request('email');
        $adherent->mobile = request('mobile');
        $adherent->site = request('site');
        $this->historique("Modification d'un adhérent");
        $adherent->save();

        Adher_Commi::where('adherent_id', $adherent->id)->delete();

        for ($i = 0; $i < count($request->input('commission_id')); $i++) {
            $enl = new Adher_Commi();
            $enl->commission_id = $request->input('commission_id')[$i];
            $enl->adherent_id = $adherent->id;
            $enl->save();
        }


        //$adherent->logo=$file_name;
        //$models->choix=implode(glue: ",",request('choix'));

        return redirect('admin/adherent')->withSuccess('Bien Modifiée!!');
    }

    //la fonction update2 pour modifier le compte adhérent
    public function update2(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = request('username');
        //dd(request('password')==$user->password);
        if (request('password') <> $user->password) {
            $user->password = Hash::make(request('password'));
        } //pour crypter le mot de passe
        $user->email = request('email');
        $this->historique("Modification d'un compte adhérent");
        $user->save();

        return redirect('admin/compteAdherent')->withSuccess('Bien Modifiée!!');
    }



    public function destroy($id)
    {

        $adr = Adherent::find($id);
        $user = User::find($adr->user_id);
        $cotisation = Cotisation::where('adherent_id', $id)->delete();



        // récuprer le compte d'adherent clé primaire id de l'adhérent =clé user id
        if ($user) {
            $user->delete();
        }
        adherent::destroy($id);
        $this->historique("Suppression d'un adhérent");

        return response()->json(
            [
                'success' => 'yes',
            ]
        );
    }
    public function delete($id)
    {
        $us = User::find($id);
        $us->delete();
        $this->historique("Suppression d'un compte adhérent");
        return redirect('admin/compteAdherent')->withSuccess('Bien supprimer!!');
    }

    // gestion des utilisateurs
    public function index3()
    {

        $u = User::where('role', '<>', '1')->where('role', '<>', '8')->get(); //récupperer tt les utilisateur sauf les adhérents
        return view('GestionUser', ['users' => $u]);
    }
    //la fonction updateUser pour supprimer le compte user
    protected function destroyUser($id)
    {
        $u = User::find($id);
        $u->delete();
        $this->historique("Suppression d'un compte utilisateur");
        session()->flash('success', 'Bien supprimer !!');
        return redirect('admin/users');
    }

    //la fonction updateUser pour modifier le compte user
    public function updateUser(Request $request, $id)
    {

        $u = User::find($id);
        if ($u->password != $request->input('mdp')) {
            $u->password = Hash::make($request->input('mdp'));
        } else {
            $u->password = $request->input('mdp');
        }
        $u->role = $request->input('role');
        $this->historique("Modification d'un compte utilisateur");
        $u->save();
        session()->flash('success', 'Bien Modifier !!');
        return redirect('admin/users');
    }
    //la fonction store2 pour ajouter un compte utilisateur
    public function store2(Request $request)
    {


        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'role' => request('role'),
            'password' => Hash::make(request('password')),
        ]);
        $this->historique("Ajout d'un compte utilisateur");
        session()->flash('success', 'Bien Ajouter !!');
        return redirect('admin/users');
    }
}
