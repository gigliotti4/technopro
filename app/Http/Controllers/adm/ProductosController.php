<?php

namespace App\Http\Controllers\adm;


use App\Models\{Productos, Categorias, Subcategoria};

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; 
class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Productos::get();
        return view('adm.productos.contenido', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categorias = Categorias::all();
        $subcategorias = Subcategoria::get();
        $productos = Productos::all();

        return view('adm.productos.crear', compact('productos', 'categorias', 'subcategorias'));
        
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

         //dd($request->all()) ;
        $productos = new Productos($request->all());
        if($request->file('imagen')){

            $productos->imagen = $request->file('imagen')->storeAs('public/productos', $request->file('imagen')->getClientOriginalName());
        }

    
       
        
        $fotos = $request->file('galeria');
        $arrayimg = array(); 
        foreach($fotos as $foto){
            $galeria = $foto->store('productos', 'public');
            array_push($arrayimg, $galeria); 
 
        }
        $productos->galeria = implode(',', $arrayimg);
        

        if(isset($request->destacado))
        $productos->destacado    = 1;
    else
        $productos->destacado    = 0;
        
        $productos->save();

       
 

        return redirect()->route('productos')->with('success', 'La productos fue creada');

        // // 1, 4 , 5
        // $filtros = Etiquetas::whereIn('id',$request->etiquetas)->get('product_id');

        // Productis::whereIn('id', [$filtros, $colores] )->whreIn->get();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function show(Productos $productos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
        $productos = Productos::find($id);
        $categorias = Categorias::all();
        $subcategorias = Categorias::all();
       

        return view('adm.productos.editar', compact('productos', 'categorias', 'subcategorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
           $productos = Productos::find($id);


        if($request->file('imagen')){

            $productos->imagen = $request->file('imagen')->storeAs('public/productos', $request->file('imagen')->getClientOriginalName());
        }
        
        $fotos = $request->file('galeria');
        $arrayimg = array(); 
        if ($request->hasFile('galeria') )
        { 
            $imgdelete = explode(',', $productos->galeria);

            foreach($fotos as $foto){
            $galeria = $foto->store('productos', 'public');
            array_push($arrayimg, $galeria); 

            }
            $productos->galeria =$productos->galeria . ','. implode(',', $arrayimg);

            }


       
        $productos->orden     = $request->orden;$productos->codigo= $request->codigo;
        $productos->nombre = $request->nombre;
        $productos->descripcion     = $request->descripcion;

       
        $productos->categoria_id = $request->categoria_id;
        
        $productos->subcategoria_id = $request->subcategoria_id;
        

        if(isset($request->destacado))
        $productos->destacado    = 1;
    else
        $productos->destacado    = 0;
        
        $productos->update();
     
        

        return redirect()->route('productos')->with('success', 'actualizado');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $productos = Productos::find($id); 
        $productos->delete();
        return redirect()->back()->with('danger', "Registro eliminado exitósamente" ); 
    }



   
    public function borrarprod($id, $img)
    {
        $productos = Productos::find($id);
        $explode = explode(',', $productos->galeria);
        unset($explode[$img]);
        $productos->galeria = implode(',', $explode);
        $productos->save();

        return redirect()->back()->with('danger', "Imagen eliminada exitósamente" );;

             
    }

    

}
