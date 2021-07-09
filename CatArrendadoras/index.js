var idarrendadora = -1;

$(document).ready(function() {    
    validarInit('formAgregar');
    llenar_tabla_ajax();
    

});

function llenar_tabla_ajax(){
    destroyDTGen();
    $('#tbody').html('');
    
    ajaxPost("arrendadoras_all.php", llenar_tabla);
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
            string += ob.idarrendadora;
            string += '</td>';

            string += '<td>';
            string += ob.nombre;
            string += '</td>';        

            string += '<td>';     
            string += '<button class="ui basic green icon button" data-tooltip="Editar" onclick="mostrarModal(' + ob.idarrendadora + ',\'' + ob.nombre + '\');"><i class="edit icon"></i></button>';   
            string += '<button class="ui basic red icon button" data-tooltip="Eliminar" onclick="modalBorrarFN(' + ob.idarrendadora + ');"><i class="close icon"></i></button>';            
            string += '</td>';

            string += '</tr>';    
    }
    $('#tbody').html(string);
    toDataTableGen();
    NProgress.done();
}

function mostrarModal(id, value = ''){
    idarrendadora = id;
    dpd_estado('estado','municipio');

    clearForm('formAgregar');

    if(idarrendadora>0){
        ajaxPost("arrendadoras_all_edit.php", llenarModal, {'idarrendadora':idarrendadora});
    }
    
        
    $('#modal_agregar').modal('show');
}

function llenarModal(json){
    console.log(json);
    var ob = json[0];

    $('#nombre').val(ob.nombre);
    $('#calle').val(ob.calle);
    $('#numext').val(ob.numexterior);
    $('#numint').val(ob.numinterior);
    $('#colonia').val(ob.colonia);
    $('#ciudad').val(ob.ciudad);
    $('#municipio').val(ob.idmunicipio).change();
    $('#estado').val(ob.idestado).change();
    $('#cp').val(ob.codigopostal);
    $('#rfc').val(ob.rfc);
    $('#contacto').val(ob.personacontacto);
    $('#tel').val(ob.telefonocontacto);
    $('#correo').val(ob.correoelectronico);
    NProgress.done();
}


function agregar_ajax(){

    if (!formValido('formAgregar')){
        modalEstatus('i', 'Favor de revisar los campos marcados en rojo.','','modal_region');
        return false;
    }

    var json = {       
        'pidarrendadora':    idarrendadora,
        'pnombre': $('#nombre').val(),
        'pcalle': $('#calle').val(),
        'pnumexterior': $('#numext').val(),
        'pnuminterior': $('#numint').val(),
        'pcolonia': $('#colonia').val(),
        'pciudad': $('#ciudad').val(),
        'pidmunicipio': $('#municipio').val(),
        'pidestado': $('#estado').val(),
        'pcodigopostal': $('#cp').val(),
        'prfc': $('#rfc').val(),
        'ppersonacontacto': $('#contacto').val(),
        'ptelefonocontacto': $('#tel').val(),
        'pcorreoelectronico': $('#correo').val(),
    }

    ajaxPost("arrendadoras_insert.php", correctoTabla, json);
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
    ajaxPost("estadocivil_delete.php", correctoTabla, {'idarrendadora' : id});
}
