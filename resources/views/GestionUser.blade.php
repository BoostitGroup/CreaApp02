@extends('adminlte::page')

@section('title', 'utilisateur')

@section('content_header')

@stop

@section('content')
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<div style="padding:19px;">
 <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Gestion des Utilisateurs</h1>
          </div>

        </div>
      </div><!-- /.container-fluid -->
    </section>


  <div class="pull-right">
                       <a style="background-color:#009fe3 !important; color:white !important;" class="btn btn-info " data-toggle="modal" data-target="#myModal2">
                           <i class="fa fa-user"></i>
                           Ajouter un utilisateur
                       </a>
  </div>
<br>
<div class="card">
            <div class="card-header">
              <h3 class="card-title">Utilisateurs</h3>
              @if(session()->has('success'))
      <div class="alert alert-success"> {{session()->get('success')}}</div>
      @endif
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-hover dataTable">
                <thead>
                <tr>

                  <th>Name <ion-icon name="arrow-down"></ion-icon></th>
                  <th>Email</th>
                  <th>Role</th>
                  <th>Supprission</th>
                  <th>Modification</th>

                </tr>
                </thead>
                <tbody>
                 @foreach($users as $u)
                 @if(((Auth::user()->role==2) && ($u->role<>3))||(Auth::user()->role==3))
                <tr>
                  <td>{{$u->name}}</td>
                  <td>{{$u->email}}</td>
                  @if($u->role==2)<td>Admin</td>@endif
                  @if($u->role==3)<td>Super admin</td>@endif
                  @if($u->role==4)<td>Gestionnaire d'adhérents</td>@endif
                  @if($u->role==5)<td>Gestionnaire des évènements</td>@endif



                  <td class="nav-item">
                  <form  action="{{url('admin/users/'.$u->id)}}"  method="post">  {{csrf_field()}} {{method_field('DELETE')}}

                       <button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button>
                       </form>

                    </td>


                <td>
                        <div class="pull-right">
                       <a  class="btn btn-warning btn-xs" data-toggle="modal" data-target="#myModal1{{$u->id}}"><i class="fa fa-edit"></i> </a>
                       </div>
                      </td>
</tr>@endif
  <div id="myModal1{{$u->id}}" class="modal fade" role="dialog">
   <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Formulaire</h4>
      </div>
      <div class="modal-body">
        <form action="{{ url('admin/updateusers/'.$u->id) }}" method="post" enctype="multipart/form-data" >
        {{csrf_field()}}

       <div class="form-group">

                <label for="role">Type d'utilisateur</label>
                <select name="role" required="required">
                 <!--pour afficher le nom des role au lieu leur clé -->
                @if($u->role==2)<option value="{{$u->role}}">Admin</option>@endif
                @if($u->role==3)<option value="{{$u->role}}">Super admin </option>@endif
                @if($u->role==4)<option value="{{$u->role}}">Gestionnaire d'adhérents</option>@endif
                @if($u->role==5)<option value="{{$u->role}}">Gestionnaire des évènements</option>@endif
                <option value="2">Admin</option>
                @if(Auth::user()->role==3)<option value="3">Super admin </option>@endif
                <option value="4">Gestionnaire d'adhérent</option>
                <option value="5">Gestionnaire des évènements</option>
            </select>
          </div>


        <div class="form-group">
          <label for="">Nouveau Mot de passe</label>
          <input type="text" required="required" name="mdp" value="{{$u->password}}"
           class="form-control">
        </div>
        <input type="submit" Style="background-color:pink" class="form-control bnt bnt-primary " value="Enregistrer">
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </form>
      </div>

        </div>

  </div>

              </div>
                 @endforeach
                </tbody>


              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <div id="myModal2" class="modal fade" role="dialog">
   <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Formulaire</h4>
      </div>
      <div class="modal-body">
         <form method="POST" action="{{ url('admin/addusers') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nom') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail ') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="is_admin" class="col-md-4 col-form-label text-md-right">{{ __('Role') }}</label>

                            <div class="col-md-6">


                              <div class="form-group">

                        <select class="form-control" name="role" >


                          <option value="2">Admin</option>
                          @if(Auth::user()->role==3)<option value="3">Super admin </option>@endif
                          <option value="4">Gestionnaire d'adhérents</option>
                          <option value="5">Gestionnaire des évènements</option>


                        </select>
                      </div>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Mot de passe') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-info">
                                    {{ __('Enregistrer') }}
                                </button>
                            </div>
                        </div>
                    </form>
      </div>

        </div>

  </div>
      </div>
  </section>
		<div >
@endsection
