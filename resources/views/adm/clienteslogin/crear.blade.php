@extends('adm.layouts')
@section('content')
<h3>Nuevo Cliente</h3>
<form method="post" action="{{route('crearclienteslogin')}}" enctype="multipart/form-data">
	@csrf

  <div class="form-group col-md-6">
    <label for="username">Usuario</label>
    <input type="text" class="form-control" id="username" name="username">
  </div>
  <div class="form-group col-md-6">
    <label for="password">Contraseña</label>
    <input type="password" class="form-control" id="password" name="password">
  </div>

  <div class="form-group col-md-6">
    <label for="email">Correo</label>
    <input type="email" class="form-control" required id="email" name="email">
  </div>
  
    <div class="form-group">            
    <label>Seleccione listas de precios relacionadas</label><br>
    <select class="form-select" multiple  aria-label="select example" name="relacionado[]">
        <option selected value=0>Seleccione una o mas listas de precios</option>

            @isset($descargas)

                @forelse ($descargas as $descarga)
                
                    @isset($descarga->id)                        

                            <option value="{{$descarga->id}}">{{$descarga->nombre}}</option>  

                    @endisset              

                @empty

                @endforelse

            @endisset

    </select>
  </div>

  <div class="form-group mb-3 col-md-6">
    <label for="estado">Estado</label>
    <select class=" form-control" id="estado" name="estado" aria-label="Example select with button addon">
      <option selected></option>
      <option value="0">inactivo</option>
      <option value="1">Activo</option>
      
    </select>
  </div>
 <button type="submit" class="btn btn-success">Agregar</button>
</form>



      
@endsection