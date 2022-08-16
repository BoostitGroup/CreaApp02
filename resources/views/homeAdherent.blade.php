@extends('adminlte::page')

@section('title', 'Adhérent')

@section('content_header')


<h2 class="w3" style="text-shadow:1px 1px 0 #444  ;text-align:center;background: #9e9e9e29">Bienvenue dans votre espace CREA</h2>

@stop
@section('content')

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
.mySlides {display:none}
.w3-left, .w3-right, .w3-badge {cursor:pointer}
.w3-badge {height:13px;width:13px;padding:0}
</style>
<body>

<div class="w3-container">
  <p>Le Conseil du Renouveau Economique Algérien – CREA est un syndicat patronal national qui regroupe des entreprises publiques, <br>des entreprises privées et des Startups engagées dans la relance industrielle du pays.</p>
</div>

<div class="w3-content w3-display-container" style="width:1500px ;height:430px ">
  <img class="mySlides" src="vendor/adminlte/dist/img/france.jpg" style="width:100%">
  <img class="mySlides" src="vendor/adminlte/dist/img/test2.jpg" style="width:100%">
  <img class="mySlides" src="vendor/adminlte/dist/img/1652963403.jpg" style="width:100%">
  <div class="w3-center w3-container w3-section w3-large w3-text-white w3-display-bottommiddle" style="width:100%">
    <div class="w3-left w3-hover-text-khaki" onclick="plusDivs(-1)">&#10094;</div>
    <div class="w3-right w3-hover-text-khaki" onclick="plusDivs(1)">&#10095;</div>
    <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(1)"></span>
    <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(2)"></span>
    <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(3)"></span>
  </div>
</div>

<script>
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function currentDiv(n) {
  showDivs(slideIndex = n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" w3-white", "");
  }
  x[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " w3-white";
}
</script>


            <div class="card">
                <div class="card-body">
                    <h2 class="w3" style="text-shadow:1px 1px 0 #444  ;text-align:center;background: #9e9e9e29;">Evènements</h2>
                   <!-- Main content -->
                    <div class="row">
                        @foreach ($evenement as $evn)
                            <div class="col-6" id="rowId{{ $evn->id }}">
                                <div style="text-align: center;text-align: center;margin: 26px; border: black">
                                    <strong>{{$evn->titreE}}</strong>
                                    <div>
                                        <img src="{{asset('images/imagesEvenements/'.$evn->logo)}}" style='width:300px; margin:10px;'>
                                    </div>

                                    <div>
                                        <strong>Catégorie de l'évènement:</strong>&nbsp{{$evn->categorieE}}
                                        <br><strong>Description:</strong>&nbsp{{$evn->description}}
                                        <br><strong>Commission:</strong>&nbsp{{$evn->commission->type}}&nbsp{{$evn->commission->secteur}}
                                        <br><strong>Type d'évènement:</strong>&nbsp{{$evn->typeE}}
                                        <br><strong><i class="fas fa-map-marker-alt fa-1x" style="color:#FFD02A;"></i></strong>&nbsp{{$evn->localisation}}
                                        <br><strong><i class="fas fa-calendar-alt fa-1x" style="color:#FFD02A;"></i></strong>&nbsp du {{$evn->dateD}} au {{$evn->dateF}}
                                        <br><strong><i class="fas fa-clock fa-1x" style="color:#FFD02A;"></i></strong>&nbsp de {{$evn->heureD}} à {{$evn->heureF}}
                                        <div>
                                            <form action="evenement/{{$evn->id}}" method="POST">
                                                @if(Auth::user()->role<>1)
                                                    <a href="{{route('evenement.edit',$evn->id)}}" class="btn btn-primary1" >
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                @endif

                                                @if(Auth::user()->role<>1)
                                                    <button type="button" class='btn btn-danger' onclick="delete_element( '{{ route('evenement.destroy', $evn->id ) }}',{{ $evn->id }}, 'no')">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                @endif
                                            </form>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        @endforeach

           <div class="card-body">
             <h2 class="w3" style="text-shadow:1px 1px 0 #444  ;background:#9e9e9e29; text-align:center;">Rapports</h2>
             <div class="row">
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
                             <td>{{$rap->commission->secteur}}</td>
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




             <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
                <div class="p-3">
                  <h5>Title</h5>
                  <p>Sidebar content</p>
                </div>
              </aside>
              <!-- /.control-sidebar -->

              <!-- Main Footer -->
              <footer class="main-footer">
                <!-- To the right -->

                <!-- Default to the left -->
                <strong>Copyright &copy; 2022-2023 <a href="#">AppAdherent</a>.</strong> All rights reserved By boost it .
              </footer>
            </div>
                          </div>
                      </div>
                  </div>
              </div>
@stop
