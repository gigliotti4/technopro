@extends('adm.layouts')

@section('content')

<form method="post" action="{{route('crearcategorias')}}" enctype="multipart/form-data">
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

  <div class="d-flex flex-column">   
    <span>categoria destacado</span>
    <div class="form-check form-check-inline">
      <label class="form-check-label mr-3" for="inlineCheckbox1">Si</label>
      <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="destacado" >
  </div>
</div>
  
  <button type="submit" class="btn btn-success">Agregar</button>
</form>




@endsection