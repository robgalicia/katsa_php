var idclienteG = -1;
$(document).ready(function() {

    idclienteG = $.get("idclienteG");

    validarInit('formGenerales');
    
    
    dpd_estado('estado','municipio');    

    if(idclienteG > 0){
        cargar_datos_ajax();
    }else{        
        $('#estado').val(28).change();
        $('#municipio').val(41).change();
    }

});

function validateForms(){
    
    if ( formValido('formGenerales') ){
        return true;
    }else{
        return false;
    }
        
}

function cargar_datos_ajax(){
    var json = {
        'idcliente' : idclienteG
    }

    ajaxPost("cliente_edit_all.php", cargar_datos, json);
}

function cargar_datos(json){
    var ob = json[0];

    console.log(json);

    $('#nombre').val(ob.nombre);
    $('#ciudad').val(ob.ciudad);
    $('#nombre_comercial').val(ob.nombrecomercial);
    $('#cp').val(ob.codigopostal);
    $('#calle').val(ob.calle);
    $('#rfc').val(ob.rfc);
    $('#num_ext').val(ob.numexterior);
    $('#persona_contacto').val(ob.personacontacto);
    $('#num_int').val(ob.numinterior);
    $('#telefono_contacto').val(ob.telefonocontacto);
    $('#colonia').val(ob.colonia);
    $('#cveusocfdi').val(ob.cveusocfdi);
    $('#email').val(ob.correoelectronico);
    $('#estado').val(ob.idestado).change();
    $('#municipio').val(ob.idmunicipio).change();

    $('#porcentajeiva').val(ob.porcentajeiva);
    
    NProgress.done();
}

function agregar_empleado_ajax(){

    if(!validateForms()){
        modalEstatus('i', 'Favor de revisar los campos marcados con rojo.');
        return false;
    }        

    //formGenerales
    var json = {
        'idcliente' : idclienteG,        
        'nombre' : $('#nombre').val(),
        'ciudad' : $('#ciudad').val(),
        'nombrecomercial' : $('#nombre_comercial').val(),
        'codigopostal' : $('#cp').val(),
        'calle' : $('#calle').val(),
        'rfc' : $('#rfc').val(),
        'numexterior' : $('#num_ext').val(),
        'personacontacto' : $('#persona_contacto').val(),
        'numinterior' : $('#num_int').val(),
        'telefonocontacto' : $('#telefono_contacto').val(),
        'colonia' : $('#colonia').val(),
        'cveusocfdi' : $('#cveusocfdi').val(),
        'porcentajeiva' : $('#porcentajeiva').val(),
        'correoelectronico' : $('#email').val(),
        'idestado' : $('#estado').val(),
        'idmunicipio' : $('#municipio').val()
    };    

    ajaxPost("cliente_insert.php", correctoTabla, json);
}

function correctoTabla(json){
    console.log(json);
    if(json.result){
        modalEstatus('o', 'La operación se realizó de manera correcta.','index.php');        
    }else{
        modalEstatus('e', 'Ocurrio un error.');        
    }

    NProgress.done();
}
