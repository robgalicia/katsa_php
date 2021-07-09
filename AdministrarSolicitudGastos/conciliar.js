var articulos_G = [];
var facturas = [];
var total=0;
var totalfact=0;
//conciliar

$(document).ready(function() {    
    idSolicitud = $.get("idsoli");
    pantalla = $.get("pantalla");
    console.log(idSolicitud);
    ajaxPost("a_solicitud_all_detail.php", solicitud_elegida, {'idsolicitud':idSolicitud});
    ajaxPost("a_gastos_factura.php", cargar_factura, {'idsolicitud':idSolicitud});
   
});

function solicitud_elegida(json){
    console.log("solicitud");
    console.log(json);
    articulos_G = json
    destroyDT('tablePrin');
    $('#tbodyPrin').html('');        
    var string = '';

    for (let i in articulos_G) {
        var ob = articulos_G[i];
        total += parseFloat(ob.importe);   
            string += '<tr>';

            string += '<td>';
            string += ob.idgastoscomprobar;
            string += '</td>';

            string += '<td>';
            string += ob.descpartida;
            string += '</td>';
            
            string += '<td>';
            string += ob.cantidad;
            string += '</td>';

            string += '<td>';
            string += toMoney(ob.importe);
            string += '</td>';

            string += '<td>';
            string += toMoney(ob.totalpartida);;
            string += '</td>';

            string += '<td>';
            string += ob.justificacion;
            string += '</td>';

            string += '</tr>';
            $('#importetotal').html(toMoney(total));
    }
    $('#tbodyPrin').html(string);    
    toDataTable('tablePrin')
    NProgress.done();
}

function cargar_factura(json){
    
    facturas = json
    console.log(facturas);
    destroyDT('tableFact');
    $('#tbodyFac').html('');        
    var string = '';

    for (let i in facturas) {
        var ob = facturas[i];
        totalfact += parseFloat(ob.importetotal);   
            string += '<tr>';

            string += '<td>';
            string += ob.idgastoscomprobarfactura;
            string += '</td>';

            string += '<td>';
            string += ob.tipocomprobante;
            string += '</td>';

            string += '<td>';
            string += ob.descpartida;
            string += '</td>';
            
            string += '<td>';
            string += ob.foliocomprobante;
            string += '</td>';

            string += '<td>';
            string += fechaEspanol(ob.fecha,false,false);
            string += '</td>';

            string += '<td>';
            string += ob.proveedor;
            string += '</td>';

            string += '<td>';
            string += parseFloat(ob.importetotal);
            string += '</td>';

            string += '<td>';
            string += '<button class="ui basic green icon button" data-tooltip="Documentos" onclick="verPDF(\'' + ob.nombrearchivopdf + '\');"><i class="file pdf icon"></i></button>'
            string += '</td>';

            string += '<td>';
            string += '<button class="ui basic green icon button" data-tooltip="Documentos" onclick="verXML(\'' + ob.nombrearchivoxml + '\');"><i class="file pdf icon"></i></button>'
            string += '</td>';

            string += '</tr>';
            $('#importetotalfact').html(toMoney(totalfact));
    }
    $('#tbodyFac').html(string);    
    toDataTable('tableFact')
    NProgress.done();
}

function verPDF(ruta){
    console.log("pdf");
    var pdf = '../ComprobacionGastos/' + ruta;
    console.log(pdf);
    window.open(pdf, '_blank');
}

function verXML(ruta){
    var pdf = '../ComprobacionGastos/' + ruta;
    console.log(pdf);
    window.open(pdf, '_blank');
    
}

function conciliarSolicitud(){
    var comentario = $('#comentarios').val();
    var json ={
        'pidgastoscomprobar':idSolicitud,
        'pcomentarios':comentario
    }
    console.log(json);
    ajaxPost("a_conciliado.php", correct, json);
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