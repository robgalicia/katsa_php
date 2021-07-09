var articulos_G = [];
var id_requi_G = -1;

$(document).ready(function() {    
    $('.ui.accordion').accordion();

    id_requi_G = $.get("idrequi");
    dpd_cliente('cliente');
    dpd_empleado('empleado_solicita', getEmpleado() );

    if(id_requi_G > 0){
        $('#titulo').text('Detalle Requisición')
        ajaxPost("requi_all_detail.php", cargar_datos, {'idrequi':id_requi_G});

        $('#btn_registrar').hide()
        $('#agregar_tabla_articulo').hide()
        $('#th_acciones').hide()

    }else{
        dpd_departamento('departamento', $.get("dpo") );
        dpd_region('region',"adscripcion", $.get("region") );

        $('#fecha').val( obtenerFechaCampoHora() );

        cambiar_partida()
        $('#tipo_reque').change(function(){
            cambiar_partida()
        });

        $('#partida').change(function(){        
            elegir_articulo_partida_ajax();
        });    
    }
    
});

function cargar_datos(json){
    $('#cliente').attr('disabled',true);
    $('#tipo_reque').attr('disabled',true);
    $('#observaciones').attr('disabled',true);
    $('#btn_add').attr('disabled',true);
    $('#btn_registrar').attr('disabled',true);    
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
    var fecha = ob.fecha.replace(' ','T')
    $('#fecha').val(fecha);

    $('#centro_costos').val(ob.centrocostos);
    $('#tipo_entrega').val(ob.tipoentrega).change();
    $('#plazo_entrega').val(ob.plazoentrega);

    articulos_G = json
    articulos_elegidos();

    setTimeout(function () {
        $('#adscripcion').val(ob.idadscripcion).change();
    }, 0500);

    NProgress.done();
}

function agregar_ajax(){
    var idregion = $('#region').val();
    var idempleadosolicita = $('#empleado_solicita').val();
    var tiporequisicion = $('#tipo_reque').val();
    var iddepartamento = $('#departamento').val();
    var observaciones = $('#observaciones').val();
    var idcliente = $('#cliente').val();

    var idadscripcion = $('#adscripcion').val();

    var centrocostos = $('#centro_costos').val();
    var tipoentrega = $('#tipo_entrega').val();
    var plazoentrega = $('#plazo_entrega').val();

    var json = {
        'idregion' : idregion,
        'idadscripcion' : idadscripcion,
        'iddepartamento' : iddepartamento,
        'idcliente' : idcliente,
        'idempleadosolicita' : idempleadosolicita,
        'tiporequisicion' : tiporequisicion,
        'observaciones' : observaciones,
        'centrocostos' : centrocostos,
        'tipoentrega' : tipoentrega,
        'plazoentrega' : plazoentrega
    };

    ajaxPost("requi_insert.php", agregar_detalle_ajax, json);
}

function agregar_detalle_ajax(json){
    console.log(json);

    var requi = json.lastid;

    for(var i = 0; i < articulos_G.length; i++){

        var ob = articulos_G[i];

        var json = {
            'idrequisicion' : requi,
            'idarticulo' : ob.idarticulo,
            'cantidad' : ob.cantidad,
            'importe' : ob.importe,
            'total' : ob.total,
            'especificaciones': ob.especificaciones,
            'idproveedor' : ob.idproveedor
        };        

        ajaxPost("requi_insert_detalle.php", nada, json);
    }

    setTimeout(function () {
        correcto({'result':true});
    }, 1000);
}

function nada(json){
    console.log(json);
}

function cambiar_partida(){
    var tipo = 'G';
    var reque = $('#tipo_reque').val();
    if (reque == 'C'){
        tipo = 'C';
    }

    dpd_partida('partida', tipo);
}

function mostrarModal(){
    destroyDT('tableArt');
    $('#tbodyArt').html('');    
    $('#modal_articulo').modal('show');
}

function elegir_articulo_partida_ajax(){
    destroyDT('tableArt');
    $('#tbodyArt').html('');
    
    var tipoarticulo = $('#partida').val();
    
    ajaxPost("articulo_partida_all.php", elegir_articulo, {'idtipopartida': tipoarticulo});
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
        'idarticulo' : id,
        'articulo' : articulo,
        'cantidad' : cantidad,
        'importe' : precio,
        'total' : total,
        'idproveedor' : idproveedor,
        'especificaciones':especificaciones,
        'proveedor' : proveedor
    }

    articulos_G.push(json);

    $('#btn_' + id).attr('disabled',true)

    articulos_elegidos();
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
            
            string += '<td class="right aligned">';
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
            string += ob.proveedor;
            string += '</td>';

            string += '<td>';
            string += ob.especificaciones;
            string += '</td>';

            string += '<td class="">';

            if(id_requi_G == 0){
                string += '<button class="ui basic red icon button" data-tooltip="Eliminar" onclick="borrar_elemento(' + ob.idarticulo + ');"><i class="close icon"></i></button>';
            }

            string += '</td>';

            string += '</tr>';
    }
    $('#tbodyPrin').html(string);
    $('#totalPrin').text(toMoney(total));
    toDataTable('tablePrin')
    NProgress.done();
}

function borrar_elemento(id){
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