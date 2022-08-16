@extends('adminlte::page')

@section('title', 'Rapport')

@section('content_header')
    <h1 class="m-0 text-dark">Gestion des rapports</h1>
@stop
@section('content')

    @if(Auth::user()->role<>1)
        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <i class="fa fa-plus"></i>
            Ajouter un rapport
        </button>
    @endif

    <input type="hidden" id="url" value="{{ URL::to('/') }}">
     <div class="card">
        <div class="card-header">
            @if(Session::has('success'))
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
        @endif

        <div class="card-body">

            <div>
                <h3 class="m-1 text-dark" style="font-size:1.5vw;text-align:center;">Liste des rapports</h3>
            </div>

            <table id="example" class="table table-bordered table-hover dataTable" style="width:100%;">

                <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Titre</th>
                    <th>Catégorie du rapport</th>
                    <th>Description</th>
                    <th>Commission</th>
                    <th>Date de publication</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($rapport as $rap)
                    <tr id="rowId{{ $rap->id }}">
                        <td>{{$loop->iteration}}</td>
                        <td>{{$rap->titreR}}</td>
                        <td>{{$rap->categorieR}}</td>
                        <td>{{$rap->description}}</td>
                        <td>{{$rap->datePub}}</td>
                        <td>
                            <form action="rapport/{{$rap->id}}" method="POST">

                                @if(Auth::user()->role<>1)
                                    <a href="{{route('rapport.edit',$rap->id)}}" class="btn btn-primary1" >Modifier</a>
                                @endif
                                <a href="{{asset('storage/PDFrapport/'.$rap->PDF)}}" class="btn btn-success1" >Télécharger</a>

                                @if(Auth::user()->role<>1)
                                    <button type="button" class='btn btn-danger' onclick="delete_element( '{{ route('rapport.destroy', $rap->id ) }}',{{ $rap->id }}, 'yes')">
                                        Supprimer
                                    </button>
                                @endif
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>



            <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Ajouter un rapport</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

    <div class="row">
        <div class="col-12">
        <div class="card" >
            <form id="add_rapport_form">
                {{csrf_field()}}
                @method('POST')
            <div class="card-body">

                <div class="form-group">
                    <label for="titreR">Titre du rapport</label>
                    <input type="text" required="required" class="form-control" id='titreR' name='titreR'>
                  </div>
                  <div class="form-group">
                    <label for="">Catégorie du rapport</label>
                            <select name="categorieR" id="categorieR" class="form-control" required="required">
                              <option value = "note">note</option>
                              <option value = "réunion ">réunion </option>
                              <option value = "compte rendu">compte rendu</option>
                          </select>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" required="required" class="form-control" id='description' name='description'>


                    </div>
                    <div class="form-group">
                    <label for="datePub">Date de publication</label>
                    <input type="date" id="datePub" name="datePub" class="form-control" required="required">

                    </div>
                    <div class="form-group">





                     <div class="form-group">
                        <label>Choisir une commission ou comité</label>
                        <select class="form-control select2" name="commission_id[]" id="commission_id" multiple data-live-search="true"  required>
                          @foreach($commission as $com)
                          <option value="{{$com->id}}">{{$com->type}}-{{$com->secteur}}</option>
                            @endforeach
                        </select>
                    </div> 



                          <div class="form-group">
                          <label for="PDF" class="form-label">Ajouter un fichier PDF</label>
                          <input class="form-control form-control-sm"  id="PDF" name="PDF" type="file">
                          </div>
                   
                            <div class="form-group">
                            <label for="exampleInputFile">L'image mise en avant</label>
                            <div class="input-group">
                              <div class="custom-file">
                                <input type="file"  required="required" class="custom-file-input" name="image" id="image" >

                                <label class="custom-file-label" for="image">Ajouter l'image du rapport</label>

                              </div>
                              <div class="input-group-append">


                                <span class="input-group-text">Télécharger</span>
                              </div>
                            </div>
                          </div> 
                          

                        </div>
                        <div class="card-footer">
                            <button type= 'submit' class="btn btn-primary1">Enregistrer</button>
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
            </div>

       </div>
       @endsection

