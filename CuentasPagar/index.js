var idProveedor = -1;
var jsonPartida = '';
var tipoarticulo = '';
var idfolioordencompra='';
var cuentas = '';

$(document).ready(function() {
    mostrarInicio(false);

    dpd_region('region');
    dpd_forma_pago('forma_pago_lst')
    //validarInit('formProveedor');
    //llenar_tabla_ajax();

    /*$('#partida_mdl').keyup(function(){
        llenar_tabla(jsonPartida);
    });*/
});

function mostrarInicio(mostrar){
    if (mostrar){
        $('#panel_ini').show();
        $('#th_pago').show();
    }else{
        $('#panel_ini').hide();
        $('#th_pago').hide();
    }
}

function llenar_tabla_ajax(){
    destroyDTGen();
    $('#tbody').html('');    

    var fecha_ini = '';
    var fecha_fin = $('#fecha_fin').val();
    var region = $('#region').val();
    
    cuentas = 'facturas';

    if ( $('#pagos_programados').prop('checked') ) {        
        cuentas = 'programados';
        fecha_ini = $('#fecha_ini').val();
    }

    if ( $('#pagos_realizados').prop('checked') ) {        
        cuentas = 'realizados';
        fecha_ini = $('#fecha_ini').val();
    }
    
    var json = {
        'fecha_ini' : fecha_ini,
        'fecha_fin' : fecha_fin,
        'region' : region,
        'cuentas' : cuentas
    };

    ajaxPost("reporte_all.php", llenar_tabla, json);
}

function llenar_tabla(json){
    destroyDTGen();
    $('#tbody').html('');    
    var string = '';

    var head = '<tr><th>Folio</th>' +
    '<th>Fecha Orden</th>' +
    '<th>Proveedor</th>' +
    '<th>Importe</th>' +
    '<th>Fecha Factura</th>' +
    '<th>Fecha Vence</th>' +
    '<th>Fecha Pago Programado</th>';
    if ( ! $('#factura_vencida').prop('checked') ) {
        head += '<th id="th_pago">Fecha Pago</th>'
    }
    head += '<th>Acciones</th> </tr>';

    for (let i in json) {
        var ob = json[i];
        
            string += '<tr>';

            string += '<td>';
            string += ob.folioordencompra;
            string += '</td>';

            string += '<td>';
            string += fechaEspanol(ob.fechaorden);
            string += '</td>';        

            string += '<td>';
            string += ob.nombreproveedor;
            string += '</td>';

            string += '<td>';
            string += toMoney(ob.importetotal);
            string += '</td>';

            string += '<td>';     
            string += fechaEspanol(ob.fechafactura);
            string += '</td>';

            string += '<td>';     
            string += fechaEspanol(ob.fechavencimiento);
            string += '</td>';
            
            string += '<td>';
            string += fechaEspanol(ob.fechapagoprogramado);
            string += '</td>';
            
            if ( ! $('#factura_vencida').prop('checked') ) {
                string += '<td>';
                string += fechaEspanol(ob.fechapagado);
                string += '</td>';
            }
            string += '<td>';
            if ( $('#factura_vencida').prop('checked')) {  
                string += '<button class="ui basic green icon button" data-tooltip="Programar Pago" onclick="redireccionarFactura(' + ob.idordencomprafactura +')";><i class="money bill icon outline"></i></button>'; 
            }else if($('#pagos_programados').prop('checked')){
                string += '<button class="ui basic green icon button" data-tooltip="Entregar" onclick="redireccionarPago(' + ob.idordencomprafactura +');"><i class="money bill icon outline"></i></button>';
            }
            string += '</td>';
            string += '</tr>';
    }
    $('#thead').html(head);
    $('#tbody').html(string);
    toDataTableGen();
    NProgress.done();
}

function redireccionarFactura(folioordencompra){
    idfolioordencompra = folioordencompra
    $('#modal_programar_pago').modal('show');
}

function redireccionarPago(folioordencompra){
    idfolioordencompra = folioordencompra
    $('#modal_aplicar_pago').modal('show');
}

function agregar_pago_programado_ajax(){
    var fecha = $('#fecha_pago_programado').val();
    var json = {
        'id' : idfolioordencompra,
        'fecha_programado' : fecha
    };
    ajaxPost("pagos.php", correct, json);
}

function aplicar_pago_ajax(){
    var fecha = $('#fecha_pago').val();
    var idpago = $('#forma_pago_lst').val();
    var referencia = $('#referencia').val();
    var observaciones = $('#observaciones').val();

    var json = {
        'id' : idfolioordencompra,
        'fecha_pago' : fecha,
        'idformapago' : idpago,
        'referencia' : referencia,
        'observaciones' : observaciones
    };
    ajaxPost("aplicar_pago.php", correct, json);
}

function correct(json){
    console.log(json);
    if(json.result){
        $('.modal').modal('hide');
        modalEstatus('o', 'La operación se realizó de manera correcta.');
        llenar_tabla();    
    }else{
        modalEstatus('e', 'Ocurrio un error.');        
    }

    NProgress.done();
}