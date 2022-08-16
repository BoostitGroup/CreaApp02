@extends('adminlte::page')

@section('title', 'Evènement')

@section('content_header')
    <h1 class="m-0 text-dark">Gestion des Evènements</h1>
@stop

@section('content')

    @if(Auth::user()->role<>1)
        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <i class="fa fa-plus"></i>
            Ajouter un évènement
        </button>
    @endif

         <div class="card">
                <div class="card-header">
                    @if(Session::has('success'))
                        <div class="alert alert-success">
                            {{Session::get('success')}}
                        </div>
                @endif

                <input type="hidden" id="url" value="{{ URL::to('/') }}">

        <div class="card-body">

          <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Ajouter un évènement</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

    <div class="row">
        <div class="col-12">
        <div class="card" >
            <form id="add_evenement_form">
            {{csrf_field()}}
                @method('POST')

                <div class="card-body">

                <div class="form-group">
                    <label for="titreE">Titre de l'évènement</label>
                    <input type="text" required="required" class="form-control" id='titreE' name='titreE'>
                  </div>
                  <div class="form-group">
                    <label for="">Catégorie de l'évènement</label>
                            <select name="categorieE" id="categorieE" class="form-control" required="required">
                              <option value = "Rencontre">Rencontre</option>
                              <option value = "Débat ">Débat </option>
                              <option value = "Formation">Formation</option>
                              <option value = "Solidarité ">Solidarité</option>
                              <option value = "Réunion ">Réunion</option>
                              <option value = "Exposition">Exposition</option>
                          </select>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" required="required" class="form-control" id='description' name='description'>


                    </div>
                    <div class="form-group">
                    <label for="dateD">Date de début d'évènement:</label>
                    <input type="date" id="dateD" name="dateD" class="form-control" value="" min="2022-01-01" required="required">
                    </div>
                    <div class="form-group">
                    <label for="dateF">Date de fin d'évènement:</label>
                    <input type="date" id="dateF" name="dateF" class="form-control" value="" min="2022-01-01" >
                    </div>
                    <div class="form-group">
                    <label for="heureD">Heure de début d'évènement:</label>
                    <input type="time" id="heureD" name="heureD" class="form-control"  required>
                    </div>
                    <div class="form-group">
                    <label for="heureF">Heure de fin d'évènement:</label>
                    <input type="time" id="heureF" name="heureF" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="localisation">Localisation</label>
                        <input type="text" required="required" class="form-control" id='localisation' name='localisation'>
                      </div>

                      <div class="form-group">
                        <label for="typeE">Type</label>
                                <select name="typeE" id="typeE" class="form-control" required onchange="srcChange(this.value)">
                                  <option value = "Externe">Externe</option>
                                  <option value = "Interne">Interne</option>

                              </select>
                        </div>
                        <div class="form-group">
                            <label>Choisir une commission ou comité</label>
                            <select class="form-control" name="commission_id" id="commission_id">
                              @foreach($commission as $com)
                              <option value="{{$com->id}}">{{$com->type}}-{{$com->secteur}}</option>
                                @endforeach
                            </select>
                          </div>

                        <div class="form-group">
                            <label for="exampleInputFile">L'image mise en avant</label>
                            <div class="input-group">
                              <div class="custom-file">
                                <input type="file"  required="required" class="custom-file-input" name="logo" id="logo" >

                                <label class="custom-file-label" for="logo">Ajouter l'image de l'évènement</label>

                              </div>
                              <div class="input-group-append">
                                <span class="input-group-text">Télécharger</span>
                              </div>
                            </div>
                          </div>

                        </div>
                        <div class="card-footer">
                            <button type= 'submit' class="btn btn-primary">Enregistrer</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                          </div>

                        </form>
                        </div>
                    </div>
                </div>
                </div>
                        </div>
                        <div class="modal-footer">

                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div>

                  <h3 class="m-1 text-dark" style="font-size:1.5vw;text-align:center;">Liste des évènements</h3>
                </div>

         @if( $evenement->count() === 0 )
             <div class="col-12" style="text-align:center;border: double;" id="emoptydiv">
                 <b>Aucun évènement trouvé</b>
             </div>

         @endif
                <div class="row" id="list-evenement">

                    @foreach ($evenement as $evn)
                    <div class="col-6" id="rowId{{ $evn->id }}">
                        <div style="text-align: center;text-align: center;margin: 26px; border: black">
                            <strong>{{$evn->titreE}}</strong>
                            <div>
                                <img src="{{asset('images/imagesEvenements/'.$evn->logo)}}" style='width:300px; margin:10px;'>
                            </div>

                            <div>
                                <strong>Catégorie de l'évènement:</strong>&nbsp{{$evn->categorieE}}
                                <br><strong>Description:</strong>&nbsp{{$evn->description}}
                                <br><strong>Commission:</strong>&nbsp{{$evn->commission->type}}&nbsp{{$evn->commission->secteur}}
                                <br><strong>Type d'évènement:</strong>&nbsp{{$evn->typeE}}
                                <br><strong><i class="fas fa-map-marker-alt fa-1x" style="color:#FFD02A;"></i></strong>&nbsp{{$evn->localisation}}
                                <br><strong><i class="fas fa-calendar-alt fa-1x" style="color:#FFD02A;"></i></strong>&nbsp du {{$evn->dateD}} au {{$evn->dateF}}
                                <br><strong><i class="fas fa-clock fa-1x" style="color:#FFD02A;"></i></strong>&nbsp de {{$evn->heureD}} à {{$evn->heureF}}
                                <div>
                                    <form action="evenement/{{$evn->id}}" method="POST">
                                        @if(Auth::user()->role<>1)
                                            <a href="{{route('evenement.edit',$evn->id)}}" class="btn btn-primary1" >
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        @endif

                                        @if(Auth::user()->role<>1)
                                            <button type="button" class='btn btn-danger' onclick="delete_element( '{{ route('evenement.destroy', $evn->id ) }}',{{ $evn->id }}, 'no')">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        @endif
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>

                    @endforeach
                        <div id="pagination">
                            {{$evenement->links()}}
                        </div>





                    <style>
                        .w-5{
                            display: none;
                        }
                    </style>
                </div>

             </div>

        </div>
        @endsection

