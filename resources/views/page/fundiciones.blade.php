@extends('layouts.plantilla')



<style>
     .fondodelcoso{
        background-color: #F58634 !important;
        line-height: 40px;
    }

</style>
@section('content')
<div class="fondodelcoso">
    <div class="container">
        <div class="col-md-12">
            <div class="">
                <span class="mt-1" style="font-size: 16px; color:white;">Inicio | Fundicion</span>
            </div>
        </div>
    </div>
</div>


<div class="container-fluid">

    <div class="d-none d-md-block">
        <div class="row p-0 ">
            {{-- @foreach($aplicaciones as $a)
            <img src="{{asset(Storage::url($a->imagen))}}" class="image w-100" alt="..." style="max-height: 300px;">
            @endforeach --}}
            @foreach ($fundiciones as $s)
                @if($loop->iteration % 2 == 0)
                 
    
                    <div class="col-md-6 p-0">
                       <img src="{{asset(Storage::url($s->imagen))}}" class="image w-100" alt="..." style="max-height: 300px;">
                    </div>
    
                    <div class="col-md-6 p-5 text-white" style="background-color:#373435; ">
                        <p class="" style="font-size: 24px; color:#F58634;">{{$s->nombre}}</p> 
                       <div class="text-white" style=" font-size:16px;">{!!$s->descripcion!!}</div> 
                    </div>
                @else
                <div class="col-md-6  p-5" style=" ">
                <p  style="font-size: 24px;  color:#F58634;" class=" ">{{$s->nombre}}</p> 
                <div class="" style="color:#000000!important;  font-size:16px;">{!!$s->descripcion!!}</div> 
                </div>
                    <div class="col-md-6 p-0">
                        <img src="{{asset(Storage::url($s->imagen))}}" class="image w-100" alt="..." style="max-height: 300px;">
                    </div>
    
             @endif
            @endforeach
        </div>
    </div>
</div>       
    
    <div class=" col-md-12 d-block d-md-none">
        <div class="row p-0">
            @foreach ($fundiciones as $s)
                @if($loop->iteration % 2 == 0)
                  
    
                
                <div class="col-md-6  p-4 text-white" style="background-color:#124D6B; ">
                    <p class="text-white" style="font-size: 24px; font-family: Open Sans, Regular;">{{$s->nombre}}</p> 
                    <div class="text-white" style="font-family: Open Sans, Regular; font-size:14px;">{!!$s->descripcion!!}</div> 
                </div>
                <div class="col-md-6 p-0">
                    <img src="{{asset(Storage::url($s->imagen))}}" class="image w-100" alt="..." style="max-height: 300px;">
                 </div>
             @else
             <div class="col-md-6  p-4" style="background-color:#1FC1D6 ">
             <p  style="font-size: 24px; font-family: Open Sans, Regular;" class=" text-white">{{$s->nombre}}</p> 
             <div class="" style="color:white !important; font-family: Open Sans, Regular; font-size:14px;">{!!$s->descripcion!!}</div> 
             </div>
                 <div class="col-md-6 p-0">
                     <img src="{{asset(Storage::url($s->imagen))}}" class="image w-100" alt="..." style="max-height: 300px;">
                 </div>
             @endif
            @endforeach
        </div>
    </div>







@endsection