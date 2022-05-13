@extends('layouts.plantilla')


@section('content')

<div class="fondodelcoso">
    <div class="container">
        <div class="col-md-12">
            
            <span class="mb-2" style="color:#505050;">Inicio | Subcategorias </span>
            
        </div>
    </div>
</div>


<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div id="accordion" role="tablist">
                @foreach ($categorias as $cat_menu)
                <div class="card border-0">
                    @if ($catsel==$cat_menu->id)
                    <div class="card-header categ_active" role="tab" id="headingOne" >
                        <span class="mb-0">
                        <a class="link_categoria categ_active"  data-toggle="collapse" href="#collapseOne{{$cat_menu->id}}" aria-expanded="true" aria-controls="collapseOne">
                           <a class="categ_active" href="{{route('page.categorias',$cat_menu->id)}}"> {{$cat_menu->nombre}}</a>
                          </a>
                        </span>
                      </div>
                        @foreach ($cat_menu->subcategorias()->orderby('orden',"ASC")->get() as $subcat_menu)
                            @if ($subcat_menu->id==$subcatsel)
                            <div id="collapseOne{{$cat_menu->id}}" class="collapse show" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
                                <div class="card-header bg-light border-0">

                                    <a class="link_producto" href="{{route('page.subcategorias',$subcat_menu->id)}}">{{$subcat_menu->nombre}}</a>
                                </div>
                            </div>
                                @foreach ($subcat_menu->productos()->orderby('orden',"ASC")->get() as $prod_menu)
                                    @if ($prod_menu->id==$prodsel)
                                    <div class="card-header bg-light border-0">
                                        <a class="link_producto" href="{{route('page.producto',$prod_menu->id)}}">
                                          {{$prod_menu->codigo}}
                                        </a> 
                                       </div>
                                    @else
                                    <div class="card-header bg-light border-0">
                                        <a class="link_producto" href="{{route('page.producto',$prod_menu->id)}}">
                                          {{$prod_menu->codigo}}
                                        </a> 
                                       </div>
                                    @endif
                                @endforeach
                            @else
                            
                            <div class="card-header bg-light border-0">
                                <a class="link_producto" href="{{route('page.subcategorias',$subcat_menu->id)}}">
                                    {{$subcat_menu->nombre}}
                                </a> 
                               </div>
                            @endif
                        @endforeach
                    @else
                    <div class="card-header " role="tab" id="headingOne" style="background-color: white" >
                        <span class="mb-0">
                        <a class="link_categoria" data-toggle="collapse" href="#collapseOne{{$cat_menu->id}}" aria-controls="collapseOne">
                          <a class="link_categoria" href="{{route('page.productos',$cat_menu->id)}}"> {{$cat_menu->nombre}}</a>
                        </a>
                        </span>
                      </div>
                    @endif
                </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- @foreach ($categorias as $cat_menu)
    @if ($catsel==$cat_menu->id)
        <a class="item_menu_active" href="{{route('page.categorias',$cat_menu->id)}}">{{$cat_menu->nombre}}</a>
        @foreach ($cat_menu->subcategorias()->orderby('orden',"ASC")->get() as $subcat_menu)
            @if ($subcat_menu->id==$subcatsel)
                <a class="item_menu_subcategoria_active" href="{{route('page.subcategorias',$subcat_menu->id)}}">{{$subcat_menu->nombre}}</a>
                @foreach ($subcat_menu->productos()->orderby('orden',"ASC")->get() as $prod_menu)
                    @if ($prod_menu->id==$prodsel)
                        <a class="item_menu_productos_active" href="{{route('page.producto',$prod_menu->id)}}">{{$prod_menu->nombre}}</a>
                    @else
                        <a class="item_menu_productos" href="{{route('page.producto',$prod_menu->id)}}">{{$prod_menu->nombre}}</a>
                    @endif
                @endforeach
            @else
                <a class="item_menu_subcategoria" href="{{route('page.subcategorias',$subcat_menu->id)}}">{{$subcat_menu->nombre}}</a>
            @endif
        @endforeach
    @else
        <a class="item_menu" href="{{route('page.categorias',$cat_menu->id)}}">{{$cat_menu->nombre}}</a>
    @endif
    @endforeach --}}
</div>




    @endsection
 