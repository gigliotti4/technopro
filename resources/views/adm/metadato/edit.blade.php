@extends('adm.layouts')
@section('content')
<div class="contenido">
    <div class="col-12">
        
        <h3>Editar</h5>
       
        <form method="POST"  enctype="multipart/form-data" action="{{route('updatemetadatos', $metadata->id)}}">
            @csrf
            @method('PUT')
            <div class="row ">
                <div class="col">
                    <div class="form-group col-md-6">
                        <label for="orden">Keywords</label>
                        <input type="text" class="form-control" id="keyword" name="keyword"  aria-describedby="titulo_espHelp" placeholder="Ingrese los keywords"  value="{{ $metadata->keyword}}">
                    </div>
                </div>
            </div>
            <div class="row ">
                <div class="col">
                    <div class="form-group col-md-6">
                        <label for="descripcion">Descripci&oacute;n</label>
                        <textarea class="form-control" name="descripcion" id="descripcion" rows="3">{{$metadata->descripcion}}</textarea>
                    </div>
                </div>
            </div>
            <div class="row ">
                <div class="col">
                    <div class="input-group mb-3 col-md-6">
                        <select class="custom-select" name="seccion" id="seccion">
                            <option selected>Seleccione</option>
                            <option value="home">Home</option>
                            <option value="empresa">Empresa</option>
                            <option value="repuestos">Repuestos</option>
                            <option value="alquileres">Alquileres</option>
                            <option value="servicios">Servicios</option>
                            <option value="contacto">Contacto</option>
                        </select>
                        <div class="input-group-append">
                            <label class="input-group-text" for="seccion">Secci&oacute;n</label>
                        </div>
                    </div>
                </div>
            </div>         
                
                    <div class="col">
                        <button type="submit" class="btn btn-success">Editar</button>
                            
                        </button>
                    </div>
                
            </div>
        </form>
    
</div>
@endsection
@section('script')
<script>
    var seccion = "{!!$metadata->seccion!!}"
    $('#seccion').val(seccion)
</script>
    
@endsection