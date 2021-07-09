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
    var fecha_ajuste = obtenerFechaCampo();
    $('#fecha_ajuste').val(fecha_ajuste);
    dpd_partida('partida',tipo);
    dpd_empleado('empleado');
    dpd_tipo_ajuste('tipo_ajuste');
    if(idSolicitudP > 0){
        ajaxPost("ajuste_inventario_sel.php", cargar_datos, {'idajusteinventario':idSolicitudP});
    }else{
        
        $('#partida').change(function(){        
            elegir_articulo_partida_ajax();
        });  

          
    }
});

function cargar_datos(json){
    console.log(json);
    $('#fecha_ajuste').attr('disabled',true);
    //$('#folio').attr('disabled',true);
    $('#almacen').attr('disabled',true);
    $('#tipo_ajuste').attr('disabled',true);    
    $('#empleado').attr('disabled',true);
    $('#observaciones').attr('disabled',true);
    $('#btn_add').attr('disabled',true);
    $('#btn_delete').attr('disabled',true);

    

    var ob = json[0];

    dpd_empleado('empleado', ob.idempleadoautoriza);
    dpd_partida('almacen', ob.idalmacen);
    $('#empleado').val(ob.idempleadoautoriza);
    $('#tipo_ajuste').val(ob.idtipoajusteinventario);    
    $('#observaciones').val(ob.observaciones);
    $('#fecha_ajuste').val(fechaSinHora(ob.fecha));
    //$('#folio').val(ob.folio);

    articulos_G = json
    articulos_elegidos();

    NProgress.done();
}

function elegir_articulo_partida_ajax(){
    destroyDT('tableArt');
    $('#tbodyArt').html('');
    
    var idpartida = $('#partida').val();

    var json={
        'idpartida': idpartida
    }

    ajaxPost("ajuste_sel_partida.php", elegir_articulo, json);
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
            string += '<input id="cantidad_' + ob.idarticulo + '">'
            string += '</td>';

            string += '<td class="right aligned">';
            string += '<button class="ui basic green icon button" id="btn_' + ob.idarticulo + '" data-tooltip="Seleccionar" onclick="agregar_articulo(' + ob.idarticulo  + ',\''+ ob.codigoarticulo + '\',' + '\'' + ob.nombrearticulo + '\',' + '\'' + ob.descripcionproveedor + '\',' + ob.preciocompra + ',\'' + ob.nombreproveedor + '\',' + ob.idproveedor +');"><i class="hand pointer outline icon"></i></button>';
            string += '</td>';

            string += '</tr>';
    }
    $('#tbodyArt').html(string);    
    toDataTable('tableArt')
    NProgress.done();
}

function agregar_articulo(id,codigo,articulo,descproveedor,costo,nombreproveedor,idproveedor){
    var cantidad = $('#cantidad_'+ id).val();
    console.log(cantidad);
    $('#btn_' + id).attr('disabled',true)

    var cost=parseFloat(costo)
    var costoTotal = (cantidad*cost);
    var json = {
        'idarticulo' : id,
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

function agregar_ajax(){
    var fecha = $('#fecha_ajuste').val();
    var almacen = $('#almacen').val();
    var observaciones = $('#observaciones').val();
    var tipo_ajuste = $('#tipo_ajuste').val();

    var json = {
        'pfecha' : fecha,
        'pidalmacen' : almacen,
        'pidtipoajusteinventario' : tipo_ajuste,
        'pobservaciones' : observaciones
    };

    console.log(json);

    ajaxPost("ajuste_inventario_ins.php", agregar_detalle_ajax, json);
}
function borrarArticulo(id){
    var index = buscar_elemento(id);

    if (index > -1) {
        articulos_G.splice(index, 1);
    }

    articulos_elegidos();
}


function buscar_elemento(id){
    console.log("articulo");
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

function agregar_detalle_ajax(json){
    console.log("json");
    console.log(json);

    var solic = json.lastid;

    for(var i = 0; i < articulos_G.length; i++){

        var ob = articulos_G[i];

        var json = {
            'pidajusteinventario' : solic,
            'pidarticulo' : ob.idarticulo,
            'pcantidad' : ob.cantidad,
            'pcostounitario' : ob.costounitario,
            'pcostototal' : ob.costototal
        };        

        console.log(json);
        ajaxPost("ajuste_inventario_detail_ins.php", correct, json);
    }

    //correcto({'result':true});
}

function correct(json){
    console.log(json);
    if(json.result){
        $('.modal').modal('hide');
        modalEstatus('o', 'La operación se realizó de manera correcta.');
        redirect('index.php')
    }else{
        modalEstatus('e', 'Ocurrio un error.');        
    }

    NProgress.done();
    redirect('index.php');
}

function nada(){
    console.log("nada");
}

function articulos_elegidos(){
    destroyDT('tablePrin');
    $('#tbodyPrin').html('');        
    var string = '';
    console.log(articulos_G);
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

            string += '<td>';
            string += ob.costounitario;
            string += '</td>';

            string += '<td>';
            string += ob.costototal;
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
    $('#totalPrin').text(total);
    toDataTable('tablePrin')
    NProgress.done();
}


function mostrarModal(){
    destroyDT('tableArt');
    $('#tbodyArt').html('');    
    $('#modal_articulo').modal('show');
}

function elegir_articulo_ajax(){
    console.log(elegir_articulo_ajax);
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
        'descripcion': desc,
        'idbusqueda': tipoarticulo
    }
    console.log(json);
    ajaxPost("articulo_allinv.php", elegir_articulo, json);
}