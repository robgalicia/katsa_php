$(document).ready(function() {    
    llenar_tabla_ajax();
    validarInit("formRegion");
});

function llenar_tabla_ajax(){
    ajaxPost("region_all.php", llenar_tabla,{});
}

var idregion_g = -1;

function llenar_tabla(json){
    var string = '';    
    console.log(json);
    for (let i in json) {
        var ob = json[i];            
        string += '<tr>';

        string += '<td>';
        string += ob.idregion;
        string += '</td>';

        string += '<td>';
        string += ob.descregion;
        string += '</td>';                                

        string += '<td>';
        string += '<button class="ui basic green icon button" onclick="mostrarModal('+ ob.idregion+', \''+ob.descregion+'\')"><i class="edit icon"></i></button>';
        string += '<button class="ui basic red icon button" onclick="eliminarModal('+ ob.idregion+', \''+ob.descregion+'\')"><i class="close icon"></i></button>';
        string += '</td>';

        string += '</tr>';
    }
    $('#tbody').html(string);
    NProgress.done();
}

function mostrarModal(idregion, descregion){
    idregion_g = idregion;
    clearForm('formRegion');

    $("#descripcion_mdl").val(descregion)
    $('#modal_region').modal('show');
}
function agregar_ajax(){
    if(!formValido("formRegion")){
        modalEstatus("i", "Favor de revisar los campos marcados en rojo.", "", "modal_region");
        return false
    }
    var json={
        "descripcion": $("#descripcion_mdl").val(),
        "id_region": idregion_g
    }
    ajaxPost("region_insert.php", correcto, json);

}

function eliminarModal(idregion, descregion){
    idregion_g = idregion;
    //clearForm('modal_borrar');

    //("#descripcion_mdl").val(descregion)
    $('#modal_borrar').modal('show');
}

function eliminar_ajax(){
    
    var json={
        "id_region": idregion_g
    }
    ajaxPost("region_delete.php", correcto, json);

}