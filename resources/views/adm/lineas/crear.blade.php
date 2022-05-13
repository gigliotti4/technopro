@extends('adm.layouts')

@section('content')

<form method="post" action="{{route('crearlineas')}}" enctype="multipart/form-data">
	@csrf
  <div class="form-group col-md-6">
    <label for="orden">Orden</label>
    <input type="text" class="form-control" id="orden" name="orden" >
    
  </div>
  <div class="form-group col-md-6">
    <label for="ano">Año</label>
    <input type="text" class="form-control" id="ano" required name="ano">
  </div>

  <div class="form-group col-md-12">
    <label for="descripcion">Contenido</label>
    <textarea class="form-control" name="descripcion" id="descripcion" cols="30" rows="10" value="" ></textarea>
    
  </div>
  
  <button type="submit" class="btn btn-success">Agregar</button>
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