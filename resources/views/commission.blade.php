@extends('adminlte::page')

@section('title', 'Commission')

@section('content_header')
    <h1 class="m-0 text-dark">Gestion des commissions et filières</h1>
@stop

@section('content')

        @if(Auth::user()->role<>1)

            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <i class="fa fa-plus"></i>
                Ajouter une commission
            </button>

        @endif

<div class="card">
    @if(Session::has('success'))
        <div class="card-header">
                <div class="alert alert-success">
                    {{Session::get('success')}}
                </div>
        </div>
    @endif


    <div class="card-body">
        <div>
            <h3 class="m-1 text-dark" style="font-size:1.5vw;text-align:center;">Liste des commissions et comités</h3>
        </div>

        @if(Auth::user()->role > - 1)

            <table id="example" class="table table-bordered table-hover dataTable" style="width:100%;">

            <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Type</th>
                <th>Nom</th>
                @if(Auth::user()->role<>1)
                    <th>Action</th>
                @endif
            </tr>
            </thead>
            <tbody>
            @foreach ($commission as $com)
                <tr id="rowId{{ $com->id }}">
                    <td>{{$loop->iteration}}</td>

                    <td>{{$com->type}}</td>
                    <td>{{$com->secteur}}</td>
                    @if(Auth::user()->role<>1)
                        <td>
                            @if(Auth::user()->role<>1)
                                <button type="button" class='btn btn-danger' onclick="delete_element( '{{ route('commission.destroy', $com->id ) }}',{{ $com->id }}, 'yes')">
                                    Supprimer <i class="fa fa-trash"></i>
                                </button>
                            @endif
                        </td>
                    @endif
                </tr>



            @endforeach
            </tbody>
        </table>

        @else
            <ol>
                @foreach ($commission as $com)
                    <b><li style="margin-bottom: .5rem;">{{$com->type}} {{$com->secteur}} </li></b>
                @endforeach
            </ol>

            @endif
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ajouter une commission ou un comité</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!--@if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
@foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                @endforeach
                            </ul>
                        </div>
                    @endif-->

                            <div class="row">
                                <div class="col-12">
                                    <div class="card" >
                                        <form id="add_commission_form" enctype="multipart/form-data">
                                            {{csrf_field()}}
                                            @method('POST')

                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="type">Type</label>
                                                    <select name="type" class="form-control" required onchange="srcChange(this.value)" id="type">
                                                        <option value = "Commission">Commission</option>
                                                        <option value = "Filière">Filière</option>

                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="secteur">Secteur</label>
                                                    <input type="text" required="required" class="form-control" id='secteur' name='secteur'>
                                                </div>
                                            </div>
                                            <!-- /.card-body -->

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

</div>

</div>
  @endsection
