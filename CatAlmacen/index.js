var idalmacen = -1;

$(document).ready(function() {    
    validarInit('formAgregar');
    llenar_tabla_ajax();
    dpd_region('region');

});

function llenar_tabla_ajax(){
    destroyDTGen();
    $('#tbody').html('');
    
    ajaxPost("almacen_all.php", llenar_tabla);
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
            string += ob.idalmacen;
            string += '</td>';

            string += '<td>';
            string += ob.descalmacen;
            string += '</td>';        

            string += '<td>';     
            string += '<button class="ui basic green icon button" data-tooltip="Editar" onclick="mostrarModal(' + ob.idalmacen + ',\'' + ob.descalmacen + '\', ' + ob.idregion + ');"><i class="edit icon"></i></button>';   
            string += '<button class="ui basic red icon button" data-tooltip="Eliminar" onclick="modalBorrarFN(' + ob.idalmacen + ');"><i class="close icon"></i></button>';            
            string += '</td>';

            string += '</tr>';    
    }
    $('#tbody').html(string);
    toDataTableGen();
    NProgress.done();
}

function mostrarModal(id, value = '', idregion){
    idalmacen = id;
    console.log(idregion);


    clearForm('formAgregar');

    if(value.length > 0){
        $('#desc_mdl').val(value);  
        $('#region').val(idregion).change();    
    }
        
    $('#modal_agregar').modal('show');
}

function agregar_ajax(){

    if (!formValido('formAgregar')){
        modalEstatus('i', 'Favor de revisar los campos marcados en rojo.','','modal_region');
        return false;
    }

    var json = {       
        'idalmacen':    idalmacen,
        'idregion': $('#region').val(),
        'descalmacen': $('#desc_mdl').val()
    }

    ajaxPost("almacen_insert.php", correctoTabla, json);
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
    ajaxPost("almacen_delete.php", correctoTabla, {'idalmacen' : id});
}
