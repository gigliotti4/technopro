@extends('adm.layouts')

<script src="{{asset('js/producto.js')}}"></script>
@section('content')

@if(session()->has('danger'))
    <div class="alert alert-danger">
        {{ session()->get('danger') }}
    </div>
@endif

<form method="post" action="{{route('updateproductos',$productos->id)}}" enctype="multipart/form-data">
	@csrf
  @method('put')
  <div class="row">
    <div class="form-group col-md-6">
      <label for="orden">orden</label>
      <input type="text" class="form-control" id="orden" name="orden" value="{{$productos->orden}}">
      
    </div>
    <div class="form-group col-md-6">
      <label for="nombre">Descripcion</label>
      <input type="text" class="form-control" id="nombre" name="nombre" value="{{$productos->nombre}}">
    </div>
  </div>

  <div class="row">
    <div class="form-group col-md-6">
      <label for="codigo">Codigo</label>
      <input type="text" class="form-control" id="codigo" name="codigo" value="{{$productos->codigo}}">
    </div>
    
    <div class="form-group col-md-6">
      <label for="categoria_id">Seleccione categoria y subcategoría</label>
        <select name="categoria_id" id="categoria_id" class="form-control" >
          <option selected disabled>Seleccione categoria y subcategoría </option>
          @foreach($categorias as $c)
          <optgroup label = "{{$c->nombre}}">
            @foreach($c->subcategorias as $s)
            @if ($s->id==$productos->categoria_id)
            <option value="{{$s->id}}" selected>{{$s->nombre}}</option>
            @else 
            <option value="{{$s->id}}">{{$s->nombre}}</option>
            @endif
            @endforeach
          </optgroup>
          @endforeach
        </select>
    </div>


  
  </div>


<div class="row">

  <div class="form-group col-md-12">
    <label for="descripcion">Detalle</label>
    <textarea class="form-control" name="descripcion"  id="descripcion" cols="30" rows="10" value="">{!!$productos->descripcion!!}</textarea>
  </div>
</div>
 




  <div class="row">
    <div class="form-group col-md-6">
      <label for="imagen">Imagen</label>
      <input type="file" class="form-control-file" id="imagen" name="imagen">
      <img src="{{asset(Storage::url($productos->imagen))}}" class="img-thumbnail mt-4">
    </div>

   
  </div>
  
    
  <div class="form-group col-md-6">
    <label for="galeria">galeria</label>
    <input type="file" class="form-control-file" id="galeria" name="galeria[]" value="" multiple="">
    <?php $galerias = explode(',', $productos->galeria); ?>
    <div class="d-flex">
      @foreach($galerias as $key => $galeria)
      
        
        <div class="my-3">
          
          <div class="d-flex justify-content-end">

            <a  href="{{route('borrarproducto',[$productos->id, $key])}}" class="btn btn-danger float-right position-absolute" style=" line-height: 40px;   text-align: center;" > <i class="fas fa-times text-white" ></i> </a>
          </div>
          <div class="bg-white p-4 mx-2 border">

            <img src="{{asset(Storage::url($galeria))}}" class=" mx-2" style="width:200px; ">
          </div>
        </div>
      
      @endforeach
    </div>
  </div>


  <div class="d-flex flex-column">   
    <span>Productos destacados</span>
    <div class="form-check form-check-inline">
      <label class="form-check-label mr-3" for="inlineCheckbox1">Si</label>
      <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="destacado" @if($productos->destacado == 1) checked="" @endif>
    </div>
    
</div>
  
  
  
 <button type="submit" class="btn btn-success">Editar</button>
</form>



@endsection
@section('js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

 <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
 <script>
    $(document).ready(function() {
         $('textarea').summernote({
            
             height: 250,
                 fontNames: ['Montserrat'],
                 fontNamesIgnoreCheck: ['Segoe UI']
                //  toolbar: [
                //  ['style', ['style']],
                //  ['font', ['bold', 'underline', 'clear']],
                // // ['fontNames', ['fontname']],
                //  ['color', ['color']],
                //  ['para', ['ul', 'ol', 'paragraph']]
                 
                //  ]
         });

         function formatState (state) {
          if (!state.id) {
            return state.color;
          }
          console.log(state)
          var baseUrl = "/cordon-oro/";
          var $state = $(
          '<span > '+state.element.attributes.datacode.value +' </span>'
          );

          // if(state.element.text.startsWith('#',0)){
            
          // }else{
          //   var $state = $(
          //   '<span style="background:'+ state.element.text+'"><img src="' + baseUrl + '/' + state.element.text.replace('public/', 'public/storage/') + '" class="img-flag" /></span>'
          //   );
          // }
          
          return $state;
        };

        

         $('.js-example-basic-multiple').select2({
          templateResult: formatState
         });
     });


</script> 



@endsection