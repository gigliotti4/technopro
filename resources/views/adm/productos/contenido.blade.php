@extends('adm.layouts')

@section('content')
<a href="{{route('nuevoproductos')}}" class="btn btn-success mb-5" >Nuevo Producto</a>
@if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif
@if(session()->has('danger'))
    <div class="alert alert-danger">
        {{ session()->get('danger') }}
    </div>
@endif
<table class="table">
  <thead>
    <tr>
    <th scope="col">Orden</th>
    
    <th scope="col">codigo</th>
    <th scope="col">Accion</th>
    </tr>
  </thead>
  <tbody>
  	 @foreach($productos as $c)
    <tr>
      <th scope="row">{{$c->orden}}</th>
      
    <th scope="row">{{$c->codigo}}</th>
    <td> 
      <a class="btn btn-warning" href="{{route('editarproductos', $c->id)}}" role="button">editar</a>
           <a class="btn btn-danger" href="{{route('eliminarproductos', $c->id)}}" role="button">borrar</a>
    </td>
    </tr>
	 @endforeach

  </tbody>
</table>


@endsection