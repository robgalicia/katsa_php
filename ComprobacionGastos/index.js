var idSolicitud = -1;
var aux;
var pagina='comprobacionGastos';

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
        llenar_tabla_ajax(false);
    }, 1000);
});

function redireccionar(id,tipoG){
    idSolicitud = id;
    var departamento = $('#departamento').val();
    var region = $('#region').val();


    var link = 'cargar_facturas.php?idsoli=' + id + '&dpo=' + departamento + '&region=' + region + '&tipoGasto=' + tipoG;

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
        'estatus' : 'C'
    
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
    ajaxPost("c_solicitud_all.php", llenar_tabla, json);
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
        string += fechaEspanol(ob.fecha);
        string += '</td>';

        string += '<td>';
        string += fechaEspanol(ob.fecharevision);
        string += '</td>';

        string += '<td>';
        string += fechaEspanol(ob.fechaautorizacion);
        string += '</td>';

        string += '<td>';
        string += fechaEspanol(ob.fechacomprobacion);
        string += '</td>';

        string += '<td>';
        string += fechaEspanol(ob.fechalimitecomprobacion);
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
        string += '<button class="ui basic green icon button" data-tooltip="Capturar Facturas" onclick="redireccionar(' + ob.idgastoscomprobar + ' , \'' + ob.tipogasto +'\')";><i class="list icon"></i></button>';
        string += '<button class="ui basic green icon button" data-tooltip="Terminar Comprobacion" onclick="modalRevisar(' + ob.idgastoscomprobar + ');"><i class="check icon"></i></button>';
        string += '</td>';

        string += '</tr>';
    }
    $('#tbody').html(string);
    toDataTableGen();
    NProgress.done();
}

function modalRevisar(id){
    $('#btn_terminar').attr('onclick', 'terminarComprobacion(' + id + ')');
    $('#modal_revisar').modal('show');
}

function terminarComprobacion(id){
    $('#modal_revisar').modal('hide');
    ajaxPost("c_gastos_comprobar.php", correct, {'id' : id});
}

function correct(json){
    if(json.result){
        $('.modal').modal('hide');
        modalEstatus('o', 'La operación se realizó de manera correcta.');
        llenar_tabla_ajax();    
    }else{
        modalEstatus('e', 'Ocurrio un error.');        
    }

    NProgress.done();
}


