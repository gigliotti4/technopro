<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Models\Clienteslogin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\Contacto;
use App\Models\Logo;
use App\Models\Rede;

class LoginClienteController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //Cambiar ruta a donde se va a logear el cliente
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    public function username(){
        return 'username';
    }

    public function __construct()
    {
        //$this->middleware('auth.cliente')->except('logout');
    }

    public function login(Request $request) {
        
        
        $request->session()->forget('obj_fila');
        
        $this->validateLogin($request);
        
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            return $this->sendLockoutResponse($request);
        }
        
        if($this->guard()->validate($this->credentials($request))) {
            if(Auth::guard('cliente')->attempt(['username' => $request->username, 'password' => $request->password])) {
                if(Auth::guard('cliente')->user()->estado == 1){
                    $contacto = Contacto::first();
                    return redirect()->route('area_privada');
                }else{
                   //dd(Auth::guard('cliente')->user());
                    Auth::guard('cliente')->logout();
                    return back()->with('danger', 'El usuario todavia no esta habilitado, Comuniquese por correo electronico');
                }
                
            }  else {
                $this->incrementLoginAttempts($request);
               //dd($this->guard());
                return back()->withErrors(['msj' => "Datos incorrectos"]);
            }
        } else {
            
            $this->incrementLoginAttempts($request);
            //dd($this->credentials($request));
            return back()->withErrors(['msj' => "Datos incorrectos"]);
         
        //return redirect()->route('index'); 
        }
    }
    public function salir(Request $request) {        
        Auth::guard('cliente')->logout();
        return redirect()->route('page.inicio');
    }

        /**
     * Validate the user login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);
    }

    /**
     * Attempt to log the user into the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    protected function attemptLogin(Request $request)
    {
        return $this->guard('cliente')->attempt(
            $this->credentials($request), $request->filled('remember')
        );
    }

    /**
     * Get the needed authorization credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        return $request->only($this->username(), 'password');
    }

    /**
     * Send the response after the user was authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        if ($response = $this->authenticated($request, $this->guard('cliente')->user())) {
            return $response;
        }

        return $request->wantsJson()
                    ? new JsonResponse([], 204)
                    : redirect()->intended($this->redirectPath());
    }

    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {
        //
    }

    /**
     * Get the failed login response instance.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            $this->username() => [trans('auth.failed')],
        ]);
    }

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */  

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {
        $this->guard('cliente')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        if ($response = $this->loggedOut($request)) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect('/');
    }

    /**
     * The user has logged out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    protected function loggedOut(Request $request)
    {
        //
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('cliente');
    }

    protected function registro_cliente()
    { 
        $active = 'page.zonaprivada';
        $menu = 'web';
        $logosheader = Logo::where('seccion', 'header')->orderBy('id', 'ASC')->get();
        $logosfooter = Logo::where('seccion', 'footer')->orderBy('id', 'ASC')->get();
        $contacto = DB::table('contactos')->get();
        $contactos = Contacto::orderBy('orden', 'ASC')->get();
        $contenido['contacto'] = json_decode(json_encode($contacto), true);
        $redes = Rede::get();
        $contenido = json_decode(json_encode($contenido), FALSE);

        return view('zonaprivada.registro' , compact('contenido','contactos', 'active', 'logosheader', 'logosfooter', 'redes', 'menu'));
    }
    
    protected function registro_cliente_post(request $request)
    {
        
           request()->validate([
            'username' => 'required',
            'email' => 'required',
          ]);

          
        $user = new Clienteslogin;
          $user->username = $request->username;
          $user->password = Hash::make($request->password);
          $user->email = $request->email;   
          $user->estado = 0;
          $user->save();

          $contacto = DB::table('contactos')->get();
          $contenido['contacto'] = json_decode(json_encode($contacto), true);
  

          $active = 'page.zonaprivada';
          $menu = 'web';
          $logosheader = Logo::where('seccion', 'header')->orderBy('id', 'ASC')->get();
          $logosfooter = Logo::where('seccion', 'footer')->orderBy('id', 'ASC')->get();
          $contenido = json_decode(json_encode($contenido), FALSE);
          $contactos = Contacto::orderBy('orden', 'ASC')->get();
          $redes = Rede::get();
          return back()->with('success', 'Cliente creado Correctamente, dentro de las 24 horas estará habilitado');

          
    }

   
}
