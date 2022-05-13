<?php

namespace App\Http\Controllers\adm;
use App\Models\Calidad;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CalidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $calidad = Calidad::orderBy('orden', 'ASC')->get();
        return view('adm.calidad.contenido', compact('calidad'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
       
        return view('adm.calidad.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $calidad = new Calidad;
        $calidad->orden = $request->orden;
        $calidad->descripcion = $request->descripcion;
        $calidad->nombre = $request->nombre;
        $calidad->pdf = $request->file('pdf')->store('public/calidad');
        $calidad->imagen = $request->file('imagen')->store('public/calidad');
        $calidad->save();


        return redirect()->route('calidad')->with('success', 'El registro fue creado');
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
         $calidad = Calidad::find($id);

        return view('adm.calidad.editar', compact('calidad'));
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
        $calidad = Calidad::find($id);
       
        
        if ($request->hasFile('pdf'))
        {
            Storage::delete($calidad->pdf);
            $path = $request->file('pdf')->store('public/calidad');
        }else{
            $path = $calidad->pdf;
        }


        if ($request->hasFile('imagen'))
        {
            Storage::delete($calidad->imagen);
            $path_imagen = $request->file('imagen')->store('public/calidad');
        }else{
            $path_imagen = $calidad->imagen;
        }
        $calidad->descripcion     = $request->descripcion;
        $calidad->nombre     = $request->nombre;
        $calidad->pdf    = $path_imagen;
        $calidad->pdf    = $path;
        $calidad->orden     = $request->orden;
        $calidad->save();
        return redirect()->route('calidad')->with('success', "Registro actualizado exitósamente" );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $calidad = Calidad::find($id);
        storage::delete($calidad->imagen);
        $calidad->delete();
        return redirect()->back()->with('success', "Registro eliminado exitósamente" );  
    }
}
