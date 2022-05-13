@extends('adm.layouts')
@section('content')

<form method="post" action="{{route('updateclienteslogin', $usuarios->id)}}" enctype="multipart/form-data">
	@csrf
  @method('put')
 
  <div class="form-group col-md-6">
    <label for="username">Usuario</label>
    <input type="text" class="form-control" id="username" name="username" value="{!!$usuarios->username!!}">
  </div>
  <div class="form-group col-md-6">
    <label for="email">Correo</label>
    <input type="email" class="form-control" required id="email" name="email" value="{!!$usuarios->email!!}">
  </div>
  <div class="form-group col-md-6">
    <label for="password">Contraseña</label>
    <input type="password" class="form-control" id="password" name="password" value="">
  </div>
  <div class="col ">
    <button class="btn btn-primary " type="button" onclick="mostrarContrasena()">Mostrar Contraseña</button>
  </div>
  <div class="form-group mb-3 col-md-6">
    <label for="estado">Rol</label>
    <select class=" form-control" id="estado" name="estado" aria-label="Example select with button addon">
      @if($usuarios->estado == 0)
      <option value="0" selected>inactivo</option>
      <option value="1" >activo</option>
      @else
      <option value="0" >inactivo</option>
      <option value="1" selected>activo</option>
      @endif
    </select>
  </div>

    <div class="form-group col-12">            
    <label>Seleccione listas de precios relacionadas</label><br>
    <select class="form-select" multiple  aria-label="select example" name="relacionado[]">
        <option value='0' selected >Seleccione una o mas listas de precios</option>

        @if( isset($usuarios->obtenerRelacionados))
        
                    @foreach ($descargasall as $descarga)
                    <?php $selected = '' ?>
                                

                                    @foreach ( $usuarios->obtenerRelacionados as $relacion)

                                        @if($relacion->relacion_id == $descarga->id)

                                            <?php $selected = 'selected' ?>                                                            
                                            @break
                                        @else

                                        @endif

                                    @endforeach

                                    <option {{$selected}} value="{{$descarga->id}}">{{$descarga->nombre}}</option>

                                

                    @endforeach

        @else

            @forelse ($descargasall as $descarga)
                    
                <option value="{{$descarga->id}}">{{$descarga->nombre}}</option>
                        

                @empty

            @endforelse

        @endif
        
    </select>
</div>

 <button type="submit" class="btn btn-success mt-2 d-block mx-auto">Editar</button>
</form>

<script>
    function mostrarContrasena(){
        var tipo = document.getElementById("password");
        if(tipo.type == "password"){
            tipo.type = "text";
        }else{
            tipo.type = "password";
        }
    }
  </script>    
    
@endsection