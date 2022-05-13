@extends('layouts.plantilla')
    <style>
        .categoria{
            text-decoration: none;
        }

        .enlace_novedad{
            text-decoration: none;
        }
        .enlace_novedad:hover{
            text-decoration: none;
        }
        .numero_novedades{
            border-radius: 50%;
            padding: 5px 12px;
            background-color: #354B9C;
            color:white;
        }

        .link_categoria{
            font-family: 'Roboto' Medium !important;
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

    <!--Ultimas Novedades-->
    <div class="" style="background-color: #f2f2f2;">

        <div class="container py-5">
            <div class="row">
                @foreach ($ultimas_novedades as $novedad)
                <div class="col-md-4">
                    <a class="enlace_novedad" href="{{route('page.novedad',$novedad->id)}}">
                        <div class="card mb-3 border-0">
                            <img src="{{asset('images/novedades/'.$novedad->imagen)}}" class="card-img-top" alt="..." >
                            <div class="card-body text-center border" style="height: auto;">
                                <p class="m-0 text-uppercase" style="font-size:13px;color: #269FF7;font-family:Roboto, Regular">{{$novedad->categoria->titulo}}</p>
                                {{-- <div style="color: #122B3B;font-family:'Roboto';font-size:16px">Categoria: {{$novedad->categoria->titulo}}</div> --}}
                                <div style="color: #333333;font-size:17px;font-family:Roboto, Regular">{{$novedad->titulo}}</div>
                                {{-- <div style="color: #505050;font-size:15px; text-overflow: ellipsis;">{!!$novedad->texto!!}</div> --}}
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!--Noticias-->
    <div style="">

        <div class="container">
           
            <div class="row">
                <div class="col-md-9 p-3">
                    <div class="row">
                        @foreach ($novedades as $novedad)
                        <div class="col-md-4 mt-3">
                            <a class="enlace_novedad" href="{{route('page.novedad',$novedad->id)}}">
                            <div class="card mb-3 border-0" style="overflow: hidden;">
                                <img src="{{asset('images/novedades/'.$novedad->imagen)}}" class="card-img-top" alt="...">
                                <div class="card-body border text-center" style="height: auto;">
                                    <p class="m-0 text-uppercase" style="font-size:13px;color: #269FF7;font-family:Roboto, Regular">{{$novedad->categoria->titulo}}</p>
                                     {{-- <div style="color: #122B3B;font-family:'Roboto';font-size:16px">Categoria: {{$novedad->categoria->titulo}}</div>  --}}
                                     <div style="color: #333333;font-size:17px;font-family:Roboto, Regular">{{$novedad->titulo}}</div>
                                        <strong style="color: #0F49AA">Leer más</strong>
                                    {{-- <div style="color: #505050;font-family:'Roboto';font-size:14px">{!!$novedad->epigrafe!!}</div> --}}
                                </div>
                            </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                    
                </div>
                <div class="col-md-3 p-3">
                    <span style="
                 color: #354B9C;
                 text-transform: uppercase;
                 font-size: 23px;
                 font-family:Roboto, Regular
                 "> Categorías</span>
                   
                    @foreach ($categorias as $categoria)
                        <div class="d-flex justify-content-between ">
                        <div class="mt-3">
                            <a class="font-weight-bold categoria" style="color:#333333;  font-family:Roboto, Regular" href="{{route('page.categoria.novedad',$categoria->id)}}">{{$categoria->titulo}}</a>
                        </div>
                        <i class="fas fa-long-arrow-alt-right mt-3" style="color: #269FF7"></i>
                          {{-- <div class="numero_novedades mt-2">{{count($categoria->novedades)}}</div> --}}
                    </div>
                    
                    @endforeach
    
                </div>
            </div>
        </div>
    </div>
@endsection