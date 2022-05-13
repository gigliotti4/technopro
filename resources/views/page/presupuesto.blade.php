@extends('layouts.plantilla')
<style>
        .btn-consulta{
    color: #fff;
    background-color: #F58634;
    border-color: #F58634;
    }
    .btn-consulta:hover{
    color: #F58634;
    background-color: white;
    border-color: #F58634;
	
    }
    .fondodelcoso{
        background-color: #F58634 !important;
        line-height: 40px;
    }

</style>
@section('content')

<div class="fondodelcoso">
    <div class="container">
        <div class="col-md-12">
            <div class="">
                <span class="mt-1 " style="font-size: 16px; color:white;"> Nosotros</span>
            </div>
        </div>
    </div>
</div>
<div class="container my-5">
    <div class="row justify-content-center">
   
        <div class="col-md-2 col-4">
            <img id="icono_edit"class="d-block mx-auto"src="{{asset('img/edit.svg')}}">
            <div class="text-center mt-3" style="color:#F58634">
                DATOS <br> PERSONALES
                
            </div>
            <div class="text-center">
                <img class="cositoDatos" src="{{asset('img/cositoazul.png')}}" style="padding-top: 10px;">

            </div>
        </div>
        <div class="col-md-3 col-4 d-flex align-items-center" style="padding-left:0;padding-right:0px;">
            
                <div class="" style="width: 100%;height:1px; background-color:#CBD0D3;"></div>

            
        </div>
        <div class="col-md-2 col-4">
            <img id="icono_chat"class="d-block mx-auto "  src="{{asset('img/chat.svg')}}">
            <div class="text-center mt-3" style="color:">
                CONSULTA
            </div>
            <div class="text-center">
                <img class="cositoConsulta" src="{{asset('img/cositogris.png')}}" style="padding-top: 20px;">

            </div>
        </div>
        <div id="primero" class="mt-5 col-md-8">
            <form novalidate="" id="form"  enctype="multipart/form-data">
                @csrf
            <div class="row">
                <div class="col-12 col-md-6">
                    <input type="text" name="nombre" id="nombre" placeholder="Ingresar Nombre (*)" class="form-control" required>
                </div>
                <div class="col-12 col-md-6">
                    <input type="email" name="email" id="email" placeholder="Ingrese su Correo electrónico (*)" class="form-control" required="">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12 col-md-6">
                    <input type="text" id="telefono" name="telefono" placeholder="Ingrese Teléfono(*)" class="form-control">
                </div>
                <div class="col-12 col-md-6">
                    <input type="text" id="empresa" name="empresa" placeholder="Empresa" class="form-control">
                </div>
            </div>
            
            <div class="row mt-5">
                <div class="col-12 d-flex justify-content-end">
                 
                    <button onclick="PrimerValidacion()" type="button" class="btn  btn-consulta rounded-pill  px-5" >Siguiente<i class="fas fa-arrow-right ml-2"></i></button>
                </div>
            </div>
        </div>
        <div id="segundo" class="mt-5 d-none col-md-8" >
            <div class="row">
                
                    <div class="col-12 col-md-6">
                        <label for="" style="font-size: 13px; color:#AAAAAA;">Cantidad</label>
                        <input type="text" id="cantidad" name="cantidad" placeholder="" class="form-control">
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="" style="font-size: 13px; color:#AAAAAA;">Diametro Polea*</label>
                        <input type="text" id="diametro" name="diametro" placeholder="(mm)" class="form-control">
                    </div>

                    <div class="col-12 col-md-6">
                        <label for="" style="font-size: 13px; color:#AAAAAA;">Cantidad de canales</label>
                        <input type="text" id="canales" name="canales" placeholder="Ingrese tamaño en mm" class="form-control">
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="" style="font-size: 13px; color:#AAAAAA;">seccion</label>
                        <select  type="text" id="seccion" name="seccion" placeholder="" class="form-control">
                            <option>A</option>
                            <option>B</option>
                            <option>C</option>
                        </select>     
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="" style="font-size: 13px; color:#AAAAAA;">Material Polea</label>
                        <select  type="text" id="material" name="material" placeholder="" class="form-control">
                        </select>  
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="" style="font-size: 13px; color:#AAAAAA;">Con cono Intercambiable</label>
                        <select type="text" id="cono" name="cono" placeholder="" class="form-control">
                            <option>si</option>
                            <option>no</option>
                        </select>
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="" style="font-size: 13px; color:#AAAAAA;">Cantidad</label>
                        <select type="text" id="cantidad" name="cantidad" placeholder="" class="form-control">
                        </select>
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="" style="font-size: 13px; color:#AAAAAA;">Diametro Maza*</label>
                        <select type="text" id="maza" name="maza" placeholder="" class="form-control">
                            <option>si</option>
                            <option>no</option>
                        </select>
                    </div>

                    <div class="col-12 col-md-6">
                        <label for="" style="font-size: 13px; color:#AAAAAA;">Diametro eje</label>
                        <select type="text" id="eje" name="eje" placeholder="(mm)" class="form-control">
                        </select>
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="" style="font-size: 13px; color:#AAAAAA;">Chavetero</label>
                        <select type="text" id="chavetero" name="chavetero" placeholder="(mm)" class="form-control">
                        </select>
                    </div>
                
                <div class="col-md-12 col-12 mt-3">
                    <textarea name="mensaje" name="mensaje"placeholder="Mensaje" rows="3" class="form-control"></textarea>
                </div>
                <div class="col-md-6 col-12 mt-2">
                    <div class="input-group mb-3 pl-0">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="file" id="archivo" id="inputGroupFile01" placeholder="Elige">
                            <label class="custom-file-label" for="inputGroupFile01">Examinar Archivo</label>
                          </div>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-12 d-flex justify-content-end">
                    {{-- <button onclick="anterior()" type="button" class="btn px-5 btn-outline-light text-uppercase" style="color: #E10915;border:1px solid #E10915">volver</button> --}}
                    <button type="submit" class="btn btn-consulta rounded-pill px-5  text-uppercase font-weight-bold" style="font-size: 12px;">CONSULTAR
							
                    </button>
                   
                </div>
            </div>
        </div>
    </form>
    </div>
    
</div>




@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script>
<script>
    $(document).ready(function(){
        $("#form").validate({ //inicamos la validación del formulario
           //Cada cosa que configures la debes de terminar con una coma ,
           onfocusout: false,  //Si un objeto no cumple con la validación, tomara el foco
           rules: { //iniciamos sección de reglas
               nombre: { //estas seras las reglas para el objeto que en su propiedad name tenga nameO
                   required: true //indicamos que es requerido que contenga un valor
               },
               email: {
                   required: true,
                   email: true //indicamos que debe de cumplir con la estructura de un email
               },
               telefono:{
                   required:true,
                   digits:true,
               }
          },
           messages: {//estos seran los mensaje que aparezcan segun el objeto y la reque que espeficiquemos en la sección de reglas
               nombre: {
                   required: "Este campo es necesario"
               },
               email: {
                   required: "Este campo es necesario",
                   email: "No cumple con la estructura de un correo."
               },
               telefono:{
                   required: "Por favor indique su telefono",
                   digits: "Ingrese solo numeros"
               }
          },
          submitHandler: function(){ //si todos los controles cumplen con las validaciones, se ejecuta este codigo
             //para ocultar el mensaje, le agregamos la clase de Bootstrap 3
             
             $('.spinner-border').removeClass('d-none');
            $('.btn-text').text('Enviando');
            let form= new FormData($('#form')[0])
               $.ajax({
                   type: 'POST',
                   url: 'presupuesto',
                   //data: {nombre:nombre,email:correo,mensaje:mensaje,telefono:tel,empresa:empresa_form,file:archivo},
                   data:form,
                   processData:false,
                    contentType:false,
                   headers: {
                       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                   }, //parametros (valores) en formato llaver:valor, que se enviaran con la solicitudd
                 success: function(response) {
                   //se llama cuando tiene éxito la respuesta

                   swal("Muchas Gracias!", "Hemos recibido tu consulta!", "success");
                   $('#form')[0].reset();
                 },
                 error: function(response) {
                   console.log(response);
                   swal ( "Oops" ,  "Algo salio mal!" ,  "error" )

                 },complete:function(){
                   $('.spinner-border').addClass('d-none');
                   $('.btn-text').text('Enviar');
                   }
               });
          },
          invalidHandler: function(event, validator) { //si por lo menos uno control no cumplen con las validaciones, se ejecuta este codigo
               var errors = validator.numberOfInvalids(); // número de errores encontrados al validar el formulario
               if (errors) { //si errors = 0 no se ejecuta el if, de ser mayor que cero se ejecuta
                   //la linea de abajo es un if ternario
                   var message = errors == 1 ? ' Error: Te perdiste 1 campo. Ha sido destacado' : ' Error: Te perdiste '+ errors +' campos. Se han destacado';
                   $("div#formError span#Mensaje").html(message); //agregamos el valor de message a objeto seleccionado
                   $("div#formError").removeClass("hidden"); //para que se muestre el mensaje, le quitamos la clase que lo oculta
               }
           },
           highlight: function(element, errorClass) {//los objetos que no cumplan con la validación parpadearan
               $(element).fadeOut(function() {
                   $(element).fadeIn();
               });
           },
           errorElement: "div", //indicamos en qué tipo de objeto DOM se agregarán las alertas. El valor por default es "label"
           errorClass: "alert alert-danger", //indicamos la clase que se agregara a las alertas. El valor por default es "error"
       });
    });
    function PrimerValidacion(){
        if($("#form").valid()){ // test for validity 
            siguiente();
        } else { 
          
         } 
    }
   
      
  
    function siguiente(){
        $('#primero').addClass('d-none');
        $('#segundo').removeClass('d-none');
        $('.cositoConsulta').attr('src','img/cositoazul.png');
        $('.cositoDatos').attr('src','img/cositogris.png');
        $('#icono_chat').attr('src','img/chat2.svg');
        $('#icono_edit').attr('src','img/edit2.svg');
    }
    function anterior(){
        $('#primero').removeClass('d-none');
        $('#segundo').addClass('d-none');
        $('#icono_chat').attr('src','img/chat.svg');
        $('#icono_edit').attr('src','img/edit.svg');
        $('.cositoConsulta').attr('src','img/cositogris.png');
        $('.cositoDatos').attr('src','img/cositoazul.png');
    }    
</script>



@endsection


