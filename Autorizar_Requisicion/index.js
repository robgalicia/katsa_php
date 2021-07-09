var pagina = 'autorizar_requisicion';

$(document).ready(function() {
    dpd_departamento('departamento');
    dpd_region('region');
    
    var fechaActual = obtenerFechaCampo();
    fechaActual = fechaActual.split('-');

    $('#anio').val( fechaActual[0] );
    $('#mes').val( fechaActual[1] ).change();


    llenar_tabla_ajax(false)
});

function redireccionar(id){
    var departamento = $('#departamento').val();
    var region = $('#region').val();    

    var link = 'autorizar_requi.php?idrequi=' + id + '&dpo=' + departamento + '&region=' + region;

    redirect(link);
}

function llenar_tabla_ajax(boton = true){
    destroyDTGen();
    $('#tbody').html('');

    var json = {
        'idregion' : $('#region').val(),
        'iddepartamento' : $('#departamento').val(),
        'anio' : $('#anio').val(),
        'mes' : $('#mes').val(),
        'estatus' : 'A'
    }

    if (boton){

        setLS( pagina , JSON.stringify(json) );

    }else{

        json_aux = cargar_tabla_guardada(pagina)

        if (json_aux != -1) {
            json = json_aux
            $('#region').val(json.idregion)
            $('#departamento').val(json.iddepartamento)
            $('#anio').val(json.anio)
            $('#mes').val(json.mes)
        }

    }

    ajaxPost("requi_all.php", llenar_tabla, json);
}

function llenar_tabla(json){        

    var string = '';    

    for (let i in json) {
        var ob = json[i];            
        string += '<tr>';

        string += '<td>';
        string += ob.idrequisicion;
        string += '</td>';

        string += '<td>';
        string += ob.folio;
        string += '</td>';

        string += '<td>';
        string += fechaEspanol(ob.fecha,false,true);
        string += '</td>';

        string += '<td>';
        string += fechaEspanol(ob.fecharevision,false,true);
        string += '</td>';        

        string += '<td>';
        string += toMoney(ob.importetotal);
        string += '</td>';

        string += '<td>';
        string += ob.tiporequisicion;
        string += '</td>';

        string += '<td>';
        string += ob.descestatus;
        string += '</td>';

        string += '<td>';
        string += '<button class="ui basic green icon button" data-tooltip="Detalle" onclick="redireccionar(' + ob.idrequisicion + ')";><i class="list icon"></i></button>';
        string += '<button class="ui basic green icon button" data-tooltip="Aprobar" onclick="autorizar(' + ob.idrequisicion + ')";><i class="check icon"></i></button>';
        string += '<button class="ui basic red icon button" data-tooltip="Rechazar" onclick="rechazar(' + ob.idrequisicion + ')";><i class="close icon"></i></button>';
        string += '</td>';

        string += '</tr>';
    }
    $('#tbody').html(string);
    toDataTableGen();
    NProgress.done();
}

function autorizar(id_requi){
    ajaxPost("requi_autoriza.php", correcto, {'idrequi':id_requi});
}

function rechazar(id_requi){
    ajaxPost("requi_rechaza.php", correcto, {'idrequi':id_requi});
}