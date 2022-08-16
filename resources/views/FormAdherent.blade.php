@extends('adminlte::page')

@section('title', 'Adhérent')

@section('content_header')
    <h1 class="m-0 text-dark">Gestion des Adhérents</h1>
@stop

@section('content')
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">


</head>
  <body>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Button trigger modal -->
     <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-6">
                  <div class="card">
                <h5 class="text-center" style="color: #FFD02A" >Etape 1 : Fiche Pré-Adhésion</h5>
                <form action="{{url('/storeAdherent')}}" method="POST" enctype="multipart/form-data">
                {{csrf_field() }}

                <div class="card-body">

                    <div class="row">
                        <div class="form-group col-6"  >
                            <label for="nomS" >Nom de la Société</label>
                            <input type="text" required="required"  id='nomS' name='nomS' class="form-control @error('nomS') is-invalid @enderror"  value="{{ old('nomS') }}" required autocomplete="nomS" >
                            @error('nomS')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                          </div>

                      <div class="form-group" style='width:50% ;'>
                        <label for="formeJ">Forme juridique</label>
                                <select name="formeJ" class="form-control">
                                  <option value = "SARL">SARL</option>
                                  <option value = "EURL">EURL</option>
                                  <option value = "SPA">SPA</option>
                                  <option value = "SNC">SNC</option>
                                  <option value = "SPAS">SPAS</option>
                                  <option value = "Physique">Physique</option>
                              </select>
                        </div>


                        <div class="form-group" style='width:50% ;'>
                        <label for="type">Type</label>
                                <select name="type" class="form-control" onchange="checking(this);">
                                   <option value = "Public">Public</option>
                                  <option value = "Prive">Privé</option>
                                  <option value = "Startup">Startup</option>

                              </select>
                        </div>



                            
                        <div id="check" class="form-group" style='width:50%; display:none;'>
                          <label>Existence</label> <br>
                          <input type="radio" name="existence" id="moins" value="moins"> Moins de 3 ans <br>
                          <input type="radio" name="existence" id="plus" value="plus"> Plus de 3 ans
                          <div class="moins msg" style="color: red">Le Montant est 25 000 DA</div>
                          <div class="plus msg" style="color: red">Le Montant est 50 000 DA</div>
                                 
                        </div>



                        <div class="form-group col-6" style='width:50% ;'>
                            <label for="">Secteur d'Activité</label>
                                    <select name="secteurA" class="form-control">
                                      <option value = "Sidérurgique">Sidérurgique</option>
                                      <option value = "Mécanique et métallique ">Mécanique et métallique </option>
                                      <option value = "Electrique et électronique ">Electrique et électronique  </option>
                                      <option value = "Agroalimentaire ">Agroalimentaire</option>
                                      <option value = "Manufacturière industrie Chimie, plastique et pharmaceutique ">Manufacturière industrie Chimie,Plastique,Pharmaceutique</option>
                                      <option value = "Matériaux de construction ">Matériaux de construction</option>
                                  </select>
                            </div>

                              <div id="effectifent" class="form-group" style='width:50%; display:none;'>
                                <label for="effectifent" >Effectif</label>
                                <input type="number" min="1" required="required" class="form-control effectifent"   name='effectifent' value="{{ old('effectif') }}">
                                <div class="efct1" style="color: red">Le Montant est 100 000 DA</div>
                                <div class="efct2" style="color: red">Le Montant est 200 000 DA</div>
                                <div class="efct3" style="color: red">Le Montant est 500 000 DA</div>
                              </div> 

                              <div id="effectifstart" class="form-group" style='width:50%; display:block; '>
                                <label for="effectifstart" >Effectif</label>
                                <input type="number" min="1" required="required" class="form-control"  name='effectifstart' value="{{ old('effectif') }}">
                              </div> 



                        <div class="form-group" style='width:50% '>
                                <label for="adresse">Adresse</label>
                                <input type="text" required="required" class="form-control"  id='adresse' name='adresse' value="{{ old('adresse') }}" >
                              </div>

                              <div class="form-group col-6">
                                <label for="">wilaya</label>
                                        <select name="wilaya" class="form-control" required>
                                          <option value = "Adrar">Adrar</option>
                                          <option value = "Chlef">Chlef</option>
                                          <option value = "Laghouat">Laghouat</option>
                                          <option value = "Oum El Bouaghi">Oum El Bouaghi</option>
                                           <option value = "Batna">Batna</option>
                                          <option value = "Bejaia">Bejaia</option>
                                          <option value = "Biskra">Biskra</option>
                                          <option value = "Bechar">Bechar</option>
                                           <option value = "Blida">Blida</option>
                                          <option value = "Bouira">Bouira</option>
                                          <option value = "Tamanrasset">Tamanrasset</option>
                                          <option value = "Tebessa">Tebessa</option>
                                          <option value = "Tlemcen">Tlemcen</option>
                                          <option value = "Tiaret">Tiaret</option>
                                          <option value = "Tizi Ouzou">Tizi Ouzou</option>
                                          <option value = "Alger">Alger</option>
                                          <option value = "Djelfa">Djelfa</option>
                                          <option value = "Jijel">Jijel</option>
                                          <option value = "Setif">Setif</option>
                                          <option value = "Saida">Saida</option>
                                          <option value = "Skikda">Skikda</option>
                                          <option value = "Sidi Bel Abbes">Sidi Bel Abbes</option>
                                          <option value = "Annaba">Annaba</option>
                                          <option value = "Guelma">Guelma</option>
                                          <option value = "Constantine">Constantine</option>
                                          <option value = "Medea">Medea</option>
                                          <option value = "Mostaganem">Mostaganem</option>
                                          <option value = "MSila">MSila</option>
                                          <option value = "Mascara">Mascara</option>
                                          <option value = "Ouargla">Ouargla</option>
                                          <option value = "Oran">Oran</option>
                                          <option value = "El Bayadh">El Bayadh</option>
                                          <option value = "Illizi">Illizi</option>
                                          <option value = "Bordj Bou Arreridj">Bordj Bou Arreridj</option>
                                          <option value = "Boumerdes">Boumerdes</option>
                                          <option value = "El Tarf">El Tarf</option>
                                          <option value = "Tindouf">Tindouf</option>
                                          <option value = "Tissemsilt">Tissemsilt</option>
                                          <option value = "El Oued">El Oued</option>
                                          <option value = "Khenchela">Khenchela</option>
                                          <option value = "Souk Ahras">Souk Ahras</option>
                                          <option value = "Tipaza">Tipaza</option>
                                          <option value = "Mila">Mila</option>
                                          <option value = "Ain Defla">Ain Defla</option>
                                          <option value = "Naama">Naama</option>
                                          <option value = "Ain Temouchent">Ain Temouchent</option>
                                          <option value = "Ghardaia">Ghardaia</option>
                                          <option value = "Relizane">Relizane</option>
                                      </select>
                                </div>
                    <div class="form-group col-6" >

                        <label for="nomA">Nom d'Adhérent</label>
                        <input type="text"  required="required" class="form-control"  id='nomA' name='nomA' value="{{ old('nomA') }}">
                      </div>
                      <div class="form-group" style='width:50% ' >
                        <label for="typeA">Type de fonction</label>
                                <select name="typeA" class="form-control">
                                  <option value = "PDG">PDG</option>
                                  <option value = "DG">DG</option>
                                  <option value = "Gérant">Gérant</option>

                              </select>
                        </div>

                        <div class="form-group" style='width:50% ' >
                          <label for="typeAd">Type d'Adhérent</label>
                                  <select name="typeAd" class="form-control">
                                    <option value = "adherent">Adhérent</option>
                                    <option value = "membre_fondateur">Membre fondateur</option>
                                </select>
                          </div>


                      <div class="form-group" style='width:50% ' >
                        <label for="mobile">Mobile 1</label>
                        <input type="text" required="required" class="form-control" id='mobile' name='mobile' value="{{ old('mobile') }}">
                        <!--<span style="color:red;">@error('téléphoneE'){{$message}}@enderror</span>-->
                      </div>

                      
                      <div class="form-group" style='width:50% ' >
                        <label for="mobile2">Mobile 2 </label>
                        <input type="text" required="required" class="form-control" id='mobile2' name='mobile2' value="{{ old('mobile2') }}">
                      </div>

                      
                      <div class="form-group" style='width:50% ' >
                        <label for="fax">FAX</label>
                        <input type="text" required="required" class="form-control" id='fax' name='fax' value="{{ old('fax') }}">
                      </div>

                      <div class="form-group" style='width:50% ' >
                        <label for="fix1">FIX1</label>
                        <input type="text" required="required" class="form-control" id='fix1' name='fix1' value="{{ old('fix1') }}">
                      </div>
                      <div class="form-group" style='width:50% ' >
                        <label for="fix2">FIX2</label>
                        <input type="text" required="required" class="form-control" id='fix2' name='fix2' value="{{ old('fix2') }}">
                      </div>

                      <div class="form-group" style='width:50% '>
                        <label for="site">Site web </label>
                        <input type="text" required="required" class="form-control" id="site" name='site' value="{{ old('site') }}">
                      </div>

                      <div class="form-group" style='width:50% '>
                        <label for="DateCreation">Date de Création</label>
                        <input type="date" required="required" class="form-control" id="DateCreation" name="DateCreation" value="{{ old('DateCreation') }}">

                      </div>


                    


                      <div class="form-group" >
                        <label>Choisir une commission ou comité</label>
                        <select  class="form-control select2" name="commission_id[]" id="commission_id" multiple data-live-search="true"  required>
                          @foreach($commission as $com)
                          <option value="{{$com->id}}">{{$com->type}}-{{$com->secteur}}</option>
                            @endforeach
                        </select>
                      </div>



                      <div class="form-group" style='width:50% '>
                        <label for="DateCotisation">Date de cotisation</label>
                        <input type="date" id="DateCotisation" name="DateCotisation" value="{{ old('DateCotisation') }}" class="form-control" required="required">
                      </div>

                      <div class="form-group" style='width:50% ;'>
                        <label for="type_paiment">Type de paiement</label>
                                <select name="type_paiment" class="form-control">
                                  <option value = "cheque">Chèque</option>
                                  <option value = "espece">Espèce</option>
                                  <option value = "virement">Virement Bancaire</option>
                              </select>
                        </div>
                      </div> 
                  </div>
                </div>
             </div>


              <div class="col-6">
                <div class="card" >
                    <h5 class="text-center" style="color: #FFD02A" >Etape 2 : Compte adhérent</h5>
                    <div class="card-body">

                    <div class="inputBox">
                        <label for="email">Email d'adhérent</label>
                        <input type="email" required="required" class="form-control @error('email') is-invalid @enderror"  value="{{ old('email') }}" id="email" name='email' required autocomplete="email" >
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>

                    <div>
                        <label for="pass">Nom d' utilisateur:</label>
                        <input type="text" id="pass" name="username" class="form-control"  value="{{ old('username') }}" required>
                    </div>
                    <div>
                        <label for="pass">Mot de passe (8 characters minimum):</label>
                        <input type="password" id="pass" name="password" class="form-control" minlength="8"  required>
                    </div>

                    <div class="card-footer">
                     <input type= 'submit' value="Enregistrer">

                    </div>

                </div>
             </div>
            </form>
            </div>
        </div>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

@endsection

