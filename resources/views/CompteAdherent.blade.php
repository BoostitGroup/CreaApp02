@extends('adminlte::page')

@section('title', 'Adhérent')

@section('content_header')
    <h1 class="m-0 text-dark">Gestion des comptes Adhérents</h1>
@stop

@section('content')


    <div class="card">
        <div class="card-body">

            <div>
                <h3 class="m-1 text-dark" style="font-size:1.5vw;text-align:center;">Liste des comptes Adhérents</h3>
            </div>

            <table id="example" class="table table-bordered table-hover dataTable" style="width:100%">

                <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <!--<th>Entreprise</th>-->
                    <th>Nom d'utilisateur</th>
                    <th>Nom de la société</th>
                    <th>Email</th>
                    <th>Rôle</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($user as $us)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$us->name}}</td>
                        <td>{{ ($us->adherent!==  null)?$us->adherent->nomS : ''}}</td>
                        <td>{{$us->email}}</td>
                        @if($us->role==1)
                            <td>Adhérent</td>
                        @else
                            <td>Adhérent Désactivé</td>

                        @endif
                        <td>



                            <a href="{{route('adherent.show1',$us->id)}}" class="btn btn-success1"><i class="fa fa-th-list"></i> Voir </a>
                            @if($us->role==1)
                                <a href="{{route('adherent.edit1',$us->id)}}" class="btn btn-primary1" ><i class="fa fa-edit"></i> Editer</a>
                            @endif
                            <form action="{{url('admin/user/'.$us->id)}}" method="POST">




                                @csrf
                                @method('DELETE')
                                <button type="submit" class='btn btn-danger'><i class="fa fa-trash"></i> Supprimer</button>
                            </form>
                        </td>
                    </tr>

                @endforeach
                </tbody>
            </table>


        </div>
    </div>

     </div>

   </div>

</div>
@endsection
