$(document).ready(function() {    
    llenar_tabla_ajax();
});

function llenar_tabla_ajax(){
    destroyDTGen();
    $('#tbody').html('');
    ajaxPost("vehiculos_all.php", llenar_tabla,{});
}

function llenar_tabla(json){
    var string = '';    

    for (let i in json) {
        var ob = json[i];            
        string += '<tr>';

        string += '<td>';
        string += ob.idvehiculo;
        string += '</td>';

        string += '<td>';
        string += ob.placas;
        string += '</td>';

        string += '<td>';
        string += ob.descmarcavehiculo + ' ' + ob.submarca;
        string += '</td>';

        string += '<td>';
        string += ob.aniomodelo;
        string += '</td>';

        string += '<td>';
        string += ob.numeconomico;
        string += '</td>';

        string += '<td>';
        string += ob.nombrecliente;
        string += '</td>';

        string += '<td>';
        string += ob.adscripcionactual;
        string += '</td>';

        string += '<td>';
        string += ob.empresa;
        string += '</td>';

        string += '<td>';
        string += ob.estatus;
        string += '</td>';

        string += '<td>';
        string += '<button class="ui basic green icon button" data-tooltip="Editar" onclick=\'redirect("vehiculos.php?idvehiculoG=' + ob.idvehiculo + '");\'><i class="edit icon"></i></button>';
        //string += '<button class="ui basic green icon button" data-tooltip="Referencias" onclick=\'redirect("../Referencias/index.php?idempleadoG=' + ob.idempleado + '");\'><i class="address book icon"></i></button>';
        //string += '<button class="ui basic green icon button" data-tooltip="Documentos" onclick=\'redirect("../Documentos/index.php?idempleadoG=' + ob.idempleado + '&nombre=' + ob.nombrecompleto + '");\'><i class="paperclip icon"></i></button>';
        string += '</td>';

        string += '</tr>';
    }
    $('#tbody').html(string);
    toDataTableGen();
    NProgress.done();
}