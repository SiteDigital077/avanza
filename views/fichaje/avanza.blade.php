@extends ('LayoutsSD.Layout')
<html lang="ES">

@section('cabecera')
 @parent
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <meta name="description" content="">
 <meta name="keywords" content="Sistema de Gestión Empresarial">
 <meta name="author" content="Siteavanza">
@stop

@section('ContenidoSite-01')

<div class="row" style="background:#FAFAFD">
<div class="container">
@foreach($contenido as $contenido)
<div class="row mt-3 mb-3">
<div class="card text-center">
<!--
  <div class="card-header">
  Softtware 
  </div>
  -->
  <div class="card-body">


    <div class="row">
 <div class="col-sm-2 col-md-2">

      <img width="90%" alt="Pic" src="{!!$contenido->image!!}">
    
    </div>

  <div class="col-sm-10 col-md-10 text-left mt-1">
     <h4 class="card-title">{!!$contenido->title!!}</h4>
     <h6 style="color: #bdbdbd">Tiene 5 sedes Bogotá Nor Oriente, Bogotá Noroccidente, Bogotá Occidente, Bogotá Norte, Medellín (Belén)</h6>
    <p class="card-text text-justify"></p>
    </div>
</div>
<div class="text-right">
<a href="#" class="btn roberto-btn" data-toggle="modal" data-target="#exampleModal"> <span style="margin-right: 10px; font-size: 18px" class="fa fa-envelope text-right"></span> contactar</a>
</div>     
  </div>
  <div class="card-footer text-muted bg-default text-white">
  	<div class="row">
    <div class="col-3" style="font-size: 14px">
     <a href="/empresa/{!!$contenido->slug!!}"> Ver información</a>
    </div>	
    <div class="col-3" style="font-size: 14px">
      <b>12</b> Ofertas laborales
    </div>	
    <div class="col-3" style="font-size: 14px">
      <b>5</b> Recomendaciones
    </div>	
  	<div class="text-center col-3">
	<span style="margin-right: 10px; font-size: 16px" class="fa fa-twitter text-right"></span>
	<span style="margin-right: 10px; font-size: 16px" class="fa fa-facebook"></span>
	<span style="margin-right: 10px; font-size: 16px" class="fa fa-instagram"></span>
	<span style="margin-right: 10px; font-size: 16px"class="fa fa-youtube"></span>
	<span style="margin-right: 10px; font-size: 16px" class="fa fa-linkedin"></span>
	<span style="margin-right: 10px; font-size: 16px" class="fa fa-vimeo"></span>
	</div>
  </div>
</div>
</div>
</div>

@endforeach
</div>
</div>
<div class="row" style="background: #FAFAFD">
<div class="container">
<div class="row">
<div class="col-lg-8 pt-2  mb-3" style="background: #fff;border: 1px solid rgba(0,0,0,.125)">
	{!!$contenido->content!!}
</div>
<div class="col-lg-4 pt-0 mb-3">
	<div class="col-lg-12" style="background: #fff;border: 1px solid rgba(0,0,0,.125); padding: 0px">
		<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d11200.675829730526!2d-75.6876061!3d45.42609535!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4cce04ff4fe494ef%3A0x26bb54f60c29f6e!2sParliament+Hill!5e0!3m2!1sen!2sca!4v1528808935681" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
		<hr>
		<div class="ml-4 mr-4 mb-3" style="color: #828282; font-size: 15px;text-align: justify;">
		Dirección: {!!$contenido->direccion!!}
		</div>
	</div>

</div>
</div>
</div>
</div>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
      <form method="POST" action="/mensajes/mensajeficha">
       
       <div class="form-group">
        <label for="email">Nombre:</label>
        <input type="text" class="form-control" id="email" name="nombre">
       </div>
  
  	   <div class="form-group">
        <label for="pwd">Empresa:</label>
        <input type="text" class="form-control" id="pwd" name="sujeto">
       </div>

       <div class="form-group">
        <label for="pwd">Número contacto:</label>
        <input type="text" class="form-control" id="pwd" name="datos">
       </div>

       <div class="form-group">
        <label for="pwd">Correo electrónico:</label>
        <input type="email" class="form-control" id="pwd" name="email">
       </div>

       <div class="form-group">
        <label for="pwd">Mensaje:</label>
        <textarea class="form-control" rows="8" id="comment" name="mensaje"></textarea>
       </div>

       <input type="hidden" name="_token" value="{{ csrf_token() }}">
       <input type="hidden" class="form-control" id="pwd" value="{{Request::segment(2)}}" name="empresa">
       <input type="hidden" class="form-control" id="pwd" value="empresa/{{Request::segment(2)}}" name="redireccion">
       <input type="hidden" class="form-control" id="pwd" value="{{$contenido->usuario_id}}" name="interes">
       <input type="hidden" class="form-control" id="pwd" value="{{$contenido->email}}" name="ema">
       
       <button type="submit" class="btn btn-primary col-lg-12">Enviar</button>
      
      </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn roberto-btn">Save changes</button>
      </div>
    </div>
  </div>
</div>

@stop