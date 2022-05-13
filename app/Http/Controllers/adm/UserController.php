<?php

namespace App\Http\Controllers\adm;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Clienteslogin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\Models\Zonaprivada;
use App\Models\DescargaRelacion;

class UserController extends Controller
{
    public function index()
    {
        
        $usuarios = User::orderBy('id', 'ASC')->get();
        return view('adm.usuario.index', compact('usuarios'));
    }

    public function create(){
        
        return view('adm.usuario.crear');
    }

    public function store(Request $request)
    {
        $user = new User ();
        $user->name     = $request->name;
        $user->username = $request->username;
        $user->email    = $request->email;
        $user->role  = $request->role;
        $user->password = Hash::make($request->password);
        $user->save();
        

        return redirect()->route('usuarios')->with('success', "Usuario registrado exitósamente" );
    }

    public function edit($id){
        $usuarios         = User::find($id);
        
        return view('adm.usuario.editar', compact('usuarios'));
    }

    public function update(Request $request, $id){
        $user           = User::find($id);
        $user->name     = $request->name;
        $user->username = $request->username;
        $user->email    = $request->email;
        $user->role  = $request->role;
        if ($request->password){
            $user->password = Hash::make($request->password);
        }else{
            $user->password = $user->password;
        }

        $user->update();
        

        return redirect()->route('usuarios')->with('success', "Usuario actualizado exitósamente" );
    }

    public function destroy($id){
        $user = User::find($id);
        $user->delete();
        return redirect()->route('usuarios')->with('danger', "Usuario eliminado exitósamente" );
    }







    public function indexzp()
    {
        $usuarios = Clienteslogin::orderBy('id', 'ASC')->get();
        
        return view('adm.clienteslogin.index', compact('usuarios'));
    }

    public function createzp(){
        $descargas = Zonaprivada::all();
        return view('adm.clienteslogin.crear',compact('descargas'));
    }

    public function storezp(Request $request)
    {
        $user = new Clienteslogin ();
        $user->username = $request->username;
        $user->email    = $request->email;
        $user->estado  = $request->estado;
        $user->password = Hash::make($request->password);
        $user->save();
        
                        if(isset($request->relacionado)){
           foreach($request->relacionado as $relacion){
            if($relacion != 0){
                $objrelacion = new DescargaRelacion;
                $objrelacion->usuario_id = $user->id;
                $objrelacion->relacion_id = $relacion;
                $objrelacion->save();
            }
           }
       }
        return redirect()->route('clienteslogin')->with('success', "Usuario registrado exitósamente" );
    }

    public function editzp($id){
        $usuarios         = Clienteslogin::find($id);
        $descargasall  = Zonaprivada::all();
        return view('adm.clienteslogin.editar', compact('usuarios','descargasall'));
    }

    public function updatezp(Request $request, $id){
        $user           = Clienteslogin::find($id);
        
        $user->username = $request->username;
        $user->email    = $request->email;
        $user->estado  = $request->estado;
        if ($request->password){
            $user->password = Hash::make($request->password);
        }else{
            $user->password = $user->password;
        }

        $user->update();
        
                        DescargaRelacion::where('usuario_id','=',$user->id)->delete(); 
        if(isset($request->relacionado)){
            foreach($request->relacionado as $relacion){
                if($relacion != 0){
                    $objrelacion = new DescargaRelacion;
                    $objrelacion->usuario_id = $user->id;
                    $objrelacion->relacion_id = $relacion;
                    $objrelacion->save();
                }
            }
        }
        return redirect()->route('clienteslogin')->with('success', "Usuario actualizado exitósamente" );
    }

    public function destroyzp($id){
        $user = Clienteslogin::find($id);
        $user->delete();
        return redirect()->route('clienteslogin')->with('danger', "Usuario eliminado exitósamente" );
    }
}
