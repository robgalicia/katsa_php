var articulos_G = [];
var total = 0;
var idSolicitudP = 0;
var almacen = 0;

var tipoarticulo ='';

$(document).ready(function() {
    idSolicitudP = $.get("idsoli");
    almacen = $.get("alm");
    dpd_almacen('almacen',almacen);
    var tipo = 'G';
    var region = $('#region').val();
    var fecha_salida = obtenerFechaCampo();
    $('#fecha_salida').val(fecha_salida);
    

    if(idSolicitudP > 0){

        $('#btn_registrar').hide();
        $('#tr_add_art').hide();

        ajaxPost("salida_inventario_sel.php", cargar_datos, {'idsolicitud':idSolicitudP});        
    }else{
        dpd_almacen('almacen');
        dpd_empleado('empleado');
        dpd_partida('partida',tipo);
        dpd_tipo_salida_inventario('tipo_almacen',"");
        $('#partida').change(function(){        
            elegir_articulo_partida_ajax();
        });  
        dpd_region('region','adscripcion',);  
        dpd_cliente('cliente');
        dpd_departamento('departamento');
    }
});

function cargar_datos(json){    
    $('#fecha_salida').attr('disabled',true);
    //$('#folio').attr('disabled',true);
    $('#almacen').attr('disabled',true);
    $('#tipo_almacen').attr('disabled',true);    
    $('#empleado').attr('disabled',true);
    $('#observaciones').attr('disabled',true);
    $('#cliente').attr('disabled',true);
    $('#adscripcion').attr('disabled',true);
    $('#region').attr('disabled',true);
    $('#btn_add').attr('disabled',true);
    $('#btn_delete').attr('disabled',true);
    $('#departamento').attr('disabled',true);
    

    var ob = json[0];

    dpd_empleado('empleado', ob.idempleadorecibe);
    dpd_region('region','adscripcion', ob.idregion );    
    dpd_almacen('almacen', ob.idalmacen);
    dpd_tipo_salida_inventario('tipo_almacen', ob.idtiposalidainventario);
    dpd_cliente('cliente',ob.idcliente);
    dpd_departamento('departamento',ob.iddepartamento);
    $('#empleado_solicita').val(ob.idempleadosolicita);
    $('#tipo_reque').val(ob.tiporequisicion);    
    $('#observaciones').val(ob.observaciones);
    $('#adscripcion').val(ob.idadscripcion).change();
    $('#fecha_salida').val(fechaSinHora(ob.fechasalida));
    //$('#folio').val(ob.folio);

    articulos_G = json
    articulos_elegidos();

    NProgress.done();
}

function elegir_articulo_partida_ajax(){
    destroyDT('tableArt');
    $('#tbodyArt').html('');
    
    var idpartida = $('#partida').val();
    var almacen = $('#almacen').val();
    var json={
        'almacen':almacen,
        'idpartida': idpartida
    }

    ajaxPost("articulo_sel_partidainv.php", elegir_articulo, json);
}

function elegir_articulo_ajax(){

    destroyDT('tableArt');
    $('#tbodyArt').html('');

    var desc = $('#desc_articulo').val();

    var nombre = $('#tipo_articulo_nombre').prop('checked');
    var descripcion = $('#tipo_articulo_descripcion').prop('checked');
    var ambos = $('#tipo_articulo_ambos').prop('checked');

    if(nombre) tipoarticulo = 'N';
    if(descripcion) tipoarticulo = 'D';
    if(ambos) tipoarticulo = 'A';

    var almacen = $('#almacen').val();
    var json={
        'almacen':almacen,
        'descripcion': desc,
        'idbusqueda': tipoarticulo
    }

    ajaxPost("articulo_allinv.php", elegir_articulo, json);
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
            string += ob.existencia;
            string += '</td>';

            string += '<td>';
            string += '<input id="cantidad_' + ob.idarticulo + '">'
            string += '</td>';

            string += '<td class="right aligned">';
            string += '<button class="ui basic green icon button" id="btn_' + ob.idarticulo + '" data-tooltip="Seleccionar" onclick="agregar_articulo(' + ob.idarticulo  + '\,' + ob.codigoarticulo + ',\'' + ob.nombrearticulo + '\',' + '\'' + ob.descripcionproveedor + '\',' + ob.costounitario + ',\'' + ob.nombreproveedor + '\',' + ob.existencia +');"><i class="hand pointer outline icon"></i></button>';
            string += '</td>';

            string += '</tr>';
    }
    $('#tbodyArt').html(string);    
    toDataTable('tableArt')
    NProgress.done();
}


function agregar_articulo(id,codigo,articulo,descproveedor,costo,nombreproveedor,existencia){
    var cantidad = $('#cantidad_'+ id).val();
    
    $('#btn_' + id).attr('disabled',true)

    if(cantidad>existencia){
        $('#btn_' + id).attr('disabled',false);
        modalEstatus("i", "Favor de poner una cantidad valida.", "", "modal_articulo");
        return false
    }
    var cost=parseFloat(costo)
    var costoTotal = (cantidad*cost);
    var json = {
        'idarticulo' : id,
        'existencia' : existencia,
        'cantidad' : cantidad,
        'codigoarticulo' : codigo,
        'descarticulo' : articulo,
        'descproveedor' : descproveedor,
        'costounitario' : costo,
        'nombreproveedor' : nombreproveedor,
        'costototal' : costoTotal
    }

    articulos_G.push(json);

    $('#btn_' + id).attr('disabled',true)

    articulos_elegidos();
}

function borrarArticulo(id){
    var index = buscar_elemento(id);

    if (index > -1) {
        articulos_G.splice(index, 1);
    }

    articulos_elegidos();
}


function buscar_elemento(id){
    
    var index = -1;

    for (let i in articulos_G) {

        var ob = articulos_G[i];

        if(id == ob.idarticulo){
            index = i;
            break;
        }
    }

    return index;
}

function articulos_elegidos(){
    destroyDT('tablePrin');
    $('#tbodyPrin').html('');        
    var string = '';
    
    for (let i in articulos_G) {
        var ob = articulos_G[i];
        
            string += '<tr>';
            
            string += '<td>';
            string += ob.codigoarticulo;
            string += '</td>';

            string += '<td>';
            string += ob.descarticulo;
            string += '</td>';

            string += '<td>';
            string += ob.cantidad;
            string += '</td>';

            string += '<td class="right aligned">';
            string += toMoney(ob.costounitario);
            string += '</td>';

            string += '<td class="right aligned">';
            string += toMoney(ob.costototal);
            string += '</td>';

            if(idSolicitudP > 0){
                string += '<td>';
                string += '<button class="ui basic red icon button" data-tooltip="Eliminar" disabled onclick="borrarArticulo(' + ob.idarticulo + ');"><i class="close icon"></i></button>';
                string += '</td>';
            }else{
                string += '<td>';
                string += '<button class="ui basic red icon button" data-tooltip="Eliminar" onclick="borrarArticulo(' + ob.idarticulo + ');"><i class="close icon"></i></button>';
                string += '</td>';
            }

            

            total += parseFloat(ob.costototal);


            string += '</tr>';
    }
    $('#tbodyPrin').html(string);
    $('#totalPrin').text( toMoney( trunc(total,2) ) );
    toDataTable('tablePrin')
    NProgress.done();
}

function mostrarModal(){
    destroyDT('tableArt');
    $('#tbodyArt').html('');    
    $('#modal_articulo').modal('show');
}


function agregar_ajax(){
    var fecha = $('#fecha_salida').val();
    var tipo_almacen = $('#tipo_almacen').val();
    var almacen = $('#almacen').val();
    var empleado = $('#empleado').val();
    var observaciones = $('#observaciones').val();
    var region = $('#region').val();
    var adscripcion = $('#adscripcion').val();
    var cliente = $('#cliente').val();
    var departamento = $('#departamento').val();

    var json = {
        'pidtiposalidainventario' : tipo_almacen,
        'pidalmacen' : almacen,
        'pidempleadoautoriza' : empleado,
        'pidempleadorecibe' : empleado,
        'pobservaciones' : observaciones,
        'pcostototal' : total,
        'pidregion' : region,
        'pidadscripcion' : adscripcion,
        'pidcliente' : cliente,
        'piddepartamento' : departamento
    };    

    ajaxPost("salida_inventario_ins.php", agregar_detalle_ajax, json);
}

function agregar_detalle_ajax(json){
    console.log(json);

    var solic = json.lastid;

    for(var i = 0; i < articulos_G.length; i++){

        var ob = articulos_G[i];

        var json = {
            'pidsalidainventario' : solic,
            'pidarticulo' : ob.idarticulo,
            'pcantidad' : ob.cantidad,
            'pcostounitario' : ob.costounitario,
            'pcostototal' : ob.costototal
        };        
        
        ajaxPost("salida_inventario_ins_detail.php", nada, json);
    }

    correcto({'result':true});
}

function nada(json){
    console.log(json);
}