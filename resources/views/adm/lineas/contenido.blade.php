@extends('adm.layouts')

@section('content')
<a href="{{route('nuevalineas')}}" class="btn btn-success mb-5" >Nueva linea</a>
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
      <th scope="col">año</th>
      <th scope="col">Accion</th>
    </tr>
  </thead>
  <tbody>
    @foreach($lineas as $f)
    <tr>
      <th scope="row">{{$f->orden}}
      </th>
	  <th scope="row">{{$f->ano}}</th>
    <td>
      <a class="btn btn-warning" href="{{route('editarlineas', $f->id)}}" role="button">editar</a>
          <a class="btn btn-danger" href="{{route('eliminarlineas', $f->id)}}" role="button">borrar</a>
    </td>
    </tr>
	 @endforeach
   
  </tbody>
</table>




@endsection