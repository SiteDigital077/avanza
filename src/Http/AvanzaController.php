<?php

namespace DigitalsiteSaaS\Avanza\Http;

use DigitalsiteSaaS\Avanza\Fichaje;
use DigitalsiteSaaS\Avanza\Empresa;
use DigitalsiteSaaS\Avanza\Avanzaempresa;
use DigitalsiteSaaS\Avanza\Promocion;
use DigitalsiteSaaS\Pagina\Message;
use DigitalsiteSaaS\Pagina\Page;
use DigitalsiteSaaS\Pagina\Muxu;
use DigitalsiteSaaS\Pagina\Pais;
use DigitalsiteSaaS\Pagina\Departamentocon;
use DigitalsiteSaaS\Usuario\Usuario;

use App\Http\Requests\FichaCreateRequest;
use App\Http\Requests\FichaUpdateRequest;
use App\Http\Requests\FichaUpdateimgRequest;
use DB;
use Auth;
use Hash;
use App\Http\Controllers\Controller;
use Input;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Response;



class AvanzaController extends Controller{

 protected $tenantName = null;
 

 public function __construct()
    {
        $this->middleware('auth');
        $hostname = app(\Hyn\Tenancy\Environment::class)->hostname();
        if ($hostname){
            $fqdn = $hostname->fqdn;
            $this->tenantName = explode(".", $fqdn)[0];
        }
    }


    public function index(){

	$contenido = Content::all();
	return View('avanza::contenidos')->with('contenido', $contenido);
	}

    public function avanzacrear(){
    	if(!$this->tenantName){
    	$usuario = Auth::user()->id;
   		$conteo = DB::table('ficha')->where('usuario_id', '=', $usuario)->count();
    	$categories = Page::where('categoria', '=', 1)->get();
    	$paginas = Page::all();
    	$identificador = Avanzaempresa::where('usuario_id', '=', $usuario)->get();
    	}else{
    	$usuario = Auth::user()->id;
   		$conteo = DB::table('ficha')->where('usuario_id', '=', $usuario)->count();
    	$categories = \DigitalsiteSaaS\Pagina\Tenant\Page::where('categoria', '=', 1)->get();
    	$paginas = \DigitalsiteSaaS\Pagina\Tenant\Page::all();
    	$identificador = \DigitalsiteSaaS\Avanza\Tenant\Avanzaempresa::where('usuario_id', '=', $usuario)->get();
    	}
		return view('avanza::fichaje/crear-ficha')->with('paginas', $paginas)->with('categories', $categories)->with('conteo', $conteo)->with('identificador', $identificador);
}



  public function avanzacrearempresa(){
  	if(!$this->tenantName){
    	$paises = Pais::orderBy('pais', 'ASC')->get();
    	$departamentos = Departamentocon::orderBy('departamento', 'ASC')->get();
    }else{
    	$paises = \DigitalsiteSaaS\Pagina\Tenant\Pais::orderBy('pais', 'ASC')->get();
    	$departamentos = \DigitalsiteSaaS\Pagina\Tenant\Departamentocon::orderBy('departamento', 'ASC')->get();
    }
		return view('avanza::fichaje/crear-empresa')->with('paises', $paises)->with('departamentos', $departamentos);
}

  public function editarempresa($id){
  	    if(!$this->tenantName){
    	$empresa = Avanzaempresa::leftjoin('departamentos','departamentos.id','=','ciudad_id')->leftjoin('municipios','municipios.id','=','barrio_id')->where('avanza_empresa.id', '=', $id)->get();
    	$paises = Pais::orderBy('pais', 'ASC')->get();
    	$departamentos = Departamentocon::orderBy('departamento', 'ASC')->get();
        }else{
       $empresa = \DigitalsiteSaaS\Avanza\Tenant\Avanzaempresa::leftjoin('departamentos','departamentos.id','=','ciudad_id')->leftjoin('municipios','municipios.id','=','barrio_id')->where('avanza_empresa.id', '=', $id)->get();
       $paises = \DigitalsiteSaaS\Pagina\Tenant\Pais::orderBy('pais', 'ASC')->get();
    	$departamentos = \DigitalsiteSaaS\Pagina\Tenant\Departamentocon::orderBy('departamento', 'ASC')->get();
        }

		return view('avanza::fichaje/editar-empresa')->with('empresa', $empresa)->with('paises', $paises)->with('departamentos', $departamentos);
}

  public function memo(){
  	    $cat_id = Input::get('cat_id');
  	    if(!$this->tenantName){
    	$subcategories = Page::where('page_id', '=', $cat_id)->get();
        }else{
       $subcategories = \DigitalsiteSaaS\Pagina\Tenant\Page::where('page_id', '=', $cat_id)->get();
        }

		return Response::json($subcategories);
}




public function avanzaficha(){

	if(!$this->tenantName){
	$number = Auth::user()->rol_id;
	

 	  if($number ==1) 
    {	
    	$numbersa = Auth::user()->id;
        $contenido = Fichaje::all();
         $contenida = Fichaje::all();
        $mensaje = DB::table('mesage')->where('interes','=',$numbersa)->get();
        $conteo =  Avanzaempresa::where('usuario_id', '=', Auth::user()->id)->count();

        return view('avanza::fichaje/ficha')->with('contenido', $contenido)->with('conteo', $conteo);
    }
    elseif($number ==3)
    {
    	$numbersa = Auth::user()->id;
    	$contenido = \DigitalsiteSaaS\Usuario\Usuario::find($numbersa)->Fichas;
    	$contenida = \DigitalsiteSaaS\Usuario\Usuario::find($numbersa)->Fichas;
       return view('avanza::fichaje/mis-fichas')->with('contenido', $contenido);
    }	
    }else{
       $number = Auth::user()->rol_id;
	
 	  if($number ==1) 
    {	
    	$numbersa = Auth::user()->id;
        $contenido = \DigitalsiteSaaS\Avanza\Tenant\Fichaje::all();

         $contenida = \DigitalsiteSaaS\Avanza\Tenant\Fichaje::all();
        $mensaje = DB::table('mesage')->where('interes','=',$numbersa)->get();
        $conteo =  \DigitalsiteSaaS\Avanza\Tenant\Avanzaempresa::where('usuario_id', '=', Auth::user()->id)->count();
        return view('avanza::fichaje/ficha')->with('contenido', $contenido)->with('conteo', $conteo);
    }
    elseif($number ==3)
    {
    	$numbersa = Auth::user()->id;
    	$contenido = \DigitalsiteSaaS\Usuario\Tenant\Usuario::find($numbersa)->Fichas;
    	$contenida = \DigitalsiteSaaS\Usuario\Tenant\Usuario::find($numbersa)->Fichas;
       return view('avanza::fichaje/mis-fichas')->with('contenido', $contenido);
    }	

    }		
    
}



public function promociones(){
	if(!$this->tenantName){
    $promociones = Promocion::where('user_id','=',Auth::user()->id)->get();
	}else{
 	$promociones = \DigitalsiteSaaS\Avanza\Tenant\Promocion::where('user_id','=',Auth::user()->id)->get();
		}
	return view('avanza::fichaje/promociones')->with('promociones', $promociones);
}

public function crearpromocion(){
    	
		return view('avanza::fichaje/crear-promocion');
}


	public function crearpromociones(){
		$number = Auth::user()->id;
		$file = Input::file('file');
		$destinoPath = public_path().'/fichaimg/clientes/'.$number;
		$url_imagen = $file->getClientOriginalName();
		$subir=$file->move($destinoPath,$file->getClientOriginalName());
	    if(!$this->tenantName){
		$contenido = new Promocion;
     	}else{
     	$contenido = new \DigitalsiteSaaS\Avanza\Tenant\Promocion;	
     	}
		$contenido->promocion = Input::get('promocion');
		$contenido->sluge = Str::slug($contenido->promocion);
		$contenido->desde = Input::get('desde');
		$contenido->hasta = Input::get('hasta');
		$contenido->image = '/fichaimg/clientes/'.$number.'/'.$url_imagen;
		$contenido->cupones = Input::get('cupones');
		$contenido->user_id = Auth::user()->id;
		
		$contenido->save();

		return Redirect('/gestion/avanza/promociones')->with('status', 'ok_create');
     	}


public function avanza(){
 $number = Auth::user()->id;
 if(!$this->tenantName){
	    $conteo =  Avanzaempresa::where('usuario_id', '=', Auth::user()->id)->count();
		$empresa = Avanzaempresa::where('usuario_id', '=', Auth::user()->id)->get();
		}else{
		$conteo =  \DigitalsiteSaaS\Avanza\Tenant\Avanzaempresa::where('usuario_id', '=', Auth::user()->id)->count();
		$empresa = \DigitalsiteSaaS\Avanza\Tenant\Avanzaempresa::where('usuario_id', '=', Auth::user()->id)->get();
		}	
	   return view('avanza::fichaje/ficha')->with('conteo', $conteo)->with('empresa', $empresa);
}



	public function crearficha(){
		$number = Auth::user()->id;
		$file = Input::file('file');
		$destinoPath = public_path().'/fichaimg/clientes/'.$number;
		$url_imagen = $file->getClientOriginalName();
		$subir=$file->move($destinoPath,$file->getClientOriginalName());
	    if(!$this->tenantName){
		$contenido = new Fichaje;
     	}else{
     	$contenido = new \DigitalsiteSaaS\Avanza\Tenant\Fichaje;	
     	}
		$contenido->title = Input::get('titulo');
		$contenido->slug = Str::slug($contenido->title);
		$contenido->description = Input::get('descripcion');
		$contenido->direccion = Input::get('direccion');
		$contenido->telefono = Input::get('telefono');
		$contenido->email = Input::get('email');
		$contenido->ubicacion = Input::get('ubicacion');
		$contenido->content = Input::get('contenido');
		$contenido->position = Input::get('descripseo');
		$contenido->level = Input::get('nivel');
		$contenido->image = '/fichaimg/clientes/'.$number.'/'.$url_imagen;
		$contenido->imageal = Input::get('imageal');
		$contenido->website = Input::get('enlace');
		$contenido->type = Input::get('tipo');
		$contenido->num = Input::get('num');
		$contenido->identificador = Input::get('identificador');
		$contenido->page_id = Input::get('subcategory');
		$contenido->responsive = Input::get('category');
		$contenido->facebook = Input::get('facebook');
		$contenido->twitter = Input::get('twitter');
		$contenido->linkedin = Input::get('linkedin');
		$contenido->instagram = Input::get('instagram');
		$contenido->youtube = Input::get('youtube');
		$contenido->usuario_id = Input::get('usuario');
		$contenido->save();

		return Redirect('gestion/avanza/fichas')->with('status', 'ok_create');
     	}

     	public function crearempresa(){
		$number = Auth::user()->id;
		$file = Input::file('file');
		$file_1= Input::file('file_1');
		$file_2 = Input::file('file_2');
		$file_3 = Input::file('file_3');
		$file_4 = Input::file('file_4');
		$file_5 = Input::file('file_5');
		$destinoPath = public_path().'/fichaimg/clientes/'.$number;

		if($file == ''){
		}
		else{
	    $url_imagen = $file->getClientOriginalName();
	    $subir=$file->move($destinoPath,$file->getClientOriginalName());
		}
		if($file_1 == ''){
		}
		else{
	    $url_imagen_1 = $file_1->getClientOriginalName();
	    $subir=$file_1->move($destinoPath,$file_1->getClientOriginalName());
		}
		if($file_2 == ''){
		}
		else{
	    $url_imagen_2 = $file_2->getClientOriginalName();
	    $subir=$file_2->move($destinoPath,$file_2->getClientOriginalName());
		}
		if($file_3 == ''){
		}
		else{
	    $url_imagen_3 = $file_3->getClientOriginalName();
	    $subir=$file_3->move($destinoPath,$file_3->getClientOriginalName());
		}
		if($file_4 == ''){
		}
		else{
	    $url_imagen_4 = $file_4->getClientOriginalName();
	    $subir=$file_4->move($destinoPath,$file_4->getClientOriginalName());
		}
		if($file_5 == ''){
		}
		else{
	    $url_imagen_5 = $file_5->getClientOriginalName();
	    $subir=$file_5->move($destinoPath,$file_5->getClientOriginalName());
		}	
	    if(!$this->tenantName){
		$contenido = new Avanzaempresa;
     	}else{
     	$contenido = new \DigitalsiteSaaS\Avanza\Tenant\Avanzaempresa;	
     	}
		$contenido->empresa = Input::get('empresa');
		$contenido->slug = Str::slug($contenido->empresa);
		$contenido->titulo = Input::get('titulo');
		$contenido->descripcion = Input::get('descripcion');
		$contenido->contenido = Input::get('contenido');
		if($file == ''){
		}
		else{
	    $contenido->imagen = '/fichaimg/clientes/'.$number.'/'.$url_imagen;
		}
		if($file_1 == ''){
		}
		else{
	    $contenido->imagen_1 = '/fichaimg/clientes/'.$number.'/'.$url_imagen_1;
		}
		if($file_2 == ''){
		}
		else{
	    $contenido->imagen_2 = '/fichaimg/clientes/'.$number.'/'.$url_imagen_2;
		}
		if($file_3 == ''){
		}
		else{
	    $contenido->imagen_3 = '/fichaimg/clientes/'.$number.'/'.$url_imagen_3;
		}
		if($file_4 == ''){
		}
		else{
	    $contenido->imagen_4 = '/fichaimg/clientes/'.$number.'/'.$url_imagen_4;
		}
		if($file_5 == ''){
		}
		else{
	    $contenido->imagen_5 = '/fichaimg/clientes/'.$number.'/'.$url_imagen_5;
		}
		$contenido->url = Input::get('url');
		$contenido->visualizacion = Input::get('visualizacion');
		$contenido->tipo = Input::get('tipo');
		$contenido->direccion = Input::get('direccion');
		$contenido->telefono = Input::get('telefono');
		$contenido->email = Input::get('email');
		$contenido->ubicacion = Input::get('ubicacion');
		$contenido->usuario_id = Input::get('usuario');
		$contenido->facebook = Input::get('facebook');
		$contenido->twitter = Input::get('twitter');
		$contenido->linkedin = Input::get('linkedin');
		$contenido->instagram = Input::get('instagram');
		$contenido->youtube = Input::get('youtube');
		$contenido->ciudad_id = Input::get('ciudad');
		$contenido->barrio_id = Input::get('municipio');
		$contenido->save();

		return Redirect('gestion/avanza')->with('status', 'ok_create');
     	}


     	public function editarempresaweb($id){
        $number = Auth::user()->id;
     	if(Input::file('file') == null){
        $imagel = \DigitalsiteSaaS\Avanza\Tenant\Avanzaempresa::where('id','=',$id)->get();
     	}else{   
		$file = Input::file('file');
		$destinoPath = public_path().'/fichaimg/clientes/'.$number;
		$url_imagen = $file->getClientOriginalName();
		$subir=$file->move($destinoPath,$file->getClientOriginalName());
		}
		if(Input::file('file_1') == null){
        $imagel_1 = \DigitalsiteSaaS\Avanza\Tenant\Avanzaempresa::where('id','=',$id)->get();
     	}else{   
		$file_1 = Input::file('file_1');
		$destinoPath = public_path().'/fichaimg/clientes/'.$number;
		$url_imagen_1 = $file_1->getClientOriginalName();
		$subir=$file_1->move($destinoPath,$file_1->getClientOriginalName());
		}
		if(Input::file('file_2') == null){
        $imagel_2 = \DigitalsiteSaaS\Avanza\Tenant\Avanzaempresa::where('id','=',$id)->get();
     	}else{   
		$file_2 = Input::file('file_2');
		$destinoPath = public_path().'/fichaimg/clientes/'.$number;
		$url_imagen_2 = $file_2->getClientOriginalName();
		$subir=$file_2->move($destinoPath,$file_2->getClientOriginalName());
		}
		if(Input::file('file_3') == null){
        $imagel_3 = \DigitalsiteSaaS\Avanza\Tenant\Avanzaempresa::where('id','=',$id)->get();
     	}else{   
		$file_3 = Input::file('file_3');
		$destinoPath = public_path().'/fichaimg/clientes/'.$number;
		$url_imagen_3 = $file_3->getClientOriginalName();
		$subir=$file_3->move($destinoPath,$file_3->getClientOriginalName());
		}
		if(Input::file('file_4') == null){
        $imagel_4 = \DigitalsiteSaaS\Avanza\Tenant\Avanzaempresa::where('id','=',$id)->get();
     	}else{   
		$file_4 = Input::file('file_4');
		$destinoPath = public_path().'/fichaimg/clientes/'.$number;
		$url_imagen_4 = $file_4->getClientOriginalName();
		$subir=$file_4->move($destinoPath,$file_4->getClientOriginalName());
		}
		if(Input::file('file_5') == null){
        $imagel_5 = \DigitalsiteSaaS\Avanza\Tenant\Avanzaempresa::where('id','=',$id)->get();
     	}else{   
		$file_5 = Input::file('file_5');
		$destinoPath = public_path().'/fichaimg/clientes/'.$number;
		$url_imagen_5 = $file_5->getClientOriginalName();
		$subir=$file_5->move($destinoPath,$file_5->getClientOriginalName());
		}
		 if(!$this->tenantName){
		$contenido = Avanzaempresa::find($id);
     	}else{
     	$contenido =  \DigitalsiteSaaS\Avanza\Tenant\Avanzaempresa::find($id);	
     	}
		$contenido->empresa = Input::get('empresa');
		$contenido->slug = Str::slug($contenido->empresa);
		$contenido->titulo = Input::get('titulo');
		$contenido->descripcion = Input::get('descripcion');
		$contenido->contenido = Input::get('contenido');
		if(Input::file('file') == null){
		foreach($imagel as $imagel){
		$contenido->imagen = $imagel->imagen;
	    }
	    }else{
	    $contenido->imagen = '/fichaimg/clientes/'.$number.'/'.$url_imagen;	
	    }
	    if(Input::file('file_1') == null){
		foreach($imagel_1 as $imagel){
		$contenido->imagen_1 = $imagel->imagen_1;
	    }
	    }else{
	    $contenido->imagen_1 = '/fichaimg/clientes/'.$number.'/'.$url_imagen_1;
	    }
	    if(Input::file('file_2') == null){
		foreach($imagel_2 as $imagel){
		$contenido->imagen_2 = $imagel->imagen_2;
	    }
	    }else{
	    $contenido->imagen_2 = '/fichaimg/clientes/'.$number.'/'.$url_imagen_2;
	    }
	    if(Input::file('file_3') == null){
		foreach($imagel_3 as $imagel){
		$contenido->imagen_3 = $imagel->imagen_3;
	    }
	    }else{
	    $contenido->imagen_3 = '/fichaimg/clientes/'.$number.'/'.$url_imagen_3;
	    }
	    if(Input::file('file_4') == null){
		foreach($imagel_4 as $imagel){
		$contenido->imagen_4 = $imagel->imagen_4;
	    }
	    }else{
	    $contenido->imagen_4 = '/fichaimg/clientes/'.$number.'/'.$url_imagen_4;
	    }
	    if(Input::file('file_5') == null){
		foreach($imagel_5 as $imagel){
		$contenido->imagen_5 = $imagel->imagen_5;
	    }
	    }else{
	    $contenido->imagen_5 = '/fichaimg/clientes/'.$number.'/'.$url_imagen_5;
	    }
		$contenido->url = Input::get('url');
		$contenido->visualizacion = Input::get('visualizacion');
		$contenido->tipo = Input::get('tipo');
		$contenido->direccion = Input::get('direccion');
		$contenido->telefono = Input::get('telefono');
		$contenido->email = Input::get('email');
		$contenido->ubicacion = Input::get('ubicacion');
		$contenido->facebook = Input::get('facebook');
		$contenido->twitter = Input::get('twitter');
		$contenido->linkedin = Input::get('linkedin');
		$contenido->instagram = Input::get('instagram');
		$contenido->youtube = Input::get('youtube');
		$contenido->usuario_id = Input::get('usuario');
		$contenido->ciudad_id = Input::get('ciudad');
		$contenido->barrio_id = Input::get('municipio');
		$contenido->save();

		return Redirect('gestion/avanza')->with('status', 'ok_create');
     	}
     	
     	public function mensaje(){
	
	$number = Auth::user()->rol_id;
	
 	  if($number ==1) 
    {	
    
        $mensaje = Message::all();
        return view('avanza::fichaje/mensaje')->with('mensaje', $mensaje);
    }
    elseif($number ==3)
    {
    	
    	$numbersa = Auth::user()->id;
        if(!$this->tenantName){
        $mensaje = Message::where('interes','=',$numbersa)->orderBy('created_at', 'DESC')->get();
        }else{
        $mensaje = \DigitalsiteSaaS\Pagina\Tenant\Message::where('interes','=',$numbersa)->orderBy('created_at', 'DESC')->get();	
        }
       return view('avanza::fichaje/mensaje')->with('mensaje', $mensaje);
    }
     	}
			
		
		public function editarficha($id){

		if(!$this->tenantName){
		$contenidonu = Muxu::join('pages','pages.id','=','ficha.page_id')
	  			  ->orderBy('position','ASC')
	              ->where('ficha.id', '=' ,$id)->get();
	    $contenida = Muxu::join('pages','pages.id','=','ficha.responsive')
	  			  ->orderBy('position','ASC')
	              ->where('ficha.id', '=' ,$id)->get();
		$categories = Page::
		where('categoria', '=', 1)->get();
		$paginas = Page::all();		
		$contenido = Fichaje::find($id);
	    }else{
	    $contenidonu = \DigitalsiteSaaS\Pagina\Tenant\Muxu::join('pages','pages.id','=','ficha.page_id')
	  			  ->orderBy('position','ASC')
	              ->where('ficha.id', '=' ,$id)->get();
	    $contenida = \DigitalsiteSaaS\Pagina\Tenant\Muxu::join('pages','pages.id','=','ficha.responsive')
	  			  ->orderBy('position','ASC')
	              ->where('ficha.id', '=' ,$id)->get();

		$categories = \DigitalsiteSaaS\Pagina\Tenant\Page::
		where('categoria', '=', 1)->get();
		$paginas = \DigitalsiteSaaS\Pagina\Tenant\Page::all();		
		$contenido = \DigitalsiteSaaS\Pagina\Tenant\Fichaje::find($id);

	    }
	    return view('avanza::fichaje/editar')->with('contenido', $contenido)->with('paginas', $paginas)->with('categories', $categories)->with('contenidonu', $contenidonu)->with('contenida', $contenida);
	    }
	
		public function editarfichaimg($id){
		if(!$this->tenantName){
		$contenidonu = Muxu::join('pages','pages.id','=','ficha.page_id')
	  			  ->orderBy('position','ASC')
	              ->where('ficha.id', '=' ,$id)->get();
	    $contenida = Muxu::join('pages','pages.id','=','ficha.responsive')
	  			  ->orderBy('position','ASC')
	              ->where('ficha.id', '=' ,$id)->get();

		$categories = Page::where('categoria', '=', 1)->get();
		$paginas = Page::all();		
		$contenido = Fichaje::find($id);
		}else{
		$contenidonu = \DigitalsiteSaaS\Pagina\Tenant\Muxu::join('pages','pages.id','=','ficha.page_id')
	  			  ->orderBy('position','ASC')
	              ->where('ficha.id', '=' ,$id)->get();
	    $contenida = \DigitalsiteSaaS\Pagina\Tenant\Muxu::join('pages','pages.id','=','ficha.responsive')
	  			  ->orderBy('position','ASC')
	              ->where('ficha.id', '=' ,$id)->get();

		$categories = \DigitalsiteSaaS\Pagina\Tenant\Page::where('categoria', '=', 1)->get();
		$paginas = \DigitalsiteSaaS\Pagina\Tenant\Page::all();		
		$contenido = \DigitalsiteSaaS\Avanza\Tenant\Fichaje::find($id);
		}
	    return view('avanza::fichaje/editar-img')->with('contenido', $contenido)->with('paginas', $paginas)->with('categories', $categories)->with('contenidonu', $contenidonu)->with('contenida', $contenida);
	    }
	
public function actualizarficha($id){
		$number = Auth::user()->id;
		if(Input::file('file') == null){
		if(!$this->tenantName){
        $imagel = Avanzaempresa::where('id','=',$id)->get();
        }else{
        $imagel = \DigitalsiteSaaS\Avanza\Tenant\Avanzaempresa::where('id','=',$id)->get();	
        }
     	}else{   
		$file = Input::file('file');
		$destinoPath = public_path().'/fichaimg/clientes/'.$number;
		$url_imagen = $file->getClientOriginalName();
		$subir=$file->move($destinoPath,$file->getClientOriginalName());
		}
		$input = Input::all();
		if(!$this->tenantName){
		$contenido = Fichaje::find($id);
		}else{
		$contenido = \DigitalsiteSaaS\Avanza\Tenant\Fichaje::find($id);
		}
		$contenido->title = Input::get('titulo');
		$contenido->slug = Str::slug($contenido->title);
		$contenido->description = Input::get('descripcion');
		$contenido->direccion = Input::get('direccion');
		$contenido->telefono = Input::get('telefono');
		$contenido->email = Input::get('email');
		$contenido->ubicacion = Input::get('ubicacion');
		$contenido->content = Input::get('contenido');
		$contenido->position = Input::get('descripseo');
		$contenido->facebook = Input::get('facebook');
		$contenido->identificador = Input::get('identificador');
		$contenido->twitter = Input::get('twitter');
		$contenido->linkedin = Input::get('linkedin');
		$contenido->instagram = Input::get('instagram');
		$contenido->youtube = Input::get('youtube');
		$contenido->level = Input::get('nivel');
		if(Input::file('file') == null){
		foreach($imagel as $imagel){
		$contenido->image = $imagel->imagen;
	    }
	    }else{
	    $contenido->image = '/fichaimg/clientes/'.$number.'/'.$url_imagen;	
	    }
		$contenido->imageal = Input::get('animacion');
		$contenido->website = Input::get('enlace');
		$contenido->type = Input::get('tipo');
		$contenido->page_id = Input::get('subcategory');
		$contenido->responsive = Input::get('category');
		$contenido->usuario_id = Input::get('usuario');
		$contenido->save();
	
		return Redirect('gestion/avanza/fichas')->with('status', 'ok_create');
	    }

public function empresa(){
			
	return view('avanza::fichaje/empresa');
	    }

public function empresacrear(){
			
		$contenido = new Empresa;
		$contenido->empresa = Input::get('empresa');
		$contenido->slug = Str::slug($contenido->empresa);
		$contenido->description = Input::get('descripcion');
		$contenido->nit = Input::get('nit');
		$contenido->website = Input::get('website');
		$contenido->telefono = Input::get('telefono');
		$contenido->direccion = Input::get('direccion');
		$contenido->ubicacion = Input::get('ubicacion');
		$contenido->usuario_id = Input::get('usuario');
		$contenido->save();

	
		return Redirect('gestion/avanza/empresa')->with('status', 'ok_create');
	    }





public function actualizarfichaimg($id, FichaUpdateimgRequest $request){
			
		$number = Auth::user()->id;
		$file = Input::file('file');
		$destinoPath = public_path().'/fichaimg/clientes/'.$number;
		$url_imagen = $file->getClientOriginalName();
		$subir=$file->move($destinoPath,$file->getClientOriginalName());

		$input = Input::all();

		if(!$this->tenantName){
		$contenido = Fichaje::find($id);
		}else{
		$contenido = \DigitalsiteSaaS\Avanza\Tenant\Fichaje::find($id);	
		}
		$contenido->title = Input::get('titulo');
		$contenido->slug = Str::slug($contenido->title);
		$contenido->description = Input::get('descripcion');
		$contenido->direccion = Input::get('direccion');
		$contenido->telefono = Input::get('telefono');
		$contenido->email = Input::get('email');
		$contenido->ubicacion = Input::get('ubicacion');
		$contenido->content = Input::get('contenido');
		$contenido->position = Input::get('descripseo');
		$contenido->level = Input::get('nivel');
		$contenido->image = $url_imagen;
		$contenido->imageal = Input::get('animacion');
		$contenido->website = Input::get('enlace');
		$contenido->type = Input::get('tipo');
		$contenido->page_id = Input::get('subcategory');
		$contenido->responsive = Input::get('category');
		$contenido->usuario_id = Input::get('usuario');
		$contenido->save();
	
		return Redirect('gestion/avanza/fichas')->with('status', 'ok_create');
	    }


	    public function leer($id){	
		$input = Input::all();
		if(!$this->tenantName){
		$contenido = Message::find($id);
     	}else{
     	$contenido = \DigitalsiteSaaS\Pagina\Tenant\Message::find($id);
     	}
		$contenido->cargo = '1';
		$contenido->save();
	
		return Redirect('gestion/avanza/mensaje-ficha/'.$contenido->id)->with('status', 'ok_create');
	    }


	     public function eliminarficha($id){
	    if(!$this->tenantName){
		$contenido = Fichaje::find($id);
		}else{
		$contenido = \DigitalsiteSaaS\Avanza\Tenant\Fichaje::find($id);	
		}
		$contenido->delete();
		return Redirect('gestion/avanza/fichas')->with('status', 'ok_delete');
	    }

	    public function mensajeficha($id){
	    $number = Auth::user()->id;	
	    if(!$this->tenantName){	
		$mensaje = Message::find($id);
		$mensajema = Message::where('interes', '=', $number)->where('cargo', '=', NULL)->count();
	    }else{
	    $mensaje = \DigitalsiteSaaS\Pagina\Tenant\Message::find($id);
		$mensajema = \DigitalsiteSaaS\Pagina\Tenant\Message::where('interes', '=', $number)->where('cargo', '=', NULL)->count();
	    }
	    return view('avanza::fichaje/vermensaje')->with('mensaje', $mensaje)->with('mensajema', $mensajema);
	    }

	    public function usuarios() {

  if(!$this->tenantName){
   $users = Usuario::all();
   }else{
   $users = \DigitalsiteSaaS\Usuario\Tenant\Usuario::all();
   }
   return view('avanza::usuarios')->with('users',$users);
}

	    public function fichas() {
if(!$this->tenantName){
    $fichas = Fichaje::all();

}else{
	$fichas = \DigitalsiteSaaS\Avanza\Tenant\Fichaje::all();

}
	return view('avanza::fichas')->with('fichas',$fichas);}

	 public function misfichas() {

    $fichas = Fichaje::all();
	return view('avanza::fichaje/mis-fichas')->with('fichas',$fichas);
	dd($fichas);
}
	

     	public function editarpromo($id){
        $number = Auth::user()->id;
     	if(Input::file('file') == null){
        $imagel = \DigitalsiteSaaS\Avanza\Tenant\Avanzaempresa::where('id','=',$id)->get();
     	}else{   
		$file = Input::file('file');
		$destinoPath = public_path().'/fichaimg/clientes/'.$number;
		$url_imagen = $file->getClientOriginalName();
		$subir=$file->move($destinoPath,$file->getClientOriginalName());
		}
		
		
		if(!$this->tenantName){
		$contenido = Promocion::find($id);
     	}else{
     	$contenido =  \DigitalsiteSaaS\Avanza\Tenant\Promocion::find($id);	
     	}
		$contenido->promocion = Input::get('promocion');
		$contenido->sluge = Str::slug($contenido->promocion);
		$contenido->desde = Input::get('desde');
		$contenido->hasta = Input::get('hasta');
		$contenido->cupones = Input::get('cupones');
		if(Input::file('file') == null){
		foreach($imagel as $imagel){
		$contenido->image = $imagel->imagen;
	    }
	    }else{
	    $contenido->image = '/fichaimg/clientes/'.$number.'/'.$url_imagen;	
	    }	    
		$contenido->save();

		return Redirect('gestion/avanza/promociones')->with('status', 'ok_create');
     	}



	    public function editarpromocion($id) {
		if(!$this->tenantName){
    	 $promociones = Promocion::find($id);
		 }else{
	     $promociones = \DigitalsiteSaaS\Avanza\Tenant\Promocion::find($id);
	      }

	     return view('avanza::fichaje/editar-promocion')->with('promociones', $promociones);
       
}


}