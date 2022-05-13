<?php

namespace App\Http\Controllers\adm;

use App\Models\Linea;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LineaController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $lineas = Linea::orderBy('orden', 'ASC')->get();
        return view('adm.lineas.contenido', compact('lineas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
       
        return view('adm.lineas.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $lineas = new Linea;
        $lineas->orden = $request->orden;
        $lineas->descripcion = $request->descripcion;
        $lineas->ano = $request->ano; 
        $lineas->save();


        return redirect()->route('lineas')->with('success', 'El registro fue creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $lineas = Linea::find($id);

        return view('adm.lineas.editar', compact('lineas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $lineas = Linea::find($id);
       
        
     
        $lineas->descripcion     = $request->descripcion;
        $lineas->ano     = $request->ano; 
        $lineas->orden     = $request->orden;
        $lineas->save();
        return redirect()->route('lineas')->with('success', "Registro actualizado exitósamente" );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lineas = Linea::find($id);
        storage::delete($lineas->imagen);
        $lineas->delete();
        return redirect()->back()->with('success', "Registro eliminado exitósamente" );  
    }
}
