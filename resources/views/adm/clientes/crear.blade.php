@extends('adm.layouts')

@section('content')
<h3>Nuevo Cliente</h3>
<form method="post" action="{{route('crearclientes')}}" enctype="multipart/form-data">
	@csrf
  <div class="form-group col-md-6">
    <label for="orden">orden</label>
    <input type="text" class="form-control" id="orden" name="orden" >
    
  </div>

  <div class="form-group col-md-6">
    <label for="imagen">Marca</label>
    <input type="file" class="form-control-file" required id="imagen" name="imagen" >
  </div>

 <button type="submit" class="btn btn-success">Agregar</button>
</form>

@endsection