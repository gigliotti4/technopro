<?php

namespace App\Http\Controllers\adm;

use App\Models\Subcategoria;
use App\Models\Categorias;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SubcategoriaController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategorias = Subcategoria::get();
        $categorias = Categorias::all();
        return view('adm.subcategorias.contenido', compact('categorias', 'subcategorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subcategorias = Subcategoria::orderBy('orden', 'ASC')->get();
        $categorias = Categorias::all();
        return view('adm.subcategorias.crear', compact('subcategorias', 'categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $subcategorias = new Subcategoria;
        $subcategorias->orden = $request->orden;
        $subcategorias->nombre = $request->nombre;
        $subcategorias->categoria_id = $request->categoria_id;
        if($request->file('imagen')){
            $subcategorias->imagen = $request->file('imagen')->store('public/subcategorias');
            }
        
     
        
        $subcategorias->save();


        return redirect()->route('subcategorias')->with('success', 'La subcategorias fue creada');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subcategoria  $categorias
     * @return \Illuminate\Http\Response
     */
    public function show(Categorias $categorias)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subcategoria  $categorias
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subcategorias = Subcategoria::find($id);
        $categorias = Categorias::all();
        return view('adm.subcategorias.editar', compact('subcategorias','categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subcategoria  $subcategorias
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $subcategorias = Subcategoria::find($id);    
        $subcategorias->orden     = $request->orden;
        $subcategorias->nombre = $request->nombre;
        $subcategorias->categoria_id = $request->categoria_id;
        if($request->file('imagen')){
            $subcategorias->imagen = $request->file('imagen')->store('public/subcategorias');
            }
       
           
            
            $subcategorias->save();
        return redirect()->route('subcategorias')->with('success', "Registro actualizado exitósamente" );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subcategoria  $subcategorias
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subcategorias = Subcategoria::find($id); 
        $subcategorias->delete();
        return redirect()->back()->with('danger', "Registro eliminado exitósamente" ); 
    }
}
