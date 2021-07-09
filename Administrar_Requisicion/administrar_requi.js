var articulos_G = [];
var id_requi_G = -1;

var id_articulo_G = -1
var importe_G = -1
var proveedor_G = -1

$(document).ready(function() {    
    $('.ui.accordion').accordion();

    id_requi_G = $.get("idrequi");
    dpd_cliente('cliente');
    dpd_empleado('empleado_solicita', getEmpleado() );

    ajaxPost("requi_all_detail.php", cargar_datos, {'idrequi':id_requi_G});

    dpd_proveedor('proveedor');
    
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

    dpd_departamento('departamento', ob.iddepartamento );
    dpd_region('region',"adscripcion", ob.idregion );    
    $('#empleado_solicita').val(ob.idempleadosolicita);
    $('#tipo_reque').val(ob.tiporequisicion);    
    $('#observaciones').val(ob.observaciones);
    $('#cliente').val(ob.idcliente);
    $('#fecha').val(ob.fecha.replace(' ','T'));

    $('#empleado_revisa').val(ob.empleadorevisa);
    $('#fecha_revisa').val( ob.fecharevision.replace(' ','T') );

    $('#empleado_autoriza').val(ob.empleadoautoriza);
    $('#fecha_autoriza').val( ob.fechaautorizacion.replace(' ','T') );

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

function articulos_elegidos(){
    destroyDT('tablePrin');
    $('#tbodyPrin').html('');        
    var string = '';
    var total = 0;

    for (let i in articulos_G) {
        var ob = articulos_G[i];
        var i_aux = parseInt(i);
        
            string += '<tr>';

            string += '<td>';
            string += ob.idarticulo;
            string += '</td>';

            string += '<td>';
            string += ob.articulo;
            string += '</td>';
            
            string += '<td>';
            string += toMoney(ob.cantidad);
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

            string += '<td>';
            string += '<button class="ui basic green icon button" data-tooltip="Ver Detalle" onclick="mostrar_modal(' + ob.idarticulo + ',' + ob.importe + ',' + ob.idproveedor + ')";><i class="list icon"></i></button>';
            string += '<button class="ui basic red icon button" data-tooltip="Eliminar" onclick="borrar_elemento(' + ob.idrequisiciondetalle + ');"><i class="close icon"></i></button>';
            string += '</td>';
    }
    $('#tbodyPrin').html(string);
    $('#totalPrin').text(toMoney(total));
    toDataTable('tablePrin')
    NProgress.done();
}

function mostrar_modal(id_articulo,importe,proveedor){
    id_articulo_G = id_articulo;
    importe_G = importe;
    proveedor_G = proveedor;

    $('#precio').val(importe);
    $('#proveedor').val(proveedor).change();

    $('#modal_admin').modal('show');

}

function cambiar_articulo(){
    for (let i in articulos_G) {

        var ob = articulos_G[i];

        if(id_articulo_G == ob.idarticulo){
            //Cambiar aqui
            articulos_G[i].importe = $('#precio').val();
            articulos_G[i].idproveedor = $('#proveedor').val();
            articulos_G[i].proveedor = $( "#proveedor option:selected" ).text();

            articulos_G[i].total = articulos_G[i].importe * articulos_G[i].cantidad 

            break;
        }
    }

    articulos_elegidos();
    agregar_detalle_ajax();
    $('#modal_admin').modal('hide');
}

function agregar_detalle_ajax(){

    for(var i = 0; i < articulos_G.length; i++){

        var ob = articulos_G[i];

        var json = {
            'idrequisiciondetalle' : ob.idrequisiciondetalle,            
            'cantidad' : ob.cantidad,
            'importe' : ob.importe,
            'especificaciones' : ob.especificaciones,
            'total' : ob.total,
            'idproveedor' : ob.idproveedor
        };

        ajaxPost("requi_admin_detalle.php", nada, json);
    }
    
    //correcto({'result':true});
}

function nada(json){
    console.log(json);
    NProgress.done();
}

/*--------------------------------------------------------------------------------------*/
/*--------------------------------------------------------------------------------------*/
/*--------------------------------------------------------------------------------------*/
/*--------------------------------------------------------------------------------------*/
function mostrarModal(){
    destroyDT('tableArt');
    $('#tbodyArt').html('');    
    $('#modal_articulo').modal('show');
}

function elegir_articulo_partida_ajax(){
    destroyDT('tableArt');
    $('#tbodyArt').html('');
    
    var tipoarticulo = $('#partida').val();
    
    ajaxPost("../Requisicion/articulo_partida_all.php", elegir_articulo, {'idtipopartida': tipoarticulo});
}

function elegir_articulo_ajax(){
    destroyDT('tableArt');
    $('#tbodyArt').html('');

    var descarticulo = $('#desc_articulo').val();
    var tipoarticulo = '';

    var nombre = $('#tipo_articulo_nombre').prop('checked');
    var descripcion = $('#tipo_articulo_descripcion').prop('checked');
    var ambos = $('#tipo_articulo_ambos').prop('checked');

    if(nombre) tipoarticulo = 'N';
    if(descripcion) tipoarticulo = 'D';
    if(ambos) tipoarticulo = 'A';
    
    ajaxPost("../Articulo/articulo_all.php", elegir_articulo, {'tipoarticulo': tipoarticulo, 'descarticulo': descarticulo});
}

function elegir_articulo(json){    
    destroyDT('tableArt');
    $('#tbodyArt').html('');        
    var string = '';

    for (let i in json) {
        var ob = json[i];
            string += '<tr>';

            string += '<td>';
            string += ob.codigoarticulo;
            string += '</td>';

            string += '<td>';
            string += ob.nombrearticulo;
            string += '</td>';

            string += '<td>';
            string += '<input maxlength="100" id="' + ob.idarticulo + '_espe" />'
            string += '</td>';

            string += '<td>';
            string += '<input maxlength="4" id="' + ob.idarticulo + '_" />'
            string += '</td>';

            string += '<td class="right aligned">';
            string += '<button class="ui basic green icon button" id="btn_' + ob.idarticulo + '" data-tooltip="Seleccionar" onclick="agregar_articulo(' + ob.idarticulo + ',\'' + ob.nombrearticulo + '\',' + ob.preciocompra + ',\'' + ob.nombreproveedor + '\',' + ob.idproveedor + ');"><i class="hand pointer outline icon"></i></button>';
            string += '</td>';

            string += '</tr>';
    }
    $('#tbodyArt').html(string);    
    toDataTable('tableArt')
    NProgress.done();
}

function agregar_articulo(id,articulo,precio,proveedor,idproveedor){
    var cantidad = parseInt( $('#' + id + '_').val() );

    var especificaciones = $('#' + id + '_espe').val();

    if( !Number.isInteger(cantidad) ){
        modalEstatus("i", "Favor de poner una cantidad valida.", "", "modal_articulo");
        return false
    }

    var total = cantidad * precio;    

    var json = {
        'idrequisicion' : id_requi_G,
        'idarticulo' : id,
        'cantidad' : cantidad,
        'importe' : precio,
        'total' : total,
        'especificaciones': especificaciones,
        'idproveedor' : idproveedor
    };        

    ajaxPost("../Requisicion/requi_insert_detalle.php", nada, json);

    $('#btn_' + id).attr('disabled',true)

    setTimeout(function () {
        ajaxPost("requi_all_detail.php", cargar_datos, {'idrequi':id_requi_G});
    }, 1000);
    
}

function borrar_elemento(id){
    ajaxPost("requi_admin_delete.php", nada, {'id':id});
    
    setTimeout(function () {
        ajaxPost("requi_all_detail.php", cargar_datos, {'idrequi':id_requi_G});
    }, 1000);    
}