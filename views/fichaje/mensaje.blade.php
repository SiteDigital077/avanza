
@extends ('LayoutsSD.siteavanza')


 @section('ContenidoSite-01')
 <!--begin::Card-->
<div class="card card-custom">
  <div class="card-header flex-wrap border-0 pt-6 pb-0">
    <div class="card-title">
      <h3 class="card-label">
        Mensajes Registrados
        <span class="d-block text-muted pt-2 font-size-sm">Datatable initialized from HTML table</span>
      </h3>
    </div>
    <div class="card-toolbar">
      <!--begin::Dropdown-->
<div class="dropdown dropdown-inline mr-2">
 
  <!--begin::Dropdown Menu-->
  <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
    <!--begin::Navigation-->
    <ul class="navi flex-column navi-hover py-2">
      <li class="navi-header font-weight-bolder text-uppercase font-size-sm text-primary pb-2">
            Choose an option:
        </li>
      <li class="navi-item">
        <a href="#" class="navi-link">
          <span class="navi-icon"><i class="la la-print"></i></span>
          <span class="navi-text">Print</span>
        </a>
      </li>
      <li class="navi-item">
        <a href="#" class="navi-link">
          <span class="navi-icon"><i class="la la-copy"></i></span>
          <span class="navi-text">Copy</span>
        </a>
      </li>
      <li class="navi-item">
        <a href="#" class="navi-link">
          <span class="navi-icon"><i class="la la-file-excel-o"></i></span>
          <span class="navi-text">Excel</span>
        </a>
      </li>
      <li class="navi-item">
        <a href="#" class="navi-link">
          <span class="navi-icon"><i class="la la-file-text-o"></i></span>
          <span class="navi-text">CSV</span>
        </a>
      </li>
      <li class="navi-item">
        <a href="#" class="navi-link">
          <span class="navi-icon"><i class="la la-file-pdf-o"></i></span>
          <span class="navi-text">PDF</span>
        </a>
      </li>
    </ul>
    <!--end::Navigation-->
  </div>
  <!--end::Dropdown Menu-->
</div>
<!--end::Dropdown-->

<!--begin::Button-->

<!--end::Button-->
    </div>
  </div>
  <div class="card-body">
    <!--begin: Search Form-->
    <!--begin::Search Form-->
<div class="mb-7">
  <div class="row align-items-center">
    <div class="col-lg-10 col-xl-8">
      <div class="row align-items-center">
        <div class="col-md-4 my-2 my-md-0">
          <div class="input-icon">
            <input type="text" class="form-control" placeholder="Search..." id="kt_datatable_search_query" />
            <span><i class="flaticon2-search-1 text-muted"></i></span>
          </div>
        </div>

                        <div class="col-md-4 my-2 my-md-0">
          <div class="d-flex align-items-center">
            <label class="mr-3 mb-0 d-none d-md-block">Status:</label>
            <select class="form-control" id="kt_datatable_search_status">
              <option value="">All</option>
              <option value="1">Pending</option>
              <option value="2">Delivered</option>
              <option value="3">Canceled</option>
              <option value="4">Success</option>
              <option value="5">Info</option>
              <option value="6">Danger</option>
            </select>
          </div>
        </div>
        <div class="col-md-4 my-2 my-md-0">
          <div class="d-flex align-items-center">
            <label class="mr-3 mb-0 d-none d-md-block">Type:</label>
            <select class="form-control" id="kt_datatable_search_type">
              <option value="">All</option>
              <option value="1">Online</option>
              <option value="2">Retail</option>
              <option value="3">Direct</option>
            </select>
          </div>
        </div>
                      </div>
    </div>
    <div class="col-lg-3 col-xl-4 mt-5 mt-lg-0">
      <a href="#" class="btn btn-light-primary px-6 font-weight-bold">
        Search
      </a>
    </div>
  </div>
</div>
<!--end::Search Form-->
    <!--end: Search Form-->

    <!--begin: Datatable-->
    <table class="datatable datatable-bordered datatable-head-custom" id="kt_datatable">
      <thead>
        <tr>
          <th title="Field #1">Estado</th>
          <th title="Field #2">Nombre</th>
          <th title="Field #3">Empresa</th>
          <th title="Field #4">Email</th>
          <th title="Field #4">Contacto</th>
          <th title="Field #5">Interés</th>
          <th title="Field #5">Fecha</th>
          <th title="Field #6">Acciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach($mensaje as $mensaje)
        {{ Form::open(array('method' => 'GET','class' => 'form-horizontal','id' => 'defaultForm', 'url' => array('gestion/avanza/leer',$mensaje->id))) }}
        <tr>
        @if($mensaje->cargo == 1)
          <td class="bg-success text-success"><span class="badge badge-success" style="color:#fff">Leido</span></td>
        @else
          <td class="bg-danger text-danger"><span class="badge badge-warning" style="color:#fff">No Leido</span></td>
        @endif
          <td>{{ $mensaje->nombre }} </td>
          <td>{{ $mensaje->sujeto }}</td>
          <td>{{ $mensaje->email }}</td>
          <td>{{ $mensaje->datos }}</td>
          <td>{{ $mensaje->empresa }}</td>
          <td>{{ $mensaje->created_at }}</td>
          <td>
            <a class="btn btn-sm btn-clean btn-icon mr-2" href="<?=URL::to('gestion/avanza/leer');?>/{{$mensaje->id}}"><i class="fa fa-low-vision"></i></a></td>
        </tr>

         {{ Form::close() }}
        @endforeach
      </tbody>
    </table>
    <!--end: Datatable-->
  </div>
</div>

  <!--begin::Global Theme Bundle(used by all pages)-->
               <script src="/avanza/assets/plugins/global/plugins.bundle.js"></script>
          

        <!--end::Global Theme Bundle-->


                    <!--begin::Page Scripts(used by this page)-->
                            <script src="/avanza/assets/js/pages/crud/ktdatatable/base/html-table.js"></script>


    @stop