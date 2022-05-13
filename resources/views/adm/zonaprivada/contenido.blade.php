@extends('adm.layouts')

@section('content')
<a href="{{route('nuevazonaprivada')}}" class="btn btn-success mb-5" >Nueva Descarga</a>
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
       @foreach($zonaprivada as $zona)
      <tr>
        <th scope="row" class="text-uppercase">{{$zona->orden}}</th>
        <td scope="row" class="" >{{$zona->nombre}}</td>
         {{-- <td scope="row"><img src="{{asset(Storage::url($a->imagen))}}" class="img-thumbnail w-25" ></td> --}}
        <td>
           <a class="btn btn-warning" href="{{route('editarzonaprivada', $zona->id)}}" role="button">editar</a>
           <a class="btn btn-danger" href="{{route('eliminarzonaprivada', $zona->id)}}" role="button">borrar</a>  

        </td>
      </tr>
    
  @endforeach 
    </tr>
   
  </tbody>
</table>











@endsection