@extends('adminlte::page')

@section('title', 'Historique')

@section('content_header')

@stop

@section('content')
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  </head>
  <body>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<div style="padding:19px;">

 <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Historiques</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>



            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>

                  <th >Action <ion-icon name="arrow-down"></ion-icon></th>
                  <th>Utilisateur</th>
                  <th>Date historique</th>

                </tr>
                </thead>
                <tbody>
                 @foreach($histo as $h)
                <tr>
                  <td>{{$h->histo}}</td>
                  <td> @if(isset($h->user->name)){{$h->user->name}}@endif</td>
                  <td>{{date('d/m/Y H:i', strtotime($h->created_at))}}</td>

                </tr>
                 @endforeach
                </tbody>
                <tfoot>
                <tr>
                   <th>Action</th>
                  <th>Utilisateur</th>
                  <th>Date historique</th>
                </tr>
                </tfoot>
              </table>
            </div>
        </div>

@endsection
