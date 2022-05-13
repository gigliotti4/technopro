@extends('adm.layouts')

@section('content')
<h3>Nueva Descarga</h3>
<form method="post" action="{{route('crearzonaprivada')}}" enctype="multipart/form-data">
	@csrf
  <div class="form-group col-md-6">
    <label for="orden">orden</label>
    <input type="text" class="form-control" id="orden" name="orden" >
    
  </div>
  <div class="form-group col-md-6">
    <label for="nombre">Nombre</label>
    <input type="text" class="form-control" id="nombre" name="nombre">
  </div>
  
  <div class="form-group">
    <label for="Imagen">Imagen</label>
    <input type="file" class="form-control-file" required id="imagen" name="imagen">
  </div>

  <div class="form-group">
    <label for="pdf">pdf</label>
    <input type="file" class="form-control-file" required id="pdf" name="pdf">
  </div>
  

 <button type="submit" class="btn btn-success">Agregar</button>
</form>

@section('js')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script>
        $(document).ready(function() {
             $('textarea').summernote({
                
                 height: 250,
                     fontNames: ['Montserrat-Bold', 'Montserrat-Light', 'Montserrat-Medium', 'Montserrat-Regular', 'Montserrat-SemiBold', 'Roboto-Regular'],
                     toolbar: [
                     ['style', ['style']],
                     ['font', ['bold', 'underline', 'clear']],
                     ['fontNames', ['fontname']],
                     ['color', ['color']],
                     ['para', ['ul', 'ol', 'paragraph']]
                     
                     ]
             });
         });
    
</script>
@endsection
@endsection