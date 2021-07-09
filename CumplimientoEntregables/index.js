var idcumplimientoentregable = -1;
var idagendaentregable = -1;

$(document).ready(function() {    
    validarInit('formEditar');
    dpd_categoria('categoria');
    dpd_puesto_depto('puesto');
    var fechaActual = obtenerFechaCampo();
    fechaActual = fechaActual.split('-');

    $('#anio').val( fechaActual[0] );
    $('#mes').val( fechaActual[1] ).change();
    
    

});

function llenar_tabla_ajax(){
    destroyDTGen();
    $('#tbody').html('');

    var puesto = $('#puesto').val();
    var categoria = $('#categoria').val();
    var mes = $('#mes').val();
    var anio = $('#anio').val();

    json = {
        'puesto':puesto,
        'categoria':categoria,
        'mes':mes,
        'anio':anio
    }
    
    ajaxPost("agendaentregable_all.php", llenar_tabla, json);
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
            string += fechaEspanol(ob.fechacompromiso);
            string += '</td>';

            string += '<td>';
            string += ob.descentregable;
            string += '</td>';      

            string += '<td>';
            string += ob.cantidad;
            string += '</td>';  

            string += '<td>';
            string += ob.cumplidos;
            string += '</td>';  

            string += '<td>';     
            string += '<button class="ui basic green icon button" data-tooltip="Editar" onclick="mostrarModalEdit(' + ob.idagendaentregable + ');"><i class="edit icon"></i></button>';     
            string += '</td>';

            string += '</tr>';    
    }
    $('#tbody').html(string);
    toDataTableGen();
    NProgress.done();
}


function mostrarModalEdit(id){
    console.log(id);
    idagendaentregable = id;

    clearForm('formEditar');
    ajaxPost("cumplimientoentregable_all.php", llenar_tablaCumplimiento, {'idagendaentregable':idagendaentregable});
        
    $('#modal_editar').modal('show');
}

function llenarModal(json){
    console.log(json);
    var ob = json[0];
    $('#cantidad_edit').val(ob.cantidadentregada);
    var fecha = fechaSinHora(ob.fechaentrega)
    $('#mdl_fecha_edit').val(fecha);
    $('#observaciones').val(ob.observaciones);
    idcumplimientoentregable = ob.idcumplimientoentregable;

    NProgress.done();
}


function llenar_tabla_ajaxCumplimiento(){

    if (!formValido('formEditar')){
        modalEstatus('i', 'Favor de revisar los campos marcados en rojo.','','modal_editar');
        return false;
    }
    destroyDTGen();
    $('#tbodyCumplimiento').html('');

    var fechaentrega = $('#mdl_fecha_edit').val();
    var cantidad = $('#cantidad_edit').val();
    var observaciones = $('#observaciones').val();

    json = {
        'idagendaentregable':idagendaentregable,
        'fechaentrega':fechaentrega,
        'cantidadentregada':cantidad,
        'observaciones':observaciones
    }
    console.log(json);
    ajaxPost("cumplimientoentregable_ins.php", nada, json);
}

function nada(){
    ajaxPost("cumplimientoentregable_all.php", llenar_tablaCumplimiento, {'idagendaentregable':idagendaentregable});
}

function llenar_tablaCumplimiento(json){
    console.log(json);
    destroyDTGen();
    $('#tbodyCumplimiento').html('');
    var string = '';

    for (let i in json) {
        var ob = json[i];
            string += '<tr>';

            string += '<td>';
            string += fechaEspanol(ob.fechaentrega);
            string += '</td>';

            string += '<td>';
            string += ob.cantidadentregada;
            string += '</td>';      

            string += '<td>';
            string += ob.observaciones;
            string += '</td>';  

            string += '<td>';     
            string += '<button class="ui basic red icon button" data-tooltip="Borrar" onclick="modalBorrarFN(' + ob.idcumplimientoentregable + ');"><i class="close icon"></i></button>';     
            string += '</td>';

            string += '</tr>';    
    }
    $('#tbodyCumplimiento').html(string);
    toDataTableGen();
    NProgress.done();
    $('#mdl_fecha_edit').val('');
    $('#cantidad_edit').val('');
    $('#observaciones').val('');
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
    ajaxPost("cumplimientoentregable_del.php", correctoTabla, {'idcumplimientoentregable' : id});
}