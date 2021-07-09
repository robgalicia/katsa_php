var articulos_G = [];
var idSolicitud = -1;
var tipoGasto = '';
var comprobante = '';
var myDropzone;
var myDropzone_pdf;
var jsonData = '';
var file_name ='';
var typeDoc='';
var nombre_pdf = '';
var nombre_xml = '';
var factura = '';
var total=0;
var pdf=0;
var xml=0;


$(document).ready(function() {    
    validarInit('formGeneral');
    dropzone();
    dropzone_pdf();
    idSolicitud = $.get("idsoli");
    tipoGasto = $.get("tipoGasto");

    //ajaxPost("c_facturas_all.php", llenar_tabla, {'idsolicitud' : idSolicitud});
    comprobante = $('#tipo_comprobante').val();
    dpd_partida_detalle('partida', idSolicitud);
    changeTypeDoc();

    $('#tipo_comprobante').change(function(){
        changeTypeDoc();
    });    

    var json = {
        'idsolicitud' : idSolicitud
    }
    ajaxPost("c_facturas_all.php", llenar_tablaFac, json);
});



function correctoTabla(num){
    if(num==1){
        $('.modal').modal('hide');
        modalEstatus('o', 'La operación se realizó de manera correcta.');
        llenar_tabla_ajax();        
    }else{
        modalEstatus('e', 'Ocurrio un error.');        
    }

    NProgress.done();
}

function changeTypeDoc(){
    comprobante = $('#tipo_comprobante').val();
        
        if(comprobante=='F'){
            $('#folio').val('').change();
            $('#folio').attr('disabled',true);
            $('#importe').attr('disabled',true);
            $('#proveedor').attr('disabled',true);
            $('#pdfDoc').attr('disabled',false);
            $('#xmlDoc').attr('disabled',false);
        }else{
            $('#folio').val('').change();
            $('#folio').attr('disabled',false);
            $('#importe').attr('disabled',false);
            $('#proveedor').attr('disabled',false);
            $('#xmlDoc').attr('disabled',true);
            $('#pdfDoc').attr('disabled',false);
        }
}

function mostrarModalEdit(){
    dropzone();
    $('#modal_editar').modal('show');
}

function mostrarModalEditPdf(){
    dropzone_pdf();
    $('#modal_editar_pdf').modal('show');
}

function validarCampos(){
    var tipocomprobante = $('#tipo_comprobante').val();
    if(tipocomprobante=='N'){
        if(pdf<=0){
            modalEstatus('i', 'Favor de cargar la factura');
            return false;
        }
    }else{
        if((xml<=0)||(pdf<=0)){
            modalEstatus('i', 'Favor de cargar la factura');
            return false;
        }
    }
    if(!formValido('formGeneral')){
        modalEstatus('i', 'Favor de revisar los campos marcados con rojo.');
        return false;
    }
    else{
        console.log("agregarC");
        agregarComprobante();
    }
}

function agregarComprobante(){
    var tipocomprobante = $('#tipo_comprobante').val();
    if(tipocomprobante=='F'){
        
    }

    var partida =  $('#partida').val();
    var foliocomprobante = $('#folio').val();
    var fecha = $('#fecha').val();
    var proveedor = $('#proveedor').val();
    var rfcproveedor = $('#rfc').val();
    var uuid = $('#uuid').val();
    var observaciones = $('#observaciones').val();
    var importetotal = $('#importe').val();
    $('#xml_label').text('');
    $('#pdf_label').text('');

    var json = {
        'idgastoscomprobardetalle' : partida,
        'tipocomprobante' : tipocomprobante,
        'foliocomprobante' : foliocomprobante,
        'fecha' : fecha,
        'proveedor' : proveedor,
        'rfcproveedor' : rfcproveedor,
        'uuid' : uuid,
        'nombrearchivoxml' : nombre_xml,
        'nombrearchivopdf' : nombre_pdf,
        'observaciones' : observaciones,
        'importetotal' : importetotal
    };
    console.log(json);
    ajaxPost("c_gastos_insert.php", agregar_factura, json);
}

function agregar_factura(){
    destroyDTGen();
    $('#tbody').html('');
    total =0;
    ajaxPost("c_facturas_all.php", llenar_tablaFac, {'idsolicitud' : idSolicitud});
}

function nada(){
    console.log("test");
}

function llenar_tablaFac(json){
    clearForm('formGeneral');
    destroyDTGen();
    $('#tbodyPrin').html('');
    var string = '';
    factura = json

    console.log(json);
    for (let i in factura) {
        var ob = factura[i];    
        total += parseFloat(ob.importetotal);    
        console.log(total);
        string += '<tr>';

        string += '<td>';
        string += ob.idgastoscomprobarfactura;
        string += '</td>';

        string += '<td>';
        string += ob.tipocomprobante;
        string += '</td>';

        string += '<td>';
        string += ob.foliocomprobante;
        string += '</td>';

        string += '<td>';
        string += fechaEspanol(ob.fecha);
        string += '</td>';

        string += '<td>';
        string += ob.proveedor;
        string += '</td>';

        string += '<td>';
        string += ob.importetotal;
        string += '</td>';

        string += '<td>';
        string += '<button class="ui label" data-tooltip="PDF" onclick="verPDF(\'' + ob.nombrearchivopdf + '\');"><i class="file pdf icon"></i></button>';

        string += '</td>';

        string += '<td>';
        string += '<button class="ui label" data-tooltip="XML" onclick="verPDF(\'' + ob.nombrearchivoxml + '\');"><i class="file icon"></i></button>';

        string += '</td>';

        string += '<td>';
        string += '<button class="ui basic red icon button" data-tooltip="Eiminar" onclick="eliminar(' + ob.idgastoscomprobarfactura   + ');"><i class="close icon"></i></button>';

        string += '</td>';

        string += '</tr>';
        
        
    }
    $('#tbodyPrin').html(string);
    $('#importetotal').html(toMoney(total));
    toDataTableGen();
    NProgress.done();
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
                ajaxXML("../ComprobacionGastos/"+nombre_xml, xmlparse, {});    
            }else if(jsonData.nombre.includes(".pdf")){
                nombre_pdf = jsonData.nombre;
            }
            
            $('#pdf_label').text(jsonData.nombre_real);

            $("#pdf_label").attr("onclick","verPDF(\'" + jsonData.nombre + "\')");

            $('#pdf_label').addClass("blue");

            pdf = 1;
            
            $('.modal').modal('hide');
            
            $('.dz-preview').html('');
        },
        error: function (file, response) {
            correctoTabla(0)
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

            // file_name = 

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
            
            //correctoTabla(1);

            if(jsonData.nombre.includes(".xml")){ 
                nombre_xml = jsonData.nombre;
                ajaxXML("../ComprobacionGastos/"+nombre_xml, xmlparse, {});    
            }else if(jsonData.nombre_real.includes(".pdf")){
                nombre_pdf = jsonData.nombre;
            }
            $('#xml_label').text(jsonData.nombre_real);
            $("#xml_label").attr("onclick","verPDF(\'" + jsonData.nombre + "\')");
            $('#xml_label').addClass("blue");
            xml = 1;
            $('.modal').modal('hide');
            
            $('.dz-preview').html('');
        },
        error: function (file, response) {
            correctoTabla(0)
            console.log('error: ' + response);
            file.previewElement.classList.add("dz-error");
        }
    } // FIN myAwesomeDropzone

    myDropzone = new Dropzone("#dropzone", myAwesomeDropzone); 
        myDropzone.on("complete", function(file,response) {
    
        });
}

function xmlparse(json){ 
    console.log(json);   
    //UUID
    //proveedor
    //rfc_cliente
    //fecha_factura
    //importe_pagado
    var fecha = fechaSinHora(json.fecha_factura,true);    

    $('#uuid').val(json.UUID);
    $('#proveedor').val(json.proveedor);
    $('#rfc').val(json.rfc_proveedor);
    $('#fecha').val(fecha);
    $('#importe').val(json.importe_pagado);

    //$('#modal_editar').modal('hide');

    NProgress.done();
}

function eliminar(id){ 
    console.log(id);
    $('#btn_delete').attr('onclick', 'eliminarF(' + id + ')');
    $('#modal_borrar').modal('show');

}

function eliminarF(id){
    console.log(id)
    $('#modal_borrar').modal('hide');
    ajaxPost("c_facturas_del.php", correctoTabla, {'id' : id});
}

function correctoTabla(json){
    console.log(json);
    if(json.result){
        $('.modal').modal('hide');
        modalEstatus('o', 'La factura se elimino de manera correcta.');
        llenar_tabla();
    }else{
        modalEstatus('e', 'Ocurrio un error.');        
    }

    NProgress.done();
}

function llenar_tabla(){
    console.log("llenar_tabla");
    destroyDTGen();
    $('#tbodyPrin').html('');
    var json = {
        'idsolicitud' : idSolicitud
    }
    total = 0;
    ajaxPost("c_facturas_all.php", llenar_tablaFac, json);    
}