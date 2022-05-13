@extends('adm.layouts')

@section('content')
<form method="post" action="{{route('updatelineas',$lineas->id)}}" enctype="multipart/form-data">
	@csrf
  @method('put')
  <div class="form-group col-md-6">
    <label for="orden">orden</label>
    <input type="text" class="form-control" id="orden" name="orden" value="{{$lineas->orden}}">   
  </div>
  <div class="form-group col-md-6">
    <label for="ano">Año</label>
    <input type="text" class="form-control" id="ano" name="ano" value="{{$lineas->ano}}">
  </div>

  <div class="form-group">
    <label for="descripcion">Contenido</label>
    <textarea class="form-control" name="descripcion" id="descripcion" cols="30" rows="10" value="" >{{$lineas->descripcion}}</textarea>
    
  </div>
 <button type="submit" class="btn btn-success">Editar</button>
</form>



@endsection
@section('js')
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