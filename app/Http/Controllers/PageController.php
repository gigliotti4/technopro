<?php

namespace App\Http\Controllers;
use App\Models\Marca;
use App\Models\Contacto;
use App\Models\Rede;
use App\Models\Empresa;
use App\Models\Contenido;
use App\Models\Slider;
use App\Models\Productos;
use App\Models\Calidad;
use App\Models\Logo;
use App\Models\Clientes;
use App\Models\Categorias;
use App\Models\Subcategoria;
use App\Models\Linea;
use App\Models\Trabajosrealizados;
use App\Models\Inicio;
use App\Models\Zonaprivada;
use App\Models\CategoriaNovedades;
use App\Models\Novedad;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class PageController extends Controller
{
    public function index(){
        $active = 'page.inicio';
        $menu = 'web';
        $sliders   = Slider::where('seccion', 'inicio')->orderBy('orden', 'ASC')->get();
        $logosheader = Logo::where('seccion', 'header')->orderBy('id', 'ASC')->get();
        $logosfooter = Logo::where('seccion', 'footer')->orderBy('id', 'ASC')->get();
        // $clientes = Marca::orderBy('orden', 'ASC')->get();
        $categorias = Categorias::orderBy('orden', 'ASC')->where('destacado',1)->get();
        $inicio = Inicio::find(1);
        $contactos = Contacto::orderBy('orden', 'ASC')->get();
        $redes = Rede::get();
       return view('page.inicio', compact('sliders', 'logosheader','logosfooter', 'contactos', 'active', 'redes', 'categorias', 'inicio', 'menu'));

    }


    public function empresa(){
        $active = 'page.empresa';
        $menu = 'web';
        $sliders   = Slider::where('seccion', 'empresa')->orderBy('orden', 'ASC')->get();
        $logosheader = Logo::where('seccion', 'header')->orderBy('id', 'ASC')->get();
        $logosfooter = Logo::where('seccion', 'footer')->orderBy('id', 'ASC')->get();
        $empresa = Empresa::find(1);
        $lineas = Linea::orderBy('orden', 'ASC')->get();
        $contactos = Contacto::orderBy('orden', 'ASC')->get();
        $redes = Rede::get();
       return view('page.empresa', compact('sliders', 'logosheader','logosfooter', 'contactos', 'active', 'empresa', 'redes', 'lineas', 'menu'));

    }

    public function fundiciones(){
        $active = 'page.fundiciones';
        $sliders   = Slider::where('seccion', 'fundiciones')->orderBy('orden', 'ASC')->get();
        $logosheader = Logo::where('seccion', 'header')->orderBy('id', 'ASC')->get();
        $logosfooter = Logo::where('seccion', 'footer')->orderBy('id', 'ASC')->get();
        $fundiciones = Fundiciones::orderBy('orden', 'ASC')->get();
        
        $contactos = Contacto::orderBy('orden', 'ASC')->get();
        $redes = Rede::get();
       return view('page.fundiciones', compact('sliders', 'logosheader','logosfooter', 'contactos', 'active', 'fundiciones', 'redes'));

    }

    public function categorias(){
        $active = 'page.categorias';
        $menu = 'web';
        $sliders   = Slider::where('seccion', 'categorias')->orderBy('orden', 'ASC')->get();
        $logosheader = Logo::where('seccion', 'header')->orderBy('id', 'ASC')->get();
        $logosfooter = Logo::where('seccion', 'footer')->orderBy('id', 'ASC')->get();
        $categorias = Categorias::orderBy('orden', 'ASC')->get();
        $contactos = Contacto::orderBy('orden', 'ASC')->get();
        $redes = Rede::get();
       return view('page.categorias', compact('sliders', 'logosheader','logosfooter', 'contactos', 'active', 'categorias', 'redes', 'menu'));

    }

    public function subcategorias($id){
        $active = 'page.categorias';
        $menu = 'web';
        $sliders   = Slider::where('seccion', 'categorias')->orderBy('orden', 'ASC')->get();
        $logosheader = Logo::where('seccion', 'header')->orderBy('id', 'ASC')->get();
        $logosfooter = Logo::where('seccion', 'footer')->orderBy('id', 'ASC')->get();
        $categorias = Categorias::orderBy('orden', 'ASC')->get();
        $subcategoria=SubCategoria::find($id);
        $catsel=$subcategoria->categoria_id;
        $subcatsel=$subcategoria->id;
        $contactos = Contacto::orderBy('orden', 'ASC')->get();
        $redes = Rede::get();
       return view('page.subcategorias', compact('sliders', 'logosheader','logosfooter', 'contactos', 'active', 'categorias', 'redes', 'menu', 'subcategoria', 'catsel', 'subcatsel'));

    }
    public function productos($id){
        $active = 'page.categorias';
        $menu = 'web';
        $sliders   = Slider::where('seccion', 'productos')->orderBy('orden', 'ASC')->get();
        $logosheader = Logo::where('seccion', 'header')->orderBy('id', 'ASC')->get();
        $logosfooter = Logo::where('seccion', 'footer')->orderBy('id', 'ASC')->get();
        $categorias = Categorias::orderBy('orden', 'ASC')->get();
        $productos = Productos::where('categoria_id', $id)->orderBy('orden', 'ASC')->get();
        $categoria_sel = $id;
        $contactos = Contacto::orderBy('orden', 'ASC')->get();
        $redes = Rede::get();
       return view('page.productos', compact('sliders', 'logosheader','logosfooter', 'categorias', 'contactos', 'active', 'productos', 'redes', 'categoria_sel', 'menu'));

    }

    public function producto($id){
        $active = 'page.categorias';
        $menu = 'web';
        $sliders   = Slider::where('seccion', 'productos')->orderBy('orden', 'ASC')->get();
        $logosheader = Logo::where('seccion', 'header')->orderBy('id', 'ASC')->get();
        $logosfooter = Logo::where('seccion', 'footer')->orderBy('id', 'ASC')->get();
        $categorias = Categorias::orderBy('orden', 'ASC')->get();
        $productos = Productos::where('categoria_id', $id)->orderBy('orden', 'ASC')->get();
        $producto = Productos::find($id);
        $categoria_sel = $producto->categoria_id;
        
        $contactos = Contacto::orderBy('orden', 'ASC')->get();
        $redes = Rede::get();
       return view('page.producto', compact('sliders', 'logosheader','logosfooter', 'contactos', 'active', 'producto', 'redes', 'productos', 'producto', 'categoria_sel', 'categorias', 'menu'));

    }

    public function trabajos(){
        $active = 'page.trabajos';
        $menu = 'web';
        $sliders   = Slider::where('seccion', 'trabajos')->orderBy('orden', 'ASC')->get();
        $logosheader = Logo::where('seccion', 'header')->orderBy('id', 'ASC')->get();
        $logosfooter = Logo::where('seccion', 'footer')->orderBy('id', 'ASC')->get();
        $trabajos = Trabajosrealizados::orderBy('orden', 'ASC')->get();
        
        $contactos = Contacto::orderBy('orden', 'ASC')->get();
        $redes = Rede::get();
       return view('page.trabajos', compact('sliders', 'logosheader','logosfooter', 'contactos', 'active', 'trabajos', 'redes', 'menu'));

    }
 

   
    public function apiProducto($id)
    {
        return Productos::with('colores')->find($id);
        

    }

    public function clientes(){
        $active = 'page.clientes';
        $menu = 'web';
        $sliders   = Slider::where('seccion', 'clientes')->orderBy('orden', 'ASC')->get();
        $logosheader = Logo::where('seccion', 'header')->orderBy('id', 'ASC')->get();
        $logosfooter = Logo::where('seccion', 'footer')->orderBy('id', 'ASC')->get();
        $clientes = Clientes::orderBy('orden', 'ASC')->get();
        $contactos = Contacto::orderBy('orden', 'ASC')->get();
        $redes = Rede::get();
       return view('page.clientes', compact('sliders', 'logosheader','logosfooter', 'contactos', 'active', 'clientes', 'redes', 'menu'));

    }

    public function calidad(){
        $active = 'page.calidad';
        $menu = 'web';
        $sliders   = Slider::where('seccion', 'calidad')->orderBy('orden', 'ASC')->get();
        $logosheader = Logo::where('seccion', 'header')->orderBy('id', 'ASC')->get();
        $logosfooter = Logo::where('seccion', 'footer')->orderBy('id', 'ASC')->get();
        $calidad = Calidad::orderBy('orden', 'ASC')->get();
        $contactos = Contacto::orderBy('orden', 'ASC')->get();
        $redes = Rede::get();
       return view('page.calidad', compact('sliders', 'logosheader','logosfooter', 'contactos', 'active', 'calidad', 'redes', 'menu'));

    }

    
    public function vistaNovedades(){
        $active = 'page.novedades';
        $menu = 'web';
        $contactos=Contacto::all();
       
        $logosheader = Logo::where('seccion', 'header')->orderBy('id', 'ASC')->get();
        $logosfooter = Logo::where('seccion', 'footer')->orderBy('id', 'ASC')->get();
       
        $ultimas_novedades=Novedad::orderby('orden',"ASC")->take(3)->get();
        $novedades=Novedad::orderby('orden',"ASC")->get();
        $categorias=CategoriaNovedades::orderby('orden',"ASC")->get();
        $redes = Rede::get();
        return view('page.novedades',compact('active','categorias','ultimas_novedades','contactos','logosheader','logosfooter','novedades', 'redes', 'menu'));
    }
    
    public function vistaNovedad($id){
       
        $active = 'page.novedades';
        $menu = 'web';
        $novedad=Novedad::find($id);
        $contactos=Contacto::all();
       
        $logosheader = Logo::where('seccion', 'header')->orderBy('id', 'ASC')->get();
        $logosfooter = Logo::where('seccion', 'footer')->orderBy('id', 'ASC')->get();
        
        
        $categorias=CategoriaNovedades::orderby('orden',"ASC")->get();
        $redes = Rede::get();
        return view('page.novedad',compact('active','novedad','categorias','contactos','logosheader','logosfooter', 'redes', 'menu'));
    }
   
    public function vistaPorCategoria($id){
        $active = 'page.novedades';
        $menu = 'web';
        $novedades=Novedad::where('category_id',$id)->orderby('fecha',"ASC")->get();
        $contactos=Contacto::all();
        $logosheader = Logo::where('seccion', 'header')->orderBy('id', 'ASC')->get();
        $logosfooter = Logo::where('seccion', 'footer')->orderBy('id', 'ASC')->get();
        
        $categorias=CategoriaNovedades::orderby('orden',"ASC")->get();
        $redes = Rede::get();
        return view('page.novedadesporCategoria',compact('active','novedades','categorias','contactos','logosheader','logosfooter', 'redes', 'menu'));
    }



    public function descargapriv(){
        
        $active = 'page.descarga';
        $menu = 'privada';
        $sliders   = Slider::where('seccion', 'descarga')->orderBy('orden', 'ASC')->get();
        $logosheader = Logo::where('seccion', 'header')->orderBy('id', 'ASC')->get();
        $logosfooter = Logo::where('seccion', 'footer')->orderBy('id', 'ASC')->get();
        $descargas = Zonaprivada::orderBy('orden', 'ASC')->get();
        $contactos = Contacto::orderBy('orden', 'ASC')->get();
        $redes = Rede::get();
       return view('zonaprivada.descargas', compact('sliders', 'logosheader','logosfooter', 'contactos', 'active', 'descargas', 'redes', 'menu'));

    }

  
   


    public function contactos(){
        $active = 'page.contactos';
        $menu = 'web';
        $logosheader = Logo::where('seccion', 'header')->orderBy('id', 'ASC')->get();
        $logosfooter = Logo::where('seccion', 'footer')->orderBy('id', 'ASC')->get();
        //$etiquetas = Etiqueta::orderBy('orden', 'ASC')->get();
        $contactos = Contacto::orderBy('orden', 'ASC')->get();
        $redes = Rede::get();
       return view('page.contacto', compact('logosheader', 'logosfooter', 'contactos', 'active', 'redes', 'menu'));

    }



    public function buscador(request $request){
        $active = 'page.productos';
        $menu = 'web';
        $sliders   = Slider::where('seccion', 'productos')->orderBy('orden', 'ASC')->get();
        $logosheader = Logo::where('seccion', 'header')->orderBy('id', 'ASC')->get();
        $logosfooter = Logo::where('seccion', 'footer')->orderBy('id', 'ASC')->get();
        $categorias = Categorias::orderBy('orden', 'ASC')->get();
        if(isset($request->nombre)){

        $productos = Productos::where('nombre', $request->nombre)->orderBy('orden', 'ASC')->get();
            
        }else{
            $productos = Productos::where('codigo', 'LIKE' , '%'.$request->codigo.'%')->orderBy('orden', 'ASC')->get();
        }
       
        $contactos = Contacto::orderBy('orden', 'ASC')->get();
        $redes = Rede::get();
       return view('page.productos', compact('sliders', 'logosheader','logosfooter', 'categorias', 'contactos', 'active', 'productos', 'redes', 'menu'));

    }
}
