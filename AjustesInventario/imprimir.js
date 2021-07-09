var articulos_G = [];
var idsolicitud = -1;

var id_articulo_G = -1
var importe_G = -1
var proveedor_G = -1

$(document).ready(function() {
    console.log("idsolicitud");
    idsolicitud = $.get("idsolicitud");
    console.log(idsolicitud);
    ajaxPost("ajuste_inventario_sel.php", cargar_datos, {'idajusteinventario':idsolicitud});    
});

function cargar_datos(json){    
    console.log("ob");
    var ob = json[0];
    console.log(ob);

    $('#autoriza').text(ob.idempleadoautoriza);
    $('#folio').text(ob.folio);
    $('#fecha_ajuste').text( fechaEspanol(ob.fecha,false,true) );
    $('#obs').text(ob.observaciones);
    $('#idajusteinventario').text(ob.idajusteinventario);
    

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
            string += ob.descarticulo;
            string += '</td>';

            string += '<td>';
            string += ob.cantidad;
            string += '</td>';
            
            string += '<td>';
            string += ob.costototal;
            string += '</td>';

            total += parseFloat(ob.costototal);
    
    }
    $('#tbodyPrin').html(string);
    $('#total').html( toMoney(total));
    NProgress.done();
}