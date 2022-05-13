@extends('layouts.plantilla')
<!-- jQuery 1.8 or later, 33 KB -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<!-- Fotorama from CDNJS, 19 KB -->
<link  href="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.js"></script>

@section('content')
 <div class="fondodelcoso">
    <div class="container">
        <div class="col-md-12">
            <div class="">
                <span class="mt-1 " style="font-size: 16px color:white; font-family:Roboto, Regular"> Producto | {{$producto->nombre}}</span>
            </div>
        </div>
    </div>
</div> 

    <div class="container my-5">
        <div class="row">
        <div class="col-md-3">
            <div id="accordion" role="tablist">
                @foreach ($categorias as $categ)
                <div class="card border-0">
                    @if($categ->id == $categoria_sel)
                    <div class="card-header categ_active" role="tab" id="headingOne" >
                      <span class="mb-0">
                      <a class="link_categoria categ_active"  data-toggle="collapse" href="#collapseOne{{$categ->id}}" aria-expanded="true" aria-controls="collapseOne">
                         <a class="categ_active" href="{{route('page.productos',$categ->id)}}"> {{$categ->nombre}}</a>
                        </a>
                      </span>
                    </div>
                    @else
                    <div class="card-header " role="tab" id="headingOne" style="background-color: white" >
                        <span class="mb-0">
                        <a class="link_categoria" data-toggle="collapse" href="#collapseOne{{$categ->id}}" aria-controls="collapseOne">
                          <a class="link_categoria" href="{{route('page.productos',$categ->id)}}"> {{$categ->nombre}}</a>
                        </a>
                        </span>
                      </div>
                    @endif
                    @if($categ->id==$categoria_sel)
                    <div id="collapseOne{{$categ->id}}" class="collapse show" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
                      
                       @foreach ($categ->productos()->get() as $prod)
                       <div class="card-header bg-light border-0" >
                        <a class="link_producto"  href="{{route('page.producto',$prod->id)}}">
                           {{$prod->codigo}}
                        </a> 
                        </div>
                       @endforeach
                      
                    </div>
                    @else
                    <div id="collapseOne{{$categ->id}}" class="collapse " role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
                      
                        @foreach ($categ->productos()->get() as $prod)
                        <div class="card-header bg-light border-0">
                          <a class="link_producto" href="{{route('page.producto',$prod->id)}}">
                            {{$prod->codigo}}
                          </a> 
                         </div>
                        @endforeach
                       
                     </div>
                    @endif
                  </div>
                @endforeach 
               
            </div>
          
        </div>
            <div class="col-md-9">
                <div class="row">
        
                    <div class="col-md-6">
                    
                    <div class="fotorama "
                    data-nav="thumbs"
                    data-arrows="true"
                    data-click="true" 
                    data-height="370"
                    data-width="100%"
                    data-thumbpaddin="20"
                    data-thumbmargin="10"
                    data-thumbwidth="80"
                    data-thumbheight="80"
                    data-loop="true">
                    
                        <?php $imagenes = explode(',', $producto->galeria); ?>
                    
                    
                        @foreach($imagenes as $imagen)
                        <img src="{{asset(Storage::url($imagen))}}" class="img-thumbnail " style="width:200px; ">
                        @endforeach
                    
                    
                    
                    
                    
                    </div>
                    
                    
                
                    </div>
                    <div class="col-md-6 d-flex flex-column">
                        <span class="" style=" font-size:14px; color:#269FF7; font-family:Roboto, Regular">CODIGO: {{$producto->codigo}}</span>
                        <span class="" style=" font-size:24px; color:#333333;font-family:Roboto, Regular"> {{$producto->nombre}}</span>
                        @if(isset($producto->descripcion))
                        
                            <div class="" style="font-size:14px; color:#333333;font-family:Roboto, Regular" >
                                {!!$producto->descripcion!!}
                            </div>
                        @endif
                        <hr>
                      
                   


                    <div class="row">
                   

                    <a href="{{route('page.contacto')}}" class="">
                        <button type="button" class="btn btn-consulta px-4  mx-2 font-weight-bold" download="" style="font-size: 14px; margin-bottom: 115px; ">
                        Consultar
                        </button>
                    
                    </a>
                </div>

                        
                    </div>
                </div>
              
                </div>


            </div>
        </div>  



@endsection