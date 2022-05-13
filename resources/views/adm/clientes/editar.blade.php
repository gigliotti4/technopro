@extends('adm.layouts')

@section('content')
<form method="post" action="{{route('updateclientes',$clientes->id)}}" enctype="multipart/form-data">
	@csrf
  @method('put')
  <div class="form-group">
    <label for="orden">orden</label>
    <input type="text" class="form-control" id="orden" name="orden" value="{{$clientes->orden}}">   
  </div>
  <div class="form-group">
    <label for="imagen">Marca</label>
    <input type="file" class="form-control-file" id="imagen" name="imagen" value="" >
    
    <img src="{{asset(Storage::url($clientes->imagen))}}" class="img-thumbnail mt-4">
  </div>
 <button type="submit" class="btn btn-success">Editar</button>
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
