<?php

namespace App\Http\Controllers;

use App\Models\Rapport;
use App\Models\Commission;
use App\Models\Rapport_Commi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use DB;

class RapportController extends Controller
{


    public function __construct()

    {

        $this->middleware('auth');
    }
    public function index()
    {
        //$rap=Rapport::paginate(2); // pour afficher les 2 dernières evenements
        $rap = Rapport::all();
        $com = Commission::all();
        return view('rapport', ['rapport' => $rap, 'commission' => $com]);
    }
    public function store(Request $request)
    {
        //Pour valider le formulaire il faut controler et rendre ts les champs obligatoire
        $this->validate($request, [

            'titreR' => 'required',
            'description' => 'required',
            'datePub' => 'required',
            'categorieR' => 'required',
            'image' => 'required',

        ]);




        $rapport = new Rapport();
        //dd($request->all());
        //Pour sauvgarder la photo selectionnée dans le formulaire dans le dossier imagesEvenements qui se trouve dans public
        $file_extension = $request->image->getClientOriginalExtension();
        $file_name = time() . "." . $file_extension;
        $path = 'images/imagesRapports/';
        $request->image->move($path, $file_name);
        //Pour sauvgarder le fichier PDF  selectionné dans le formulaire dans le dossier PDFrapport qui se trouve dans public
        $file_extension1 = $request->PDF->getClientOriginalExtension();
        $file_name1 = time() . "." . $file_extension1;
        // Storage::disk('public')->put('PDFrapport',$file_name1,$request->PDF);
        //Storage::disk('public')->put($file_name1,$request->PDF);
        $request->PDF->move("storage/PDFrapport", $file_name1);

        $rapport->titreR = request('titreR');
        $rapport->PDF = $file_name1;
        $rapport->description = request('description');
        $rapport->datePub = request('datePub');
        $rapport->categorieR = request('categorieR');
        $rapport->image = $file_name;

        $this->historique("Ajout d'un rapport ");
        //$models->choix=implode(glue: ",",request('choix'));
        $rapport->save();

        for ($i = 0; $i < count($request->input('commission_id')); $i++) {

            $enl = new Rapport_Commi();
            $enl->commission_id = $request->input('commission_id')[$i];
            $enl->rapport_id = $rapport->id;
            $enl->save();
        }

        return response()->json(
            [
                'success' => 'ok',
                'id' => $rapport->id,
                'path' => $rapport->PDF
            ]
        );
    }
    public function pdf($id)
    {

        $rap = Rapport::find($id);
        $pdf = Storage::disk('public')->put('PDFrapport', $rap->PDF);
        return $pdf::download($rap->PDF);
        $this->historique("Téléchargement d'un PDF ");
    }
    public function edit($id)
    {
        $edit = Rapport::find($id);
        $commission = commission::all();
        return view('Modifier_rapport', compact('edit', 'commission'));
    }
    public function update(Request $request, $id)
    {

        //dd($request->all());
        //Pour sauvgarder la photo selectionner dans le formulaire dans le dossier imagesEvenements qui se trouve dans public

        $rapport = Rapport::find($id);
        $file_extension = $request->image->getClientOriginalExtension();
        $file_name = time() . "." . $file_extension;
        $path = 'images/imagesRapports/';
        $request->image->move($path, $file_name);

        $file_extension1 = $request->PDF->getClientOriginalExtension();
        $file_name1 = time() . "." . $file_extension1;
        $request->PDF->move("storage/PDFrapport", $file_name1);
        //return 'okey';

        $rapport->titreR = request('titreR');
        $rapport->PDF = $file_name1;
        $rapport->description = request('description');
        $rapport->datePub = request('datePub');
        $rapport->categorieR = request('categorieR');
        $rapport->commission_id = request('commission_id');
        $rapport->image = $file_name;

        $this->historique("Modification d'un rapport ");
        //$models->choix=implode(glue: ",",request('choix'));
        $rapport->save();
        return redirect('admin/rapport')->withSuccess('Bien Modifiée!!');
    }
    public function destroy($id)
    {
        Rapport::destroy($id);
        $this->historique("Suppression d'un rapport ");

        return response()->json(
            [
                'success' => 'yes',
            ]
        );
    }
}
