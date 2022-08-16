

@extends('adminlte::page')

@section('title', 'Commission')

@section('content_header')
    <h1 class="m-0 text-dark">Ajouter une commission ou un comité</h1>

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
            <form action="{{url('/formCommission')}}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="card-body">



                  <div class="form-group">
                  <label for="type">Type</label>
				          <select name="type" required onchange="srcChange(this.value)">

                    <option value = "">-----</option>
			            	<option value = "Commission">Commission</option>
				            <option value = "Comité">Comité</option>

			            </select>
                  </div>
                  <div class="form-group">
                    <label for="secteur">Secteur</label>
                            <select name="secteur" required onchange="srcChange(this.value)">

                      <option value = "">-----</option>
                              <option value = "startup">Startup</option>
                              <option value = "agriculture">agriculture</option>
                              <option value = "industriel">industiel</option>
                          </select>
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
 @stop

