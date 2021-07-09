var idempleadoG = -1;
var idempleadoRefG = -1;

$(document).ready(function() {
    idempleadoG = $.get("idempleadoG");

    dpd_estado('estado','',false);
    dpd_parentesco('parentesco');

    validarInit('formReferencia');

    llenar_tabla_ajax();
    
});

function llenar_tabla_ajax(){
    destroyDTGen();
    $('#tbody').html('');
    ajaxPost("referencias_all.php", llenar_tabla,{'idempleado':idempleadoG});
}

function llenar_tabla(json){
    var string = '';    

    for (let i in json) {
        var ob = json[i];
        string += '<tr>';

        string += '<td>';
        string += ob.desctipoparentesco;
        string += '</td>';

        string += '<td>';
        string += ob.nombre;
        string += '</td>';

        string += '<td>';
        string += ob.telefono;
        string += '</td>';

        string += '<td>';
        string += ob.esbeneficiario;
        string += '</td>';

        string += '<td>';
        string += ob.porcentaje;
        string += '</td>';

        string += '<td>';
        string += '<button class="ui basic green icon button" onclick="nuevaReferencia(' + ob.idempleadoreferencia + ');"><i class="edit icon"></i></button>';
        string += '<button class="ui basic red icon button" onclick="modalBorrarFN(' + ob.idempleadoreferencia + ');"><i class="close icon"></i></button>';
        string += '</td>';

        string += '</tr>';
    }
    $('#tbody').html(string);
    toDataTableGen();
    NProgress.done();
}

/*function deleteReferencia(idreferencia){
    ajaxPost("referencias_delete_all.php", correcto, {'idempleadoref' : idreferencia});
}*/

function nuevaReferencia(idreferencia){
    idempleadoRefG = idreferencia;

    clearForm('formReferencia');
    $('#beneficiario_no').prop('checked',true);
    $('#estado').val(28).change();

    if(idempleadoRefG > 0){
        ajaxPost("referencias_edit_all.php", llenar_modal, {'idempleadoref' : idempleadoRefG});
    }

    $('#modal_referencia').modal('show');
}

function llenar_modal(json){
    var ob = json[0];

    $('#parentesco').val(ob.idtipoparentesco);
    $('#estado').val(ob.idestado).change();
    $('#nombre').val(ob.nombre);
    $('#telefono').val(ob.telefono);
    $('#domicilio').val(ob.domicilio);
    $('#email').val(ob.correoelectronico);
    $('#colonia').val(ob.colonia);
    $('#nacimiento').val(fechaSinHora(ob.fechanacimiento));
    $('#ciudad').val(ob.ciudad);

    $('#rfc').val(ob.rfc);
    $('#curp').val(ob.curp);

    $('#porcentaje').val(ob.porcentaje);

    if(ob.esbeneficiario == 'S'){
        $('#beneficiario_si').prop('checked',true)
    }else{
        $('#beneficiario_no').prop('checked',true)
    }    
}

function agregar_ajax(){

    if (!formValido('formReferencia')){
        modalEstatus('i', 'Favor de revisar los campos marcados con rojo.','','modal_referencia');
        return false;
    }

    var beneficiario = 'N';
    if( $('#beneficiario_si').prop('checked') ){
        beneficiario = 'S';
    }

    var json = {
    "idempleadoreferencia" : idempleadoRefG,
    "idempleado" : idempleadoG,
    "idtipoparentesco" : $('#parentesco').val(),
    "idestado" : $('#estado').val(),
    "nombre" : $('#nombre').val(),
    "telefono" : $('#telefono').val(),
    "domicilio" : $('#domicilio').val(),
    "correoelectronico" : $('#email').val(),
    "colonia" : $('#colonia').val(),
    "fechanacimiento" : $('#nacimiento').val(),
    "ciudad" : $('#ciudad').val(),
    "porcentaje" : $('#porcentaje').val(),
    "rfc" : $('#rfc').val(),
    "curp" : $('#curp').val(),
    "esbeneficiario" : beneficiario
    };

    ajaxPost("referencias_insert.php", correctoTabla, json);
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
    $('#btn_delete').attr('onclick', 'deleteReferencia(' + id + ')');

    $('#modal_borrar').modal('show');
}

function deleteReferencia(id){
    $('#modal_borrar').modal('hide');
    ajaxPost("referencias_delete_all.php", correctoTabla, {'idempleadoref' : id});
}