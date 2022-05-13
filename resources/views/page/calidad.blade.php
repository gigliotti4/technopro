@extends('layouts.plantilla')





@section('content')


<div class="fondodelcoso">
    <div class="container">
        <div class="col-md-12">
            
            <span class="mb-2" style="color:#505050;">Inicio | Calidad </span>
            
        </div>
    </div>
</div>



<div class="container my-3">
    
    @foreach($calidad as $c)
	<div class="row my-3">
		<div class="col-md-6 my-2">
			<img src="{{asset(Storage::url($c->imagen))}}" alt="">
		</div>
		<div class="col-md-6">
			<div class=" p-3" >
                <div class="d-flex  flex-column">
                    <span style="color: #333333;font-size: 34px; font-family:Roboto, Regular">Calidad</span>
                    <div class="my-5" style="font-size: 15px;  color:#253549; ">{!!$c->descripcion!!}</div>
                    <hr>
                    <div class="d-flex justify-content-between" style="color:#222222; font-size:18px; font-family:Roboto, Regular" class="">
                        {{$c->nombre}} <br>
                        
                        <a href="{{asset(Storage::url($c->pdf))}}" >
                            <i class="fas fa-download fa-lg " style="color:#30A1F4"></i>
                        </a>
                    </div>
                    <hr>
                    
                </div>

            </div>
		</div>			
	</div>	
    @endforeach
</div>



@endsection