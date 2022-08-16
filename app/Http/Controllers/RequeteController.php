<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;
class RequeteController extends Controller
{
   public function __construct()

    {

        $this->middleware('auth');

    }


    public function index()
    {
      return view('requete');
    }
    public function sendEmail(Request $request)
   {
       $requete=[
           'nom'=>$request->nom,
           'entreprise'=>$request->entreprise,
           'email'=>$request->email,
           'objet'=>$request->objet,
           'type'=>$request->type,
           'description'=>$request->type,

       ];
       Mail::to('sirine.boost@gmail.com')->send(new ContactMail($requete));
       $this->historique("Envoyer une requete");
       return back()->with('message_sent','votre demande a bien été envoyée!');
   }
}
