@extends('adm.layouts')

@section('content')

<form method="post" action="{{route('crearsubcategorias')}}" enctype="multipart/form-data">
	@csrf
  <div class="form-group col-md-6">
    <label for="orden">Orden</label>
    <input type="text" class="form-control" id="orden" name="orden" >
    
  </div>
  <div class="form-group col-md-6">
    <label for="nombre">Nombre</label>
    <input type="text" class="form-control" id="nombre" required name="nombre">
  </div>

  <div class="form-group col-md-6">
    <label for="imagen">Imagen</label>
    <input type="file" class="form-control-file" required id="imagen" name="imagen" >
  </div>

   <div class="form-group col-md-6">
      <label for="categoria_id">Seleccione Categoria</label>
        <select name="categoria_id" id="categoria_id" class="form-control" >
          @foreach($categorias as $c)
            <option value="{{$c->id}}">{{$c->nombre}}</option>
          @endforeach
        </select>
    </div>

  

  
  <button type="submit" class="btn btn-success">Agregar</button>
</form>




@endsection