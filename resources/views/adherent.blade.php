@extends('adminlte::page')

@section('title', 'Adhérent')

@section('content_header')
    <h1 id="title1" class="m-0 text-dark">Gestion des adhérents</h1>
@stop
@section('content')

    @if(Auth::user()->role<>1)
        <a type="button" id="btn1" class="btn btn-warning" href="{{url('/formAdherent')}}">
            <i class="fa fa-plus"></i>
            Ajouter un adhérent
        </a>
    @endif

    <!-- Button trigger modal -->
     <div class="card">
        <div class="card-header">
            @if(Session::has('success'))
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
        </div>
    </div>
@endif


        <div class="card-body">
            <div>
              <h3 class="m-1 " style="font-size:1.5vw; text-align:center; ">Liste des Adhérents</h3>
            </div>

      <!--<a href="{{url('admin/adherent')}}" class="btn btn-primary1 mb-2">Ajouter </a>-->
       <table id="example" class="table table-bordered table-hover dataTable" style="width:100%">

            <thead class="thead-light">
               <tr>
                  <th>#</th>
                  <!--<th>Entreprise</th>-->
                  <th>Nom de la société</th>
                  <th>Nom d'adhérent</th>
                  <th>Secteur d'activité</th>
                  <th>Wilaya</th>
                  <th>Action</th>
              </tr>
            </thead>

            <tbody>
                @foreach ($adherent as $adr)
                <tr id="rowId{{ $adr->id }}">
                    <td>{{$loop->iteration}}</td>
                    <!--<td><img src="{{asset('images/imagesLogoAdherents/'.$adr->logo)}}" style='max-width:70px;margin-top:20px;'></td>-->
                    <td>{{$adr->nomS}}</td>
                    <td>{{$adr->nomA}}</td>
                    <td>{{$adr->secteurA}}</td>
                    <td>{{$adr->wilaya}}</td>
                    <td>
                        <a href="{{route('adherent.show3',$adr->id)}}" class="btn btn-success1"><i class="fa fa-th-list"></i> Voir</a>

                        @if(Auth::user()->role<>1)
                            <a href="{{route('adherent.edit',$adr->id)}}" class="btn btn-primary1" ><i class="fa fa-edit"></i> Editer</a>
                        @endif

                        @if(Auth::user()->role<>1)
                            <button type="submit" class='btn btn-danger' onclick="delete_element( '{{ route('adherent.destroy', $adr->id ) }}',{{ $adr->id }}, 'yes')"><i class="fa fa-trash"></i> Supprimer</button>
                        @endif

                     </td>
                </tr>

                @endforeach
            </tbody>
       </table>

    </div>

</div>

</div>


@endsection
