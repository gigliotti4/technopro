

function addtt(){
    
    var addList = document.getElementById('nuevos');

    var text = document.createElement('div');
    
    text.innerHTML = 
    '<hr>'+
    '<div class="p-3" style="background-color:#e1e3e2">'+
    '<div class="row">'+
    '<div class="col-md-6">'+
    '<label>codigo</label>'+
    '<input type="text" name="codigo[]" id="codigo[]" class="form-control">' +
    '</div>'+
    '<div class="col-md-6">'+
    '<label>serie</label>'+
    '<input type="text" name="serie[]" id="serie[]" class="form-control" >'+
    '</div>'+
    '<div class="col-md-6">'+
    '<label>dimesionA</label>'+
    '<input type="text" name="dimesionA[]" id="dimesionA[]" class="form-control" >' +
    '</div>'+
    '<div class="col-md-6">'+
    '<label>dimesionB</label>'+
    '<input type="text" name="dimesionB[]" id="dimesionB[]" class="form-control" >'+
    '</div>'+
    '<div class="col-md-6">'+
    '<label>dimesionC</label>'+
    '<input type="text" name="dimesionC[]" id="dimesionC[]" class="form-control" >'+
    '</div>'+
    '<div class="col-md-6">'+
    '<label>dimesionD</label>'+
    '<input type="text" name="dimesionD[]" id="dimesionD[]" class="form-control" >'+
    '</div>'+
    '<div class="col-md-6">'+
    '<label>peso</label>'+
    '<input type="text" name="peso[]" id="peso[]" class="form-control" >'+
    '</div>'+
    '</div>'+
    '</div>';
    addList.appendChild(text);
     $('.summernote').summernote();
    // $('.summernoteen').summernote();

}

