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
        <a href="#" class="card-title font-weight-bold text-muted text-hover-primary font-size-h5 ml-8">{{$empresa->empresa}} </a>

        <div class="font-weight-bold text-success mt-3 mb-6 ml-8">Empresa registrada {{date('d-m-Y', strtotime($empresa->created_at))}}</div>

<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12 col-md-2 symbol symbol-50 symbol-lg-120 col-2">
      <img alt="Pic" src="{{$empresa->imagen}}">
    </div>
    <div class="col-sm-12 col-md-10 text-dark-75 font-weight-bolder font-size-h5 m-0 mt-4">
      <h2>{{$empresa->empresa}}</h2>
      {{$empresa->descripcion}}
    </div>
  </div>
</div>
        <a href="/avanza/editar-empresa/{{$empresa->id}}" type="button" class="btn btn-success btn-lg btn-block mt-5">EDITAR EMPRESA</a>
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
        <a href="#" class="card-title font-weight-bold text-muted text-hover-primary font-size-h5">PRODUCTOS Y/O SERVICIOS</a>

        <div class="font-weight-bold text-success mt-5 mb-5">3 Registros</div>

        <p class="text-dark-75 font-weight-bolder font-size-h5 m-0">
            Promoción de productos y servcios<br/>
            digitales
        </p>
        <a href="/gestion/avanza/fichas" type="button" class="btn btn-success btn-lg btn-block mt-5">VER PRODCUCTOS Y/O SERVICIOS</a>
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

        <div class="font-weight-bold text-success mt-5 mb-5">10 Mensajes</div>

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

        <div class="font-weight-bold text-success mt-5 mb-5">ReactJS</div>

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


<div class="col-xl-4">
        <!--begin::Stats Widget 3-->
<div class="card card-custom bgi-no-repeat card-stretch gutter-b"
    style="background-position: right top; background-size: 30% auto; background-image: url(/avanza/assets/media/svg/shapes/abstract-1.svg)">

    <!--begin::body-->
    <div class="card-body">
        <a href="#" class="card-title font-weight-bold text-muted text-hover-primary font-size-h5">PROMOCIONES</a>

        <div class="font-weight-bold text-success mt-5 mb-5">ReactJS</div>

        <p class="text-dark-75 font-weight-bolder font-size-h5 m-0">
            AirWays - A Front-end solution for<br/>
            airlines build with ReactJS
        </p>
         <a href="/gestion/avanza/promociones" type="button" class="btn btn-success btn-lg btn-block mt-5">VER PROMOCIONES</a>
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