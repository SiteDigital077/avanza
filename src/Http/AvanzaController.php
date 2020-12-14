<?php

namespace DigitalsiteSaaS\Avanza\Http;

use DigitalsiteSaaS\Avanza\Fichaje;
use DigitalsiteSaaS\Avanza\Empresa;
use DigitalsiteSaaS\Avanza\Avanzaempresa;
use DigitalsiteSaaS\Pagina\Message;
use DigitalsiteSaaS\Pagina\Page;
use DigitalsiteSaaS\Pagina\Muxu;
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
    	}else{
    	$usuario = Auth::user()->id;
   		$conteo = DB::table('ficha')->where('usuario_id', '=', $usuario)->count();
    	$categories = \DigitalsiteSaaS\Pagina\Tenant\Page::where('categoria', '=', 1)->get();
    	$paginas = Page::all();	
    	}
		return view('avanza::fichaje/crear-ficha')->with('paginas', $paginas)->with('categories', $categories)->with('conteo', $conteo);
}

  public function avanzacrearempresa(){
    	
		return view('avanza::fichaje/crear-empresa');
}

  public function editarempresa($id){
  	    if(!$this->tenantName){
    	$empresa = Avanzaempresa::where('id', '=', $id)->get();
        }else{
       $empresa = \DigitalsiteSaaS\Avanza\Tenant\Avanzaempresa::where('id', '=', $id)->get();
        }

		return view('avanza::fichaje/editar-empresa')->with('empresa', $empresa);
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

public function memo(){
	$cat_id = Input::get('cat_id');
	if(!$this->tenantName){
	$subcategories = Page::where('page_id', '=', $cat_id)->get();
    }else{
    $subcategories = \DigitalsiteSaaS\Pagina\Tenant\Page::where('page_id', '=', $cat_id)->get();
    }
	return Response::json($subcategories);
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
		$contenido->page_id = Input::get('subcategory');
		$contenido->responsive = Input::get('category');
		$contenido->usuario_id = Input::get('usuario');
		$contenido->save();

		return Redirect('gestion/avanza/fichas')->with('status', 'ok_create');
     	}

     	public function crearempresa(){
		$number = Auth::user()->id;
		$file = Input::file('file');
		$destinoPath = public_path().'/fichaimg/clientes/'.$number;
		$url_imagen = $file->getClientOriginalName();
		$subir=$file->move($destinoPath,$file->getClientOriginalName());
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
		$contenido->imagen = '/fichaimg/clientes/'.$number.'/'.$url_imagen;
		$contenido->url = Input::get('url');
		$contenido->visualizacion = Input::get('visualizacion');
		$contenido->tipo = Input::get('tipo');
		$contenido->direccion = Input::get('direccion');
		$contenido->telefono = Input::get('telefono');
		$contenido->email = Input::get('email');
		$contenido->ubicacion = Input::get('ubicacion');
		$contenido->usuario_id = Input::get('usuario');
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
		$contenido->url = Input::get('url');
		$contenido->visualizacion = Input::get('visualizacion');
		$contenido->tipo = Input::get('tipo');
		$contenido->direccion = Input::get('direccion');
		$contenido->telefono = Input::get('telefono');
		$contenido->email = Input::get('email');
		$contenido->ubicacion = Input::get('ubicacion');
		$contenido->usuario_id = Input::get('usuario');
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
        $mensaje = DB::table('mesage')->where('interes','=',$numbersa)->get();
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
        $imagel = \DigitalsiteSaaS\Avanza\Tenant\Avanzaempresa::where('id','=',$id)->get();
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
     	$contenido = \DigitalsiteSaaS\Avanza\Tenant\Message::find($id);
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
				
		$mensaje = Message::find($id);
		$number = Auth::user()->id;
		$mensajema = DB::table('mesage')->where('interes', '=', $number)->where('cargo', '=', NULL)->count();
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
	

}