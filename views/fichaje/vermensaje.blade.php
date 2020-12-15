@extends ('LayoutsSD.siteavanza')
  @section('ContenidoSite-01') 
                <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class=" container ">
                            <!--begin::Row-->
<div class="row">
    <!--begin::Col-->
    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 offset-xl-3">
        <!--begin::Card-->
        <div class="card card-custom gutter-b card-stretch">
            <!--begin::Body-->
            <div class="card-body pt-4">
                <!--begin::Toolbar-->
                <div class="d-flex justify-content-end">
                    <div class="dropdown dropdown-inline" data-toggle="tooltip" title="Quick actions" data-placement="left">
                        <a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="ki ki-bold-more-hor"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                            <!--begin::Navigation-->
<ul class="navi navi-hover">
    <li class="navi-header font-weight-bold py-4">
        <span class="font-size-lg">Choose Label:</span>
        <i class="flaticon2-information icon-md text-muted" data-toggle="tooltip" data-placement="right" title="Click to learn more..."></i>
    </li>
    <li class="navi-separator mb-3 opacity-70"></li>
    <li class="navi-item">
        <a href="#" class="navi-link">
            <span class="navi-text">
                <span class="label label-xl label-inline label-light-success">Customer</span>
            </span>
        </a>
    </li>
    <li class="navi-item">
        <a href="#" class="navi-link">
            <span class="navi-text">
                <span class="label label-xl label-inline label-light-danger">Partner</span>
            </span>
        </a>
    </li>
    <li class="navi-item">
        <a href="#" class="navi-link">
            <span class="navi-text">
                <span class="label label-xl label-inline label-light-warning">Suplier</span>
            </span>
        </a>
    </li>
    <li class="navi-item">
        <a href="#" class="navi-link">
            <span class="navi-text">
                <span class="label label-xl label-inline label-light-primary">Member</span>
            </span>
        </a>
    </li>
    <li class="navi-item">
        <a href="#" class="navi-link">
            <span class="navi-text">
                <span class="label label-xl label-inline label-light-dark">Staff</span>
            </span>
        </a>
    </li>
    <li class="navi-separator mt-3 opacity-70"></li>
    <li class="navi-footer py-4">
        <a class="btn btn-clean font-weight-bold btn-sm" href="#">
            <i class="ki ki-plus icon-sm"></i>
            Add new
        </a>
    </li>
</ul>
<!--end::Navigation-->
                        </div>
                    </div>
                </div>
                <!--end::Toolbar-->
                <!--begin::User-->
                <div class="d-flex align-items-end mb-7">
                    <!--begin::Pic-->
                    <div class="d-flex align-items-center">
                        <!--begin::Pic-->
                        <div class="flex-shrink-0 mr-4 mt-lg-0 mt-3">
                            <div class="symbol symbol-circle symbol-lg-75">
                                <img src="/siteavanza/imagenes/mensaje.png" alt="image"/>
                            </div>
                            <div class="symbol symbol-lg-75 symbol-circle symbol-primary d-none">
                                <span class="font-size-h3 font-weight-boldest">JM</span>
                            </div>
                        </div>
                        <!--end::Pic-->
                        <!--begin::Title-->
                        <div class="d-flex flex-column">
                            <a href="#" class="text-dark font-weight-bold text-hover-primary font-size-h4 mb-0">{{$mensaje->nombre}}</a>
                            <span class="text-muted font-weight-bold">{{$mensaje->sujeto}}</span>
                        </div>
                        <!--end::Title-->
                    </div>
                    <!--end::Title-->
                </div>
                <!--end::User-->
                <!--begin::Desc-->
                <p class="mb-7 text-justify">
                    {{$mensaje->mensaje}}
                </p>
                <!--end::Desc-->
                <!--begin::Info-->
                <div class="mb-7">
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="text-dark-75 font-weight-bolder mr-2">Email:</span>
                        <a href="#" class="text-muted text-hover-primary">{{$mensaje->email}}</a>
                    </div>
                    <div class="d-flex justify-content-between align-items-cente my-1">
                        <span class="text-dark-75 font-weight-bolder mr-2">Teléfono:</span>
                        <a href="#" class="text-muted text-hover-primary">{{$mensaje->datos}}</a>
                    </div>
                    <div class="d-flex justify-content-between align-items-cente my-1">
                        <span class="text-dark-75 font-weight-bolder mr-2">Interés:</span>
                        <a href="#" class="text-muted text-hover-primary">{{$mensaje->empresa}}</a>
                    </div>
             
                </div>
                <!--end::Info-->
                <a href="#" class="btn btn-block btn-sm btn-light-warning font-weight-bolder text-uppercase py-4 disabled">Mensaje Recibido</a>
            </div>
            <!--end::Body-->
        </div>
        <!--end::Card-->
    </div>
    <!--end::Col-->
    
</div>
<!--end::Row-->
<!--begin::Row-->
<div class="row">
   
</div>
<!--end::Row-->
<!--begin::Pagination-->

<!--end::Pagination-->
                    </div>
        <!--end::Container-->
    </div>
<!--end::Entry-->
    @stop

