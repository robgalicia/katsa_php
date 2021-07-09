var articulos_G = [];
var idSolicitud = -1;
var dateNow = '';
var ob = '';

$(document).ready(function() {    
    validarInit('formGeneral');
    idSolicitud = $.get("idsoli");
    pantalla = $.get("pantalla");
    ajaxPost("a_solicitud_all_detail.php", cargar_datos, {'idsolicitud':idSolicitud});
    dpd_empleado('empleado_solicita');
    //dpd_cuenta_bancaria('cuenta_bancaria', banco)
    if(pantalla==1){
        $('#fecha_comprobacion').attr('disabled',true);    
        $('#banco').attr('disabled',true);  
        $('#referencia').attr('disabled',true);  
        $('#cuenta_bancaria').attr('disabled',true); 
        $('#centro_costos').attr('disabled',true);  
        $('#aprobar_btn').hide();
        
    }else{
        $('#banco').attr('disabled',false);  
        $('#referencia').attr('disabled',false);  
        $('#tablePrin').hide();
    }
    /*$('#tipo_solicitud').change(function(){
        var solicitud = $('#tipo_solicitud').val();
        if(solicitud=='C'){
            $('#cliente').val('').change();
            $('#cliente').attr('disabled',false);
        }else{
            $('#cliente').attr('disabled',true);
        }
    }); */
   
});

function llenar_cuenta_bancaria(){
    $('#banco').change(function(){
        var banco = $('#banco').val();
        dpd_cuenta_bancaria('cuenta_bancaria', banco)
    }); 
    
}

function cargar_datos(json){
    $('#cliente').attr('disabled',true);
    $('#tipo_solicitud').attr('disabled',true);
    $('#observaciones').attr('disabled',true);
    $('#btn_add').attr('disabled',true);
    $('#btn_registrar').attr('disabled',true);    

    ob = json[0];
    
    $('#folio').val(ob.folio);
    $('#beneficiario').val(ob.empleadobeneficiario);  
    dpd_departamento('departamento', ob.iddepartamento );
    dpd_banco('banco',ob.idcuentabancaria,true)  
    $('#empleado_solicita').val(ob.idempleadosolicita).change();
    $('#observaciones').val(ob.observaciones);
    $('#correo').val(ob.correo);
    $('#centro_costos').val(ob.centrocostos);
    $('#referencia').val(ob.referenciaentrega);
    $('#empleado_beneficiario').val(ob.idempleadobeneficiario).change();
    $('#fecha_entrega').val(obtenerFechaCampo);
    $('#fecha_comprobacion').val(fechaSinHora(ob.fechacomprobacion));
    //llenar_cuenta_bancaria();
    articulos_G = json
    solicitud_elegida();

    NProgress.done();
}

function validateForms(){
    
    if ( formValido('formGeneral') ){
        return true;
    }else{
        return false;
    }
        
}

function validarCampos(id){
    if(!formValido('formGeneral')){
        modalEstatus('i', 'Favor de revisar los campos marcados con rojo.');
        return false;
    } else{
        modalRevisar(id);
    }
}

function modalRevisar(id){ 
    $('#btn_revisar').attr('onclick', 'entregar(' + idSolicitud + ')');
    $('#modal_revisar').modal('show');
}

function rechazar(id){
    $('#btn_delete').attr('onclick', 'deletearticulo(' + id + ')');

    $('#modal_borrar').modal('show');
}

function entregar(id){

    $('#modal_revisar').modal('hide');
    var json = {
        'pidgastoscomprobar' : id,
        'pfechalimitecomprobacion' : $('#fecha_comprobacion').val(),
        'pidcuentabancaria' : $('#cuenta_bancaria').val(),
        'preferenciaentrega' : $('#referencia').val(),
        'pcentrocostos' : $('#centro_costos').val()
    }
    ajaxPost("a_solicitud_comprobar.php", correct, json);
}

function enviarMail(json){
    var jsonMail = {
        'mail' : 'volosses@gmail.com',//$('#correo').val(),
        'idgastoscomprobar' : idSolicitud
    };

    ajaxPost("mail.php", nada, jsonMail);
}

function nada(json){
    console.log(json);
}

function correct(json){
    if(json.result){
        $('.modal').modal('hide');
        modalEstatus('o', 'La operación se realizó de manera correcta.');
        redirect('index.php')
    }else{
        modalEstatus('e', 'Ocurrio un error.');        
    }

    NProgress.done();
}

function solicitud_elegida(){
    destroyDT('tablePrin');
    $('#tbodyPrin').html('');        
    var string = '';
    var importe_total=0;
    for (let i in articulos_G) {
        var ob = articulos_G[i];
        importe_total += parseFloat(ob.totalautoriza);
            string += '<tr>';

            string += '<td>';
            string += ob.idgastoscomprobar;
            string += '</td>';

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

            string += '</tr>';
            //$('#importetotal').html(toMoney(ob.totalautoriza));
    }
    importe_total = toMoney(importe_total);
    $('#importetotal').html('');
    $('#importetotal').html(importe_total);
    $('#tbodyPrin').html(string);    
    toDataTable('tablePrin')
    NProgress.done();
}
