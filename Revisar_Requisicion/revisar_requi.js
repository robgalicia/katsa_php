var articulos_G = [];
var id_requi_G = -1;

$(document).ready(function() {    
    $('.ui.accordion').accordion();

    id_requi_G = $.get("idrequi");
    dpd_cliente('cliente');
    dpd_empleado('empleado_solicita', getEmpleado() );

    ajaxPost("requi_all_detail.php", cargar_datos, {'idrequi':id_requi_G});
    
});

function cargar_datos(json){
    $('#cliente').attr('disabled',true);
    $('#tipo_reque').attr('disabled',true);
    $('#observaciones').attr('disabled',true);
    $('#adscripcion').attr('disabled',true);

    $('#centro_costos').attr('disabled',true);
    $('#tipo_entrega').attr('disabled',true);
    $('#plazo_entrega').attr('disabled',true);

    var ob = json[0];
    
    var fecha = ob.fecha.replace(' ','T')

    dpd_departamento('departamento', ob.iddepartamento );
    dpd_region('region',"adscripcion", ob.idregion );    
    $('#empleado_solicita').val(ob.idempleadosolicita);
    $('#tipo_reque').val(ob.tiporequisicion);    
    $('#observaciones').val(ob.observaciones);
    $('#cliente').val(ob.idcliente);
    $('#fecha').val(fecha);

    $('#centro_costos').val(ob.centrocostos);
    $('#tipo_entrega').val(ob.tipoentrega).change();
    $('#plazo_entrega').val(ob.plazoentrega);

    setTimeout(function () {
        $('#adscripcion').val(ob.idadscripcion).change();
    }, 0500);

    articulos_G = json
    articulos_elegidos();

    NProgress.done();
}

function revisar(){
    var json = {
        'idrequi':id_requi_G,
        'idregion':$('#region').val(),
        'iddepartamento':$('#departamento').val()
    }
    
    ajaxPost("requi_revisa.php", correcto, json);
}

function rechazar(){
    ajaxPost("requi_rechaza.php", correcto, {'idrequi':id_requi_G});
}

function articulos_elegidos(){
    destroyDT('tablePrin');
    $('#tbodyPrin').html('');        
    var string = '';
    var total = 0;

    for (let i in articulos_G) {
        var ob = articulos_G[i];
            string += '<tr>';

            string += '<td>';
            string += ob.idarticulo;
            string += '</td>';

            string += '<td>';
            string += ob.articulo;
            string += '</td>';
            
            string += '<td>';
            string += ob.cantidad;
            string += '</td>';

            string += '<td class="right aligned">';
            string += toMoney(ob.importe);
            string += '</td>';

            string += '<td class="right aligned">';
            string += toMoney(ob.total);
            string += '</td>';

            total += parseFloat(ob.total);

            string += '<td>';
            string += ob.especificaciones;
            string += '</td>';

            string += '<td>';
            string += ob.proveedor;
            string += '</td>';                        
    }
    $('#tbodyPrin').html(string);
    $('#totalPrin').text(toMoney(total));
    toDataTable('tablePrin')
    NProgress.done();
}