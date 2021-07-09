var articulos_G = [];
var idorden_G = -1;
var idestatus_G = -1;

var id_articulo_G = -1
var importe_G = -1
var cantidad_G = -1

$(document).ready(function() {    
    $('.ui.accordion').accordion();

    idorden_G = $.get("idorden");
    idestatus_G = $.get("idestatus");

    ajaxPost("orden_all_detail.php", cargar_datos, {'idorden':idorden_G});
    
});

function cargar_datos(json){

    var ob = json[0];    

    dpd_proveedor('proveedor',ob.idproveedor);
    dpd_departamento('departamento',ob.iddepartamento);
        
    $("#folio").val(ob.folio);    
    $("#fecha_orden").val( ob.fechaorden.replace(' ','T') );
    $("#observaciones").val(ob.observaciones);    
    $("#importe_total").val( toMoney(ob.total) );
    

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
            string += '<tr>';

            string += '<td>';
            string += ob.idarticulo;
            string += '</td>';

            string += '<td>';
            string += ob.descarticulo;
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
            string += ob.proveedor;
            string += '</td>';

            string += '<td>';
            if( idestatus_G == '23'){
                string += '<button class="ui basic green icon button" data-tooltip="Actualizar" onclick="mostrar_modal(' + ob.idarticulo + ',' + ob.importe + ',' + ob.cantidad + ')";><i class="clipboard outline icon"></i></button>';
                string += '<button class="ui basic red icon button" data-tooltip="Eliminar" onclick="borrarDetalle(' + ob.idordencompradetalle + ')";><i class="close icon"></i></button>';
            }            
            string += '</td>';
    }
    $('#tbodyPrin').html(string);
    $('#totalPrin').text(toMoney(total));
    toDataTable('tablePrin')
    NProgress.done();
}

function mostrar_modal(id_articulo,importe,cantidad){
    id_articulo_G = id_articulo;
    importe_G = importe;
    cantidad_G = cantidad;

    $('#precio').val(importe);
    $('#cantidad').val(cantidad);

    $('#modal_admin').modal('show');

}

function cambiar_articulo(){

    var precio = parseFloat( $('#precio').val() );
    var cantidad = parseFloat( $('#cantidad').val() );

    if ( ( precio <= 0 ) || ( cantidad <= 0 ) ){
        modalEstatus('i', 'El precio y la cantidad deben ser mayor a 0.','','modal_admin');
        return false;
    }    
    
    for (let i in articulos_G) {

        var ob = articulos_G[i];

        if(id_articulo_G == ob.idarticulo){
            //Cambiar aqui
            articulos_G[i].importe = $('#precio').val();
            articulos_G[i].cantidad = $('#cantidad').val();

            articulos_G[i].total = articulos_G[i].importe * articulos_G[i].cantidad 

            break;
        }
    }    

    articulos_elegidos();
    agregar_detalle_ajax();
    $('#modal_admin').modal('hide');
}

function agregar_detalle_ajax(){

    var jsobs = {
        'idordencompra' : idorden_G,
        'observaciones' : $('#observaciones').val()
    };

    ajaxPost("orden_admin_obs.php", nada, jsobs);

    for(var i = 0; i < articulos_G.length; i++){

        var ob = articulos_G[i];

        var json = {
            'idordendetalle' : ob.idordencompradetalle,            
            'cantidad' : ob.cantidad,
            'importe' : ob.importe,
            'total' : ob.total            
        };        

        ajaxPost("orden_admin_detalle.php", nada, json);
    }
    
    //correcto({'result':true});
    NProgress.done();
}

function nada(json){
    console.log(json);
    NProgress.done();
}

function borrarDetalle(id_detalle){

    var json = {
        'idordencompradetalle' : id_detalle
    };

    ajaxPost("orden_detalle_borrar.php", nada, json);

    setTimeout(function () {
        ajaxPost("orden_all_detail.php", cargar_datos, {'idorden':idorden_G});
    }, 0500);    

}