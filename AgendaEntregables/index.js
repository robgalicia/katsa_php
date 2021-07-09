var idagendaentregable = -1;
var puesto = '';

$(document).ready(function() {    
    validarInit('formAgregar');
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
    
    ajaxPost("agendaEntregable_all.php", llenar_tabla, json);
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
            string += '<button class="ui basic red icon button" data-tooltip="Eliminar" onclick="modalBorrarFN(' + ob.idagendaentregable + ');"><i class="close icon"></i></button>';            
            string += '</td>';

            string += '</tr>';    
    }
    $('#tbody').html(string);
    toDataTableGen();
    NProgress.done();
}

function mostrarModal(id){

    idagendaentregable = id;
    var entregable = $( "#entregable option:selected" ).text();

    clearForm('formAgregar');

    if(idagendaentregable > 0){
        ajaxPost("agendaentregable_all_edit.php", llenarModal, {'idagendaentregable':idagendaentregable});
    }else{
        $('#mdl_entregable').val(entregable);
    }
        
    $('#modal_agregar').modal('show');
}

function mostrarModalEdit(id){

    idagendaentregable = id;
    var entregable = $( "#entregable option:selected" ).text();

    clearForm('formEditar');
    ajaxPost("agendaentregable_all_edit.php", llenarModal, {'idagendaentregable':idagendaentregable});
        
    $('#modal_editar').modal('show');
}

function llenarModal(json){
    console.log(json);
    var ob = json[0];
    $('#cantidad_edit').val(ob.cantidadentregable);
    var fecha = fechaSinHora(ob.fechacompromiso)
    $('#mdl_fecha_edit').val(fecha);

    NProgress.done();
}

function edit_ajax(){
    puesto = $("#puesto").val();
    if (!formValido('formEditar')){
        modalEstatus('i', 'Favor de revisar los campos marcados en rojo.','','modal_region');
        return false;
    }

    var json = {    
        'pidagendaentregable' : idagendaentregable,
        'pfechacompromiso' :$("#mdl_fecha_edit").val(),
        'pcantidadentregable': $('#cantidad_edit').val()
        
    }
    console.log(json);

    ajaxPost("agendaentregable_upd.php", correctoTabla, json);
}

function agregar_ajax(){
    
    puesto = $("#puesto").val();
    var entregable = $("#entregable").val();
    if (!formValido('formAgregar')){
        modalEstatus('i', 'Favor de revisar los campos marcados en rojo.','','modal_region');
        return false;
    }

    var TipoEvento = 'U'; //-- U-Evento Único, R-Repetir Evento
    if ( $('#rbTipoEvento2').prop('checked') ) TipoEvento = 'R';

    var OpcionRepetirEvento = 1;//-- 1-Todos los días del año, 2-Cada día laborable (lunes a viernes), 3-Cada semana, 4-Cada mes
            if ( $('#rbRepetirEvento2').prop('checked') ) OpcionRepetirEvento = 2;
            if ( $('#rbRepetirEvento3').prop('checked') ) OpcionRepetirEvento = 3;
            if ( $('#rbRepetirEvento4').prop('checked') ) OpcionRepetirEvento = 4;

        var Domingo = 0//-- 0-No, 1-Si 
        if ( $('#chkDomingo').prop('checked') ) Domingo = 1;

        var Lunes = 0//-- 0-No, 1-Si 
        if ( $('#chkLunes').prop('checked') ) Lunes = 1;

        var Martes = 0//-- 0-No, 1-Si 
        if ( $('#chkMartes').prop('checked') ) Martes = 1;

        var Miercoles = 0//-- 0-No, 1-Si 
        if ( $('#chkMiercoles').prop('checked') ) Miercoles = 1;

        var Jueves = 0//-- 0-No, 1-Si 
        if ( $('#chkJueves').prop('checked') ) Jueves = 1;

        var Viernes = 0//-- 0-No, 1-Si 
        if ( $('#chkViernes').prop('checked') ) Viernes = 1;

        var Sabado = 0//-- 0-No, 1-Si 
        if ( $('#chkSabado').prop('checked') ) Sabado = 1;

        var CadaMes = 1//-- 1-Mismo día del mes, 2-Primer día martes del mes
        if ( $('#rbCadaMes2').prop('checked') ) CadaMes = 2;
    var json = {    
        'pidpuesto' : puesto,
        'pidentregable' :$("#entregable").val(),
        'pcantidadentregable': $('#cantidad').val(),
        'pfechaini': $('#mdl_fecha').val(),
        'pfechafin':$('#mdl_fechafin').val(),
        'pTipoEvento':TipoEvento,
        'pOpcionRepetirEvento':OpcionRepetirEvento,
        'pDomingo':Domingo,
        'pLunes':Lunes,
        'pMartes':Martes,
        'pMiercoles':Miercoles,
        'pJueves':Jueves,
        'pViernes':Viernes,
        'pSabado':Sabado,
        'pCadaMes':CadaMes,
        
    }
    console.log(json);

    ajaxPost("agendaentregable_insert.php", correctoTabla, json);
}

function correctoTabla(json){
    console.log("correcto");
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
    ajaxPost("agendaentregable_delete.php", correctoTabla, {'pidagendaentregable' : id});
}