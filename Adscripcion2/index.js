$(document).ready(function() {    
    llenar_tabla_ajax();
    validarInit("formAdscripcion");
});

function llenar_tabla_ajax(){
    ajaxPost("adscripcion_all.php", llenar_tabla,{});
}

var idadscripcion_g = -1;

function llenar_tabla(json){
    var string = '';    
    console.log(json);
    for (let i in json) {
        var ob = json[i];            
        string += '<tr>';

        string += '<td>';
        string += ob.idadscripcion;
        string += '</td>';

        string += '<td>';
        string += ob.descadscripcion;
        string += '</td>';

        string += '<td>';
        string += fechaEspanol(ob.fechainicio);
        string += '</td>';

        string += '<td>';
        string += fechaEspanol(ob.fechabaja);
        string += '</td>';                                

        string += '<td>';
        string += ob.ciudad;
        string += '</td>';

        string += '<td>';
        string += ob.municipio;
        string += '</td>';

        string += '<td>';
        string += ob.estado;
        string += '</td>';

        string += '<td>';
        string += '<button class="ui basic green icon button" onclick="redirect(\'adscripcion_agregar.php?id_ad_g='+ ob.idadscripcion+'\')"><i class="edit icon"></i></button>';
        string += '<button class="ui basic red icon button" onclick="eliminarModal('+ ob.idadscripcion+')"><i class="close icon"></i></button>';
        string += '</td>';

        string += '</tr>';
    }
    $('#tbody').html(string);
    toDataTableGen();
    NProgress.done();
}

function mostrarModal(idAdscripcion, descAdscripcion){
    idadscripcion_g = idadscripcion;
    clearForm('formAdscripcion');

    $("#descripcion_mdl").val(descadscripcion)
    $('#modal_adscripcion').modal('show');
}
function agregar_ajax(){
    if(!formValido("formAdscripcion")){
        modalEstatus("i", "Favor de revisar los campos marcados en rojo.", "", "modal_adscripcion");
        return false
    }
    var json={
        "descripcion": $("#descripcion_mdl").val(),
        "id_adscripcion": idadscripcion_g
    }
    ajaxPost("adscripcion_insert.php", correcto, json);

}

function eliminarModal(idadscripcion){
    idadscripcion_g = idadscripcion;
    //clearForm('modal_borrar');

    //("#descripcion_mdl").val(descAdscripcion)
    $('#modal_borrar').modal('show');
}

function eliminar_ajax(){
    
    var json={
        "id_adscripcion": idadscripcion_g
    }
    ajaxPost("adscripcion_delete.php", correcto, json);

}