<div class="fondofooter2" >
	<div class="container">
		<div class="row">
			<div class="col-md-12">
			    {{-- @foreach ($redes as $r)
				<div class="circulo mt-2 text-center">
				    <a href="{{$r->linkedin}}" target="_blank">
                        <i class="iconofooter border  fab fa-linkedin-in text-white" ></i>
                    </a> 
                    <a href="{{$r->youtube}}" target="_blank">
                        <i class="iconofooter border mx-2 fab fa-youtube text-white" ></i>
                    </a>
                    <a href="{{$r->youtube}}" target="_blank">
                        <i class="iconofooter  border fab fa-facebook-f text-white "></i>
                    </a>    
       
                        
                 </div>
                 @endforeach --}}
			</div>
		</div>
	</div> 
</div>

<div class="fondofooterseccion p-5">
	<div class="container">
		<div class="row ">
            <div class="col-md-2 mt-4">	
				<span class="letra  " style="font-size:18px ; color:white; font-family: Roboto, Regular">Secciones</span>
				<div class="row mt-3">

                  
					<div class="col">	
						<a href="{{route('page.empresa')}}" class="letraenlace">Empresa</a><br>
						<a href="" class="letraenlace" style="font-family: Roboto, Regular">Producots</a><br>
						<a href="" class="letraenlace" style="font-family: Roboto, Regular">Novedades</a><br>
                        
					</div>		
				</div>	
			</div>
			<div class="col-md-2 mt-2 ">	
				<div class="row mt-3">
					<div class="col">
							<p>&nbsp;</p>	
                            <a href="" class="letraenlace" style="font-family: Roboto, Regular">Calidad</a><br>
						<a href="" class="letraenlace" style="font-family: Roboto, Regular">Contacto</a><br>
						
					</div>		
				</div>	
			</div>

            <div class="col-8 col-md-3 pt-3 mt-2">
                <div class="">
                    <span class="letra  " style="font-size:15px ; color:white; font-family: Roboto, Regular">Suscríbite al Newsletter</span>

                    <form id="formSubscribirse">
                        @csrf
                        <div class="input-group my-3">
                            <input type="email" id="correo_news" name="email" class="form-control " placeholder="Ingrese un mail" aria-label="Recipient's username" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                    <button type="submit" class="input-group-text btn-newsletter py-2 " style="font-family: Roboto, Regular; font-size:11px;" id="basic-addon2">
                                        
                                        <i class="fas fa-long-arrow-alt-right fs-4 mx-2"></i>
                                    </button>
                            </div>
                          </div>
                        
                    </form>      

                </div> 
            </div>
		
			   <div class="col-md-5 pt-3 mt-2">
                    <div class="letra " style="font-size:15px ; color:white; font-family: Roboto, Regular">Contacto</div>
                    <div class="row pt-2">
                        <div class="col-md-12 ">
                            
	                            @foreach ($contactos as $c)
                                

                                    <div class="d-flex">
                                        <i class="fas fa-map-marker-alt fa-lg " style="color: white; "></i>
                                        <a href="{{$c->mapa}}"  target="_blank" class="letraenlace ms-3" style="font-family: Roboto, Regular">{{$c->direccion}}</a>
                                    </div>
                                    {{-- <div class="d-flex mt-3">
                                        <i class="fab fa-whatsapp fa-lg  " style="color: white; "></i>
                                        <a href="https://wa.me/{{$c->telefono}}" class="letraenlace ms-3" style="font-family: Roboto, Regular">{{$c->telefono}}</a>
                                    </div> --}}
                                    <div class="d-flex mt-3">
                                        <i class="fas fa-phone-alt " style="color: white; "></i>
                                        <a  href="tel:{{$c->celular}}" class="letraenlace ms-3" style="font-family: Roboto, Regular">{{$c->celular}}</a>
                                    </div>
                                    <div class="d-flex mt-3">
                                        <i class="fas fa-envelope fa-lg " style="color:white; "></i>
                                        <a href="mailto:{{$c->correo}}" class="letraenlace ms-3" style="font-family: Roboto, Regular">{{$c->correo}}</a>
                                    </div>
                               
	                            
	                            @endforeach
                                
                        </div>
                    </div>
                </div>
            </div>
			
				
		</div>
	</div>
	
	<div class="d-flex flex-row justify-content-between align-items-center flex-wrap px-5 py-1" style="font-size:14px;color:#ccc;">
        <p class="p-0 m-0">&copy; Copyright 2022 Technopro. Todos los derechos reservados</p>
        <a target="_blank" href="https://osole.com.ar/" style="text-decoration: none;color:#ccc;">By <b style="color:#000">Osole</b></a>
    </div>

    @section('js')
    
    <script>
        $('#formSubscribirse').on('submit',function(e){
         e.preventDefault();
         let form= new FormData($('#formSubscribirse')[0]);
         var loc = window.location;
       var pathName = loc.pathname.substring(0, loc.pathname.lastIndexOf('/') + 1);
       let miurl= loc.href.substring(0, loc.href.length - ((loc.pathname + loc.search + loc.hash).length - pathName.length));
         $.ajax({
           type: "post",
           url: miurl+'subscribirse',
           data: form,
           processData: false,  // tell jQuery not to process the data
           contentType: false,   // tell jQuery not to set contentType
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           },
           success: function (response) {
               swal("Se ha subscripto correctamente","","success");
               $('#correo_news').val("");
               setTimeout(function(){ location.reload(); }, 1500);
           },
           error: function(response){
               console.log(response);
               swal("Algo salió mal","","error");
           }
         });
        });
      </script>
      
@endsection