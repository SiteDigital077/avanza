@extends ('LayoutsSD.siteavanza')


 @section('ContenidoSite-01')



   <!--begin::Entry-->








<div class="container">
    <div class="row">
        
     <a href="/gestion/avanza/crear-promocion" type="button" class="btn btn-success btn-lg btn-block">CREAR PROMOCIÓN</a>

@foreach($promociones as $promociones)


    
<div class="card card-custom gutter-b col-lg-3" style="border:20px solid #F3F6F9" >
 <div class="card-body">
  
  <div class="text-center p-5">
   <img alt="Pic" class="img-fluid" width="50%" src="{{$promociones->image}}"/>
  </div>

  <div class="flex-shrink-0 mr-7 mt-lg-0 mt-3">
   <div class="symbol symbol-50 symbol-lg-120 symbol-primary d-none">
    <span class="font-size-h3 symbol-label font-weight-boldest">JM</span>
   </div>
  </div>
  
  <div class="flex-grow-1">
   <div class="align-items-center justify-content-between flex-wrap text-center pb-5">
    <div class="my-lg-0 my-1">
     <a href="<?=URL::to('gestion/avanza/editar-promo');?>/{{$promociones->id}}" class="btn btn-sm btn-light-success font-weight-bolder text-uppercase mr-3 btn-block">Editar</a>
     <a href="<?=URL::to('gestion/avanza/eliminar-ficha/');?>/{{$promociones->id}}" class="btn btn-sm btn-danger font-weight-bolder text-uppercase btn-block">Eliminar</a>
    </div>
   </div>
  </div>                    

  <hr>
                <!--begin: Content-->
  <div class="text-center pb-5">
   <div class="col-lg-12">
    <div class="font-weight-bold mb-2">Creación</div>
     <span class="btn btn-sm btn-text btn-light-primary text-uppercase font-weight-bold">{{$promociones->desde}}</span>
    </div>
    <div class="col-lg-12">
      <div class="font-weight-bold mb-2">Actualización</div>
      <span class="btn btn-sm btn-text btn-light-danger text-uppercase font-weight-bold">{{$promociones->hasta}}</span>
    </div>
   </div>

   <hr>
              


        
    </div>
</div>
<!--end::Card-->
@endforeach
</div>
</div>
   
    @stop