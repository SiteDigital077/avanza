@extends ('LayoutsSD.siteavanza')

    @section('cabecera')
    @parent

  
    @stop





@section('ContenidoSite-01')

<div class="content containerd-flex flex-column flex-column-fluid" id="kt_content">
 <div class="d-flex flex-column-fluid">
  <div class="container">
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
      {{ Form::open(array('files' => 'true', 'method' => 'POST','class' => 'form-horizontal','id' => 'kt_form_1', 'url' => array('gestion/avanza/crearpromociones'))) }}

        <div class="card-body">
          
          <div class="form-group">
            <label>Promoción</label>
            {{Form::text('promocion', '', array('class' => 'form-control form-control-lg','maxlength' => '50','placeholder'=>'Ingrese nombre de la empresa','required' => 'required'))}}
          </div>
         
          <div class="form-group">
           <div class="row">
            
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4">
             <label>Promoción Desde</label>
             {{Form::date('desde', '', array('class' => 'form-control','maxlength' => '50','placeholder'=>'Ingrese nombre de la empresa'))}}
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4">
             <label>Promoción Hasta</label>
             {{Form::date('hasta', '', array('class' => 'form-control','maxlength' => '50','placeholder'=>'Ingrese nombre de la empresa'))}}
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-4">
             <label>Cantidad de Cupones</label>
             {{Form::number('cupones', '', array('class' => 'form-control','maxlength' => '50','placeholder'=>'Ingrese nombre de la empresa'))}}
            </div>
           
           </div>
          </div>

          <div class="form-group">
          <div class="custom-file">
              <input type="file" name="file" class="custom-file-input" id="customFile"/>
              <label class="custom-file-label" for="customFile">Seleccionar Imagen</label>
            </div>
          </div>
         
         
              <div class="card-footer">
          <button type="submit" class="btn btn-success mr-2">Submit</button>
          <button type="reset" class="btn btn-secondary">Cancel</button>
        </div>
        </div>
     

          

          <!--begin: Code-->
       
          <!--end: Code-->
        </div>
      
       {{ Form::close() }}
      <!--end::Form-->
    </div>
    <!--end::Card-->
     </div>
   
  </div>
</div>
 </div>


 
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


         

@stop