<?php


namespace App\Http\Controllers\adm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Zonaprivada;

class ZonaprivadaController extends Controller
{
          /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $zonaprivada = Zonaprivada::orderBy('orden', 'ASC')->get();
        return view('adm.zonaprivada.contenido', compact('zonaprivada'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
       
        return view('adm.zonaprivada.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'imagen' => 'max:10240|mimes:jpg,jpeg,png,svg,gif,webp',
            
         ]);
        $zonaprivada = new Zonaprivada;
        $zonaprivada->orden = $request->orden;
        $zonaprivada->nombre = $request->nombre;
       
        $zonaprivada->imagen = $request->file('imagen')->store('public/zonaprivada');
        $zonaprivada->pdf = $request->file('pdf')->store('public/zonaprivada');
       
      
        $zonaprivada->save();


        return redirect()->route('zonaprivada')->with('success', 'El zonaprivada fue creado');
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
         $zonaprivada = Zonaprivada::find($id);

        return view('adm.zonaprivada.editar', compact('zonaprivada'));
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
        $validated = $request->validate([
            'imagen' => 'max:10240|mimes:jpg,jpeg,png,svg,gif,webp',
            
         ]);
        $zonaprivada = Zonaprivada::find($id);
        if ($request->hasFile('imagen'))
        {
            Storage::delete($zonaprivada->imagen);
            $zonaprivada->imagen = $request->file('imagen')->store('public/zonaprivada');
        }
        if ($request->hasFile('pdf'))
        {
            Storage::delete($zonaprivada->pdf);
            $zonaprivada->pdf = $request->file('pdf')->store('public/zonaprivada');
        }

        $zonaprivada->nombre = $request->nombre;
        $zonaprivada->orden     = $request->orden;
       
        $zonaprivada->save();
        return redirect()->route('zonaprivada')->with('success', "Registro actualizado exitósamente" );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $zonaprivada = Zonaprivada::find($id);
        storage::delete($zonaprivada->imagen);
        $zonaprivada->delete();
        return redirect()->back()->with('danger', "Registro eliminado exitósamente" );  
    }
}
