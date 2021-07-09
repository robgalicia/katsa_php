var pagina = 'administrar_requisicion';

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

    var link = 'administrar_requi.php?idrequi=' + id + '&dpo=' + departamento + '&region=' + region;

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
        string += fechaEspanol(ob.fechaautorizacion,false,true);
        string += '</td>';

        string += '<td>';
        string += fechaEspanol(ob.fechacancelacion,false,true);
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
        if (ob.idestatus == 11){
            string += '<button class="ui blue icon button" data-tooltip="Actualizar" onclick="redireccionar(' + ob.idrequisicion + ')";><i class="clipboard outline icon"></i></button>';
        }        
        string += '<button class="ui basic green icon button" data-tooltip="imprimir" onclick="imprimir(' + ob.idrequisicion + ')";><i class="print icon"></i></button>';
        string += '<button class="ui basic green icon button" data-tooltip="Orden de Compra" onclick="ordencompra_mdl(' + ob.idrequisicion + ',' + ob.idestatus + ')";><i class="edit icon"></i></button>';
        string += '</td>';

        string += '</tr>';
    }
    $('#tbody').html(string);
    toDataTableGen();
    NProgress.done();
}

var id_requi_G = -1;
var idestatus_G = -1;

function ordencompra_mdl(id_requi,idestatus){
    id_requi_G = id_requi;
    idestatus_G = idestatus;

    $('#modal_generar_orden').modal('show');
}

function ordencompra(){

    $('#modal_generar_orden').modal('hide');

    if (idestatus_G == 14){        
        modalEstatus('i', 'Orden de Compra generada previamente.');
        return false
    }

    if (idestatus_G != 11){        
        modalEstatus('i', 'La Requisición no ha sido Autorizada.');
        return false
    }

    ajaxPost("requi_valida_orden.php", ordencompra_requi, {'idrequi':id_requi_G});
}

function ordencompra_requi(json){
    NProgress.done();
    if (json.estatus == 'NO'){
        modalEstatus('i', json.observaciones);
        return false
    }else{
        ajaxPost("requi_ordencompra.php", correcto, {'idrequi':json.idrequi});
    }    
}

function imprimir(id_req){
    //console.log(json);
    //var divToPrint=document.getElementById("table");
    newWin = window.open("imprimir.html?idrequi="+id_req,"_blank","width=900,height=600");
    //newWin.document.write('<link rel="stylesheet" type="text/css" href="https://semantic-ui.com/dist/semantic.min.css">');
    //console.log(json);
    //newWin.document.write(json.html);
    setTimeout(function(){
        newWin.print();
        newWin.close();        
    }, 1000);
    NProgress.done();
}