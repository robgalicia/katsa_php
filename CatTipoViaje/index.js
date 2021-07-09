var idtipoviaje = -1;

$(document).ready(function() {    
    validarInit('formRegion');
    llenar_tabla_ajax();

});

function llenar_tabla_ajax(){
    destroyDTGen();
    $('#tbody').html('');
    
    ajaxPost("viaje_all.php", llenar_tabla);
}

function llenar_tabla(json){
    destroyDTGen();
    $('#tbody').html('');
    var string = '';

    for (let i in json) {
        var ob = json[i];
            string += '<tr>';

            string += '<td>';
            string += ob.idtipoviaje;
            string += '</td>';

            string += '<td>';
            string += ob.desctipoviaje;
            string += '</td>';        

            string += '<td>';     
            string += '<button class="ui basic green icon button" data-tooltip="Editar" onclick="mostrarModal(' + ob.idtipoviaje + ');"><i class="edit icon"></i></button>';   
            string += '<button class="ui basic red icon button" data-tooltip="Eliminar" onclick="modalBorrarFN(' + ob.idtipoviaje + ');"><i class="close icon"></i></button>';            
            string += '</td>';

            string += '</tr>';    
    }
    $('#tbody').html(string);
    toDataTableGen();
    NProgress.done();
}

function mostrarModal(id){
    console.log(id);
    idtipoviaje = id;

    clearForm('formRegion');

    if(idtipoviaje > 0){
        ajaxPost("viaje_all_edit.php", llenarModal, {'idtipoviaje':idtipoviaje});
    }
        
    $('#modal_region').modal('show');
}

function llenarModal(json){
    console.log(json);
    var ob = json[0];

    $('#desc_tipoviaje').val(ob.desctipoviaje);

    NProgress.done();
}

function agregar_ajax(){

    if (!formValido('formRegion')){
        modalEstatus('i', 'Favor de revisar los campos marcados en rojo.','','modal_region');
        return false;
    }

    var json = {       
        'idtipoviaje':    idtipoviaje,
        'desctipoviaje': $('#desc_tipoviaje').val()
    }

    ajaxPost("viaje_insert.php", correctoTabla, json);
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
    ajaxPost("viaje_delete.php", correctoTabla, {'idtipoviaje' : id});
}
