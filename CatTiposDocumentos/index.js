var idDocumento = -1;

$(document).ready(function() {    
    validarInit('formRegion');
    llenar_tabla_ajax();

});

function llenar_tabla_ajax(){
    destroyDTGen();
    $('#tbody').html('');
    
    ajaxPost("tipoDocumentos_all.php", llenar_tabla);
}

function llenar_tabla(json){
    destroyDTGen();
    $('#tbody').html('');
    var string = '';

    for (let i in json) {
        var ob = json[i];
            string += '<tr>';

            string += '<td>';
            string += ob.idtipodocumento;
            string += '</td>';

            string += '<td>';
            string += ob.desctipodocumento;
            string += '</td>';

            string += '<td>';
            string += ob.obligatorioempleado;
            string += '</td>';

            string += '<td>';     
            string += '<button class="ui basic green icon button" data-tooltip="Editar" onclick="mostrarModal(' + ob.idtipodocumento + ');"><i class="edit icon"></i></button>';   
            string += '<button class="ui basic red icon button" data-tooltip="Eliminar" onclick="modalBorrarFN(' + ob.idtipodocumento + ');"><i class="close icon"></i></button>';            
            string += '</td>';

            string += '</tr>';    
    }
    $('#tbody').html(string);
    toDataTableGen();
    NProgress.done();
}

function mostrarModal(id){
    console.log(id);
    idDocumento = id;

    clearForm('formRegion');

    if(idDocumento > 0){
        ajaxPost("tipoDocumentos_all_edit.php", llenarModal, {'idDocumento':idDocumento});
    }
        
    $('#modal_region').modal('show');
}

function llenarModal(json){
    
    var ob = json[0];

    $('#doc_desc').val(ob.desctipodocumento);

    if(ob.obligatoriocliente == 'S'){
        $('#capCliente_si').prop('checked',true)
    }else{
        $('#capCliente_no').prop('checked',true)
    }

    if(ob.obligatorioempleado == 'S'){
        $('#capObligatorio_si').prop('checked',true)
    }else{
        $('#capObligatorio_no').prop('checked',true)
    }

    if(ob.obligatoriosnsp == 'S'){
        $('#capSnsp_si').prop('checked',true)
    }else{
        $('#capSnsp_no').prop('checked',true)
    }

    if(ob.solicitarvigencia == 'S'){
        $('#capVigencia_si').prop('checked',true)
    }else{
        $('#capVigencia_no').prop('checked',true)
    }
    NProgress.done();
}

function agregar_ajax(){

    if (!formValido('formRegion')){
        modalEstatus('i', 'Favor de revisar los campos marcados en rojo.','','modal_region');
        return false;
    }

    var capCliente = 'N';

    if( $('#capCliente_si').prop('checked') ){
        capCliente = 'S';
    }

    var capObligatorio = 'N';

    if( $('#capObligatorio_si').prop('checked') ){
        capObligatorio = 'S';
    }

    var capSnsp = 'N';

    if( $('#capSnsp_si').prop('checked') ){
        capSnsp = 'S';
    }

    var capVigencia = 'N';

    if( $('#capVigencia_si').prop('checked') ){
        capVigencia = 'S';
    }

    var json = {       
        'pidtipodocumento':    idDocumento,
        'pdesctipodocumento': $('#doc_desc').val(),
        'psolicitarvigencia': capVigencia,
        'pobligatorioempleado': capObligatorio,
        'pobligatoriosnsp': capSnsp,
        'pobligatoriocliente': capCliente
    }

    ajaxPost("tipoDocumentos_insert.php", correctoTabla, json);
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
    ajaxPost("tipoDocumentos_delete.php", correctoTabla, {'idDocumento' : id});
}
