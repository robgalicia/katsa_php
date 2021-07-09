var id_cotizacion_G = -1
var articulos_G = []

$(document).ready(function() {
    id_cotizacion_G = $.get("id_cotizacion_G");    

    ajaxPost("coti_all_detail_print.php", cargar_datos, {'idcotizacion' : id_cotizacion_G});
});

function cargar_datos(json){    
    // console.log("ob");
    var ob = json[0];
    // console.log(ob);

    // $('#solicitante').text(ob.empleadosolicita);
    // $('#supervisor').text(ob.empleadosupervisor);
    // $('#folio').text(ob.folio);
    // $('#fechaSolicitud').text( fechaEspanol(ob.fechasolicitud,false,true) );
    // $('#beneficiario').text(ob.empleadobeneficiario);
    // $('#fecha_revision').text( fechaEspanol(ob.fecharevision,false,true) );
    // $('#departamento').text(ob.descdepartamento);
    // $('#fecha_autorizacion').text( fechaEspanol(ob.fechaautorizacion,false,true) );
    // $('#cliente').text(ob.nombrecliente);
    // $('#obs').text(ob.observaciones);
    $('#servicio').text(ob.tiposervicio);
    $('#lugar').text(ob.lugarservicio);
    $('#ubicacion').text(ob.ubicacionlugar);

    $('#contacto').text(ob.personacontacto);
    $('#cliente').text(ob.nombrecliente);
    $('#concopia').text(ob.personacopia);

    $('#firma').text(ob.nombrecompleto);
    $('#puestofirma').text(ob.descpuesto);    

    $('#fecha').html(ob.fecha_formal);

    $('#moneda').html(ob.desctipomoneda);

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
            string += ob.descripcioncorta + ': ' + ob.descservicio;
            string += '</td>';

            string += '<td>';
            string += toMoney(ob.preciounitario);
            string += '</td>';
            
            string += '<td>';
            
            string += toMoney(ob.cantidad);
            string += '</td>';

            string += '<td>';
            string += toMoney(ob.importetotal);
            string += '</td>';            

            total += parseFloat(ob.importetotal);    
    
    }
    $('#tbodyPrin').html(string);
    $('#total').html( toMoney(total) );
    NProgress.done();
}