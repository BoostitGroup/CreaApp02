@extends('adminlte::page')

@section('title', 'Evènement')

@section('content_header')
    <h1 class="m-0 text-dark">Modifier un évènement</h1>



    <div class="row">
        <div class="col-12">
        <div class="card" >
            <form action="{{url('admin/evenement/'.$edit->id)}}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="card-body">

                <div class="form-group">
                    <label for="titreE">Titre de l'évènement</label>
                    <input type="text" required="required" class="form-control" id='titreE' name='titreE' value="{{$edit->titreE}}">
                  </div>
                  <div class="form-group">
                    <label for="">Catégorie de l'évènement</label>
                            <select name="categorieE" class="form-control" required="required">
                              <option value="{{$edit->categorieE}}">{{$edit->categorieE}}</option>
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
                        <input type="text" required="required" class="form-control" id='description' name='description' value="{{$edit->description}}">


                    </div>
                    <div class="form-group">
                    <label for="dateD">Date de début d'évènement:</label>
                    <input type="date" id="dateD" name="dateD" class="form-control"  value="{{$edit->dateD}}">
                    </div>
                    <div class="form-group">
                    <label for="dateF">Date de fin d'évènement:</label>
                    <input type="date" id="dateF" name="dateF" class="form-control" value="{{$edit->dateF}}" >
                    </div>
                    <div class="form-group">
                    <label for="heureD">Heure de début d'évènement:</label>
                    <input type="time" id="heureD" name="heureD" class="form-control"   value="{{$edit->heureD}}">
                    </div>
                    <div class="form-group">
                    <label for="heureF">Heure de fin d'évènement:</label>
                    <input type="time" id="heureF" name="heureF" class="form-control"   value="{{$edit->heureF}}">
                    </div>
                    <div class="form-group">
                        <label for="localisation">Localisation</label>
                        <input type="text" required="required" class="form-control" id='localisation' name='localisation' value="{{$edit->localisation}}">
                      </div>

                      <div class="form-group">
                        <label for="typeE">Type</label>
                                <select name="typeE" class="form-control" required onchange="srcChange(this.value)">
                                    <option value="{{$edit->typeE}}">{{$edit->typeE}}</option>
                                  <option value = "Externe">Externe</option>
                                  <option value = "Interne">Interne</option>

                              </select>
                        </div>
                        <div class="form-group">
                            <label>Choisir une commission ou comité</label>
                            <select class="form-control" name="commission_id">
                                <option value="{{$edit->commission->id}}">
                                    {{$edit->commission->type}}-{{$edit->commission->secteur}}</option>
                              @foreach($commission as $com)
                              <option value="{{$com->id}}">{{$com->type}}-{{$com->secteur}}</option>
                                @endforeach
                            </select>
                          </div>


                        <div class="form-group">
                            <label for="exampleInputFile">L'image mise en avant</label>
                            <div class="input-group">
                              <div class="custom-file">
                                <input type="file"  required="required" class="custom-file-input" name="logo" id="logo" value="{{$edit->logo}}">

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
                            <button type="button" class="btn btn-secondary">Fermer</button>
                          </div>

                        </form>
                        </div>
                    </div>
                </div>
                </div>

 @endsection

