var pagina = 'solicitud';
var region;
var departamento;

var idtraslado = 0;

$(document).ready(function() {
    validarInit('formSolicitud'); 
    dpd_traslado('ruta_traslado');
    $('#folio').attr('disabled',true);
    var fechaActual = obtenerFechaCampo();
    fechaActual = fechaActual.split('-');

    $('#anio').val( fechaActual[0] );
    $('#mes').val( fechaActual[1] ).change();

    setTimeout(function () {
        llenar_tabla_ajax(false);
    }, 1000);
});

function llenar_tabla_ajax(boton = true){
    destroyDTGen();
    $('#tbody').html('');

    var json = {
        'anio' : $('#anio').val(),
        'mes' : $('#mes').val(),  
    }

    if (boton){

        setLS( pagina , JSON.stringify(json) );

    }else{

        json_aux = cargar_tabla_guardada(pagina)

        if (json_aux != -1) {
            json = json_aux
            $('#anio').val(json.anio)
            $('#mes').val(json.mes)
        }

    }    

    ajaxPost("solicitudt_all.php", llenar_tabla, json);
}

function llenar_tabla(json){
    console.log(json);
    destroyDTGen();
    $('#tbody').html('');
    var string = '';

    for (let i in json) {
        var ob = json[i];
            string += '<tr>';

            string += '<td class="two wide field">';
            string += ob.folio;
            string += '</td>';

            string += '<td class="two wide field">';
            string += fechaEspanol(ob.fechaservicio,false,false);
            string += '</td>';  

            string += '<td>';
            string += ob.solicitante;
            string += '</td>'; 

            string += '<td>';
            string += ob.empresa;
            string += '</td>'; 

            string += '<td>';
            string += ob.tiposervicio;
            string += '</td>'; 

            string += '<td>';
            string += ob.descrutatraslado;
            string += '</td>'; 

            string += '<td>';     
            string += '<button class="ui basic green icon button" data-tooltip="Editar" onclick="mostrarModal(' + ob.idtraslado + ');"><i class="edit icon"></i></button>';   
            string += '<button class="ui basic red icon button" data-tooltip="Eliminar" onclick="modalBorrarFN(' + ob.idtraslado + ');"><i class="close icon"></i></button>';            
            string += '</td>';

            string += '</tr>';    
    }
    $('#tbody').html(string);
    toDataTableGen();
    NProgress.done();
}

function mostrarModal(id){
    clearForm('formSolicitud');
    console.log(id)
    idtraslado = id;

    if(id>0){
        ajaxPost("solicitudt_all_edit.php", llenar_modal, {'idtraslado' : id});
    }

    $('#modal_solicitud').modal('show');
    NProgress.done();
}

function llenar_modal(json){
    var ob = json[0];

    $('#folio').val(ob.folio);
    $('#fecha_servicio').val(fechaSinHora(ob.fechaservicio));
    $('#solicitante').val(ob.solicitante);
    $('#empresa').val(ob.empresa);
    $('#tipo_servicio').val(ob.tiposervicio).change();
    $('#ruta_traslado').val(ob.idrutatraslado).change();
    $('#observaciones').val(ob.observaciones);


    if(ob.estraslado == 'S'){
        $('#capTraslado_si').prop('checked',true)
    }else{
        $('#capTraslado_no').prop('checked',true)
    }   
    
    if(ob.escordillera == 'S'){
        $('#capCordillera_si').prop('checked',true)
    }else{
        $('#capCordillera_no').prop('checked',true)
    }  

    if(ob.esavanzada == 'S'){
        $('#capAvanzada_si').prop('checked',true)
    }else{
        $('#capAvanzada_no').prop('checked',true)
    }  
}

function agregar_ajax(){
    
    if (!formValido('formSolicitud')){
        modalEstatus('i', 'Favor de revisar los campos marcados en rojo.','','modal_solicitud');
        return false;
    }

    var capCordillera = 'N';

    if( $('#capCordillera_si').prop('checked') ){
        capCordillera = 'S';
    }

    var capAvanzada = 'N';

    if( $('#capAvanzada_si').prop('checked') ){
        capAvanzada = 'S';
    }

    var capTraslado = 'N';

    if( $('#capTraslado_si').prop('checked') ){
        capTraslado = 'S';
    }

    var json = {       
        'pidtraslado':    idtraslado,
        'pfechaservicio': $('#fecha_servicio').val(),
        'psolicitante': $('#solicitante').val(),
        'pempresa': $('#empresa').val(),
        'ptiposervicio': $('#tipo_servicio').val(),
        'pidrutatraslado': $('#ruta_traslado').val(),
        'pestraslado': capTraslado,
        'pescordillera': capCordillera,
        'pesavanzada': capAvanzada,
        'pobservaciones': $('#observaciones').val()
    }
    console.log(json);

    ajaxPost("solicitudt_ins.php", correctoTabla, json);
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
    ajaxPost("solicitudt_del.php", correctoTabla, {'idtraslado' : id});
}
