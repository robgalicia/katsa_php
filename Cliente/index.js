$(document).ready(function() {    
    llenar_tabla_ajax();
});

function llenar_tabla_ajax(){
    destroyDTGen();
    $('#tbody').html('');    
    ajaxPost("cliente_all.php", llenar_tabla,{});    
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
        string += '<button class="ui basic green icon button" data-tooltip="Editar" onclick=\'redirect("cliente.php?idclienteG=' + ob.idcliente + '");\'><i class="edit icon"></i></button>';
        string += '<button class="ui basic green icon button" data-tooltip="Domicilios Fiscales" onclick=\'redirect("../DomicilioFiscal/index.php?idclienteG=' + ob.idcliente + '");\'><i class="address book icon"></i></button>';
        string += '<button class="ui basic green icon button" data-tooltip="Servicios" onclick=\'redirect("../ClienteServicios/index.php?id_cliente=' + ob.idcliente + '&cliente=' + ob.nombre + '");\'><i class="sitemap icon"></i></button>';
        string += '</td>';

        string += '</tr>';
    }
    $('#tbody').html(string);
    toDataTableGen();
    NProgress.done();
}