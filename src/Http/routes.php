<?php


Route::group(['middleware' => ['auths','administrador']], function (){

	Route::get('/gestion/avanza/fichasweb', 'DigitalsiteSaaS\Avanza\Http\AvanzaController@fichas');
	Route::get('/gestion/avanza/usuarios', 'DigitalsiteSaaS\Avanza\Http\AvanzaController@usuarios');

}); 

Route::group(['middleware' => ['auths','fichador']], function (){
Route::get('gestion/avanza/mensaje', 'DigitalsiteSaaS\Avanza\Http\AvanzaController@mensaje');
Route::get('gestion/avanza/fichas', 'DigitalsiteSaaS\Avanza\Http\AvanzaController@avanzaficha');
Route::get('gestion/avanza/promociones', 'DigitalsiteSaaS\Avanza\Http\AvanzaController@promociones');
Route::get('gestion/avanza/mensaje-ficha/{id}', 'DigitalsiteSaaS\Avanza\Http\AvanzaController@mensajeficha');
Route::get('gestion/avanza/crear', 'DigitalsiteSaaS\Avanza\Http\AvanzaController@avanzacrear');
Route::get('gestion/avanza/crear-promocion', 'DigitalsiteSaaS\Avanza\Http\AvanzaController@crearpromocion');
Route::post('gestion/avanza/crearficha', 'DigitalsiteSaaS\Avanza\Http\AvanzaController@crearficha');
Route::post('gestion/avanza/crearpromociones', 'DigitalsiteSaaS\Avanza\Http\AvanzaController@crearpromociones');
Route::get('gestion/avanza/crear-empresa', 'DigitalsiteSaaS\Avanza\Http\AvanzaController@avanzacrearempresa');
Route::post('gestion/avanza/crearempresa', 'DigitalsiteSaaS\Avanza\Http\AvanzaController@crearempresa');
Route::get('avanza/editar-empresa/{id}', 'DigitalsiteSaaS\Avanza\Http\AvanzaController@editarempresa');
Route::post('avanza/editarempresa/{id}', 'DigitalsiteSaaS\Avanza\Http\AvanzaController@editarempresaweb');
Route::get('gestion/avanza', 'DigitalsiteSaaS\Avanza\Http\AvanzaController@avanza');
Route::get('gestion/avanza/editar-ficha/{id}', 'DigitalsiteSaaS\Avanza\Http\AvanzaController@editarficha');
Route::get('gestion/avanza/editar-promo/{id}', 'DigitalsiteSaaS\Avanza\Http\AvanzaController@editarpromocion');
Route::post('gestion/avanza/editarpromo/{id}', 'DigitalsiteSaaS\Avanza\Http\AvanzaController@editarpromo');
Route::get('gestion/avanza/editar-ficha-img/{id}', 'DigitalsiteSaaS\Avanza\Http\AvanzaController@editarfichaimg');
Route::post('gestion/avanza/actualizarficha/{id}', 'DigitalsiteSaaS\Avanza\Http\AvanzaController@actualizarficha');
Route::post('gestion/avanza/actualizarfichaimg/{id}', 'DigitalsiteSaaS\Avanza\Http\AvanzaController@actualizarfichaimg');
Route::get('gestion/avanza/eliminar-ficha/{id}', 'DigitalsiteSaaS\Avanza\Http\AvanzaController@eliminarficha');
Route::get('gestion/avanza/leer/{id}', 'DigitalsiteSaaS\Avanza\Http\AvanzaController@leer');
Route::get('memo/ajax-subcat', 'DigitalsiteSaaS\Avanza\Http\AvanzaController@memo');
Route::get('memo/ajax-subcatxx',function(){
 $cat_id = Input::get('cat_id');
 $subcategories = DigitalsiteSaaS\Pagina\Page::where('page_id', '=', $cat_id)->get();
 return Response::json($subcategories);
});
});





Route::group(['middleware' => ['web']], function (){
Route::get('filtro/ajax-subcat', 'DigitalsiteSaaS\Pagina\Http\WebController@memo');
Route::post('gestion/filtro/home', 'DigitalsiteSaaS\Pagina\Http\WebController@filtrohome');
Route::post('gestion/avanza/usuario', 'DigitalsiteSaaS\Pagina\Http\WebController@crearusuario');
Route::post('mensajes/mensajeficha', 'DigitalsiteSaaS\Pagina\Http\WebController@mensajeficha');
Route::get('banner-clic/{id}', 'DigitalsiteSaaS\Pagina\Http\WebController@contador');



Route::get('empresa/{id}', 'DigitalsiteSaaS\Pagina\Http\WebController@detallempresa');
Route::get('empresaweb/{id}', 'DigitalsiteSaaS\Pagina\Http\WebController@detallenegocio');
Route::get('empresas/{id}', 'DigitalsiteSaaS\Pagina\Http\WebController@infoempresa');
  
Route::get('empresa/{id}/datos', function($page){
$plantilla = DigitalsiteSaaS\Pagina\Template::all();
$plantillaes = DigitalsiteSaaS\Pagina\Template::find(1);
$contenido = DigitalsiteSaaS\Pagina\Fichaje::where('slug','=',$page)->get();
$contenida = DigitalsiteSaaS\Pagina\Fichaje::where('slug','=',$page)->get();
$menu = DigitalsiteSaaS\Pagina\Page::whereNull('page_id')->orderBy('posta', 'desc')->get();
return View::make('avanza::fichaje/avanza')->with('contenido', $contenido)->with('plantilla', $plantilla)->with('menu', $menu)->with('contenida', $contenida)->with('plantillaes', $plantillaes);
});
 
});