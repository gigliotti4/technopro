@extends('adm.layouts')

@section('content')
<a href="{{route('nuevotrabajos')}}" class="btn btn-success mb-5" >Nuevo Trabajo</a>
@if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif

<table class="table">
  <thead>
    <tr>
      <th scope="col">Orden</th>
      <th scope="col">Nombre</th>
      {{-- <th scope="col">Imagen</th> --}}
      <th scope="col">Accion</th>
    </tr>
  </thead>
  <tbody>
    <tr>
       @foreach($trabajos as $i)
      <tr>
        <th scope="row" class="text-uppercase">{{$i->orden}}</th>
        <td scope="row" class="" >{{$i->nombre}}</td>
         {{-- <td scope="row"><img src="{{asset(Storage::url($a->imagen))}}" class="img-thumbnail w-25" ></td> --}}
        <td>
           <a class="btn btn-warning" href="{{route('editartrabajos', $i->id)}}" role="button">editar</a>
           <a class="btn btn-danger" href="{{route('eliminartrabajos', $i->id)}}" role="button">borrar</a>  

        </td>
      </tr>
    
  @endforeach 
    </tr>
   
  </tbody>
</table>











@endsection