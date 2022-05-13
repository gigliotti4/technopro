<?php

namespace App\Http\Controllers\adm;
use App\Http\Controllers\Controller;

use App\Models\Categoria;
use App\Models\CategoriaNovedades;
use App\Models\Novedad;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Contacto;
use App\Models\IconosPie;
use App\Models\ImagenPrincipal;
use App\Models\Logos;
use App\Models\SeccionEmpresa;
class NovedadesController extends Controller
{
    public function editarNovedades(){
      
     $categorias=CategoriaNovedades::orderby('orden',"ASC")->get();
    $novedades=Novedad::orderby('fecha',"ASC")->get();
    //    $dia=$fecha->format('d');
    //    echo("el mes es". $mes. "y el dia es ".$dia );
     return view('adm.novedades.editarnovedades',compact('categorias','novedades'));
    }
    public function agregarCategoriaNovedad(Request $request){
        $categoria=new CategoriaNovedades($request->all());
        $categoria->save();
    }
    public function editarCategoriaNovedad($id){
        $categoria=CategoriaNovedades::find($id);
        return $categoria;
    }
    public function actualizarCategoriaNovedad(Request $request,$id){
        $categoria=CategoriaNovedades::find($id);
        $categoria->update($request->all());
    }
    public function eliminarCategoriaNovedad($id){
        $categoria=CategoriaNovedades::find($id);
        $categoria->delete();
    }
    public function agregarNovedad(Request $request){
        $novedad= new Novedad($request->all());
        $fecha= new Carbon();
        $fecha_en=$fecha->toFormattedDateString();
   
        $dia=$fecha->format('d');
        $mes=$fecha->format('n');
        $año=$fecha->format('Y');

       switch ($mes) {
            case 1:
                $fecha_es= $dia." de Enero del ".$año;
            break;
            case 2:
                $fecha_es=$dia." de Febrero del ".$año;
            break;
            case 3:
                $fecha_es=$dia." de Marzo del ".$año;
            break;
            case 4:
                $fecha_es=$dia." de Abril del ".$año;
            break;
            case 5:
                $fecha_es=$dia." de Mayo del ".$año;
            break;
            case 6:
                $fecha_es=$dia." de Junio del ".$año;
            break;
            case 7:
                $fecha_es=$dia." de Julio del ".$año;
            break;
            case 8:
                $fecha_es=$dia." de Agosto del ".$año;
            break;
            case 9:
                $fecha_es=$dia." de Septiembre del ".$año;
            break;
            case 10:
                $fecha_es=$dia." de Octubre del ".$año;
            break;
            case 11:
                $fecha_es=$dia." de Noviembre del ".$año;
            break;
            case 12:
                $fecha_es=$dia." de Diciembre del ".$año;
            break;
       }
        if($archivo=$request->file('imgNovedad')){
            //$nombre=$request->titulo.".".$archivo->getClientOriginalExtension();
            $nombre="img_novedad".time().".".$archivo->getClientOriginalExtension();
            $archivo->move('images/novedades',$nombre);
            $novedad->imagen=$nombre;
        }
        $novedad->fecha=$fecha;
        $novedad->orden = $request->orden;
        $novedad->fecha_es=$fecha_es;
        $novedad->save();
    }
    public function editarNovedad($id){
        $novedad=Novedad::find($id);
        return $novedad;
    }
    public function actualizarNovedad(Request $request,$id){
        $novedad=Novedad::find($id);
        if($archivo=$request->file('imgNovedad')){
            //$nombre=$request->titulo.".".$archivo->getClientOriginalExtension();
            $nombre="img_novedad".time().".".$archivo->getClientOriginalExtension();
            $archivo->move('images/novedades',$nombre);
            $novedad->imagen=$nombre;
        }
        $novedad->update($request->all());
    }
    public function eliminarNovedad($id){
        $novedad=Novedad::find($id);
        $novedad->delete();
    }
   
   
}
