var articulos_G = [];
var idsolicitud = -1;

var id_articulo_G = -1
var importe_G = -1
var proveedor_G = -1

$(document).ready(function() {
    console.log("idsolicitud");
    idsolicitud = $.get("idsolicitud");
    console.log(idsolicitud);
    ajaxPost("a_solicitud_print.php", cargar_datos, {'idsolicitud':idsolicitud});    
});

function cargar_datos(json){    
    console.log("ob");
    var ob = json[0];
    console.log(ob);

    $('#solicitante').text(ob.empleadosolicita);
    $('#supervisor').text(ob.empleadosupervisor);
    $('#folio').text(ob.folio);
    $('#fechaSolicitud').text( fechaEspanol(ob.fechasolicitud,false,true) );
    $('#beneficiario').text(ob.empleadobeneficiario);
    $('#fecha_revision').text( fechaEspanol(ob.fecharevision,false,true) );
    $('#departamento').text(ob.descdepartamento);
    $('#fecha_autorizacion').text( fechaEspanol(ob.fechaautorizacion,false,true) );
    $('#cliente').text(ob.nombrecliente);
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
            string += ob.descpartida;
            string += '</td>';

            string += '<td>';
            string += ob.cantidadautoriza;
            string += '</td>';
            
            string += '<td>';
            string += ob.importeautoriza;
            string += '</td>';

            string += '<td>';
            string += ob.totalautoriza;
            string += '</td>';

            string += '<td>';
            string += ob.justificacion;
            string += '</td>';

            total += parseFloat(ob.totalautoriza);    
    
    }
    $('#tbodyPrin').html(string);
    $('#total').html( toMoney(total) );
    NProgress.done();
}