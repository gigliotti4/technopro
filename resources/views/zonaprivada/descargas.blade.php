
@extends('layouts.plantilla')


@section('content')

<div class="fondodelcoso">
    <div class="container">
        <div class="col-md-12">
            
            <span class="mb-2" style="font-family:Montserrat, Light; color:#505050;">Inicio | Zona privada </span>
            
        </div>
    </div>
</div>

<div class="container my-5 py-5" style="height: 46vh;">
    
    <div class="col-md-12">

        <div class="row my-2">
            
            @isset(Auth::guard('cliente')->user()->obtenerRelacionados)
 
            <div class="col-md-12">
                <table class="table ">
                    <thead class="border-bottom-0"> 
                      <tr>
                        <th scope="col" style="color: #333333 font-size:16px; font-family: Roboto, Regular ">Nombre</th>
                        <th scope="col" style="color: #333333 font-size:16px; font-family: Roboto, Regular">Formato</th>
                        <th scope="col" style="color: #333333 font-size:16px; font-family: Roboto, Regular">Peso</th>
                        <th scope="col" style="color: #333333 font-size:16px; font-family: Roboto, Regular">Descargar</th>
                      </tr>
                    </thead>
                    <tbody>

                        @foreach(Auth::guard('cliente')->user()->obtenerRelacionados as $d)
                      <tr class=""> 
                      
                        <td>{{$d->descarga->nombre}}</td>
                        <td>PDF</td>
                        <td>350KB</td>
                        <td> <a href="{{asset(Storage::url($d->descarga->pdf))}}" download="" class="">
                            <button type="button" class="btn btn-privada px-4" style="font-size:14px;">
                               Descargar   
                               <i class="fas fa-arrow-down ms-2"></i>
                            </button>
                
                        </a></td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
            </div>
        
            
            @endisset
            </div>
           
        </div>

    </div>
@endsection