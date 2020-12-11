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
<div class="container">
@foreach($contenido as $contenido)
{!!$contenido->content!!}
@endforeach
</div>
@stop