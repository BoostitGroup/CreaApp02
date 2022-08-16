@extends('adminlte::master')

@inject('layoutHelper', 'JeroenNoten\LaravelAdminLte\Helpers\LayoutHelper')

@section('adminlte_css')
    @stack('css')
    @yield('css')
@stop
@section('content_top_nav_right')
@if(Auth::user()->role==1)<li class="nav-item">

    <a class="nav-link active" href="{{url('showNotif/A Renouveler Info')}}">

        <span>cotisation:</span>
          @if(Session('etat'))
    <span class="badge badge-info">
        {{Session::get('etat') }}
      </span>
         @endif
    </a>@endif


@if((Auth::user()->role<>1) && (Auth::user()->role<>5)&& (Auth::user()->role<>8))<li class="nav-item">

    <a class="nav-link active" href="{{url('showNotif/A Renouveler Info')}}">


        <i class="fas fa-bell text-info"></i>

          @if(Session('renouveler'))
    <span class="badge badge-info">
        {{Session::get('renouveler') }}
      </span>
         @endif



    </a>

</li>@endif

@if((Auth::user()->role<>1) && (Auth::user()->role<>5)&& (Auth::user()->role<>8))<li class="nav-item">

    <a class="nav-link active" href="{{url('showNotif/A Renouveler Alert')}}">
                   <i class="fas fa-bell text-orange"></i>


                      @if(Session('renouvAlert'))
    <span class="badge badge-warning">
        {{Session::get('renouvAlert') }}
     </span>
         @endif




    </a>

</li>@endif


@if((Auth::user()->role<>1) && (Auth::user()->role<>5)&& (Auth::user()->role<>8))<li class="nav-item">

    <a class="nav-link active" href="{{url('showNotif/Dépassement Délai')}}">

                    <i class="fas fa-bell text-red " ></i>



        @if(Session('depassement'))
     <span class="badge badge-danger">
        {{Session::get('depassement') }}
    </span>
         @endif


    </a>

</li>@endif

@if((Auth::user()->role<>1) && (Auth::user()->role<>5)&& (Auth::user()->role<>8))<li class="nav-item">

    <a class="nav-link active" href="{{url('showNotif/Désactivé')}}">


                    <i class="fas fa-exclamation-circle " style="color:grey"></i>


              @if(Session('desactivé'))
               <span class="badge badge-secondary">
        {{Session::get('desactivé') }}
             </span>
         @endif


    </a>

</li>@endif



@endsection

@section('classes_body', $layoutHelper->makeBodyClasses())

@section('body_data', $layoutHelper->makeBodyData())

@section('body')
    <div class="wrapper">

        {{-- Top Navbar --}}
        @if($layoutHelper->isLayoutTopnavEnabled())
            @include('adminlte::partials.navbar.navbar-layout-topnav')
        @else
            @include('adminlte::partials.navbar.navbar')
        @endif

        {{-- Left Main Sidebar --}}
        @if(!$layoutHelper->isLayoutTopnavEnabled())
            @include('adminlte::partials.sidebar.left-sidebar')
        @endif

        {{-- Content Wrapper --}}
        @empty($iFrameEnabled)
            @include('adminlte::partials.cwrapper.cwrapper-default')
        @else
            @include('adminlte::partials.cwrapper.cwrapper-iframe')
        @endempty

        {{-- Footer --}}
        @hasSection('footer')
            @include('adminlte::partials.footer.footer')
        @endif

        {{-- Right Control Sidebar --}}
        @if(config('adminlte.right_sidebar'))
            @include('adminlte::partials.sidebar.right-sidebar')
        @endif

    </div>
@stop

@section('adminlte_js')
    @stack('js')
    @yield('js')
@stop
