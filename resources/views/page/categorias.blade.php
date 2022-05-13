@extends('layouts.plantilla')


@section('content')

<div class="fondodelcoso">
    <div class="container">
        <div class="col-md-12">
            
            <span class="mb-2" style="color:#505050;">Inicio | Categorias </span>
            
        </div>
    </div>
</div>




<div class="container my-4">
    
    <div class="col-md-12">

        <div class="row my-2">
            @foreach($categorias as $categ)
            
            <div class="col-md-6">
                <a href="{{route('page.productos', $categ->id)}}" class="producto " >
                    <div class="border border-bottom-0 mt-2 prodwrap" style="background-image: url({{asset(Storage::url($categ->imagen))}});
                        height:482px !important;
                        width:100% !important;
                        background-repeat:no-repeat;
                        background-position:center;
                        background-size:contain;
                        ">
                        

                        <div class="imgoverlay" style="height: 482px!important;padding: 225px;">  
                            <i class="fas fa-plus fa-2x"></i>
                        </div>
                    </div>
                    <div class="text-center py-2 pl-3 border border-top-0" style="height:59px;width: 100%;">     
                            <span style="font-size: 20px; color:#373435; font-family:Roboto, Regular">{!!$categ->nombre!!}</span>
                           
                    </div>
                   
            </a> 
        </div>
        
            @endforeach
            </div>
           
        </div>

    </div>

    @endsection
 