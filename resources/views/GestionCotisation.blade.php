@extends('adminlte::page')

@section('title', 'Cotisation')

@section('content_header')
    <h1 class="m-0 text-dark">Gestion des Cotisations</h1>
@stop



@section('content')
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  </head>
  <body>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
     <!-- Button trigger modal -->
     <div class="card">
        <div class="card-header">
            @if(Session::has('success'))
                <div class="alert alert-success">
                    {{Session::get('success')}}
                </div>
            @endif

        <div class="card-body">
          <!--<a href="herent')}}" class="btn btn-primary mb-2">Ajouter </a>-->

          <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Ajouter un adhérent</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

    <div class="row">
        <div class="col-12">
        <div class="card" >
            <form action="" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="card-body">



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
    <div>

      <h3 class="m-1 text-dark" style="font-size:1.5vw; text-align:center;">Liste des Cotisations</h3>
    </div>



      <!--<a href="{{url('admin/adherent')}}" class="btn btn-primary mb-2">Ajouter </a>-->
      <div id="demo">
       <table id="example" class="table table-hover table-bordered" style="width:100%">

            <thead class="thead-light">
               <tr>
                  <th>#</th>
                  <!--<th>Entreprise</th>-->
                  <th>Nom & Prénom</th>
                  <th>Type d'Adhérent</th>
                  <th>Societé</th>
                  <th>Date de Cotisation</th>
                  <th>Type de Paiement</th>
                  <th>Montant</th>
                  <th>Date de Fin</th>
                  <th>Etat</th>
                  <th>Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($cotisation as $ct)
                <tr>
                <td>{{$loop->iteration}}</td>
                <td> {{$ct->adherent->nomA}}</td>
                <td> {{$ct->adherent->typeAd}}</td>
                <td> {{$ct->adherent->nomS}}</td>
                <td>{{$ct->DateCotisation}}</td>
                <td>{{$ct->type_paiment}}</td>
                <td>{{$ct->montant}}</td>
                <td>{{$ct->DateFin}}</td>
                <td><span class="badge @if($ct->Etat=='A Renouveler Info') badge-info @elseif($ct->Etat=='A Renouveler Alert ') badge-warning @elseif($ct->Etat=='A Jour') badge-success @elseif($ct->Etat=='Dépassement Délai') badge-danger @else badge-secondary @endif">{{$ct->Etat}}</span></td>
                  <td>


                     @if($ct->Etat=='Désactivé')

                      <button id="myBtn"  onclick="renouv('{{$ct->DateCotisation}}','{{$ct->id}}')" class="btn btn-primary" ><i class="fa fa-edit"></i>Renouveler</button>
                      @endif

                 </td>
                </tr>

                @endforeach
            </tbody>
       </table>
       </div>

     </div>

</div>
</div>
@endsection

@section('js')

<script>

function renouv($ExdateCot , $id) {

        var  id=$id;

        var action="https://appcrea.boost-it.co/admin/renouvelerCoisation/"+id;

        var exdate=$ExdateCot;
        var var1="<div class='row'>";
            var1 =var1+"<div class='col-6'>";
            var1 =var1+"<div class='card' >";
            var1 =var1+"<form  action=";
            var1 =var1+"'"+action+"' enctype='multipart/form-data'>";

            var1=var1+"<div class='card-body'>";

            var1=var1+"<div class='form-group'>";
            var1=var1+"<label for='titreE'>Ancienne Date de Cotisation :";
            var1=var1+exdate+"</label> <br>";
            var1=var1+"<label for='titreE'>Nouvelle Date de Cotisation</label> ";
            var1=var1+"<input type='date' required='required' class='form-control' id='DateCotisation' name='DateCotisation' value=''>";
            var1=var1+"</div>";
            var1=var1+"<div class='card-footer'>";
            var1=var1+"<button type= 'submit' class='btn btn-primary'>Enregistrer</button>";
            var1=var1+"</div>";
            var1=var1+"</form>";
            var1=var1+"</div>";
            var1=var1+"</div>";
            var1=var1+"</div>";

       document.getElementById("demo").innerHTML = var1;
}


</script>
@endsection
