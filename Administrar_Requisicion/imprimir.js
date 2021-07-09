var articulos_G = [];
var id_requi_G = -1;

var id_articulo_G = -1
var importe_G = -1
var proveedor_G = -1

$(document).ready(function() {
    id_requi_G = $.get("idrequi");

    ajaxPost("requi_all_detail.php", cargar_datos, {'idrequi':id_requi_G});    
});

function cargar_datos(json){    

    var ob = json[0];

    var tipo_req = '';

    if(ob.tiporequisicion == 'I') tipo_req = 'INTERNA';
    if(ob.tiporequisicion == 'E') tipo_req = 'ESPECIAL';
    if(ob.tiporequisicion == 'C') tipo_req = 'CLIENTE';

    $('#region').text(ob.descregion);
    $('#folio').text(ob.folio);
    $('#departamento').text(ob.descdepartamento);

    $('#fecha').text( fechaEspanol(ob.fecha,false,true) );
    $('#tipo_requi').text(tipo_req);
    $('#fecha_revision').text( fechaEspanol(ob.fecharevision,false,true) );
    $('#estatus').text(ob.descestatus);
    $('#fecha_autorizacion').text( fechaEspanol(ob.fechaautorizacion,false,true) );

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
            string += ob.idarticulo;
            string += '</td>';

            string += '<td>';
            string += ob.articulo;
            string += '</td>';
            
            string += '<td>';
            string += ob.cantidad;
            string += '</td>';

            string += '<td>';
            string += ob.importe;
            string += '</td>';

            string += '<td>';
            string += ob.total;
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