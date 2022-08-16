

@extends('adminlte::page')

@section('title', 'Requette')

@section('content_header')
    <h1  class="text-center" style="color: #FFD02A"  >Envoyer une demande</h1>

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
        <div class="col-md-7 mb-md-0 mb-5" >
        <div class="card" >
            @if(Session::has('message_sent'))
            <div class='alert alert-success' role='alert'>
                {{Session::get('message_sent')}}
            </div>
            @endif
            <form action="{{route('contact.send')}}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="card-body">
                <div class="form-group">
                    <label for="nom">Nom & Prénom </label>
                    <input type="text"  required="required" class="form-control" value="{{Auth::user()->adherent->nomA}}" id='nom' name='nom' readonly>
                </div>
                <div class="form-group">
                    <label for="entreprise">Entreprise </label>
                    <input type="text"  required="required" class="form-control"  id='entreprise'
                    value="{{Auth::user()->adherent->nomS}}" name='entreprise' readonly>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" required="required"
                     value="{{Auth::user()->adherent->email}}" class="form-control" id="email" name='email' readonly>
               </div>
                <div class="form-group">
                    <label for="type">Type de demande</label>
                            <select name="type" class="form-control" required onchange="srcChange(this.value)">
                              <option value = "Solliciter les modifications">Solliciter les modifications</option>
                              <option value = "Demande d'informations">Demande d'informations</option>
                              <option value = "Prendre un rendez-vous">Prendre un rendez-vous</option>

                              <option value = "Autre">Autre</option>
                          </select>
                </div>
                <div class="form-group">
                    <label for="objet">Objet </label>
                    <input type="text"  required="required" class="form-control"  id='objet' name='objet'>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea  name='description' class="form-control"></textarea>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type= 'submit' class="btn btn-primary">Enregistrer</button>

                </div>

              </form>
            <!--Grid column-->

            </div>
        </div>
        <div class="col-md-5 text-center" >
            <ul class="list-unstyled mb-0" >
                <li><i class="fas fa-map-marker-alt fa-2x" style="color: #FFD02A"></i>
                    <p>Résidence du PARC, Villa N03, Route de Ouled Fayet, Dely Ibrahim, Alger</p>
                </li>

                <li><i class="fas fa-phone mt-4 fa-2x" style="color: #FFD02A"></i>
                    <p>+213 (0) 550 11 00 11</p>
                </li>

                <li><i class="fas fa-envelope mt-4 fa-2x" style="color: #FFD02A"></i>
                    <p>contact@crea.dz</p>
                </li>
            </ul>
            <!--Google map-->
         <div id="map-container-google-1" class="z-depth-1-half map-container" style="height: 300px">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d6393.819525497014!2d2.95218!3d36.748737!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x1ad61109b71aaf0e!2sCREA!5e0!3m2!1sfr!2sdz!4v1652006281362!5m2!1sfr!2sdz" width="400" height="220" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
         </div>

  <!--Google Maps-->
        </div>
    </div>

    </div>
 @stop

