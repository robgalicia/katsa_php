var idautorizasolicitud_G = -1;

$(document).ready(function() {    
    validarInit('formAgregar');
    llenar_tabla_ajax();

});

function llenar_tabla_ajax(){
    destroyDTGen();
    $('#tbody').html('');
    
    ajaxPost("autorizasolicitud_all.php", llenar_tabla);
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
            string += ob.descregion;
            string += '</td>';

            string += '<td>';
            string += ob.descdepartamento;
            string += '</td>';      
            
            string += '<td>';
            string += ob.desctiposolicitud;
            string += '</td>'; 

            string += '<td>';
            string += ob.empleadorevisa;
            string += '</td>';

            string += '<td>';
            string += ob.empleadoautoriza;
            string += '</td>';

            string += '<td>';     
            string += '<button class="ui basic green icon button" data-tooltip="Editar" onclick="mostrarModal(' + ob.idautorizasolicitud + ');"><i class="edit icon"></i></button>';   
            string += '<button class="ui basic red icon button" data-tooltip="Eliminar" onclick="modalBorrarFN(' + ob.idautorizasolicitud + ');"><i class="close icon"></i></button>';            
            string += '</td>';

            string += '</tr>';    
    }
    $('#tbody').html(string);
    toDataTableGen();
    NProgress.done();
}

function mostrarModal(id){
    idautorizasolicitud_G = id;

    dpd_region('region');
    dpd_departamento('departamento');

    dpd_empleado('empleado_autoriza');
    dpd_empleado('empleado_revisa');

    clearForm('formAgregar');

    if(idautorizasolicitud_G > 0){
        ajaxPost("autorizasolicitud_all_edit.php", llenarModal, {'idautorizasolicitud':idautorizasolicitud_G});
    }
        
    $('#modal_agregar').modal('show');
}

function llenarModal(json){
    console.log(json)
    var ob = json[0];
    
    $('#region').val(ob.idregion);
    $('#empleado_revisa').val(ob.idempleadorevisa);
    $('#departamento').val(ob.iddepartamento);
    $('#empleado_autoriza').val(ob.idempleadoautoriza);
    $('#tipo_solicitud').val(ob.tiposolicitud);

    NProgress.done();
}

function agregar_ajax(){

    if (!formValido('formAgregar')){
        modalEstatus('i', 'Favor de revisar los campos marcados en rojo.','','modal_agregar');
        return false;
    }

    var json = {       
        'idautorizasolicitud': idautorizasolicitud_G,        
        'idregion' : $('#region').val(),
        'idempleadorevisa' : $('#empleado_revisa').val(),
        'iddepartamento' : $('#departamento').val(),
        'idempleadoautoriza' : $('#empleado_autoriza').val(),
        'tiposolicitud' : $('#tipo_solicitud').val()
    }    

    ajaxPost("autorizasolicitud_insert.php", correctoTabla, json);
}

function correctoTabla(json){
    console.log(json)
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
    ajaxPost("autorizasolicitud_delete.php", correctoTabla, {'idautorizasolicitud' : id});
}
