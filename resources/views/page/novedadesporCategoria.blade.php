@extends('layouts.plantilla')
    <style>
        .link_categoria{

        }
        .categoria{
           
       color: #333333;
       text-decoration: none;
       font-size: 16px;
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
    </style>
@section('content')

<div class="fondodelcoso">
    <div class="container">
        <div class="col-md-12">
            
                <span class="" style="font-size: 16px; color:black;">Inicio | Novedades</span>
            
        </div>
    </div>
</div>
      <!--Noticias-->
      <div class="container">
        
         <div class="row">
             <div class="col-md-8">
                 <div class="row">
                     @foreach ($novedades as $novedad)
                     <div class="col-md-6 mt-5">
                         <a class="enlace_novedad" href="{{route('page.novedad',$novedad->id)}}">
                         <div class="card mb-3 border-0" style="overflow: hidden;">
                             <img src="{{asset('images/novedades/'.$novedad->imagen)}}" class="card-img-top" alt="..." >
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
             <div class="col-md-4 mt-4">
                 <span style="
                 color: #354B9C;
                 text-transform: uppercase;
                 font-size: 22px;">  Categorias</span>
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