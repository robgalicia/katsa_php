var id_servicio_G = -1;

$(document).ready(function() {    
    validarInit('formAgregar');
    dpd_tipomoneda('moneda_mdl');
    // llenar_tabla_ajax();

});

function llenar_tabla_ajax(){
    destroyDTGen();
    $('#tbody').html('');

    var servicio = $('#servicio').val();

    var json = {
        'servicio':servicio
    };
    
    ajaxPost("servicios_all.php", llenar_tabla, json);
}

function llenar_tabla(json){
    destroyDTGen();
    $('#tbody').html('');
    var string = '';

    for (let i in json) {
        var ob = json[i];
            string += '<tr>';

            string += '<td>';
            string += ob.idservicio;
            string += '</td>';

            string += '<td>';
            string += ob.descripcioncorta;
            string += '</td>';

            string += '<td>';
            string += toMoney(ob.preciounitario);
            string += '</td>';

            string += '<td>';
            string += ob.desctipomoneda;
            string += '</td>';

            string += '<td>';     
            string += '<button class="ui basic green icon button" data-tooltip="Editar" onclick="mostrarModal(' + ob.idservicio + ');"><i class="edit icon"></i></button>';   
            string += '<button class="ui basic red icon button" data-tooltip="Eliminar" onclick="modalBorrarFN(' + ob.idservicio + ');"><i class="close icon"></i></button>';            
            string += '</td>';

            string += '</tr>';    
    }
    $('#tbody').html(string);
    toDataTableGen();
    NProgress.done();
}

function mostrarModal(id){
    id_servicio_G = id;

    clearForm('formAgregar');

    if(id_servicio_G > 0){
        ajaxPost("servicios_all_edit.php", llenarModal, {'idservicio':id_servicio_G});
    }
    
        
    $('#modal_agregar').modal('show');
}

function llenarModal(json){
    
    var ob = json[0];

    $('#desc_mdl').val(ob.descripcioncorta);
    $('#desc_detallada_mdl').val(ob.descservicio);
    $('#precio_mdl').val( toMoney(ob.preciounitario) );
    $('#moneda_mdl').val(ob.idtipomoneda).change();

    NProgress.done();
}

function agregar_ajax(){

    if (!formValido('formAgregar')){
        modalEstatus('i', 'Favor de revisar los campos marcados en rojo.','','modal_agregar');
        return false;
    }

    var json = {       
        'idservicio':       id_servicio_G,
        'desc':             $('#desc_mdl').val(),
        'desc_detallada':   $('#desc_detallada_mdl').val(),
        'precio':           quitarComas( $('#precio_mdl').val() ),
        'moneda':           $('#moneda_mdl').val(),
    }

    ajaxPost("servicios_insert.php", correctoTabla, json);
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
    $('#btn_delete').attr('onclick', 'deleteRegistro(' + id + ')');

    $('#modal_borrar').modal('show');
}

function deleteRegistro(id){
    $('#modal_borrar').modal('hide');
    ajaxPost("servicios_delete.php", correctoTabla, {'id_servicio' : id});
}
