@extends('layouts.plantilla')

<style type="text/css">




</style>
@section('content') 
 {{-- <div class="fondofooterheader ">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="circulo mr-2 text-left">
					<p class="text-white mt-2 text-uppercase" style="font-family: 'Roboto', Bold;">CONTACTO</p>
				</div>
                        
			</div>
		</div>
	</div> 
</div> --}}

@foreach ($contactos as $contacto) 
{!!$contacto->iframe!!}
@endforeach
@if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif

<div class="container">
	<div class="row">
		<div class="col-md-4 mt-4">
			   <div class="row">
                	<div class="col-xl-12 col-lg-12 col-md-12">
                        
                    </span>
                        <div class="row">
                            <div class="col-xl-1 col-lg-1 col-md-2 col-sm-1 col-2 my-2">
                                <i class="iconocom fas fa-map-marker-alt fa-lg"></i>
                               
                            </div>
                            <div class="col-xl-11 col-lg-10 col-md-10 col-sm-11 col-10 my-2">
                                @foreach ($contactos as $contacto) 
                                    
                                    <a class="link"  href="{{$contacto->mapa}}" target="_blank">   
                                    <span class="letrafooter">{{$contacto->direccion}}</span></a>
                                    
                                @endforeach
                            </div>
                            <div class="col-xl-1 col-lg-1 col-md-1 col-sm-1 col-2 my-2">
                                <i class="iconocom far fa-envelope fa-lg"></i>
                            </div>
                            <div class="col-xl-11 col-lg-10 col-md-10 col-sm-10 col-10 my-2">
                                @foreach($contactos as $contacto)
                                
                                
                                <a class="link" href="mailto:{{$contacto->correo}}">
                                	<span class="letrafooter">{{$contacto->correo}} </span></a>
                                
                                @endforeach
                            </div>
                            @foreach($contactos as $contacto)
                            @if(isset($contacto->celular))
                            <div class="col-xl-1 col-lg-1 col-md-1 col-sm-1 col-2 my-2">
                                <i class="iconocom fas fa-phone-alt fa-lg"></i>
                            </div>
                            <div class="col-xl-11 col-lg-10 col-md-10 col-sm-10 col-10 my-2">
                                
                                <a class="link" href="https://wa.me/{{$contacto->celular}}">
                                	<span class="letrafooter">{{$contacto->celular}} </span></a>
                                    
                                </div>
                                @endif
                                @endforeach
                                @foreach ($contactos as $contacto)
                                @if(isset($contacto->telefono))
                                    <div class="col-xl-1 col-lg-1 col-md-1 col-sm-1 col-2 my-2">
                                        <i class="iconocom fab fa-whatsapp fa-lg"></i>
                                     </div>
                                    <div class="col-xl-11 col-lg-10 col-md-10 col-sm-11 col-10  my-2">
                                    
                                        
                                    <a class="link" href="tel:{{$contacto->telefono}}">
                                        <span class="letrafooter">{{$contacto->telefono}} </span></a>
                                        
                                    </div>
                                @endif
                                @endforeach
                            
                           
                    
                    </div>
                    
                </div>
            </div>            
        </div>
           
			
					
	
		<div class="col-md-8 my-4">
			<form method="post" action="{{route('enviarmail')}}" enctype="multipart/form-data">
				@csrf
  				<div class="row">
    				<div class="col-md-6 ">
      					<input type="text" class="form-control bordercont" name="nombre" required placeholder="Nombre">
    				</div>
    				<div class="col-md-6 ">
      					<input type="text" class="form-control bordercont" name="apellido" required placeholder="Apellido">
    				</div>
                </div>
                <div class="row">
                    <div class="col-md-6 mt-4">
                        <input type="email" class="form-control bordercont" name="email" required placeholder="Correo Electrónico">
                      </div>
                    <div class="col-md-6 mt-4">
                      <input type="text" class="form-control bordercont" name="telefono" required placeholder="Teléfono">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mt-4">
                        <textarea class="form-control bordercont" name="mensaje" rows="6"  cols="10" placeholder="Escriba un Mensaje..."></textarea>
                    </div>
                    <div class="col-md-6 ">
                       

                    <div class="form-group ">   
                            {!! NoCaptcha::renderJs() !!}
                                {!! NoCaptcha::display() !!}
                        @error('g-recaptcha-response')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                         
                    </div>
                </div>
		  						
				<button type="submit" class="btn btn-consulta text-uppercase font-weight-bold mt-4 px-5 py-2 float-right " style="font-size: 12px;">Enviar
							
                </button>	
			</form>
		</div>	
	</div>
	

</div>

@endsection