@extends('adminlte::page')

@section('title', 'Adhérent')

@section('content_header')
    <h1 class="m-0 text-dark">Gestion des Adhérents</h1>

    <div class="row">
        <div class="col-12">
        <div class="card" >
            <form action="{{url('admin/Modifier_CompteAdherent/'.$edit->id)}}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}


            <div class="card-body">
                <div>
                    <label for="username">Nom d' utilisateur:</label>
                    <input type="text" id="username" class="form-control" name="username" value="{{$edit->name}}">
                </div>
                <div class="form-group">
                    <label for="email">Email d'adhérent</label>
                    <input type="email"  class="form-control" id="email" name='email' value="{{$edit->email}}" >
                </div>
                <div>
                    <label for="pass">Mot de passe (8 characters minimum):</label>
                    <input type="password" class="form-control" id="pass" name="password"
                           minlength="8"  value="{{$edit->password}}">
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

                  <button type= 'submit' class="btn btn-primary1">Enregistrer</button>
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
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

</div>
@endsection
