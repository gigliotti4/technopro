<?php

namespace App\Http\Controllers\adm;
use App\Models\Clientes;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $clientes = Clientes::orderBy('orden', 'ASC')->get();
        return view('adm.clientes.contenido', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
       
        return view('adm.clientes.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $clientes = new Clientes;
        $clientes->orden = $request->orden;
        $clientes->imagen = $request->file('imagen')->store('public/clientes');
        if(isset($request->destacado))
        $clientes->destacado    = 1;
    else
        $clientes->destacado    = 0;
        
        
        $clientes->save();


        return redirect()->route('clientes')->with('success', 'La aplicacio fue creado');
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
         $clientes = Clientes::find($id);

        return view('adm.clientes.editar', compact('clientes'));
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
        $clientes = Clientes::find($id);
       
        
        if ($request->hasFile('imagen'))
        {
            Storage::delete($clientes->imagen);
            $path = $request->file('imagen')->store('public/clientes');
        }else{
            $path = $clientes->imagen;
        }
       
        $clientes->imagen    = $path;
        $clientes->orden     = $request->orden;
        if(isset($request->destacado))
        $clientes->destacado    = 1;
    else
        $clientes->destacado    = 0;
        $clientes->save();
        return redirect()->route('clientes')->with('success', "Registro actualizado exitósamente" );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $clientes = Clientes::find($id);
        storage::delete($clientes->imagen);
        $clientes->delete();
        return redirect()->back()->with('success', "Registro eliminado exitósamente" );  
    }
}
