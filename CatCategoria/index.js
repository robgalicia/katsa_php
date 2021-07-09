var idcategoria = -1;

$(document).ready(function() {    
    validarInit('formAgregar');
    llenar_tabla_ajax();

});

function llenar_tabla_ajax(){
    destroyDTGen();
    $('#tbody').html('');
    
    ajaxPost("categoria_all.php", llenar_tabla);
}

function llenar_tabla(json){
    console.log(json);
    destroyDTGen();
    $('#tbody').html('');
    var string = '';

    for (let i in json) {
        var ob = json[i];
            string += '<tr>';

            string += '<td>';
            string += ob.desccategoria;
            string += '</td>';      

            string += '<td>';     
            string += '<button class="ui basic green icon button" data-tooltip="Editar" onclick="mostrarModal(' + ob.idcategoria + ');"><i class="edit icon"></i></button>';   
            string += '<button class="ui basic red icon button" data-tooltip="Eliminar" onclick="modalBorrarFN(' + ob.idcategoria + ');"><i class="close icon"></i></button>';            
            string += '</td>';

            string += '</tr>';    
    }
    $('#tbody').html(string);
    toDataTableGen();
    NProgress.done();
}

function mostrarModal(id, value = ''){
    idcategoria = id;

    clearForm('formAgregar');

    if(idcategoria > 0){
        ajaxPost("categoria_all_edit.php", llenarModal, {'idcategoria':idcategoria});
    }
        
    $('#modal_agregar').modal('show');
}

function llenarModal(json){
    console.log(json);
    var ob = json[0];

    $('#categoria').val(ob.desccategoria);

    NProgress.done();
}

function agregar_ajax(){

    if (!formValido('formAgregar')){
        modalEstatus('i', 'Favor de revisar los campos marcados en rojo.','','modal_region');
        return false;
    }

    var json = {       
        'idcategoria':    idcategoria,
        'desccategoria': $('#categoria').val()
    }
    console.log(json);

    ajaxPost("categoria_insert.php", correctoTabla, json);
}

function correctoTabla(json){
    if(json.result){
        $('.modal').modal('hide');
        modalEstatus('o', 'La operación se realizó de manera correcta.');
        llenar_tabla_ajax();        
    }else{
        modalEstatus('e', 'Ocurrio un error.');        
    }

    NProgress.done();
}

function modalBorrarFN(id){
    console.log(id)
    $('#btn_delete').attr('onclick', 'deleteRegistro(' + id + ')');

    $('#modal_borrar').modal('show');
}

function deleteRegistro(id){
    $('#modal_borrar').modal('hide');
    ajaxPost("categoria_delete.php", correctoTabla, {'idcategoria' : id});
}
