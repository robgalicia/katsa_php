var articulos_G = [];
var id_orden_G = -1;

var id_articulo_G = -1
var importe_G = -1
var proveedor_G = -1

$(document).ready(function() {
    id_orden_G = $.get("idorden");

    ajaxPost("orden_all_print.php", cargar_datos, {'idorden':id_orden_G});    
});

function cargar_datos(json){    

    var ob = json[0];    

    console.log(ob);

    $("#proveedor").text(ob.proveedor);
    $("#orden_compra").text(ob.folioordencompra);
    $("#direccion").text(ob.direccion);
    $("#folio_req").text(ob.foliorequisicion);
    $("#colonia").text(ob.colonia + ' ' + ob.codigopostal);
    $("#fecha_oc").text(ob.fechaorden);
    $("#ciudad").text(ob.ciudad + ' Tel. ' + ob.telefono);
    $("#solicitado_por").text(ob.empleadosolicita);
    $("#correo").text(ob.correoelectronico);
    $("#departamento").text(ob.descdepartamento);    
    $("#elaboro_oc").text(ob.empleadoordena);
    $('#obs').text(ob.observaciones);
    

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
            string += ob.articulo;
            string += '</td>';
            
            string += '<td>';
            string += toMoney(ob.cantidad);
            string += '</td>';

            string += '<td>';
            string += toMoney(ob.importe);
            string += '</td>';

            string += '<td>';
            string += toMoney(ob.total);
            string += '</td>';

            total += parseFloat(ob.total);

            string += '<td>';
            string += ob.proveedor;
            string += '</td>';            
    }
    $('#tbodyPrin').html(string);
    $('#total').html( toMoney(total) );
    NProgress.done();
}