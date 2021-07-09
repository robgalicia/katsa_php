var idadscripcion = -1;

$(document).ready(function() {    
    validarInit('formAgregar');
    llenar_tabla_ajax();

});

function llenar_tabla_ajax(){
    destroyDTGen();
    $('#tbody').html('');
    
    ajaxPost("adscripcion_all.php", llenar_tabla);
}

function llenar_tabla(json){
    // console.log(json);
    destroyDTGen();
    $('#tbody').html('');
    var string = '';

    for (let i in json) {
        var ob = json[i];
            string += '<tr>';

            string += '<td>';
            string += ob.descadscripcion;
            string += '</td>';

            string += '<td>';
            string += ob.region;
            string += '</td>';      
            
            string += '<td>';
            string += fechaEspanol(ob.fechainicio);
            string += '</td>'; 

            string += '<td>';
            string += fechaEspanol(ob.fechabaja);
            string += '</td>'; 

            string += '<td>';     
            string += '<button class="ui basic green icon button" data-tooltip="Editar" onclick="mostrarModal(' + ob.idadscripcion + ');"><i class="edit icon"></i></button>';   
            string += '<button class="ui basic red icon button" data-tooltip="Eliminar" onclick="modalBorrarFN(' + ob.idadscripcion + ');"><i class="close icon"></i></button>';            
            string += '</td>';

            string += '</tr>';    
    }
    $('#tbody').html(string);
    toDataTableGen();
    NProgress.done();
}

function mostrarModal(id, value = ''){
    idadscripcion = id;
    dpd_estado('estado','municipio');
    dpd_region('region');

    clearForm('formAgregar');

    if(idadscripcion > 0){
        ajaxPost("adscripcion_all_edit.php", llenarModal, {'idadscripcion':idadscripcion});
    }
        
    $('#modal_agregar').modal('show');
}

function llenarModal(json){    
    var ob = json[0];

    $('#desc').val(ob.descadscripcion);
    $('#ubicacion').val(ob.ubicacion);
    $('#region').val(ob.idregion).change();
    $('#fechaini').val(fechaSinHora(ob.fechainicio));
    $('#ciudad').val(ob.ciudad);
    $('#municipio').val(ob.idmunicipio).change();
    $('#estado').val(ob.idestado).change();
    $('#fechabaj').val(fechaSinHora(ob.fechabaja));
    $('#numext').val(ob.calle);
    $('#numint').val(ob.calle);
    $('#entrecalle').val(ob.entrecalle);
    $('#ycalle').val(ob.ycalle);
    $('#colonia').val(ob.colonia);
    $('#cp').val(ob.codigopostal);
    $('#contacto').val(ob.personacontacto);
    $('#telefono').val(ob.telefonocontacto);
    $('#correo').val(ob.correoelectronico);
    $('#kms').val(ob.distanciakms);

    NProgress.done();
}

function agregar_ajax(){

    if (!formValido('formAgregar')){
        modalEstatus('i', 'Favor de revisar los campos marcados en rojo.','','modal_agregar');
        return false;
    }

    var json = {       
        'idadscripcion':    idadscripcion,
        'descadscripcion': $('#desc').val(),
        'idregion': $('#region').val(),
        'ubicacion': $('#ubicacion').val(),
        'fechaini': $('#fechaini').val(),
        'fechabaja': $('#fechabaj').val(),
        'calle': $('#calle').val(),
        'numext': $('#numext').val(),
        'numint': $('#numint').val(),
        'entrecalle': $('#entrecalle').val(),
        'ycalle': $('#ycalle').val(),
        'colonia': $('#colonia').val(),
        'cp': $('#cp').val(),
        'ciudad': $('#ciudad').val(),
        'idmunicipio': $('#municipio').val(),
        'idestado': $('#estado').val(),
        'personacontacto': $('#contacto').val(),
        'telefono': $('#telefono').val(),
        'correo': $('#correo').val(),
        'kms': $('#kms').val()
    }
    

    ajaxPost("adscripcion_insert.php", correctoTabla, json);
}

function correctoTabla(json){
    console.log(json);
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
    ajaxPost("adscripcion_delete.php", correctoTabla, {'idadscripcion' : id});
}
