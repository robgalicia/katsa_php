var pagina = 'solicitudGastos';
var region;
var departamento;
var idadscripcion=0;

$(document).ready(function() {
    dpd_departamento('departamento');
    dpd_region('region');
    
    var fechaActual = obtenerFechaCampo();
    fechaActual = fechaActual.split('-');

    $('#anio').val( fechaActual[0] );
    $('#mes').val( fechaActual[1] ).change();

    setTimeout(function () {
        $('#departamento').val(getDepartamento());
        $('#region').val(getRegion());
        idadscripcion = getAdscripcion();
        llenar_tabla_ajax(false);
    }, 1000);
});

function redireccionar(id,edit,status){
    console.log(status);
    if(edit==1){
        console.log("edit");
        if(status!=26){
            if(status!=15){
                modalEstatus('i', 'La solicitud ya no se puede editar');
                return false;
            }
            
        }
    }
    
    var departamento = $('#departamento').val();
    var region = $('#region').val();

    var link = 'agregar_solicitud.php?idsoli=' + id + '&dpo=' + departamento + '&region=' + region + '&edit=' +edit + '&adsc=' + idadscripcion;

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
        'estatus' : 'T'
    
    }
    console.log(json);
    if (boton){
        setLS( pagina , JSON.stringify(json) );

    }else{
        json_aux = cargar_tabla_guardada(pagina)
        console.log(json_aux);

        if (json_aux != -1) {
            json = json_aux
            $('#region').val(json.idregion)
            $('#departamento').val(json.iddepartamento)
            $('#anio').val(json.anio)
            $('#mes').val(json.mes)
            console.log(json);
        }

    }    

    ajaxPost("solicitud_all.php", llenar_tabla, json);
}

function llenar_tabla(json){
    var string = '';    

    for (let i in json) {
        var ob = json[i];            
        string += '<tr>';

        string += '<td>';
        string += ob.idgastoscomprobar;
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
        string += fechaEspanol(ob.fechaautorizacion,false,true);
        string += '</td>';

        string += '<td>';
        string += fechaEspanol(ob.fechacancelacion,false,true);
        string += '</td>';

        string += '<td>';
        string += toMoney(ob.importetotal);
        string += '</td>';

        string += '<td>';
        string += ob.tipogasto;
        string += '</td>';

        string += '<td>';
        string += ob.descestatus;
        string += '</td>';

        string += '<td>';
        string += '<button class="ui basic green icon button" data-tooltip="Editar" onclick="redireccionar(' + ob.idgastoscomprobar  +','+ 1 +' ,' + ob.idestatus +')";><i class="edit icon"></i></button>';
        string += '<button class="ui basic green icon button" data-tooltip="Ver Detalle" onclick="redireccionar(' + ob.idgastoscomprobar +','+ 0 +','+0+')";><i class="list icon"></i></button>';
        string += '<button class="ui basic red icon button" data-tooltip="Eliminar" onclick="modalBorrarFN(' + ob.idgastoscomprobar + ');"><i class="close icon"></i></button>';
        string += '</td>';

        string += '</tr>';
    }
    console.log(string);
    $('#tbody').html(string);
    toDataTableGen();
    NProgress.done();
}

function modalBorrarFN(id){
    console.log(id)
    $('#btn_delete').attr('onclick', 'deletearticulo(' + id + ')');

    $('#modal_borrar').modal('show');
}

function deletearticulo(id){
    $('#modal_borrar').modal('hide');
    ajaxPost("solicitud_delete.php", llenar_tabla_ajax, {'idsolicitud' : id});
}
