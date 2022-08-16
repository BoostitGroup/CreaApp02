<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/clear', function () {

    //$clearconfig = Artisan::call('config:clear');
	$mig1= Artisan::call('route:cache');
    $mig2= Artisan::call('migrate');
    echo $mig1 . $mig2;

});
Route::get('/', function () {
    return view('auth/login');
});



Auth::routes();
Route::middleware('compteActive')->group(function () {
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


/*Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');*/
Route::get('/homeAdherent', function() {
    return view('homeAdherent');
})->name('homeAdherent')->middleware('auth');




//gestion adherent
Route::get('admin/adherent/{id}','adherentController@show')->name('adherent.show3');

//gestion commission
Route::get('admin/commission','commissionController@index')->name('commission.index');
Route::resource('admin/commission',commissionController::class); //pour la creation de tous les routes la page adherent
Route::get('/commission', function () {
    return view('formCommission');});

    Route::get('admin/commission2','commissionController@index2')->name('commission.index2');



Route::middleware('GestionCmpAdher')->group(function () {
//gestion compte adherent
	Route::resource('admin/adherent',adherentController::class); //pour la creation de tous les routes la page adherent
Route::get('adherent.edit1/{id}','adherentController@editform')->name('adherent.edit1');
Route::get('/formAdherent','adherentController@formAdherent');
Route::post('/storeAdherent','adherentController@store');
Route::post('admin/adherent/{id}', 'adherentController@update');
Route::get('admin/compteAdherent','adherentController@index2');
Route::get('admin/detail_adrCompte/{id}','adherentController@show1')->name('adherent.show1');
Route::post('admin/Modifier_CompteAdherent/{id}', 'adherentController@update2');
});
Route::middleware('GestionEvent')->group(function () {
//gestion évènements
Route::resource('admin/evenement',EvenementController::class);
Route::post('admin/evenement/{id}', 'EvenementController@update');
//gestion rapports
Route::resource('admin/rapport',RapportController::class);
Route::post('admin/rapport/{id}', 'RapportController@update');
Route::get('rapport/{id}', 'RapportController@pdf')->name('rapport.pdf');
});
Route::middleware('GestionUser')->group(function () {
// gestion des utilisateur
Route::delete('admin/users/{id}','adherentController@destroyUser');
Route::post('admin/updateusers/{id}','adherentController@updateUser');
Route::post('admin/addusers','adherentController@store2');
Route::get('/admin/users','adherentController@index3');
Route::get('/histo', 'HistoriqueController@histo');
Route::delete('admin/user/{id}', 'adherentController@delete');
});
Route::middleware('GestionCmpAdher')->group(function () {
//Cotisation
Route::get('admin/cotisation','CotisationController@index')->name('cotisation.index');

Route::get('showNotif/{type}','CotisationController@showNotif');

Route::get('admin/renouvelerCoisation/{id}','CotisationController@renouvelerCoisation');

//Notification test

Route::get('/envoi-notification', 'CotisationController@sendNotif');
});

Route::middleware('EnvoyerRequette')->group(function () {
//envoyer requette
Route::resource('admin/requete',RequeteController::class);
//Route::post('email-validate', [EmailController::class, 'checkEmail'])->name('checkEmail');
Route::get('/homeAdherent','adherentController@dashAdherent');
Route::post('/send-message','RequeteController@sendEmail')->name('contact.send');
});
});



//Page compte désactivé
Route::get('/DesactiverCompt',function() {
return view('DesactivateCompte');
});






