var idempresa = -1;

$(document).ready(function() {    
    validarInit('formAgregar');
    llenar_tabla_ajax();

});

function llenar_tabla_ajax(){
    destroyDTGen();
    $('#tbody').html('');
    
    ajaxPost("empresa_all.php", llenar_tabla);
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
            string += ob.nombrecorto;
            string += '</td>';

            string += '<td>';
            string += ob.ciudad;
            string += '</td>';      
            
            string += '<td>';
            string += ob.descestado;
            string += '</td>'; 

            string += '<td>';     
            string += '<button class="ui basic green icon button" data-tooltip="Editar" onclick="mostrarModal(' + ob.idempresaoutsourcing + ');"><i class="edit icon"></i></button>';   
            string += '<button class="ui basic red icon button" data-tooltip="Eliminar" onclick="modalBorrarFN(' + ob.idempresaoutsourcing + ');"><i class="close icon"></i></button>';            
            string += '</td>';

            string += '</tr>';    
    }
    $('#tbody').html(string);
    toDataTableGen();
    NProgress.done();
}

function mostrarModal(id, value = ''){
    idempresa = id;
    dpd_estado('estado','municipio');

    clearForm('formAgregar');

    if(idempresa > 0){
        ajaxPost("empresa_all_edit.php", llenarModal, {'idempresa':idempresa});
    }
        
    $('#modal_agregar').modal('show');
}

function llenarModal(json){
    console.log(json);
    var ob = json[0];

    $('#nombre').val(ob.nombreempresa);
    $('#nombrecorto').val(ob.nombrecorto);
    $('#domicilio').val(ob.domicilio);
    $('colonia1').val(ob.colonia);
    $('#ciudad').val(ob.ciudad);
    $('#municipio').val(ob.idmunicipio).change();
    $('#estado').val(ob.idestado).change();
    $('#contacto').val(ob.personacontacto);
    $('#telefono').val(ob.telefonocontacto);
    $('#correo').val(ob.correoelectronico);

    NProgress.done();
}

function agregar_ajax(){

    if (!formValido('formAgregar')){
        modalEstatus('i', 'Favor de revisar los campos marcados en rojo.','','modal_region');
        return false;
    }

    var json = {       
        'idempresa':    idempresa,
        'nombreEmpresa': $('#nombre').val(),
        'nombreCorto': $('#nombrecorto').val(),
        'domicilio': $('#domicilio').val(),
        'colonia': $('#colonia1').val(),
        'ciudad': $('#ciudad').val(),
        'idmunicipio': $('#municipio').val(),
        'idestado': $('#estado').val(),
        'contacto': $('#contacto').val(),
        'telefono': $('#telefono').val(),
        'correo': $('#correo').val()
    }
    console.log(json);

    ajaxPost("empresa_insert.php", correctoTabla, json);
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
    ajaxPost("empresa_delete.php", correctoTabla, {'idempresa' : id});
}
