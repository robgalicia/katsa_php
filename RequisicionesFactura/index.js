var articulos_G = [];
var idSolicitud = -1;
var tipoGasto = '';
var comprobante = '';
var myDropzone;
var myDropzone_pdf;
var jsonData = '';
var file_name ='';
var typeDoc='';

var nombre_xml = '';
var nombre_pdf = '';

var idordencomprafactura_G = 0;
var idordencompra_G = 0;


$(document).ready(function() {    
    dropzone();
    dropzone_pdf();
    dpd_forma_pago('forma_pago');

    idordencomprafactura_G = $.get('idordencomprafactura');
    idordencompra_G = $.get('idorden');

    validarInit('formGeneral');

    $('#rfc_proveedor').attr('disabled',true);
    $('#nombre_proveedor').attr('disabled',true);
    $('#uuid').attr('disabled',true);
    $('#importe').attr('disabled',true);
    $('#fecha_vencimiento').attr('disabled',true);

    if(idordencomprafactura_G > 0){
        ajax_edit();
    }

});

function ajax_edit(){

    ajaxPost("requi_factura_all.php", edit_all, {'idordencomprafactura':idordencomprafactura_G});
}

function edit_all(json){    
    var ob = json[0]
    $('#fecha').val(fechaSinHora(ob.fechafactura));
    $('#rfc_proveedor').val(ob.rfc);
    $('#tipo_venta').val(ob.tipoventa).change();
    $('#nombre_proveedor').val(ob.nombreproveedor);
    $('#forma_pago').val(ob.idformapago).change();    
    $('#referencia_pago').val(ob.referenciapago);
    $('#uuid').val(ob.uuid);
    $('#dias_credito').val(ob.diascreditofac);
    $('#importe').val(ob.importetotal);
    $('#fecha_vencimiento').val(fechaSinHora(ob.fechavencimiento));    
    $('#observaciones').val(ob.observaciones);

    $('#pdf_label').text('Ver Archvio');
    $("#pdf_label").attr("onclick","verPDF(\'" + ob.nombrearchivopdf + "\')");
    $('#pdf_label').addClass("blue");

    $('#xml_label').text('Ver Archvio');
    $("#xml_label").attr("onclick","verPDF(\'" + ob.nombrearchivoxml + "\')");
    $('#xml_label').addClass("blue");

    nombre_xml = ob.nombrearchivoxml;
    nombre_pdf = ob.nombrearchivopdf;

    NProgress.done();
}

function changeTypeDoc(){
    comprobante = $('#tipo_comprobante').val();
        //console.log(comprobante);
    if(comprobante=='F'){
        $('#folio').val('').change();
        $('#folio').attr('disabled',true);
        $('#importe').attr('disabled',true);
        $('#proveedor').attr('disabled',true);
        $('#pdfDoc').attr('disabled',true);
        
    }else{
        $('#folio').val('').change();
        $('#folio').attr('disabled',false);
        $('#importe').attr('disabled',false);
        $('#proveedor').attr('disabled',false);
        $('#xmlDoc').attr('disabled',false);
    }
}

function mostrarModalEdit_pdf(){    
    $('#modal_editar_pdf').modal('show');
}

function mostrarModalEdit(){    
    $('#modal_editar').modal('show');
}

function agregarComprobante(){
    var idgastoscomprobardetalle = idSolicitud;
    var tipocomprobante = $('#tipo_comprobante').val();
    var foliocomprobante = $('#folio').val();
    var fecha = $('#fecha').val();
    var proveedor = $('#proveedor').val();
    var rfcproveedor = $('#rfc_proveedor').val();
    var uuid = $('#uuid').val();
    var observaciones = $('#observaciones').val();
    var importetotal = $('#importe').val();
    var nombrearchivoxml;
    var nombrearchivopdf;

    if(tipocomprobante=='F'){
        nombrearchivoxml=file_name;
        nombrearchivopdf='';
    }else{
        nombrearchivoxml='';
        nombrearchivopdf=file_name;
    }

    var json = {
        'idgastoscomprobardetalle' : idgastoscomprobardetalle,
        'tipocomprobante' : tipocomprobante,
        'foliocomprobante' : foliocomprobante,
        'fecha' : fecha,
        'proveedor' : proveedor,
        'rfcproveedor' : rfcproveedor,
        'uuid' : uuid,
        'nombrearchivoxml' : nombrearchivoxml,
        'nombrearchivopdf' : nombrearchivopdf,
        'observaciones' : observaciones,
        'importetotal' : importetotal
    };
    //console.log(json);
    ajaxPost("c_gastos_insert.php", agregar_factura, json);
}

function agregar_factura(){
    destroyDTGen();
    $('#tbody').html('');

    var json = {
        'pidgastoscomprobar' : idSolicitud
    }
    /*console.log("json");
    console.log(json);*/
    ajaxPost("c_facturas_all.php", llenar_tabla, json);
}

function verPDF(ruta){
    window.open(ruta, '_blank');
}

function dropzone_pdf(){
    try{
        myDropzone_pdf.off(); //removes all listeners attached with Emitter.on()
        myDropzone_pdf.destroy()
    }catch(err){
        console.log('err: ' + err.toString());
    }

    myAwesomeDropzone = {
        url: "documentos_up2server.php",
        createImageThumbnails: true,
        acceptedFiles: 'text/xml,application/pdf',        
        params: {
            
        },
        accept: function(file, done) {
            done();

            /*if (file_name.length > 0 || !formValido('formDocumento')) { //Poner que si no ha pasado las validaciones
                done("Naha, you don't.");
                modalEstatus('i', 'Ya subio algún documento o tiene campos sin rellenar.','','modal_documento');
                $('.dz-preview').html('');
            }
            else {
                rename_label(file.name)
                done();
            }*/
        },
        success: function (file, response) {            
            //file.previewElement.classList.add("dz-success");
            //console.log("Successfully uploaded :" + response);
            //console.log(response);
            jsonData = JSON.parse(response);            
            //console.log(jsonData);
            
            //correctoTabla(1);

            if(jsonData.nombre.includes(".xml")){ 
                nombre_xml = jsonData.nombre;
                console.log(nombre_xml);
                ajaxXML("../RequisicionesFactura/"+nombre_xml, xmlparse, {});    
            }else if(jsonData.nombre.includes(".pdf")){
                nombre_pdf = jsonData.nombre;
            }
            
            $('#pdf_label').text(jsonData.nombre_real);

            $("#pdf_label").attr("onclick","verPDF(\'" + jsonData.nombre + "\')");

            $('#pdf_label').addClass("blue");
            
            $('.modal').modal('hide');
            
            $('.dz-preview').html('');
        },
        error: function (file, response) {
            //correctoTabla(0);
            console.log('error: ' + response);
            file.previewElement.classList.add("dz-error");
        }
    } // FIN myAwesomeDropzone

    myDropzone_pdf = new Dropzone("#dropzone_pdf", myAwesomeDropzone); 
        myDropzone_pdf.on("complete", function(file,response) {
    
        });
}

function dropzone(){
    try{
        myDropzone.off(); //removes all listeners attached with Emitter.on()
        myDropzone.destroy()
    }catch(err){
        console.log('err: ' + err.toString());
    }

    myAwesomeDropzone = {
        url: "documentos_up2server.php",
        createImageThumbnails: true,
        acceptedFiles: 'text/xml,application/pdf',        
        params: {
            
        },
        accept: function(file, done) {
            done();

            /*if (file_name.length > 0 || !formValido('formDocumento')) { //Poner que si no ha pasado las validaciones
                done("Naha, you don't.");
                modalEstatus('i', 'Ya subio algún documento o tiene campos sin rellenar.','','modal_documento');
                $('.dz-preview').html('');
            }
            else {
                rename_label(file.name)
                done();
            }*/
        },
        success: function (file, response) {            
            //file.previewElement.classList.add("dz-success");
            //console.log("Successfully uploaded :" + response);
            //console.log(response);
            jsonData = JSON.parse(response);            
            //console.log(jsonData);
            
            //correctoTabla(1);

            if(jsonData.nombre.includes(".xml")){ 
                nombre_xml = jsonData.nombre;
                ajaxXML("../RequisicionesFactura/"+nombre_xml, xmlparse, {});    
            }else if(jsonData.nombre.includes(".pdf")){
                nombre_pdf = jsonData.nombre;
            }

            $('#xml_label').text(jsonData.nombre_real);
            $("#xml_label").attr("onclick","verPDF(\'" + jsonData.nombre + "\')");
            $('#xml_label').addClass("blue");
            
            $('.modal').modal('hide');
            
            $('.dz-preview').html('');
        },
        error: function (file, response) {
            //correctoTabla(0);
            console.log('error: ' + response);
            file.previewElement.classList.add("dz-error");
        }
    } // FIN myAwesomeDropzone

    myDropzone = new Dropzone("#dropzone", myAwesomeDropzone); 
        myDropzone.on("complete", function(file,response) {
    
        });
}

function xmlparse(json){
    //UUID
    //proveedor
    //rfc_cliente
    //fecha_factura
    //importe_pagado

    $('#uuid').val(json.UUID);
    $('#rfc_proveedor').val(json.rfc_proveedor);
    $('#nombre_proveedor').val(json.proveedor);
    //$('#rfc').val(json.rfc_cliente);
    $('#fecha').val(fechaSinHora(json.fecha_factura,true));
    $('#importe').val(toMoney(json.importe_pagado));

    $('#uuid').attr('disabled',true);
    $('#rfc_proveedor').attr('disabled',true);
    $('#nombre_proveedor').attr('disabled',true);
    //$('#rfc').attr('disabled',true);
    $('#fecha').attr('disabled',true);
    $('#importe').attr('disabled',true);

    $('#modal_editar').modal('hide');

    NProgress.done();
}

function agregarFactura(){
    
    if (!formValido('formGeneral')){
        modalEstatus('i', 'Favor de revisar los campos marcados en rojo.');
        return false;
    }

    var json = {
        'idordencomprafactura' : idordencomprafactura_G,
        'idordencompra' : idordencompra_G,
        'fechafactura' : $('#fecha').val(),
        'rfcproveedor' : $('#rfc_proveedor').val(),
        'nombreproveedor' : $('#nombre_proveedor').val(),
        'tipoventa' : $('#tipo_venta').val(),
        'idformapago' : $('#forma_pago').val(),
        'referenciapago' : $('#referencia_pago').val(),
        'diascredito' : $('#dias_credito').val(),
        'fechavencimiento' : $('#fecha_vencimiento').val(),
        'importetotal' : quitarComas($('#importe').val()),
        'uuid' : $('#uuid').val(),
        'nombrearchivoxml' : nombre_xml,
        'nombrearchivopdf' : nombre_pdf,
        'observaciones' : $('#observaciones').val()
    };

    ajaxPost("requisicion_factura_insert.php", correctoIn, json);
}

function correctoIn(json){
    console.log(json);
    if(json.result){
        modalEstatus('o', 'La operación se realizó de manera correcta.','../Orden_Compra/index.php');
    }else{
        modalEstatus('e', 'Ocurrio un error.');        
    }

    NProgress.done();
}