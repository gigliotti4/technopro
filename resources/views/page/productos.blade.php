@extends('layouts.plantilla')


@section('content')
<div class="fondodelcoso">
    <div class="container">
        <div class="col-md-12">
            <div class="">
                <span class="mb-2" style="color:#505050;">Inicio | Productos </span>
            </div>
        </div>
    </div>
  </div>

  <div class="bg-grey" style="background-color: #F2F2F2; height:200px">

      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <form action="{{route('page.buscador')}}"  method="post" >
                  <div class="d-flex justify-content-around mt-5">
                        @csrf
                          <div class=" col-md-5 ">
                              <input type="text" class="form-control" id="codigo" name="codigo" placeholder="Codigo">
                              
                            </div>
                            <div class=" col-md-5">
                              <input type="text" class="form-control" id="nombre" name="nombre" placeholder="detalles">
                              
                            </div>
                           
                            
                            <button type="submit" class="btn btn-buscar">
                              <i class="fas fs-4 fa-search "></i>
                            </button>
                          </div>
                      </form>
              </div>
          </div>
      </div>
  </div>

<div class="container my-5">
    <div class="row">
       
       
        <div class="col-lg-12">
            <div class="row">
                @foreach ($productos as $p)
                <div class="col-md-3 col-lg-3" style="padding-bottom: 40px">
                <a class="producto " href="{{route('page.producto',$p->id)}}">
                    
                   
                    <div class="border border-bottom-0 mt-2 prodwrapcat "
                     style="background-image:url('{{asset(Storage::url($p->imagen))}}');
                        background-size:contain;
                        height:253px !important;
                        width:100% !important;
                        background-repeat:no-repeat;
                        background-position:center;
                    ">
                    
                        <div class="imgoverlaycat">  
                            <i class="fas fa-plus fa-2x"></i>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center align-items-center flex-column bg-white border border-top-0" style="height:59px;width: 100%;">
 
                            <span style="color:#269FF7; font-family:Roboto, Regular" class="text-uppercase font-14">CODIGO: {!!$p->codigo!!}</span>
                            <span style="color:#333333; font-family:Roboto, Regular" class="">{!!$p->nombre!!}</span>
                        
                        
                    </div>
                </a>
                </div>
                @endforeach
            </div>
            
        </div>
    </div>
</div>  






@endsection