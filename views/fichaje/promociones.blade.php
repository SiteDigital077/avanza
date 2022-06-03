@extends ('LayoutsSD.siteavanza')


 @section('ContenidoSite-01')



   <!--begin::Entry-->


    <!--begin::Container-->
    <div class="row">

<div class="col-lg-12">
   
     <a href="/gestion/avanza/crear-promocion" type="button" class="btn btn-success btn-lg btn-block mb-5">CREAR PROMOCIÓN</a>
    
</div>
@foreach($promociones as $promociones)

              <!--begin::Card-->
<div class="card card-custom gutter-b col-lg-3" style="border:20px solid #F3F6F9" >
    <div class="card-body">
        <div class="text-center p-5">
                    <img alt="Pic" class="img-fluid" width="50%" src="{{$promociones->image}}"/>
                </div>
        <div class="">

            <!--begin: Pic-->
            <div class="flex-shrink-0 mr-7 mt-lg-0 mt-3">
                

                <div class="symbol symbol-50 symbol-lg-120 symbol-primary d-none">
                    <span class="font-size-h3 symbol-label font-weight-boldest">JM</span>
                </div>
            </div>
            <!--end: Pic-->

            <!--begin: Info-->
            <div class="flex-grow-1">
                <!--begin: Title-->
                <div class="align-items-center justify-content-between flex-wrap text-center pb-5">
                    
                    <div class="my-lg-0 my-1">
                        <a href="<?=URL::to('gestion/avanza/editar-ficha');?>/" class="btn btn-sm btn-light-success font-weight-bolder text-uppercase mr-3">Editar</a>
                        <a href="<?=URL::to('gestion/avanza/eliminar-ficha/');?>/" class="btn btn-sm btn-danger font-weight-bolder text-uppercase">Eliminar</a>
                    </div>
                </div>
                <!--end: Title-->
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
                <!--end: Content-->
            </div>
            <!--end: Info-->
        </div>

   

        <!--begin: Items-->
        <div class="d-flex align-items-center flex-wrap">
            <!--begin: Item-->
            <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                <span class="mr-4">
                    <i class="flaticon-piggy-bank icon-2x text-muted font-weight-bold"></i>
                </span>
                <div class="d-flex flex-column text-dark-75">
                    <span class="font-weight-bolder font-size-sm">Earnings</span>
                    <span class="font-weight-bolder font-size-h5"><span class="text-dark-50 font-weight-bold">$</span>249,500</span>
                </div>
            </div>
            <!--end: Item-->

            <!--begin: Item-->
            <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                <span class="mr-4">
                    <i class="flaticon-confetti icon-2x text-muted font-weight-bold"></i>
                </span>
                <div class="d-flex flex-column text-dark-75">
                    <span class="font-weight-bolder font-size-sm">Mensajes</span>
                    <span class="font-weight-bolder font-size-h5"><span class="text-dark-50 font-weight-bold">$</span>164,700</span>
                </div>
            </div>
            <!--end: Item-->

            <!--begin: Item-->
            <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                <span class="mr-4">
                    <i class="flaticon-pie-chart icon-2x text-muted font-weight-bold"></i>
                </span>
                <div class="d-flex flex-column text-dark-75">
                    <span class="font-weight-bolder font-size-sm">Visitas</span>
                    <span class="font-weight-bolder font-size-h5"><span class="text-dark-50 font-weight-bold">$</span>782,300</span>
                </div>
            </div>
   
        </div>
        <!--begin: Items-->
    </div>
</div>
<!--end::Card-->
@endforeach


<!--begin::Row-->

<!--end::Row-->
          </div>
    <!--end::Container-->

   
    @stop