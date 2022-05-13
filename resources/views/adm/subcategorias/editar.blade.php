@extends('adm.layouts')

@section('content')
<form method="post" action="{{route('updatesubcategorias',$subcategorias->id)}}" enctype="multipart/form-data">
	@csrf
  @method('put')
  <div class="form-group col-md-6">
    <label for="orden">orden</label>
    <input type="text" class="form-control" id="orden" name="orden" value="{{$subcategorias->orden}}">   
  </div>
  <div class="form-group col-md-6">
    <label for="nombre">Nombre</label>
    <input type="text" class="form-control" id="nombre" name="nombre" value="{{$subcategorias->nombre}}">
  </div>
  <div class="form-group">
    <label for="imagen">Imagen</label>
    <input type="file" class="form-control-file" id="imagen" name="imagen" value="" >
    
    <img src="{{asset(Storage::url($subcategorias->imagen))}}" class="img-thumbnail mt-4">
  </div>

   <div class="form-group col-md-6">
      <label for="categoria_id">Seleccione Categoria</label>
        <select name="categoria_id" id="categoria_id" class="form-control" >
          @foreach($categorias as $c)
            <option value="{{$c->id}}"  @if($c->id== $subcategorias->categoria_id) selected @endif>{{$c->nombre}}</option>
          @endforeach
        </select>
    </div>

  
    


 <button type="submit" class="btn btn-success">Editar</button>
</form>



@endsection