@extends ('LayoutsSD.siteavanza')

@section('ContenidoSite-01')




<div class="container-fluid">
  <div class="row">
							<!--begin::Dashboard-->
<!--begin::Row-->

<!--Begin::Row-->
@if($conteo == 1)
@foreach($empresa as $empresa)
<div class="col-xl-12">
        <!--begin::Stats Widget 1-->
<div class="card card-custom bgi-no-repeat card-stretch gutter-b"
    style="background-position: right top; background-size: 30% auto; background-image: url(/avanza/assets/media/svg/shapes/abstract-4.svg)">
    <!--begin::Body-->
    <div class="card-body">
        <a href="#" class="card-title font-weight-bold text-muted text-hover-primary font-size-h5">{{$empresa->empresa}} </a>

        <div class="font-weight-bold text-success mt-9 mb-5">3:30PM - 4:20PM</div>
​        

<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12 col-md-2 symbol symbol-50 symbol-lg-120 col-2">
      <img alt="Pic" src="/fichaimg/clientes/5/sasa.jpg">
    </div>
    <div class="col-sm-12 col-md-6 text-dark-75 font-weight-bolder font-size-h5 m-0 col-6">
      {{$empresa->descripcion}}
    </div>
  </div>
</div>
        <a href="/gestion/avanza/fichas" type="button" class="btn btn-success btn-lg btn-block mt-5">INFORMACIÓN EMPRESA</a>
    </div>
    <!--end::Body-->
</div>
<!--end::Stats Widget 1-->
    </div>
@endforeach
@else
<p>Debe registrar los datos de tu compañia para continar y habilitar las opciones adicionales para publicicaciones</p>
  <a href="/gestion/avanza/crear-empresa" type="button" class="btn btn-success btn-lg btn-block mt-5">CREAR EMPRESA</a>
 @endif

@if($conteo == 1)
    <div class="col-xl-4">
        <!--begin::Stats Widget 1-->
<div class="card card-custom bgi-no-repeat card-stretch gutter-b"
    style="background-position: right top; background-size: 30% auto; background-image: url(/avanza/assets/media/svg/shapes/abstract-4.svg)">
    <!--begin::Body-->
    <div class="card-body">
        <a href="#" class="card-title font-weight-bold text-muted text-hover-primary font-size-h5">FICHAS</a>

        <div class="font-weight-bold text-success mt-9 mb-5">3:30PM - 4:20PM</div>

        <p class="text-dark-75 font-weight-bolder font-size-h5 m-0">
            Craft a headline that is informative<br/>
            and will capture readers
        </p>
        <a href="/gestion/avanza/fichas" type="button" class="btn btn-success btn-lg btn-block mt-5">VER FICHAS</a>
    </div>
    <!--end::Body-->
</div>
<!--end::Stats Widget 1-->
    </div>
    <div class="col-xl-4">
        <!--begin::Stats Widget 2-->
<div class="card card-custom bgi-no-repeat card-stretch gutter-b"
    style="background-position: right top; background-size: 30% auto; background-image: url(/avanza/assets/media/svg/shapes/abstract-2.svg)">
    <!--begin::Body-->
    <div class="card-body">
        <a href="#" class="card-title font-weight-bold text-muted text-hover-primary font-size-h5">MENSAJES</a>

        <div class="font-weight-bold text-success mt-9 mb-5">03 May 2020</div>

        <p class="text-dark-75 font-weight-bolder font-size-h5 m-0">
            Great blog posts don’t just happen<br/>
            Even the best bloggers need it
        </p>
         <a href="/gestion/avanza/mensaje" type="button" class="btn btn-success btn-lg btn-block mt-5">VER MESNSAJES</a>
    </div>
    <!--end::Body-->
</div>
<!--end::Stats Widget 2-->
    </div>
    <div class="col-xl-4">
        <!--begin::Stats Widget 3-->
<div class="card card-custom bgi-no-repeat card-stretch gutter-b"
    style="background-position: right top; background-size: 30% auto; background-image: url(/avanza/assets/media/svg/shapes/abstract-1.svg)">

    <!--begin::body-->
    <div class="card-body">
        <a href="#" class="card-title font-weight-bold text-muted text-hover-primary font-size-h5">ESTADÍSTICAS</a>

        <div class="font-weight-bold text-success mt-9 mb-5">ReactJS</div>

        <p class="text-dark-75 font-weight-bolder font-size-h5 m-0">
            AirWays - A Front-end solution for<br/>
            airlines build with ReactJS
        </p>
         <a href="" type="button" class="btn btn-success btn-lg btn-block mt-5">VER ESTADÍSTICAS</a>
    </div>
    <!--end::Body-->
</div>
<!--end::Stats Widget 3-->
</div>
<!--End::Row-->
@else
@endif
</div>
</div>





<!--
<div class="row">

  <div class="row">
  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 titulo">
      <h1 class="text-center">Mis Servicios Digitales </h1>
  </div>
  </div>
    <div class="row">
        <div class="col-sm-4">
            <div class="card">
             
                <div class="avatar">
                     <i class="fa fa-file"></i>
                </div>
                <div class="content">
                    <h2>Mis Fichas</h2>
                     <a href="/gestion/avanza/fichas" type="button" class="btn btn-primary">Ver Fichas</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
        
                <div class="avatar">
                  <span class="badge">12</span>
                  <i class="fa fa-envelope"></i>
                </div>
                <div class="content">
                    <h2>Mis mensajes</h2>
                    <a href="/gestion/avanza/mensaje" type="button" class="btn btn-primary">Ver Mensajes</a>
                </div>
            </div>
        </div>
            <div class="col-sm-4">
            <div class="card">
               
                <div class="avatar">
                 <i class="fa fa-pie-chart"></i>
                </div>
                <div class="content">
                    <h2>Estadisticas</h2>
                    <p><button type="button" class="btn btn-primary">Ver Estadisticas</button></p>
                </div>
            </div>
        </div>
        
    </div>
</div>
-->
@stop