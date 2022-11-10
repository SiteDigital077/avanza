
@extends ('LayoutsSD.siteavanza')

    @section('cabecera')
    @parent

  
    @stop





@section('ContenidoSite-01')

  <!--begin::Content-->
        <div class="content  d-flex flex-column flex-column-fluid" id="kt_content">
                      <!--begin::Subheader-->
<div class="subheader py-2 py-lg-6  subheader-transparent " id="kt_subheader">
    <div class=" container  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
    <!--begin::Info-->
        
    <!--end::Info-->

    <!--begin::Toolbar-->
        <div class="d-flex align-items-center">
              <!--begin::Actions-->
               
        <!--end::Actions-->

      <!--begin::Dropdown-->
            <div class="dropdown dropdown-inline" data-toggle="tooltip" title="Quick actions" data-placement="left">
                <a href="#" class="btn btn-icon"data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="svg-icon svg-icon-success svg-icon-2x"><!--begin::Svg Icon | path:assets/media/svg/icons/Files/File-plus.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <polygon points="0 0 24 0 24 24 0 24"/>
        <path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
        <path d="M11,14 L9,14 C8.44771525,14 8,13.5522847 8,13 C8,12.4477153 8.44771525,12 9,12 L11,12 L11,10 C11,9.44771525 11.4477153,9 12,9 C12.5522847,9 13,9.44771525 13,10 L13,12 L15,12 C15.5522847,12 16,12.4477153 16,13 C16,13.5522847 15.5522847,14 15,14 L13,14 L13,16 C13,16.5522847 12.5522847,17 12,17 C11.4477153,17 11,16.5522847 11,16 L11,14 Z" fill="#000000"/>
    </g>
</svg><!--end::Svg Icon--></span>                </a>
                <div class="dropdown-menu dropdown-menu-md dropdown-menu-right p-0 m-0">
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
      <!--end::Dropdown-->
        </div>
    <!--end::Toolbar-->
    </div>
</div>
<!--end::Subheader-->

          <!--begin::Entry-->
  <div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class=" container ">
              <div class="row">

  <div class="col-xs-6 col-lg-12">
   

    <!--begin::Card-->
    <div class="card card-custom gutter-b example example-compact">
      <div class="card-header">
        <h3 class="card-title">
          Crear Ficha Producto
        </h3>
        <div class="card-toolbar">
          <div class="example-tools justify-content-center">
            <span class="example-toggle" data-toggle="tooltip" title="View code"></span>
            <span class="example-copy" data-toggle="tooltip" title="Copy code"></span>
          </div>
        </div>
      </div>
      <!--begin::Form-->
      {{ Form::open(array('files' => 'true', 'method' => 'POST','class' => 'form-horizontal','id' => 'kt_form_1', 'url' => array('gestion/avanza/crearficha'))) }}

        <div class="card-body">
          <div class="form-group form-group-last">
            <div class="alert alert-custom alert-default" role="alert">
             
              <div class="alert-text">
                Set heights using classes like <code>.form-control-lg</code>, and set widths using grid column classes like <code>.col-lg-*</code>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label>Nombre Producto o Servicio</label>
            {{Form::text('titulo', '', array('class' => 'form-control form-control-lg','maxlength' => '300','placeholder'=>'Ingrese nombre de la empresa','required' => 'required'))}}
          </div>
          <div class="form-group">
            <label>Título SEO</label>
            {{Form::text('descripcion', '', array('class' => 'form-control','maxlength' => '50','placeholder'=>'Ingrese nombre de la empresa'))}}
          </div>
          <div class="form-group">
            <label>Descripción SEO</label>
            {{Form::text('descripseo', '', array('class' => 'form-control form-control-sm','maxlength' => '160','placeholder'=>'Ingrese descripción para el SEO'))}}
          </div>

          <div class="form-group">
            <label>Descripción Empresa</label>
            {{Form::textarea('contenido', '', array('placeholder'=>'Descripción ampliada de la empresa','id'=>'mytextarea'))}}
          </div>


          <div class="form-group">
          <div class="custom-file">
              <input type="file" name="file" class="custom-file-input" id="customFile"/>
              <label class="custom-file-label" for="customFile">Seleccionar Imagen</label>
            </div>
          </div>

          <div class="form-group">
            <label>Url página</label>
            {{Form::text('enlace', '', array('class' => 'form-control','placeholder'=>'Ingrese URL'))}}
          </div>

          <div class="form-group">
            <label>Visualización</label>
            {{ Form::select('nivel', [
               '1' => 'Visible',
              '0' => 'No Visible'], null, array('class' => 'form-control')) }}
          </div>        

          <div class="form-group">
            <div class="row">
            <div class="col-lg-6 col-xs-12">
            <label for="exampleSelectl">Categorias</label>
            <select class="form-control input-sm" name="category" id="category">
             @foreach($categories as $category)
              <option value="{{$category->id}}">{{$category->page}}</option>
             @endforeach
          </select> 
        </div>

        <div class="col-lg-6 col-xs-12">
          <label for="exampleSelectd">Subcategoria</label>
            <select class="form-control input-sm" name="subcategory" id="subcategory">
            <option value=""></option>
          </select> 
        </div>
        </div>
          </div>

          @foreach($identificador as $identificador)
          
            {{Form::hidden('identificador', $identificador->id, array('class' => 'form-control','placeholder'=>'Ingrese descripción de la empresa'))}}
        
          @endforeach

          <div class="form-group">
            <label>Teléfono</label>
            {{Form::text('telefono', '', array('class' => 'form-control','placeholder'=>'Ingrese descripción de la empresa'))}}
          </div>

          <div class="form-group">
            <label>Email</label>
            {{Form::text('email', '', array('class' => 'form-control','placeholder'=>'Ingrese descripción de la empresa'))}}
          </div>

          <div class="form-group">
            <label>Ubicación</label>
            {{Form::text('ubicacion', '', array('class' => 'form-control','placeholder'=>'Ingrese descripción de la empresa'))}} 
          </div>

          <div class="form-group">
            <label>Dirección</label>
            {{Form::text('direccion', '', array('class' => 'form-control','placeholder'=>'Ingrese descripción de la empresa'))}}   
          </div>

          <div class="form-group">
            <label>Facebook</label>
            {{Form::text('facebook', '', array('class' => 'form-control','placeholder'=>'Ingrese url Facebook'))}}   
          </div>

          <div class="form-group">
            <label>Linkedin</label>
            {{Form::text('linkedin', '', array('class' => 'form-control','placeholder'=>'Ingrese url Linkedin'))}}
          </div>

          <div class="form-group">
            <label>Twitter</label>
            {{Form::text('twitter', '', array('class' => 'form-control','placeholder'=>'Ingrese url Twitter'))}}   
          </div>

          <div class="form-group">
            <label>Instagram</label>
            {{Form::text('instagram', '', array('class' => 'form-control','placeholder'=>'Ingrese url Instagram'))}}   
          </div>

          <div class="form-group">
            <label>Youtube</label>
            {{Form::text('youtube', '', array('class' => 'form-control','placeholder'=>'Ingrese url Youtube'))}}   
          </div>
    
          {{Form::hidden('imageal', '', array('class' => 'form-control'))}}   
          {{Form::hidden('tipo', 'ficha', array('class' => 'form-control'))}}
          {{Form::hidden('imageal', 'fichan', array('class' => 'form-control'))}}
          {{Form::hidden('usuario', Auth::user()->id, array('class' => 'form-control'))}}
        

          <!--begin: Code-->
       
          <!--end: Code-->
        </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-success mr-2">Submit</button>
          <button type="reset" class="btn btn-secondary">Cancel</button>
        </div>
       {{ Form::close() }}
      <!--end::Form-->
    </div>
    <!--end::Card-->

   
  </div>
</div>
          </div>
    <!--end::Container-->
  </div>
<!--end::Entry-->
        </div>
        <!--end::Content-->


 
   {{ Html::script('EstilosSD/dist/js/jquery-1.10.2.min.js') }}
 <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.6.1/tinymce.min.js" referrerpolicy="origin"></script>

    <script>
      tinymce.init({
        selector: '#mytextarea'
      });
    </script>

   

 

     <script type="text/javascript">
     
      $('#category').on('change',function(e){
        console.log(e);

        var cat_id = e.target.value;

        $.get('/memo/ajax-subcat?cat_id=' + cat_id, function(data){
            $('#subcategory').empty();
            $.each(data, function(index, subcatObj){
              $('#subcategory').append('<option value="'+subcatObj.id+'">'+subcatObj.page+'</option>');
            });
        });
      });
   </script>   
                            <script src="/avanza/assets/js/pages/crud/forms/validation/form-controls.js"></script>


         
        <!--end::Global Theme Bundle-->


                    <!--begin::Page Scripts(used by this page)-->

    

<!--
 <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1 topper">


  <?php $status=Session::get('status');?>
    @if($status=='ok_create')
      <div class="alert alert-success">
       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
       <strong>Página registrada con exito</strong> US ...
      </div>
    @endif

    @if($status=='ok_delete')
      <div class="alert alert-danger">
       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
       <strong>Página eliminada con exito</strong> US ...
      </div>
    @endif

    @if($status=='ok_update')
      <div class="alert alert-warning">
       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
       <strong>Página actualizada con exito</strong> US ...
      </div>
    @endif
   


@if($conteo > 2)
Contactarnos
@else

<div class="container top">
 @include('avanza::alerts.request')
 {{ Form::open(array('files' => 'true', 'method' => 'POST','class' => 'form-horizontal','id' => 'tinyMCEForm', 'url' => array('gestion/avanza/crearficha'))) }}


  <div class="form-group">
    {{Form::label('titulo', 'Nombre de la empresa')}}
   <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    {{Form::text('titulo', '', array('class' => 'form-control','maxlength' => '50','placeholder'=>'Ingrese nombre de la empresa'))}}
   </div>
  </div>

  <div class="form-group">
    {{Form::label('descripcion', 'Titulo SEO de la ficha')}}
   <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    {{Form::text('descripcion', '', array('class' => 'form-control','maxlength' => '60','placeholder'=>'Ingrese descripción de la empresa'))}}
   </div>
  </div>

 <div class="form-group">
    {{Form::label('descripseo', 'Descripción SEO de la ficha')}}
   <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    {{Form::text('descripseo', '', array('class' => 'form-control','maxlength' => '160','placeholder'=>'Ingrese descripción para el SEO'))}}
   </div>
  </div>
 
  <div class="form-group">
    {{Form::label('contenido', 'Descripción ampliada de la empresa' )}}
   <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    {{Form::textarea('contenido', '', array('placeholder'=>'Descripción ampliada de la empresa'))}}
   </div>
  </div>

<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
<div class="form-group">
 <label class="control-label">Imagen</label>
  <div class="col-lg-12">
   <input type="file" class="form-control" name="file" />
  </div>
</div>
</div>

<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
  <div class="form-group">
    {{Form::label('enlace', 'Url de la página' )}}
   <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    {{Form::text('enlace', '', array('class' => 'form-control','placeholder'=>'Ingrese URL'))}}
   </div>
  </div>
</div>

 <div class="form-group">
 {{Form::label('nivel', 'Visualización' )}}
   <div class="col-lg-12">
    {{ Form::select('nivel', [
    '1' => 'Visible',
    '0' => 'No Visible'], null, array('class' => 'form-control')) }}
   </div>
  </div>


    <div class="col-lg-6">
      <div class="form-group">
          <label for="">Categories</label>
          <select class="form-control input-sm" name="category" id="category">
          @foreach($categories as $category)
            <option value="{{$category->id}}">{{$category->page}}</option>
          @endforeach
          </select> 
      </div>
 </div>
   <div class="col-lg-6">
      <div class="form-group">
          <label for="">Subcategory</label>
          <select class="form-control input-sm" name="subcategory" id="subcategory">
            <option value=""></option>
          </select> 
      </div>
  </div>
    
<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
  <div class="form-group">
    {{Form::label('telefono', 'Telefono de su empresa')}}
   <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    {{Form::text('telefono', '', array('class' => 'form-control','placeholder'=>'Ingrese descripción de la empresa'))}}
   </div>
  </div>
</div>

<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
  <div class="form-group">
    {{Form::label('email', 'E-mail de contacto')}}
   <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    {{Form::text('email', '', array('class' => 'form-control','placeholder'=>'Ingrese descripción de la empresa'))}}
   </div>
  </div>
</div>

<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
  <div class="form-group">
    {{Form::label('ubicacion', 'Ubicacion geográfica de su empresa')}}
   <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    {{Form::text('ubicacion', '', array('class' => 'form-control','placeholder'=>'Ingrese descripción de la empresa'))}}
   </div>
  </div>
</div>

<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
  <div class="form-group">
    {{Form::label('direccion', 'Dirección de su empresa')}}
   <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    {{Form::text('direccion', '', array('class' => 'form-control','placeholder'=>'Ingrese descripción de la empresa'))}}
   </div>
  </div>
</div>
     
   {{Form::hidden('imageal', '', array('class' => 'form-control'))}}   
   {{Form::hidden('tipo', 'ficha', array('class' => 'form-control'))}}
   {{Form::hidden('imageal', 'fichan', array('class' => 'form-control'))}}
   {{Form::hidden('usuario', Auth::user()->id, array('class' => 'form-control'))}}

          
   <div class="modal-footer">
    {{ Form::reset('Cancelar', array('class' => 'btn btn-default')) }}
    {{Form::submit('Crear', array('class' => 'btn btn-primary')  )}}
   </div>
 
 {{ Form::close() }}

</div>


@endif



  
  
<footer>


   {{ Html::script('EstilosSD/dist/js/jquery-1.10.2.min.js') }}   
 <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
          <script src="http://cdn.jsdelivr.net/jquery.bootstrapvalidator/0.5.1/js/bootstrapValidator.min.js"></script>
 {{ Html::script('siteavanza/validaciones/crearficha.js') }}  

     <script type="text/javascript">
     
      $('#category').on('change',function(e){
        console.log(e);

        var cat_id = e.target.value;

        $.get('/memo/ajax-subcat?cat_id=' + cat_id, function(data){
            $('#subcategory').empty();
            $.each(data, function(index, subcatObj){
              $('#subcategory').append('<option value="'+subcatObj.id+'">'+subcatObj.page+'</option>');
            });
        });
      });
   </script>   





</footer>
-->
@stop

