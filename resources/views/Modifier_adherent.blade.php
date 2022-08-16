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
  </body>

    <div class="row">
        <div class="col-12">
        <div class="card" >
            <form action="{{url('admin/adherent/'.$edit->id)}}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}

            <div class="card-body">
                <div class="form-group">
                    <label for="nomS">Nom de la Société</label>
                    <input type="text" required="required" class="form-control" id='nomS' name='nomS' value="{{$edit->nomS}}">
                  </div>
                  <div class="form-group">
                    <label for="">Forme juridique</label>
                    <select class="form-control" required="required" name="formeJ" >
                              <option value = "SARL" {{ $edit->formeJ == 'SARL' ? 'selected' : '' }}>SARL</option>
                              <option value = "EURL" {{ $edit->formeJ == 'EURL' ? 'selected' : '' }}>EURL</option>
                          </select>
                    </div>
                    <div class="form-group">
                        <label for="">Secteur d'activité</label>
                        <select class="form-control" required="required" name="secteurA" >
                                  <option value = "Sidérurgique" {{ $edit->secteurA == 'Sidérurgique' ? 'selected' : '' }}>Sidérurgique</option>
                                  <option value = "Mécanique et métallique" {{ $edit->secteurA == 'Mécanique et métallique' ? 'selected' : '' }}>Mécanique et métallique </option>
                                  <option value = "Electrique et électronique" {{ $edit->secteurA == 'Electrique et électronique' ? 'selected' : '' }}>Electrique et électronique  </option>
                                  <option value = "Agroalimentaire" {{ $edit->secteurA == 'Agroalimentaire' ? 'selected' : '' }}>Agroalimentaire</option>
                                  <option value = "Manufacturière industrie Chimie, plastique et pharmaceutique" {{ $edit->secteurA == 'Manufacturière industrie Chimie, plastique et pharmaceutique' ? 'selected' : '' }}>Manufacturière industrie Chimie,plastique et pharmaceutique</option>
                                  <option value = "Matériaux de construction" {{ $edit->secteurA == 'Matériaux de construction' ? 'selected' : '' }}>Matériaux de construction</option>
                              </select>
                        </div>

                        <div class="form-group">
                        <label for="type">Type</label>
                                <select name="type" class="form-control">
                                   <option value = "Public" {{ $edit->type == 'Public' ? 'selected' : '' }}>Public</option>
                                  <option value = "Prive" {{ $edit->type == 'Prive' ? 'selected' : '' }}>Privé</option>
                                  <option value = "Startup" {{ $edit->type == 'Startup' ? 'selected' : '' }}>Startup</option>

                              </select>
                        </div>
                    <div class="form-group">
                            <label for="effectif">Effectif</label>
                            <input type="text"  required="required" class="form-control"  id=effectif' name='effectif' value="{{$edit->effectif}}">
                          </div>
                    <div class="form-group">
                            <label for="adresse">Adresse</label>
                            <input type="text" required="required" class="form-control"  id='adresse' name='adresse' value="{{$edit->adresse}}" >
                          </div>

                          <div class="form-group">
                            <label for="">wilaya</label>
                            <select class="form-control" required="required" name="wilaya" >
                                      <option value = "Adrar" {{ $edit->wilaya == 'Adrar' ? 'selected' : '' }}>Adrar</option>
                                      <option value = "Chlef" {{ $edit->wilaya == 'Chlef' ? 'selected' : '' }}>Chlef</option>
                                      <option value = "Laghouat" {{ $edit->wilaya == 'Laghouat' ? 'selected' : '' }}>Laghouat</option>
                                      <option value = "Oum El Bouaghi" {{ $edit->wilaya == 'Oum El Bouaghi' ? 'selected' : '' }}>Oum El Bouaghi</option>
                                       <option value = "Batna" {{ $edit->wilaya == 'Batna' ? 'selected' : '' }}>Batna</option>
                                      <option value = "Bejaia" {{ $edit->wilaya == 'Bejaia' ? 'selected' : '' }}>Bejaia</option>
                                      <option value = "Biskra" {{ $edit->wilaya == 'Biskra' ? 'selected' : '' }}>Biskra</option>
                                      <option value = "Bechar" {{ $edit->wilaya == 'Bechar' ? 'selected' : '' }}>Bechar</option>
                                       <option value = "Blida" {{ $edit->wilaya == 'Blida' ? 'selected' : '' }}>Blida</option>
                                      <option value = "Bouira" {{ $edit->wilaya == 'Bouira' ? 'selected' : '' }}>Bouira</option>
                                      <option value = "Tamanrasset" {{ $edit->wilaya == 'Tamanrasset' ? 'selected' : '' }}>Tamanrasset</option>
                                      <option value = "Tebessa" {{ $edit->wilaya == 'Tebessa' ? 'selected' : '' }}>Tebessa</option>
                                      <option value = "Tlemcen" {{ $edit->wilaya == 'Tlemcen' ? 'selected' : '' }}>Tlemcen</option>
                                      <option value = "Tiaret" {{ $edit->wilaya == 'Tiaret' ? 'selected' : '' }}>Tiaret</option>
                                      <option value = "Tizi Ouzou" {{ $edit->wilaya == 'Tizi Ouzou' ? 'selected' : '' }}>Tizi Ouzou</option>
                                      <option value = "Alger" {{ $edit->wilaya == 'Alger' ? 'selected' : '' }}>Alger</option>
                                      <option value = "Djelfa" {{ $edit->wilaya == 'Djelfa' ? 'selected' : '' }}>Djelfa</option>
                                      <option value = "Jijel" {{ $edit->wilaya == 'Jijel' ? 'selected' : '' }}>Jijel</option>
                                      <option value = "Setif" {{ $edit->wilaya == 'Setif' ? 'selected' : '' }}>Setif</option>
                                      <option value = "Saida" {{ $edit->wilaya == 'Saida' ? 'selected' : '' }}>Saida</option>
                                      <option value = "Skikda" {{ $edit->wilaya == 'Skikda' ? 'selected' : '' }}>Skikda</option>
                                      <option value = "Sidi Bel Abbes" {{ $edit->wilaya == 'Sidi Bel Abbes' ? 'selected' : '' }}>Sidi Bel Abbes</option>
                                      <option value = "Annaba" {{ $edit->wilaya == 'Annaba' ? 'selected' : '' }}>Annaba</option>
                                      <option value = "Guelma" {{ $edit->wilaya == 'Guelma' ? 'selected' : '' }}>Guelma</option>
                                      <option value = "Constantine" {{ $edit->wilaya == 'Constantine' ? 'selected' : '' }}>Constantine</option>
                                      <option value = "Medea" {{ $edit->wilaya == 'Medea' ? 'selected' : '' }}>Medea</option>
                                      <option value = "Mostaganem" {{ $edit->wilaya == 'Mostaganem' ? 'selected' : '' }}>Mostaganem</option>
                                      <option value = "Msila" {{ $edit->wilaya == 'Msila' ? 'selected' : '' }}>Msila</option>
                                      <option value = "Mascara" {{ $edit->wilaya == 'Mascara' ? 'selected' : '' }}>Mascara</option>
                                      <option value = "Ouargla" {{ $edit->wilaya == 'Ouargla' ? 'selected' : '' }}>Ouargla</option>
                                      <option value = "Oran" {{ $edit->wilaya == 'Oran' ? 'selected' : '' }}>Oran</option>
                                      <option value = "El Bayadh" {{ $edit->wilaya == 'El Bayadh' ? 'selected' : '' }}>El Bayadh</option>
                                      <option value = "Illizi" {{ $edit->wilaya == 'Illizi' ? 'selected' : '' }}>Illizi</option>
                                      <option value = "Bordj Bou Arreridj" {{ $edit->wilaya == 'Bordj Bou Arreridj' ? 'selected' : '' }}>Bordj Bou Arreridj</option>
                                      <option value = "Boumerdes" {{ $edit->wilaya == 'Boumerdes' ? 'selected' : '' }}>Boumerdes</option>
                                      <option value = "El Tarf" {{ $edit->wilaya == 'El Tarf' ? 'selected' : '' }}>El Tarf</option>
                                      <option value = "Tindouf" {{ $edit->wilaya == 'Tindouf' ? 'selected' : '' }}>Tindouf</option>
                                      <option value = "Tissemsilt" {{ $edit->wilaya == 'Tissemsilt' ? 'selected' : '' }}>Tissemsilt</option>
                                      <option value = "El Oued" {{ $edit->wilaya == 'El Oued' ? 'selected' : '' }}>El Oued</option>
                                      <option value = "Khenchela" {{ $edit->wilaya == 'Khenchela' ? 'selected' : '' }}>Khenchela</option>
                                      <option value = "Souk Ahras" {{ $edit->wilaya == 'Souk Ahras' ? 'selected' : '' }}>Souk Ahras</option>
                                      <option value = "Tipaza" {{ $edit->wilaya == 'Tipaza' ? 'selected' : '' }}>Tipaza</option>
                                      <option value = "Mila" {{ $edit->wilaya == 'Mila' ? 'selected' : '' }}>Mila</option>
                                      <option value = "Ain Defla" {{ $edit->wilaya == 'Ain Defla' ? 'selected' : '' }}>Ain Defla</option>
                                      <option value = "Naama" {{ $edit->wilaya == 'Naama' ? 'selected' : '' }}>Naama</option>
                                      <option value = "Ain Temouchent" {{ $edit->wilaya == 'Ain Temouchent' ? 'selected' : '' }}>Ain Temouchent</option>
                                      <option value = "Ghardaia" {{ $edit->wilaya == 'Ghardaia' ? 'selected' : '' }}>Ghardaia</option>
                                      <option value = "Relizane" {{ $edit->wilaya == 'Relizane' ? 'selected' : '' }}>Relizane</option>
                                  </select>
                            </div>
                <div class="form-group">
                    <label for="nomA">Nom d'adhérent</label>
                    <input type="text"  required="required" class="form-control"  id='nomA' name='nomA' value="{{$edit->nomA}}" >
                  </div>
                  <div class="form-group">
                    <label for="">Type de fonction</label>
                            <select class="form-control" required="required" name="typeA" >
                              <option value ="PDG" {{ $edit->typeA == 'PDG' ? 'selected' : '' }}>PDG</option>
                              <option value ="DG" {{ $edit->typeA == 'DG' ? 'selected' : '' }}>DG</option>
                              <option value ="Gérant" {{ $edit->typeA == 'Gérant' ? 'selected' : '' }}>Gérant</option>

                          </select>
                    </div>

                  <div class="form-group">
                    <label for="email">Email d'adhérent</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name='email' value="{{$edit->email}}" required autocomplete="email">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>

                  <div class="form-group">
                    <label for="mobile">Mobile d'adhérent</label>
                    <input type="text" required="required" class="form-control" id='mobile' name='mobile' value="{{$edit->mobile}}">
                    <!--<span style="color:red;">@error('téléphoneE'){{$message}}@enderror</span>-->
                  </div>
                  <div class="form-group">
                    <label for="site">Site web </label>
                    <input type="text" required="required" class="form-control" id="site" name='site' value="{{$edit->site}}">
                </div>

                <div class="form-group">
                    <label for="">Choisir une commission ou comité</label>
                    <select  class="form-control select2" name="commission_id[]" id="commission_id" multiple data-live-search="true"  required>

                        @foreach($edit->adher_commis as $com)
                      <option value="{{$com->commission->id}}" selected>{{$com->commission->type}}-{{$com->commission->secteur}}</option>
                        @endforeach
                        @foreach($commission as $com)
                      <option value="{{$com->id}}" >{{$com->type}}-{{$com->secteur}}</option>
                        @endforeach

                    </select>
                  </div>



                <!--<div class="form-group">
                    <label for="exampleInputFile">Photo </label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file"  required="required" class="custom-file-input" name="logo" id="logo"  >

                        <label class="custom-file-label" for="logo">Ajouter le logo de votre entreprise</label>

                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Télécharger</span>
                      </div>
                    </div>
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">

                  <button type= 'submit' class="btn btn-primary">Enregistrer</button>

                </div>

              </form>
            </div>
        </div>
    </div>
    </div>
            </div>


            </div>
          </div>
        </div>
      </div>
    </div>




       </div>

     </div>

     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
</div>
@endsection
