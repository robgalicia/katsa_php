var idclienteG = -1;

$(document).ready(function() {
    idclienteG = $.get("idclienteG");
    
    llenar_tabla_ajax();
});

function llenar_tabla_ajax(){
    destroyDTGen();
    $('#tbody').html('');    
    ajaxPost("domicilios_alternos_all.php", llenar_tabla,{'id_cliente':idclienteG});
}

function llenar_tabla(json){
    var string = '';    

    for (let i in json) {
        var ob = json[i];            
        string += '<tr>';

        string += '<td>';
        string += ob.nombre;
        string += '</td>';

        string += '<td>';
        string += ob.calle;
        string += '</td>';

        string += '<td>';
        string += ob.numexterior;
        string += '</td>';

        string += '<td>';
        string += ob.numinterior;
        string += '</td>';

        string += '<td>';
        string += ob.ciudad;
        string += '</td>';

        string += '<td>';
        string += ob.rfc;
        string += '</td>';

        string += '<td>';
        string += ob.personacontacto;
        string += '</td>';        

        string += '<td>';
        string += '<button class="ui basic green icon button" data-tooltip="Editar" onclick=\'redirect("domicilios_alternos.php?idclienteG=' + ob.idcliente + '&iddomiciliofiscalG=' + ob.idclientedomiciliofiscal + '");\'><i class="edit icon"></i></button>';
        //string += '<button class="ui basic green icon button" data-tooltip="Referencias" onclick=\'redirect("../Referencias/index.php?idempleadoG=' + ob.idempleado + '");\'><i class="address book icon"></i></button>';
        //string += '<button class="ui basic green icon button" data-tooltip="Documentos" onclick=\'redirect("../Documentos/index.php?idempleadoG=' + ob.idempleado + '&nombre=' + ob.nombrecompleto + '");\'><i class="paperclip icon"></i></button>';
        string += '</td>';

        string += '</tr>';
    }
    $('#tbody').html(string);
    toDataTableGen();
    NProgress.done();
}

function agregar_nuevo(){
    redirect("domicilios_alternos.php?idclienteG=" + idclienteG + "&iddomiciliofiscalG=0" )
}