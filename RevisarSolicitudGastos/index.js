var idSolicitud = -1;
var aux;
var pagina = 'revisarSolicitud';

$(document).ready(function() {
    dpd_departamento('departamento');
    dpd_region('region');

    setTimeout(function () {
        $('#departamento').val(getDepartamento());
        $('#region').val(getRegion());
        llenar_tabla_ajax(false);
    }, 1000);
    
    var fechaActual = obtenerFechaCampo();
    fechaActual = fechaActual.split('-');

    $('#anio').val( fechaActual[0] );
    $('#mes').val( fechaActual[1] ).change();
});

function redireccionar(id){
    idSolicitud = id;
    //console.log("redireccionar")
    var departamento = $('#departamento').val();
    var region = $('#region').val();

    var link = 'ver_solicitud.php?idsoli=' + id + '&dpo=' + departamento + '&region=' + region;

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
        'estatus' : 'R'
    
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
    console.log(json);
    ajaxPost("r_solicitud_all.php", llenar_tabla, json);
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
        string += '<button class="ui basic green icon button" data-tooltip="Ver Detalle" onclick="redireccionar(' + ob.idgastoscomprobar + ')";><i class="list icon"></i></button>';
        string += '<button class="ui basic green icon button" data-tooltip="Aprobar" onclick="modalRevisar(' + ob.idgastoscomprobar + ');"><i class="check icon"></i></button>';
        string += '<button class="ui basic red icon button" data-tooltip="Rechazar" onclick="modalRechazar(' + ob.idgastoscomprobar + ');"><i class="close icon"></i></button>';
        //string += '<button class="ui basic green icon button" data-tooltip="Imprimir" onclick="imprimir(' + ob.idgastoscomprobar + ')";><i class="print icon"></i></button>';
        string += '</td>';

        string += '</tr>';
    }
    $('#tbody').html(string);
    toDataTableGen();
    NProgress.done();
}

function modalRevisar(id){
    if(id==0){
        aux = 1;
        id = idSolicitud;
    }
    $('#btn_revisar').attr('onclick', 'revisarSolicitud(' + id + ')');
    $('#modal_revisar').modal('show');
}

function revisarSolicitud(id){
    $('#modal_revisar').modal('hide');
    ajaxPost("r_solicitud_acept.php", correct, {'idsolicitud' : id});
}

function modalRechazar(id){
    if(id==0){
        aux = 1;
        id = idSolicitud;
    }
    //console.log(id)
    $('#btn_rechazar').attr('onclick', 'rechazarSolicitud(' + id + ')');

    $('#modal_rechazar').modal('show');
}

function rechazarSolicitud(id){
    $('#modal_rechazar').modal('hide');
    ajaxPost("r_solicitud_refuse.php", correct, {'idsolicitud' : id});
}

function correct(json){
    if(json.result){
        $('.modal').modal('hide');
        modalEstatus('o', 'La operación se realizó de manera correcta.');
        if(aux==1){
            redirect('index.php')
        }else{
            llenar_tabla_ajax();    
        }
    }else{
        modalEstatus('e', 'Ocurrio un error.');        
    }

    NProgress.done();
}

function imprimir(id){
    //console.log(json);
    //var divToPrint=document.getElementById("table");
    newWin = window.open("imprimir.html?idsolicitud="+id,"_blank","width=900,height=600");
    //newWin.document.write('<link rel="stylesheet" type="text/css" href="https://semantic-ui.com/dist/semantic.min.css">');
    //console.log(json);
    //newWin.document.write(json.html);
    setTimeout(function(){
        newWin.print();
        newWin.close();        
    }, 1000);
    NProgress.done();
}