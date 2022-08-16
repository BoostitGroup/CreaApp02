@extends('adminlte::page')

@section('title', 'Adhérent')

@section('content_header')
    <h1 class="m-0 text-dark">Details d'adhérent</h1>
@stop

@section('content')

<div class="card">
    <!--<div class="col-sm-6">
    <ol class="breadcrumb float-sm-left ">
    <!--<li class="breadcrumb-item"><a href="{{url('admin/adherent')}}">Gestion des  des adhérents </a></li>
    <li class="breadcrumb-item active">Détail de l'adhérent</li>
  </ol>
</div>-->


    <div class="card-header">
                   <!--<a href="{{url('admin/adherent')}}" class="btn btn-danger fas fa-times">Fermer</a>-->
                   <a href="{{url('admin/compteAdherent')}}" class="btn btn-danger "><i class="fa fa-times"></i></a>


    </div>

    <div class="card-body">

    <!-- un tableau sans bordure pour l'affichage de toutes les informations détailés d'une façon vertical -->
           <table >
            <thead>

                <div class="card-body ">
                    <div class="row">
                      <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                        <div class="row">
                          <div class="col-12 col-sm-15">
                            <div class="info-box bg-light">
                              <div  style="background-color: #FFD02A" class="info-box-content">
                                <span  class="info-box-text text-center text-muted">
                                  <span style="color:black "">Nom de la Société </span>
                                </span>
                                <span class="info-box-number text-center text-muted mb-0"> <span style="color:black">{{$detail->nomS}}</span></span>
                              </div>
                            </div>
                          </div>
                          <div class="col-12 col-sm-3">
                            <div class="info-box bg-light">
                              <div  style="background-color: #FFD02A" class="info-box-content">
                                <span  class="info-box-text text-center text-muted">
                                  <span style="color:black "">Forme juridique</span>
                                </span>
                                <span class="info-box-number text-center text-muted mb-0"> <span style="color:black">{{$detail->formeJ}}</span></span>
                              </div>
                            </div>
                          </div>
               <div class="col-12 col-sm-3">
                            <div class="info-box bg-light">
                              <div  style="background-color: #FFD02A" class="info-box-content">
                                <span  class="info-box-text text-center text-muted">
                                  <span style="color:black "">Type</span>
                                </span>
                                <span class="info-box-number text-center text-muted mb-0"> <span style="color:black">{{$detail->type}}</span></span>
                              </div>
                            </div>
                          </div>
                          <div class="col-12 col-sm-3">
                            <div class="info-box bg-light">
                              <div  style="background-color: #FFD02A" class="info-box-content">
                                <span  class="info-box-text text-center text-muted">
                                  <span style="color:black "">Secteur d'activité</span>
                                </span>
                                <span class="info-box-number text-center text-muted mb-0"> <span style="color:black">{{$detail->secteurA}}</span></span>
                              </div>
                            </div>
                          </div>
                          <div class="col-12 col-sm-3">
                            <div class="info-box bg-light">
                              <div  style="background-color: #FFD02A" class="info-box-content">
                                <span  class="info-box-text text-center text-muted">
                                  <span style="color:black "">Date d'adhésion</span>
                                </span>
                                <span class="info-box-number text-center text-muted mb-0"> <span style="color:black">{{$detail->created_at}}</span></span>
                              </div>
                            </div>
                          </div>
                        </div>


                <table >
                <thead class="thead-light">

                  <th><h3 style="color: #FFD02A">Informations Supplémentaires:</h3></th>
                  <tr>

                  <tr>
                  <th>Effectif:</th>
                  <td>{{$detail->effectif}}</td></tr>
                  <tr>
                  <th>Adresse:</th>
                  <td>{{$detail->adresse}}</td></tr>
                  <tr>
                  <th>Wilaya:</th>
                  <td>{{$detail->wilaya}}</td></tr>
                  <tr>
                  <th>Site web:</th>
                  <td>{{$detail->site}}</td></tr>
                  <tr>
                  <th>Commissions/Comités/Filières:</th>
                  <td>@foreach ($detail->adher_commis as $com)
                    <br>{{ $com->commission->type}}&nbsp{{ $com->commission->secteur}}
                  @endforeach</td></tr>
                  <th>Date de cotisation:</th>
                  <td>{{$detail->date_cotisation}}</td>
                </tr>
              </tr>
            </thead>

        </table>
        <h3 style="color: #FFD02A">Informations de l'adhérent:</h3>
     <table id="example5" class="table table-bordered" style="width:100%">

        <thead  style="background-color: #FFD02A">
           <tr>
              <!--<th>Logo de l'entreprise</th>-->
              <th>Nom de l'adhérent</th>
              <th>Type de fonction</th>
              <th>Email de l'adhérent </th>
              <th>Mobile de l'adhérent</th>

          </tr>
        </thead>
        <tbody>

            <tr>
            <!--<td><img src="{{asset('images/imagesLogoAdherents/'.$detail->logo)}}"  class="img-circle img-bordered-sm" style='max-width:150px;margin-top:10px;'>-->
            <td>{{$detail->nomA}}</td>
            <td>{{$detail->typeA}}</td>
            <td>{{$detail->email}}</td>
            <td>{{$detail->mobile}}</td>
            </tr>


        </tbody>
   </table>

</div> </div>

</div>
@endsection

