var pagina = 'orden_compra';

$(document).ready(function() {
    dpd_departamento('departamento');
    dpd_region('region');

    var fechaActual = obtenerFechaCampo();
    fechaActual = fechaActual.split('-');

    $('#anio').val( fechaActual[0] );
    $('#mes').val( fechaActual[1] ).change();
    
    llenar_tabla_ajax(false)

});

function redireccionar(id,estatus){

    var link = 'administrar_orden.php?idorden=' + id + '&idestatus=' + estatus;

    redirect(link);
}

function redireccionarF(id,idordencomprafactura){

    var link = '../RequisicionesFactura/index.php?idorden=' + id + '&idordencomprafactura=' + idordencomprafactura;

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
        'folio' : $('#folio_requi').val()
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
            $('#folio_requi').val(json.folio)
        }

    }

    ajaxPost("orden_all.php", llenar_tabla, json);
}

function llenar_tabla(json){    

    var string = '';    

    for (let i in json) {
        var ob = json[i];            
        string += '<tr>';

        string += '<td>';
        string += ob.idordencompra;
        string += '</td>';

        string += '<td>';
        string += ob.folioordencompra;
        string += '</td>';

        string += '<td>';
        string += ob.foliorequisicion;
        string += '</td>';

        string += '<td>';
        string += fechaEspanol(ob.fechaorden,false,true);
        string += '</td>';

        string += '<td>';
        string += ob.nombreproveedor;
        string += '</td>';

        string += '<td>';
        string += toMoney(ob.importetotal);
        string += '</td>';

        string += '<td>';
        string += fechaEspanol(ob.fechafactura,false,true);
        string += '</td>';

        string += '<td>';
        string += ob.descestatus;
        string += '</td>';        

        string += '<td>';
        if(ob.idestatus != 24){
            string += '<button class="ui green icon button" data-tooltip="Confirmar" onclick="confirmar_modal(' + ob.idordencompra + ')";><i class="check icon"></i></button>';
        }        
        string += '<button class="ui basic green icon button" data-tooltip="Detalle" onclick="redireccionar(' + ob.idordencompra + ',' + ob.idestatus + ')";><i class="list icon"></i></button>';
        string += '<button class="ui basic green icon button" data-tooltip="imprimir" onclick="imprimir(' + ob.idordencompra + ')";><i class="print icon"></i></button>';
        if(ob.idestatus == 24){
            string += '<button class="ui basic blue icon button" data-tooltip="Factura" onclick="redireccionarF(' + ob.idordencompra + ',' + ob.idordencomprafactura + ')";><i class="archive icon"></i></button>';
        }        
        string += '</td>';

        string += '</tr>';
    }
    $('#tbody').html(string);
    toDataTableGen();
    NProgress.done();
}

var id_orden_G = 0;

function confirmar_modal(id_orden){
    id_orden_G = id_orden;
    $('#modal_confirmar').modal('show');
}

function confirmar(){
    ajaxPost("orden_autoriza.php", correctoMo, {'idorden':id_orden_G});
}

function correctoMo(json){
    console.log(json);
    if(json.result){
        modalEstatus('o', 'La operación se realizó de manera correcta.','index.php','modal_confirmar');
    }else{
        modalEstatus('e', 'Ocurrio un error.');        
    }

    NProgress.done();
}

function imprimir(id_orden){
    //console.log(json);
    //var divToPrint=document.getElementById("table");
    newWin = window.open("imprimir.html?idorden="+id_orden,"_blank","width=900,height=600");
    //newWin.document.write('<link rel="stylesheet" type="text/css" href="https://semantic-ui.com/dist/semantic.min.css">');
    //console.log(json);
    //newWin.document.write(json.html);
    setTimeout(function(){
        newWin.print();
        newWin.close();        
    }, 1000);
    NProgress.done();
}