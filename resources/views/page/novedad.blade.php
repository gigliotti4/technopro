@extends('layouts.plantilla')
    <style>
        .categoria{
        font-family: 'Roboto';
        text-decoration: none;
        font-size: 16px;
        }
        .numero_novedades{
            border-radius: 50%;
            padding: 5px 12px;
            background-color: #354B9C;
            color:white;
        }
    </style>
@section('content')
    <!--Barra Azul-->
  <div class="fondodelcoso">
    <div class="container">
        <div class="col-md-12">
            
            <span class="mb-2" style="color:#505050;">Inicio | Novedades </span>
            
        </div>
    </div>
</div>

    <div class="container my-4">
        <div class="row">
            <div class="col-md-8">
                <div class="card mb-3 border-0" style="overflow: hidden;">
                    <img src="{{asset('images/novedades/'.$novedad->imagen)}}" class="card-img-top img-fluid" alt="..." height="295px">
                    <div class="card-body  text-left" style=";">
                        <p class="m-0 text-uppercase" style="font-size:13px;color: #269FF7;font-family:Roboto, Regular">{{$novedad->categoria->titulo}}</p>
                        
                         <div class="" style="color: #333333;font-size:30px;font-family:Roboto, Regular">{{$novedad->titulo}}</div>
                         <div class="my-2" style="color: #333333;font-size:17px;font-family:Roboto, Regular">{!!$novedad->epigrafe!!}</div>
                         <strong style="color: #333333;font-size:18px;font-family:Roboto, Regular">Caracteristicas</strong>
                         <div style="color: #333333;font-size:18px;font-family:Roboto, Regular">{!!$novedad->texto!!}</div>
                        
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <span style="
                color: #0F49AA;
                text-transform: uppercase;
                font-size: 23px; font-family:Roboto, Regular"> Categorias</span>
                @foreach ($categorias as $categoria)
                <div class="d-flex justify-content-between my-2">
                    <div class="">
                        <a class="font-weight-bold categoria mt-3" style="color:#505050;" href="{{route('page.categoria.novedad',$categoria->id)}}">{{$categoria->titulo}}</a>
                        </div>
                        <i class="fas fa-long-arrow-alt-right mt-3" style="color: #269FF7"></i>
                    </div>
                   
                @endforeach

            </div>
        </div>
    </div>
@endsection