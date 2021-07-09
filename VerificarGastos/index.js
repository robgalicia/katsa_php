var pagina = 'verificarGastos';
var region;
var departamento;

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


function llenar_tabla_ajax(boton = true){
    destroyDTGen();
    $('#tbody').html('');

    var json = {
        'idregion' : $('#region').val(),
        'iddepartamento' : $('#departamento').val(),
        'anio' : $('#anio').val(),
        'mes' : $('#mes').val(),
        'estatus' : 'V'
    
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

    ajaxPost("verificar_all.php", llenar_tabla, json);
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
        string += '<button class="ui basic green icon button" data-tooltip="Ver Detalle" onclick="redireccionar(' + ob.idgastoscomprobar + ',' + 1 + ')";><i class="list icon"></i></button>';
        string += '<button class="ui basic green icon button" data-tooltip="Editar" onclick="redireccionar(' + ob.idgastoscomprobar + ',' + 0 +')";><i class="edit icon"></i></button>';
        string += '<button class="ui basic green icon button" data-tooltip="Validar" onclick="validar(' + ob.idgastoscomprobar + ');"><i class="check icon"></i></button>';
        string += '</td>';

        string += '</tr>';
    }
    $('#tbody').html(string);
    toDataTableGen();
    NProgress.done();
}

function redireccionar(id,edit){
    var departamento = $('#departamento').val();
    var region = $('#region').val();

    var link = 'validar_solicitud.php?idsoli=' + id + '&dpo=' + departamento + '&region=' + region + '&edit=' +edit;

    redirect(link);
}

function validar(id){
    console.log("validar");
    $('#btn_revisar').attr('onclick', 'revisarSolicitud(' + id + ')');
    $('#modal_revisar').modal('show');
}

function revisarSolicitud(id){
    $('#modal_revisar').modal('hide');
    ajaxPost("verificar_validar.php", correct, {'idgastoscomprobar' : id});
}

function correct(json){
    console.log(json);
    if(json.result){
        $('.modal').modal('hide');
        modalEstatus('o', 'La operación se realizó de manera correcta.');
        llenar_tabla_ajax();
    }else{
        modalEstatus('e', 'Ocurrio un error.');        
    }

    NProgress.done();
}