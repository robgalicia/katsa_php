$(document).ready(function() {    
    llenar_tabla_ajax();
});

function llenar_tabla_ajax(){
    destroyDTGen();
    $('#tbody').html('');
    var nombre = $('#buscarNombre').val();
    
    ajaxPost("recursosH_all.php", llenar_tabla,{'nombre' : nombre});
    
}

function llenar_tabla(json){
    var string = '';    

    for (let i in json) {
        var ob = json[i];            
        string += '<tr>';

        string += '<td>';
        string += ob.numempleado;
        string += '</td>';

        string += '<td>';
        string += ob.nombrecompleto;
        string += '</td>';        

        string += '<td>';
        string += ob.puesto;
        string += '</td>';

        string += '<td>';
        string += ob.regionactual;
        string += '</td>';

        string += '<td>';
        string += ob.adscripcionactual;
        string += '</td>';

        string += '<td>';
        string += fechaEspanol(ob.fechaingreso);
        string += '</td>';

        string += '<td>';
        string += ob.estatus;
        string += '</td>';

        string += '<td>';
        string += fechaEspanol(ob.fechabaja);
        string += '</td>';

        string += '<td>';
        string += '<div class="ui buttons">';
        string += '<button class="ui basic green icon button" data-tooltip="Editar" onclick=\'redirect("recursosH.php?idempleadoG=' + ob.idempleado + '");\'><i class="edit icon"></i></button>';
        string += '<button class="ui basic green icon button" data-tooltip="Referencias" onclick=\'redirect("../Referencias/index.php?idempleadoG=' + ob.idempleado + '");\'><i class="address book icon"></i></button>';
        string += '<button class="ui basic green icon button" data-tooltip="Documentos" onclick=\'redirect("../Documentos/index.php?idempleadoG=' + ob.idempleado + '&nombre=' + ob.nombrecompleto + '");\'><i class="paperclip icon"></i></button>';
        string += '<button class="ui basic green icon button" data-tooltip="Ficha del Empleado" onclick=\'redirect("../FichaEmpleado/index.php?idempleadoG=' + ob.idempleado + '");\'><i class="file icon"></i></button>';
        string += '</div>';
        string += '</td>';

        string += '</tr>';
    }
    $('#tbody').html(string);
    toDataTableGen();
    NProgress.done();
}