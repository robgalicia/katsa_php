$(document).ready(function() {    
    dpd_estado('estado','municipio');

    setTimeout(function () {
        cargar_datos()
    }, 0200);

});

function cargar_datos(){
    ajaxPost("oficina_all_edit.php", llenar_datos, {});
}
        

function llenar_datos(json){    
    var ob = json[0];    

    $('#nombrecomercial').val(ob.nombrecomercial);
    $('#gironegocio').val(ob.gironegocio);
    $('#calle').val(ob.calle);
    $('#numeroext').val(ob.numeroext);
    $('#numeroint').val(ob.numeroint);
    $('#entrecalles').val(ob.entrecalles);
    $('#colonia').val(ob.colonia);
    $('#ciudad').val(ob.ciudad);
    $('#codigopostal').val(ob.codigopostal);
    $('#estado').val(ob.idestado).change();
    $('#municipio').val(ob.idmunicipio).change();
    $('#telefono').val(ob.telefono);
    $('#nombreoficina').val(ob.nombreoficina);
    $('#correoelectronico').val(ob.correoelectronico);
    $('#representantelegal').val(ob.representantelegal);
    $('#sexorepresentantelegal').val(ob.sexorepresentantelegal).change();

    NProgress.done();
}

function agregar_ajax(){    

    var json = {       
        'nombrecomercial' : $('#nombrecomercial').val(),
        'gironegocio' : $('#gironegocio').val(),
        'calle' : $('#calle').val(),
        'numeroext' : $('#numeroext').val(),
        'numeroint' : $('#numeroint').val(),
        'entrecalles' : $('#entrecalles').val(),
        'colonia' : $('#colonia').val(),
        'ciudad' : $('#ciudad').val(),
        'codigopostal' : $('#codigopostal').val(),
        'estado' : $('#estado').val(),
        'municipio' : $('#municipio').val(),
        'telefono' : $('#telefono').val(),
        'nombreoficina' : $('#nombreoficina').val(),
        'correoelectronico' : $('#correoelectronico').val(),
        'representantelegal' : $('#representantelegal').val(),
        'sexorepresentantelegal' : $('#sexorepresentantelegal').val()
    }

    ajaxPost("oficina_upd.php", correcto, json);
}

function nada(json){
    console.log(json)
}