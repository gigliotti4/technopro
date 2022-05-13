
    <div class="fondoheader d-none d-md-block">
        <div class="container ">	
                <div class="row">
                    <div class="col-12 col-md-8  d-flex justify-content-start mt-1">				  
                      <div class="linea">	
                            <i class="icono fas fa-phone-alt text-white"></i>
                            @foreach($contactos as $c)
                            <a class="enlace" href="tel:{{$c->celular}}" style="font-family: Roboto, Regular">{{$c->celular}}</a>
                           @endforeach
                      </div>
                        <div class="linea ms-5">

                            <i class="icono far fa-envelope text-white "></i>
                            @foreach($contactos as $c)
                                <a class="enlace" href="mailto:{{$c->correo}}" style="font-family: Roboto, Regular">{{$c->correo}}</a>
                            @endforeach
                         </div>


                         
                    </div>

                    
                        @if (isset(Auth::guard('cliente')->user()->id)) 
                        <div class="col-md-4">
                            <div class="d-flex justify-content-end">

                                <a class=" btn btn-privada" onclick="salir_clientes() {{ $active == 'page.empresa' ? 'activesoli' : ''}}"  style="font-family: Roboto, Regular">
                                    <i class="fas fa-user mx-2"></i>
                                    Cerrar sesión</a>
                            </div>
                        </div>
                        
                        @else
                        
                        <div class="col-md-4">
                            <div class="d-flex justify-content-end">
    
                                <a class=" btn btn-privada  {{ $active == 'page.empresa' ? 'activesoli' : ''}}" href="{{route('registro_cliente')}}" style="font-family: Roboto, Regular">
                                    <i class="fas fa-user mx-2"></i>
                                    Zona privada</a>
                            </div>
                        </div>
                        @endif
                    
                    
                    
                {{--  <div class="col-12 col-md-6  d-flex justify-content-end ">             
                     
                      <div class="mr-2 zp_container">
                        <a class="nav-item nav-link mx-1 text-white {{ $active == 'page.zonaprivada' ? 'activesoli' : ''}}" href="#" >ZONA PRIVADA</a>
                      </div>




                        zonaprivado 
                        {{-- <div id="area_privada" class="ocultar_" style="position:absolute;width:262px;height:271px;top:38px;z-index:1;">

                      
                          <div class="container " style="background-color: #F58634;" >
                              <div class="justify-content-center align-items-center">
                                  <div class="col-md-12">
                                      <div class="card-body">
                                          @isset($msj)
                                                  <div>{{$msj}}</div>
                                              @endisset
                                   @if (isset(Auth::guard('cliente')->user()->id)) 
                                        <div class="d-flex justify-content-center">

                                            <a class="btn text-white px-5" style="background-color: #333333;" onclick="salir_clientes()" style="cursor:pointer">Salir</a>
                                        </div>
                                        
                                       @else 
                                          <form method="POST" action="{{ route('login.clientes') }}">
                                              @csrf
                                              
                                              <div class="mt-3 form-group row d-flex justify-content-center align-items-center">
                                                  <div class="col-md-10">
                                                      <input style="background:transparent;color:#fff" id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" placeholder="Nombre de usuario" required autocomplete="username" autofocus>
                                                  </div>
                                              </div>

                                              <div class="mt-3 form-group row d-flex justify-content-center align-items-center">
                                                  <div class="col-md-10">
                                                      <input style="background:transparent;color:#fff" id="password" placeholder="Contraseña" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                                  </div>
                                              </div>

                                              <div class="mt-3 form-group row mb-0 d-flex justify-content-center align-items-center">
                                                  <div class="col-md-10 d-flex justify-content-center align-items-center">
                                                      <button style="background:#12ABB1;border-radius: 30px;color: #fff;" type="submit" class="btn w-100">
                                                          {{ __('INGRESAR') }}
                                                      </button>
                                                  </div>
                                              </div>

                                              <div class="mt-3 form-group row mb-0 d-flex justify-content-center align-items-center">
                                                  <div class="col-md-10 d-flex justify-content-center align-items-center">
                                                      <button onclick="window.location='{{route('registro_cliente')}}'" style="color:#fff" type="button" class="btn w-100">
                                                          {{ __('Crear nueva cuenta') }}
                                                      </button>
                                                  </div>
                                              </div>
                                          </form>
                                       @endif 
                                          </div>
                                      </div>
                                  </div>
                              </div>


                  </div> 

                  </div>  	--}}

                </div>	
        </div>	
</div>				 

<div class="">
    <nav class="navbar navbar-expand-lg navbar-light p-0 shadow">
        <div class="container">        
             <a class="navbar-brand mr-5 p-0" href="{{route('page.inicio')}}">
                @foreach($logosheader as $l)
                <img src="{{asset(Storage::url($l->imagen))}}" class="img-fluid my-3" style=" width: 230px;">
                @endforeach
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
                <div class="collapse navbar-collapse justify-content-end"  id="navbarNavDropdown">
                     <div class="navbar-nav ">
                       
                             <a class="nav-item nav-link  {{ $active == 'page.empresa' ? 'activeheader' : ''}}" href="{{route('page.empresa')}}" style="font-family: Roboto, Regular">Empresa</a>
                             <a class="nav-item nav-link  {{ $active == 'page.categorias' ? 'activeheader' : ''}}" href="{{route('page.categorias')}}" style="font-family: Roboto, Regular">Productos</a>
                             <a class="nav-item nav-link  {{ $active == 'page.novedades' ? 'activeheader' : ''}}" href="{{route('page.novedades')}}" style="font-family: Roboto, Regular">Novedades</a> 
                            <a class="nav-item nav-link  {{ $active == 'page.calidad' ? 'activeheader' : ''}}" href="{{route('page.calidad')}}" style="font-family: Roboto, Regular">Calidad</a>
                            
                            {{-- <a class="nav-item nav-link  {{ $active == 'page.presupuesto' ? 'activeheader' : ''}}" href="{{route('page.presupuesto')}}" style="font-family: Roboto, Regular"s>Solicitud de presupuesto</a> --}}
                             
                             {{--<a class="nav-item nav-link  {{ $active == 'page.clientes' ? 'active' : ''}}" href="{{route('page.clientes')}}">CLIENTES</a>--}}
                             <a class="nav-item nav-link  {{ $active == 'page.contactos' ? 'activeheader' : ''}}" href="{{route('page.contacto')}}" style="font-family: Roboto, Regular">Contacto</a> 
                             <div class="mt-2 mx-2">|</div>
                             
                                   @if (isset(Auth::guard('cliente')->user()->id)) 

                                            <a class="nav-item nav-link" href="{{route('area_privada')}}"  style="font-family: Roboto, Regular">Descarga</a>
                                        
                                    @endif

                              @foreach ($redes as $r)
                                <div class=" mt-2">
                                    <a href="{{$r->instagram}}" target="_blank">
                                        <i class=" fab fa-instagram mx-2" style="color: #1063EF"></i>
                                    </a> 
                                
                                    <a href="{{$r->facebook}}" target="_blank">
                                        <i class=" fab fa-facebook-f me-3" style="color: #1063EF"></i>
                                    </a>    
                    
                                        
                                </div>
                         @endforeach 
                              <a class="nav-item nav-link p-0 " target="_blank" href="https://wa.me/{{str_replace(array(' ','(',')','-'),'',$c->telefono)}}">
                                  
                                  <svg xmlns="http://www.w3.org/2000/svg" width="165.699" height="41" viewBox="0 0 165.699 41">
  <g id="Grupo_3653" data-name="Grupo 3653" transform="translate(-1102 -79)">
    <g id="Trazado_28607" data-name="Trazado 28607" transform="translate(1102 79)" fill="#1dc143">
      <path d="M 157.5309448242188 40.5 L 8.168275833129883 40.5 C 3.939984321594238 40.5 0.5000051856040955 37.58410263061523 0.5000051856040955 34 L 0.5000051856040955 7 C 0.5000051856040955 3.415895938873291 3.939984321594238 0.5 8.168275833129883 0.5 L 157.5309448242188 0.5 C 161.7592315673828 0.5 165.19921875 3.415895938873291 165.19921875 7 L 165.19921875 34 C 165.19921875 37.58410263061523 161.7592315673828 40.5 157.5309448242188 40.5 Z" stroke="none"/>
      <path d="M 8.168258666992188 1 C 4.215667724609375 1 1 3.691585540771484 1 7 L 1 34 C 1 37.30841445922852 4.215667724609375 40 8.168258666992188 40 L 157.5309295654297 40 C 161.4835510253906 40 164.69921875 37.30841445922852 164.69921875 34 L 164.69921875 7 C 164.69921875 3.691585540771484 161.4835510253906 1 157.5309295654297 1 L 8.168258666992188 1 M 8.168258666992188 0 L 157.5309295654297 0 C 162.0421600341797 0 165.69921875 3.133998870849609 165.69921875 7 L 165.69921875 34 C 165.69921875 37.86600112915039 162.0421600341797 41 157.5309295654297 41 L 8.168258666992188 41 C 3.657058715820312 41 0 37.86600112915039 0 34 L 0 7 C 0 3.133998870849609 3.657058715820312 0 8.168258666992188 0 Z" stroke="none" fill="#1dc143"/>
    </g>
    <g id="Grupo_3634" data-name="Grupo 3634" transform="translate(-2.91)">
      <text id="WhatsApp" transform="translate(1206 106)" fill="#fff" font-size="18" font-family="Roboto-Medium, Roboto" font-weight="500"><tspan x="-41.335" y="0">WhatsApp</tspan></text>
      <path id="whatsapp-brands" d="M17.986,35.074a10.486,10.486,0,0,0-16.5,12.65L0,53.154,5.558,51.7a10.451,10.451,0,0,0,5.01,1.275h0a10.416,10.416,0,0,0,7.413-17.9ZM10.572,51.2a8.7,8.7,0,0,1-4.439-1.214L5.817,49.8l-3.3.864L3.4,47.45l-.208-.331a8.73,8.73,0,1,1,16.192-4.632A8.81,8.81,0,0,1,10.572,51.2Zm4.779-6.526c-.26-.132-1.549-.765-1.79-.85s-.416-.132-.59.132-.675.85-.831,1.029-.307.2-.567.066A7.13,7.13,0,0,1,8.008,41.94c-.269-.463.269-.43.77-1.431a.485.485,0,0,0-.024-.458c-.066-.132-.59-1.421-.807-1.945s-.43-.439-.59-.449-.326-.009-.5-.009a.97.97,0,0,0-.7.326,2.943,2.943,0,0,0-.916,2.186,5.131,5.131,0,0,0,1.067,2.71,11.7,11.7,0,0,0,4.476,3.957,5.125,5.125,0,0,0,3.145.656A2.683,2.683,0,0,0,15.7,46.237a2.191,2.191,0,0,0,.151-1.247C15.785,44.872,15.611,44.806,15.351,44.678Z" transform="translate(1127.91 57)" fill="#fff"/>
    </g>
  </g>
</svg>

                              </a> 
                            
                        </div>
      
                </div>
                
            </div> 
        </nav>
</div>


<script>
        function salir_clientes() {
    sessionStorage.removeItem('pedido');
    window.location.href = '{{route('salir')}}';
}
</script>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->







