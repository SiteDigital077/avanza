<?php


Route::group(['middleware' => ['auths','administrador']], function (){

	Route::resource('/gestion/avanza/fichasweb', 'DigitalsiteSaaS\Avanza\Http\AvanzaController@fichas');
	Route::resource('/gestion/avanza/usuarios', 'DigitalsiteSaaS\Avanza\Http\AvanzaController@usuarios');

}); 

Route::group(['middleware' => ['auths','fichador']], function (){


Route::get('gestion/avanza/mensaje', 'DigitalsiteSaaS\Avanza\Http\AvanzaController@mensaje');
Route::get('gestion/avanza/fichas', 'DigitalsiteSaaS\Avanza\Http\AvanzaController@avanzaficha');

Route::resource('gestion/avanza/mensaje-ficha', 'DigitalsiteSaaS\Avanza\Http\AvanzaController@mensajeficha');
Route::get('gestion/avanza/crear', 'DigitalsiteSaaS\Avanza\Http\AvanzaController@avanzacrear');
Route::post('gestion/avanza/crearficha', 'DigitalsiteSaaS\Avanza\Http\AvanzaController@crearficha');

Route::get('gestion/avanza', 'DigitalsiteSaaS\Avanza\Http\AvanzaController@avanza');


Route::get('gestion/avanza/editar-ficha/{id}', 'DigitalsiteSaaS\Avanza\Http\AvanzaController@editarficha');
Route::get('gestion/avanza/editar-ficha-img/{id}', 'DigitalsiteSaaS\Avanza\Http\AvanzaController@editarfichaimg');
Route::post('gestion/avanza/actualizarficha/{id}', 'DigitalsiteSaaS\Avanza\Http\AvanzaController@actualizarficha');
Route::post('gestion/avanza/actualizarfichaimg/{id}', 'DigitalsiteSaaS\Avanza\Http\AvanzaController@actualizarfichaimg');
Route::get('gestion/avanza/eliminar-ficha/{id}', 'DigitalsiteSaaS\Avanza\Http\AvanzaController@eliminarficha');
Route::resource('gestion/avanza/leer', 'DigitalsiteSaaS\Avanza\Http\AvanzaController@leer');
Route::get('memo/ajax-subcat',function(){

		$cat_id = Input::get('cat_id');
		$subcategories = DigitalsiteSaaS\Pagina\Page::where('page_id', '=', $cat_id)->get();
		return Response::json($subcategories);
});

});





Route::group(['middleware' => ['web']], function (){

Route::post('gestion/avanza/usuario', 'DigitalsiteSaaS\Pagina\Http\WebController@crearusuario');


Route::get('banner-clic/{id}', function($id){

$url = DB::table('contents')->where('id',$id)->pluck('url');
DB::table('contents')->where('id',$id)->limit(1)->update(['content'=> DB::raw('content + 1')]);
 foreach ($url as $url){

return redirect($url);
}
	});

Route::get('empresa/{id}', function($page){
$plantilla = DigitalsiteSaaS\Pagina\Template::all();
$plantillaes = DigitalsiteSaaS\Pagina\Template::find(1);
$contenido = DigitalsiteSaaS\Pagina\Fichaje::where('slug','=',$page)->get();
$contenida = DigitalsiteSaaS\Pagina\Fichaje::where('slug','=',$page)->get();
$menu = DigitalsiteSaaS\Pagina\Page::whereNull('page_id')->orderBy('posta', 'desc')->get();
return View::make('avanza::fichaje/avanza')->with('contenido', $contenido)->with('plantilla', $plantilla)->with('menu', $menu)->with('contenida', $contenida)->with('plantillaes', $plantillaes);
});
  
Route::get('empresa/{id}/datos', function($page){
$plantilla = DigitalsiteSaaS\Pagina\Template::all();
$plantillaes = DigitalsiteSaaS\Pagina\Template::find(1);
$contenido = DigitalsiteSaaS\Pagina\Fichaje::where('slug','=',$page)->get();
$contenida = DigitalsiteSaaS\Pagina\Fichaje::where('slug','=',$page)->get();
$menu = DigitalsiteSaaS\Pagina\Page::whereNull('page_id')->orderBy('posta', 'desc')->get();
return View::make('avanza::fichaje/avanza')->with('contenido', $contenido)->with('plantilla', $plantilla)->with('menu', $menu)->with('contenida', $contenida)->with('plantillaes', $plantillaes);
});
 
});