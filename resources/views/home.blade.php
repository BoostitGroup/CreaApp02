@extends('adminlte::page')

@section('title', 'Accueil')

@section('content_header')
    <h1 class="m-0 text-dark">Tableau de bord</h1>

@stop

@section('content')
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Adhérents</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info" style="background-color: #2e83c1!important;">
              <div class="inner">
                <h3>{{$nbrAdherent}}</h3>

                <strong>Nombre d'adhérents</strong>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>

            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3> {{$nbrAdhAjour}}</sup></h3>
                 <strong>Nombre d'adhérents à jour</strong>

              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
             </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{$Depassement}}</h3>

                <strong>Nombre adhérents non à jour</strong>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>

            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{$Desactivé}}</h3>

                <p>Comptes adhérents désactivés</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>

            </div>
          </div>
          <!-- ./col -->
        </div>

           <div class="row">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Evènements</h1>
          </div>
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Commissions</h1>
          </div>
        </div>
         <div class="row">

          <div class="col-lg-3 col-6">

            <!-- small box -->
            <div class="small-box bg-info" style="background-color: #2e83c1!important;">
              <div class="inner">
                <h3>{{$nbrEvent}}</h3>

                <strong>Nombre d'évènements</strong>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>

            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3> {{$nbrRapport}}</sup></h3>
                 <strong>Nombre de rapports</strong>

              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
             </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{$nbrcommit}}</h3>

                <strong>Nombre de comités</strong>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>

            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{$nbrcommis}}</h3>

                <strong>Nombre de commissions</strong>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>

            </div>

            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{$nbrfil}}</h3>

                <strong>Nombre de filières</strong>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>

            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->

        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@stop
