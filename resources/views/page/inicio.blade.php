@extends('layouts.plantilla')


@section('content')


<div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel" >
    <ol class="carousel-indicators">
        @for ($i = 0; $i < count($sliders); $i++)

        <button type="button" data-bs-target="#carouselExampleInterval" data-bs-slide-to="{{$i}}" style="width: 40px!important;height:5px!important; " class="{{($i == 0) ? 'active': ''}}" aria-current="true" aria-label="Slide 1"></button>

    @endfor

      </ol>
    <div class="carousel-inner">
        @foreach ($sliders as $slider)
            @if($loop->first)
                <div class="carousel-item active" data-bs-interval="3000">
                    <div class="row" style=" 
                        background-image:url('{{asset(Storage::url($slider->imagen))}}');
                        background-size:cover;
                    background-repeat:no-repeat;
                    height:630px;
                    background-position:center;
                        ">
                        <div class="col-md-12 ms-auto d-none d-md-block" style="">
                            <div class="text-center">   

                                <div class="texto" style="font-family: Roboto, Regular">{!!$slider->titulo!!}</div>
                                <div class="textochico" style="font-family: Roboto, Regular">{!!$slider->descripcion!!}</div>
                            </div>
                        </div>
                    </div>
                </div>
            @else 
                <div class="carousel-item "  data-bs-interval="3000">
                    <div class="row" style=" 
                        background-image:url('{{asset(Storage::url($slider->imagen))}}');
                        background-size:cover;
                    background-repeat:no-repeat;
                    height:630px;
                    background-position:center;
                        ">
                        <div class="col-md-12 ms-auto d-none d-md-block" style="">
                            <div class="text-center">   

                                <div class="texto" style="font-family: Roboto, Regular">{!!$slider->titulo!!}</div>
                                <div class="textochico" style="font-family: Roboto, Regular">{!!$slider->descripcion!!}</div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach 
    </div>
</div>


<div class="container my-4">
    
    <div class="col-md-12">
        <div class="text-center fw-bold" style="color: #333333; font-size:34px;font-family:Roboto, Regular">
            Productos
        </div>
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
                        

                        <div class="imgoverlay" style=" height: 482px!important;padding: 225px;">  
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




        <div class="container"> 
            <div class="row" style="margin:72px 0;">

                <div class="col-md-6">
    
                    <div class="" style="background-image: url({{asset(Storage::url($inicio->imagen))}});
                        height:600px !important;
                        width:100% !important;
                        background-repeat:no-repeat;
                        background-position:center;
                        background-size:contain;
                        ">                       
                    </div>
                </div>
                <div class="col-md-6 p-4 pt-0">
                    <div class="row d-flex justify-content-center align-items-center">
                        <span style="color:black; font-size:24px;font-family:Roboto, Regular">TECHNOPRO</span>
                        <div class="my-4" style="color:black; font-size:18px;font-family:Roboto, Regular">
                            {!!$inicio->descripcion!!}
                        </div>
                    </div>
                    <div class="d-flex justify-content-start">
        
                        <a href="{{route('page.empresa')}}" class="mt-5">
                            <button type="button" class="btn btn-consulta px-5" onclick="window.location='{{route('page.empresa')}}'" style="font-size:14px;">
                                Mas Informacion    
                            </button>
                
                        </a>
                    </div> 
    
                </div>
            </div>
    
        </div>










@endsection