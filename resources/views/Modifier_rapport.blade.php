@extends('adminlte::page')

@section('title', 'Rapport')

@section('content_header')
    <h1 class="m-0 text-dark">Modifier un rapport</h1>



    <div class="row">
        <div class="col-12">
        <div class="card" >
            <form action="{{url('admin/rapport/'.$edit->id)}}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="card-body">

                <div class="form-group">
                    <label for="titreE">Titre du rapport</label>
                    <input type="text" required="required" class="form-control" id='titreR' name='titreR' value="{{$edit->titreR}}">
                  </div>
                  <div class="form-group">
                    <label for="">Catégorie du rapport</label>
                            <select name="categorieR" class="form-control" required="required" >
                                <option value="{{$edit->categorieR}}">{{$edit->categorieR}}</option>
                              <option value = "note">note</option>
                              <option value = "réunion ">réunion </option>
                              <option value = "compte rendu">compte rendu</option>
                          </select>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text"  class="form-control" id='description' name='description' value="{{$edit->description}}">


                    </div>
                    <div class="form-group">
                    <label for="datePub">Date de publication</label>
                    <input type="date" id="datePub" name="datePub" class="form-control" value="{{$edit->datePub}}">

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
                            <label for="PDF" class="form-label">Ajouter un fichier PDF</label>
                            <input class="form-control form-control-sm" " id="PDF" name="PDF" type="file" required>
                            </div>

                          <div class="form-group">
                            <label for="exampleInputFile">L'image mise en avant</label>
                            <div class="input-group">
                              <div class="custom-file">
                                <input type="file"  required="required" class="custom-file-input" name="image" id="image" value="{{$edit->image}}">

                                <label class="custom-file-label" for="image">Ajouter l'image de l'évènement</label>

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

