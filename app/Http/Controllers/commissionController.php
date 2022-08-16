<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Commission;
use DB;


class commissionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
     $com=Commission::where('type','Commission')->orWhere('type','Filière')->get();
     return view('commission',['commission'=>$com]);
    }

    public function index2()
    {
        $com=Commission::where('type','Comite')->get();
        return view('comite',['commission'=>$com]);
    }
    public function create() {}
 /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

public function store(Request $request){
        // validate formulaire
        $this->validate($request, [


            'secteur'=> 'required',
            'type'=> 'required',
        ]);


             $commission= new Commission();
       //dd($request->all());

             $commission->type= request('type');
             $commission->secteur=request('secteur') ;


             //$models->choix=implode(glue: ",",request('choix'));

             $commission->save();

            return response()->json(
                [
                    'success'=>'ok',
                    'id' => $commission->id
                ]
            );

    }
     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detail = Commission::find($id);
        return view('detail_commission' , compact('detail'));
    }
     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $edit=Commission::find($id);
       return view('commission',compact('edit'));
    }
    public function update(Request $request, $id)
    {
             $commission=Commission::find($id);
             $commission->type= request('type');
             $commission->secteur=request('secteur') ;
             $commission->save();

            return redirect ('admin/commission')->withSuccess('Bien Modifiée!!');

        }
    public function destroy($id)
    {
        $element = commission::findOrFail($id);

        if ($element === null)
        {
            return response()->json(
                [
                    'success'=>'no',
                    'error_message'=> 'la commission demandé est non trouvé'
                ]
            );

        }
        else
        {

            $canDelete = true;

                $models_relation = array(
                    'App\Models\Adher_Commi' => 'commission_id',
                    'App\Models\Evenement' => 'commission_id',
                    'App\Models\Rapport' => 'commission_id',
                );

                foreach ($models_relation as $model => $relation)
                {
                    if( $model::where($relation,$id)->exists() )
                    {
                        $canDelete = false;
                        break;
                    }

                }

                if($canDelete)
                {
                    $element->delete();

                    return response()->json(
                        ['success'=>'yes']
                    );

                }
                else
                {
                    return response()->json(
                        [
                            'success'=>'no',
                            'error_message'=> 'Vous ne pouvez pas supprimer cette commission, car elle est relié a un adherent , un evenement ou un rapport '
                        ]
                    );

                }

            }

    }
}
