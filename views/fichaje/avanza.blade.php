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
  @if($contenido->twitter == '') 
  @else
  <a href="{{$contenido->twitter}}" target="_blank"><span style="margin-right: 10px; font-size: 16px" class="fa fa-twitter text-right"></span></a>
  @endif
  @if($contenido->facebook == '') 
  @else
  <a href="{{$contenido->facebook}}" target="_blank"><span style="margin-right: 10px; font-size: 16px" class="fa fa-facebook"></span></a>
  @endif
  @if($contenido->instagram == '') 
  @else
  <a href="{{$contenido->instagram}}" target="_blank"><span style="margin-right: 10px; font-size: 16px" class="fa fa-instagram"></span></a>
  @endif
  @if($contenido->youtube == '') 
  @else
  <a href="{{$contenido->youtube}}" target="_blank"><span style="margin-right: 10px; font-size: 16px"class="fa fa-youtube"></span></a>
  @endif
  @if($contenido->linkedin == '') 
  @else
  <a href="{{$contenido->linkedin}}" target="_blank"><span style="margin-right: 10px; font-size: 16px" class="fa fa-linkedin"></span></a>
  @endif
  @if($contenido->vimeo == '') 
  @else
  <a href="{{$contenido->vimeo}}" target="_blank"><span style="margin-right: 10px; font-size: 16px" class="fa fa-vimeo"></span></a>
  @endif
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
  {!!$contenido->contenido!!}
</div>
<div class="col-lg-4 pt-0 mb-3">
  <div class="col-lg-12" style="background: #fff;border: 1px solid rgba(0,0,0,.125); padding: 0px">
    <iframe src="{{$contenido->ubicacion}}" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
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
        <h5 class="modal-title" id="exampleModalLabel">Contáctar Empresa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
      <form method="POST" action="/mensajes/mensajeficha">
       
       <div class="form-group">
        <label for="email">Nombre:</label>
        <input type="text" class="form-control" id="email" name="nombre" required="required">
       </div>
  
       <div class="form-group">
        <label for="pwd">Empresa:</label>
        <input type="text" class="form-control" id="pwd" name="sujeto" required="required">
       </div>

       <div class="form-group">
        <label for="pwd">Número contacto:</label>
        <input type="text" class="form-control" id="pwd" name="datos" required="required">
       </div>

       <div class="form-group">
        <label for="pwd">Correo electrónico:</label>
        <input type="email" class="form-control" id="pwd" name="email" required="required">
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
       
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary col-lg-12 btn roberto-btn">Enviar</button>
        
      </div>
      
      </form>

      </div>
      
    </div>
  </div>
</div>

@stop