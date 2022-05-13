
<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/adm', [App\Http\Controllers\adm\AdmController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function() {
    
    Route::get('/adm/sliders/{seccion}', [App\Http\Controllers\adm\SliderController::class, 'index'])->name('slider');
    Route::get('/adm/sliders/create/{seccion}', [App\Http\Controllers\adm\SliderController::class, 'create'])->name('nuevoslider');
    Route::post('/adm/sliders/create/{seccion}',[App\Http\Controllers\adm\SliderController::class, 'store'])->name('crearslider');
    Route::get('/adm/sliders/edit/{seccion}/{id}',[App\Http\Controllers\adm\SliderController::class, 'edit'])->name('editslider');
    Route::put('/adm/sliders/update/{seccion}/{id}', [App\Http\Controllers\adm\SliderController::class, 'update'])->name('updateslider');
    Route::get('/adm/sliders/eliminar/{id}', [App\Http\Controllers\adm\SliderController::class, 'destroy'])->name('eliminarslider');

    
     
     //Empresa
     Route::get('/adm/empresa/edit/{id}',[App\Http\Controllers\adm\EmpresaController::class, 'edit'])->name('editarempresa');
     Route::put('/adm/empresa/update/{id}', [App\Http\Controllers\adm\EmpresaController::class, 'update'])->name('updateempresa');

     //Empresa
     Route::get('/adm/inicio/edit/{id}',[App\Http\Controllers\adm\InicioController::class, 'edit'])->name('editarinicio');
     Route::put('/adm/inicio/update/{id}', [App\Http\Controllers\adm\InicioController::class, 'update'])->name('updateinicio');
 


      //Contacto
      Route::get('adm/contacto', [App\Http\Controllers\adm\ContactosController::class, 'index'])->name('contacto');
      Route::get('/adm/contacto/edit/{id}',[App\Http\Controllers\adm\ContactosController::class, 'edit'])->name('editarcontacto');
      Route::put('/adm/contacto/update/{id}', [App\Http\Controllers\adm\ContactosController::class, 'update'])->name('updatecontacto');
 
      //Logos
      Route::get('adm/logos', [App\Http\Controllers\adm\LogosController::class, 'index'])->name('logos');
      Route::get('/adm/logos/edit/{id}',[App\Http\Controllers\adm\LogosController::class, 'edit'])->name('editarlogos');
      Route::put('/adm/logos/update/{id}', [App\Http\Controllers\adm\LogosController::class, 'update'])->name('updatelogos');
 
   //Redes
      Route::get('adm/redes', [App\Http\Controllers\adm\RedesController::class, 'index'])->name('redes');
      Route::get('/adm/redes/edit/{id}',[App\Http\Controllers\adm\RedesController::class, 'edit'])->name('editarredes');
      Route::put('/adm/redes/update/{id}', [App\Http\Controllers\adm\RedesController::class, 'update'])->name('updateredes');



    //Categorias
    Route::get('/adm/categorias/', [App\Http\Controllers\adm\CategoriasController::class, 'index'])->name('categorias');
    Route::get('/adm/categorias/create/', [App\Http\Controllers\adm\CategoriasController::class, 'create'])->name('nuevocategorias');
    Route::post('/adm/categorias/create/',[App\Http\Controllers\adm\CategoriasController::class, 'store'])->name('crearcategorias');
    Route::get('/adm/categorias/edit/{id}',[App\Http\Controllers\adm\CategoriasController::class, 'edit'])->name('editarcategorias');
    Route::put('/adm/categorias/update/{id}', [App\Http\Controllers\adm\CategoriasController::class, 'update'])->name('updatecategorias');
    Route::get('/adm/categorias/eliminar/{id}', [App\Http\Controllers\adm\CategoriasController::class, 'destroy'])->name('eliminarcategorias');

    //Categorias
    Route::get('/adm/subcategorias/', [App\Http\Controllers\adm\SubcategoriaController::class, 'index'])->name('subcategorias');
    Route::get('/adm/subcategorias/create/', [App\Http\Controllers\adm\SubcategoriaController::class, 'create'])->name('nuevosubcategorias');
    Route::post('/adm/subcategorias/create/',[App\Http\Controllers\adm\SubcategoriaController::class, 'store'])->name('crearsubcategorias');
    Route::get('/adm/subcategorias/edit/{id}',[App\Http\Controllers\adm\SubcategoriaController::class, 'edit'])->name('editarsubcategorias');
    Route::put('/adm/subcategorias/update/{id}', [App\Http\Controllers\adm\SubcategoriaController::class, 'update'])->name('updatesubcategorias');
    Route::get('/adm/subcategorias/eliminar/{id}', [App\Http\Controllers\adm\SubcategoriaController::class, 'destroy'])->name('eliminarsubcategorias');

    

   //Categorias
   Route::get('/adm/lineas/', [App\Http\Controllers\adm\LineaController::class, 'index'])->name('lineas');
   Route::get('/adm/lineas/create/', [App\Http\Controllers\adm\LineaController::class, 'create'])->name('nuevalineas');
   Route::post('/adm/lineas/create/',[App\Http\Controllers\adm\LineaController::class, 'store'])->name('crearlineas');
   Route::get('/adm/lineas/edit/{id}',[App\Http\Controllers\adm\LineaController::class, 'edit'])->name('editarlineas');
   Route::put('/adm/lineas/update/{id}', [App\Http\Controllers\adm\LineaController::class, 'update'])->name('updatelineas');
   Route::get('/adm/lineas/eliminar/{id}', [App\Http\Controllers\adm\LineaController::class, 'destroy'])->name('eliminarlineas');

    //galeria
    Route::get('/adm/calidad/', [App\Http\Controllers\adm\CalidadController::class, 'index'])->name('calidad');
    Route::get('/adm/calidad/create/', [App\Http\Controllers\adm\CalidadController::class, 'create'])->name('nuevacalidad');
    Route::post('/adm/calidad/create/',[App\Http\Controllers\adm\CalidadController::class, 'store'])->name('crearcalidad');
    Route::get('/adm/calidad/edit/{id}',[App\Http\Controllers\adm\CalidadController::class, 'edit'])->name('editarcalidad');
    Route::put('/adm/calidad/update/{id}', [App\Http\Controllers\adm\CalidadController::class, 'update'])->name('updatecalidad');
    Route::get('/adm/calidad/eliminar/{id}', [App\Http\Controllers\adm\CalidadController::class, 'destroy'])->name('eliminarcalidad');

    //trabajos
      Route::get('/adm/trabajos/', [App\Http\Controllers\adm\trabajosController::class, 'index'])->name('trabajos');
      Route::get('/adm/trabajos/create/', [App\Http\Controllers\adm\trabajosController::class, 'create'])->name('nuevotrabajos');
      Route::post('/adm/trabajos/create/',[App\Http\Controllers\adm\trabajosController::class, 'store'])->name('creartrabajos');
      Route::get('/adm/trabajos/edit/{id}',[App\Http\Controllers\adm\trabajosController::class, 'edit'])->name('editartrabajos');
      Route::put('/adm/trabajos/update/{id}', [App\Http\Controllers\adm\trabajosController::class, 'update'])->name('updatetrabajos');
      Route::get('/adm/trabajos/eliminar/{id}', [App\Http\Controllers\adm\trabajosController::class, 'destroy'])->name('eliminartrabajos');
   
  

     //productos
     Route::get('/adm/productos/', [App\Http\Controllers\adm\ProductosController::class, 'index'])->name('productos');
     Route::get('/adm/productos/create/', [App\Http\Controllers\adm\ProductosController::class, 'create'])->name('nuevoproductos');
     Route::post('/adm/productos/create/',[App\Http\Controllers\adm\ProductosController::class, 'store'])->name('crearproductos');
     Route::get('/adm/productos/edit/{id}',[App\Http\Controllers\adm\ProductosController::class, 'edit'])->name('editarproductos');
     Route::put('/adm/productos/update/{id}', [App\Http\Controllers\adm\ProductosController::class, 'update'])->name('updateproductos');
     Route::get('/adm/productos/eliminar/{id}', [App\Http\Controllers\adm\ProductosController::class, 'destroy'])->name('eliminarproductos');
     Route::get('borrarproducto/{id}/{img}', [App\Http\Controllers\adm\ProductosController::class, 'borrarprod'])->name('borrarproducto');
    

     //user
     Route::get('/adm/clienteslogin/', [App\Http\Controllers\adm\UserController::class, 'indexzp'])->name('clienteslogin');
     Route::get('/adm/clienteslogin/create/', [App\Http\Controllers\adm\UserController::class, 'createzp'])->name('nuevoclienteslogin');
     Route::post('/adm/clienteslogin/create/',[App\Http\Controllers\adm\UserController::class, 'storezp'])->name('crearclienteslogin');
     Route::get('/adm/clienteslogin/edit/{id}',[App\Http\Controllers\adm\UserController::class, 'editzp'])->name('editarclienteslogin');
     Route::put('/adm/clienteslogin/update/{id}', [App\Http\Controllers\adm\UserController::class, 'updatezp'])->name('updateclienteslogin');
     Route::get('/adm/clienteslogin/eliminar/{id}', [App\Http\Controllers\adm\UserController::class, 'destroyzp'])->name('eliminarclienteslogin');

     //clientes
    Route::get('/adm/clientes/', [App\Http\Controllers\adm\clientesController::class, 'index'])->name('clientes');
    Route::get('/adm/clientes/create/', [App\Http\Controllers\adm\clientesController::class, 'create'])->name('nuevoclientes');
    Route::post('/adm/clientes/create/',[App\Http\Controllers\adm\clientesController::class, 'store'])->name('crearclientes');
    Route::get('/adm/clientes/edit/{id}',[App\Http\Controllers\adm\clientesController::class, 'edit'])->name('editarclientes');
    Route::put('/adm/clientes/update/{id}', [App\Http\Controllers\adm\clientesController::class, 'update'])->name('updateclientes');
    Route::get('/adm/clientes/eliminar/{id}', [App\Http\Controllers\adm\clientesController::class, 'destroy'])->name('eliminarclientes');
    Route::get('/eliminarimagen/{id}/{img}', [App\Http\Controllers\adm\clientesController::class, 'borrarimagen'])->name('borrarimagen');

        
       
    //clientes
    Route::get('/adm/zonaprivada/', [App\Http\Controllers\adm\ZonaprivadaController::class, 'index'])->name('zonaprivada');
    Route::get('/adm/zonaprivada/create/', [App\Http\Controllers\adm\ZonaprivadaController::class, 'create'])->name('nuevazonaprivada');
    Route::post('/adm/zonaprivada/create/',[App\Http\Controllers\adm\ZonaprivadaController::class, 'store'])->name('crearzonaprivada');
    Route::get('/adm/zonaprivada/edit/{id}',[App\Http\Controllers\adm\ZonaprivadaController::class, 'edit'])->name('editarzonaprivada');
    Route::put('/adm/zonaprivada/update/{id}', [App\Http\Controllers\adm\ZonaprivadaController::class, 'update'])->name('updatezonaprivada');
    Route::get('/adm/zonaprivada/eliminar/{id}', [App\Http\Controllers\adm\ZonaprivadaController::class, 'destroy'])->name('eliminarzonaprivada');


     //Novedades
     Route::get('adm/novedades/editarNovedades','adm\NovedadesController@editarNovedades')->name('novedades.editarContenido');
     Route::post('adm/novedades/agregarCategoriaNovedad','adm\NovedadesController@agregarCategoriaNovedad');
     Route::get('adm/novedades/editarCategoriaNovedad/{id}','adm\NovedadesController@editarCategoriaNovedad');
     Route::put('adm/novedades/actualizarCategoriaNovedad/{id}','adm\NovedadesController@actualizarCategoriaNovedad');
     Route::delete('adm/novedades/eliminarCategoriaNovedad/{id}','adm\NovedadesController@eliminarCategoriaNovedad');
     Route::post('adm/novedades/agregarNovedad','adm\NovedadesController@agregarNovedad');
     Route::get('adm/novedades/editarNovedad/{id}','adm\NovedadesController@editarNovedad');
     Route::put('adm/novedades/actualizarNovedad/{id}','adm\NovedadesController@actualizarNovedad');
     Route::delete('adm/novedades/eliminarNovedad/{id}','adm\NovedadesController@eliminarNovedad');
 

    
    	//Subcriptores
	  Route::get('Subcriptores', [App\Http\Controllers\adm\SubcriptoresController::class, 'verSubcriptores'])->name('Subcriptores.view');
	  Route::get('home/subscriptores/crearMail',[App\Http\Controllers\adm\SubcriptoresController::class, 'create'])->name('subcriptores.create');
	  Route::post('home/subscriptores/enviarMail',[App\Http\Controllers\adm\SubcriptoresController::class, 'store'])->name('subcriptores.store');
    Route::get('Subcriptores/edit/{id}', [App\Http\Controllers\adm\SubcriptoresController::class, 'edit'])->name('subscriptores.editar');
	  Route::put('Subcriptores/update/{id}', [App\Http\Controllers\adm\SubcriptoresController::class, 'update'])->name('updateSubcriptores');

      
    //user
    Route::get('/adm/usuarios/', [App\Http\Controllers\adm\UserController::class, 'index'])->name('usuarios');
    Route::get('/adm/usuarios/create/', [App\Http\Controllers\adm\UserController::class, 'create'])->name('nuevousuarios');
    Route::post('/adm/usuarios/create/',[App\Http\Controllers\adm\UserController::class, 'store'])->name('crearusuarios');
    Route::get('/adm/usuarios/edit/{id}',[App\Http\Controllers\adm\UserController::class, 'edit'])->name('editarusuarios');
    Route::put('/adm/usuarios/update/{id}', [App\Http\Controllers\adm\UserController::class, 'update'])->name('updateusuarios');
    Route::get('/adm/usuarios/eliminar/{id}', [App\Http\Controllers\adm\UserController::class, 'destroy'])->name('eliminarusuarios');
     
     
       
         //METADATOS
         Route::get('/adm/metadatos/', [App\Http\Controllers\adm\MetadatoController::class, 'index'])->name('metadatos');
         Route::get('/adm/metadatos/edit/{id}',[App\Http\Controllers\adm\MetadatoController::class, 'edit'])->name('editarmetadatos');
         Route::put('/adm/metadatos/update/{id}', [App\Http\Controllers\adm\MetadatoController::class, 'update'])->name('updatemetadatos');



        });

Route::middleware(['auth.cliente'])->group(function(){ 
  Route::get('/descarga',  [App\Http\Controllers\PageController::class, 'descargapriv'])->name('area_privada');
});

Route::post('loginCliente', [App\Http\Controllers\LoginClienteController::class, 'login'])->name('login.clientes');
Route::post('registro_cliente_post', [App\Http\Controllers\LoginClienteController::class,'registro_cliente_post'])->name('registro_cliente_post');
Route::get('registro_cliente', [App\Http\Controllers\LoginClienteController::class, 'registro_cliente'])->name('registro_cliente');
Route::get('salir','LoginClienteController@salir')->name('salir');

  Route::get('/',  [App\Http\Controllers\PageController::class, 'index'])->name('page.inicio');
  Route::get('/empresa',  [App\Http\Controllers\PageController::class, 'empresa'])->name('page.empresa');      
  Route::get('/categorias',  [App\Http\Controllers\PageController::class, 'categorias'])->name('page.categorias');
  Route::get('/subcategorias/{id}',  [App\Http\Controllers\PageController::class, 'subcategorias'])->name('page.subcategorias');
  Route::get('/productos/{id}',  [App\Http\Controllers\PageController::class, 'productos'])->name('page.productos');
  Route::post('/buscador',  [App\Http\Controllers\PageController::class, 'buscador'])->name('page.buscador');
  Route::get('/producto/{id}', [App\Http\Controllers\PageController::class, 'producto'])->name('page.producto');
  Route::get('/calidad',  [App\Http\Controllers\PageController::class, 'calidad'])->name('page.calidad');
  Route::get('/clientes',  [App\Http\Controllers\PageController::class, 'clientes'])->name('page.clientes');

  Route::get('novedades', [App\Http\Controllers\PageController::class, 'vistaNovedades'])->name('page.novedades');
Route::get('novedad/{id}',[App\Http\Controllers\PageController::class, 'vistaNovedad'])->name('page.novedad');
Route::get('novedades/{category_id}',[App\Http\Controllers\PageController::class, 'vistaPorCategoria'])->name('page.categoria.novedad');
  Route::get('presupuesto', [App\Http\Controllers\PresupuestoController::class, 'vistaPresupuesto'])->name('page.presupuesto');
  Route::post('presupuesto', [App\Http\Controllers\PresupuestoController::class, 'presupuesto']);
  Route::get('/contacto',  [App\Http\Controllers\PageController::class, 'contactos'])->name('page.contacto');
  Route::post('/contact', function (Request $request) {

    $cfmail = "gigliottilucas4@gmail.com";

    \Mail::send('emails.contact_email',
         array(
             'nombre' => $request->get('nombre'),
             'apellido' => $request->get('apellido'),
             'telefono' => $request->get('telefono'),
             'email' => $request->get('email'),                 
             'mensaje' => $request->get('mensaje'),
         ), function($message) use ($request, $cfmail)
           {
              $message->from("soporte@osole.es");
              $message->to($cfmail);
            });


      return back()->with('success', 'Gracias por comunicarte, te responderemos muy pronto!');

 })->name('enviarmail');
