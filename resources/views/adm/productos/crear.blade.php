@extends('adm.layouts')
<script src="{{asset('js/producto.js')}}"></script>

@section('content')

<form method="post" action="{{route('crearproductos')}}" enctype="multipart/form-data">
	@csrf
  <div class="row">
    <div class="form-group col-md-6">
      <label for="orden">orden</label>
      <input type="text" class="form-control" id="orden" name="orden" >
      
    </div>
    <div class="form-group col-md-6">
      <label for="nombre">Descripcion</label>
      <input type="text" class="form-control" id="nombre" name="nombre">
    </div>
  </div>

  <div class="row">


    <div class="form-group col-md-6">
      <label for="codigo">Codigo</label>
      <input type="text" class="form-control" id="codigo" name="codigo">
    </div>



    <div class="form-group col-md-6">
      <label for="categoria_id">Seleccione categoria y subcategoría</label>
        <select name="categoria_id" id="categoria_id" class="form-control" >
          <option selected disabled>Seleccione categoria y subcategoría </option>
          @foreach($categorias as $c)
          <optgroup label = "{{$c->nombre}}">
            @foreach($c->subcategorias as $s)
            <option value="{{$s->id}}">{{$s->nombre}}</option>
            @endforeach
          </optgroup>
          @endforeach
        </select>
    </div>


  </div>
  
  <div class="form-group col-md-12 ">
    <label for="descripcion">Detalle</label>
    <textarea class="form-control" name="descripcion"  id="descripcion" cols="30" rows="10" value=""></textarea>
  </div>

  
  <div class="row">

   
    
    <div class="form-group col-md-6">
      <label for="imagen">Imagen</label>
      <input type="file" class="form-control-file" id="imagen" name="imagen">
      <span class="">Seleccione (Tamaño recomendado: 530x295)</span>
    </div>
  </div>
  <div class="form-group col-md-6">
    <label for="galeria">galeria</label>
    <input type="file" class="form-control-file"  id="galeria" name="galeria[]" multiple="">
  </div>


  <div class="d-flex flex-column">   
    <span>Producto destacado</span>
    <div class="form-check form-check-inline">
      <label class="form-check-label mr-3" for="inlineCheckbox1">Si</label>
      <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="destacado" >
  </div>
</div>
  
 <button type="submit" class="btn btn-success">Agregar</button>
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

       
     });


</script> 



@endsection