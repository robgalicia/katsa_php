var idSolicitud = -1;
var articulos_G = [];
var id_general = -1;

$(document).ready(function() {   
    idSolicitud = $.get("idsoli");
    edit=$.get("edit");
    validarInit('formSolicitud'); 
    dpd_cliente('cliente');
    dpd_empleado('empleado_solicita', getEmpleado() );
    dpd_empleado('empleado_beneficiario');
    dpd_viaticos('partida');
    ajaxPost("verificar_all_detail.php", cargar_datos, {'idsolicitud':idSolicitud});

    if(edit>0){
        $('#edit').attr('disabled',true); 
        $('#btn_add').attr('disabled',true); 
        $('#edit_disabled').hide();
    }else{
        $('#detail').hide();
    }

    $('#partida').change(function(){
        $('#cantidad').val("");
        $('#total').val("");
        var importe = $('#partida option:selected').attr('importe');
        if(importe>0){
            console.log(importe)
            $('#importe').val(importe);
            $('#importe').val(importe);
            $('#importe').attr('disabled',true);
            $('#importe_v').attr('disabled',true);
            $('#total').attr('disabled',true);
            $('#cantidad').attr('disabled',false);
        }else{
            if(edit)
            $('#importe').val("");
            $('#importe').val("");
            $('#total').attr('disabled',true);
            $('#cantidad').attr('disabled',true);
            //$('#cantidad_v').attr('disabled',true);
            $('#importe').attr('disabled',false);
            $('#importe_v').attr('disabled',false);
        }
        
    });    

    $('#importe').keyup(function(){
        var importe = $('#importe').val();
        $('#total').val(importe);
    }); 

    $('#importe_v').keyup(function(){
        var importe = $('#importe_v').val();
        $('#total_v').val(importe);
    }); 

    $('#cantidad_v').keyup(function(){
        var importe = $('#partida option:selected').attr('importe');
        var cantidad = $('#cantidad_v').val();
        total = importe * cantidad;
        $('#total_v').val(total);
    });

    $('#cantidad').keyup(function(){
        var importe = $('#partida option:selected').attr('importe');
        var cantidad = $('#cantidad').val();
        total = importe * cantidad;
        $('#total').val(total);
    });

});

function carga(){
    console.log("carga");
    ajaxPost("verificar_all_detail.php", cargar_datos, {'idsolicitud':idSolicitud});
}

function cargar_datos(json){
    $('#cliente').attr('disabled',true);
    $('#adscripcion').attr('disabled',true);
    $('#region').attr('disabled',true);
    $('#tipo_solicitud').attr('disabled',true);
    $('#observaciones').attr('disabled',true);
    $('#btn_registrar').attr('disabled',true);    
    $('#tipo_viaje').attr('disabled',true);    
    $('#motivo').attr('disabled',true);  
    $('#dias').attr('disabled',true);  
    $('#fecha_inicial').attr('disabled',true);  
    $('#fecha_final').attr('disabled',true);  
    $('#km').attr('disabled',true);  
    $('#empleado_beneficiario').attr('disabled',true); 
    $('#correo').attr('disabled',true); 
    $('#lugar_viaje').attr('disabled',true); 
    $('#region').attr('disabled',true); 
    //$('#edit').attr('disabled',true); 
    $('#delete').attr('disabled',true); 
    

    var ob = json[0];
    dpd_departamento('departamento', ob.iddepartamento );
    dpd_region('region','adscripcion', ob.idregion,ob.idadscripcion);   
    dpd_viaje('tipo_viaje',ob.idtipoviaje); 
    $('#empleado_solicita').val(ob.idempleadosolicita);
    $('#tipo_solicitud').val(ob.tipogasto);    
    $('#observaciones').val(ob.observaciones);
    $('#correo').val(ob.correo);
    $('#empleado_beneficiario').val(ob.idempleadobeneficiario).change();
    $('#adscripcion').val(ob.idadscripcion).change();
    $('#cliente').val(ob.idcliente);
    $('#fecha_solicitud').val(fechaSinHora(ob.fecha));
    $('#region').val(ob.idregion);
    $('#lugar_viaje').val(ob.lugarviaje);
    $('#motivo').val(ob.motivoviaje);
    $('#km').val(ob.distanciakms);
    $('#dias').val(ob.diasviaje);
    $('#fecha_inicial').val(fechaSinHora(ob.fechainicial));
    $('#fecha_final').val(fechaSinHora(ob.fechafinal));


    articulos_G = json
    console.log(articulos_G);
    if(edit>0){
        console.log(edit);
        solicitud_elegida_detail(articulos_G)
    }else{
        solicitud_elegida(articulos_G);
        solicitud_elegida_v(articulos_G);
    }

    NProgress.done();
}

function solicitud_elegida_detail(articulos_G){
    destroyDT('tablePrin_detail');
    $('#tbodyPrin_detail').html('');        
    var string = '';
    var importe_total=0;
    for (let i in articulos_G) {
        
        var ob = articulos_G[i];
        importe_total += parseFloat(ob.totalpartida);
            string += '<tr>';

            string += '<td>';
            string += ob.idpartida;
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
            string += toMoney(ob.totalpartida);
            string += '</td>';

            string += '<td>';
            string += ob.justificacion;
            string += '</td>';

            string += '</tr>';
    }
    importe_total = toMoney(importe_total);
    console.log(importe_total);
    $('#importetotal_detail').html('');
    $('#importetotal_detail').html(importe_total);
    $('#tbodyPrin_detail').html(string);    
    toDataTable('tablePrin_detail');
    NProgress.done();
}

function solicitud_elegida(articulos_G){
    destroyDT('tablePrin');
    $('#tbodyPrin').html('');        
    var string = '';
    var importe_total=0;
    for (let i in articulos_G) {
        
        var ob = articulos_G[i];
        importe_total += parseFloat(ob.totalpartida);
            string += '<tr>';

            string += '<td>';
            string += ob.idpartida;
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
            string += toMoney(ob.totalpartida);
            string += '</td>';

            string += '</tr>';
    }
    importe_total = toMoney(importe_total);
    $('#importetotal').html('');
    $('#importetotal').html(importe_total);
    $('#tbodyPrin').html(string);    
    toDataTable('tablePrin');
    NProgress.done();
}

function solicitud_elegida_v(articulos_G){
    console.log("articulos_G");
    console.log(articulos_G);
    id_general=-1;
    destroyDT('tablePrinEdit');
    $('#tbodyPrinEdit').html('');        
    var string = '';
    var importe_total_v=0;
    for (let i in articulos_G) {
        
        var ob = articulos_G[i];
        importe_total_v += parseFloat(ob.totalautoriza);
            string += '<tr>';

            string += '<td>';
            string += ob.idpartida;
            string += '</td>';

            string += '<td>';
            string += ob.descpartida;
            string += '</td>';
            
            string += '<td>';
            string += ob.cantidadautoriza;
            string += '</td>';

            string += '<td>';
            string += toMoney(ob.importeautoriza);
            string += '</td>';

            string += '<td>';
            string += toMoney(ob.totalautoriza);
            string += '</td>';

            string += '<td class="">';
            if(edit==0){
                string += '<button id="edit" class="ui basic green icon button" data-tooltip="Editar" onclick="mostrarModal(' + i + ');"><i class="edit icon"></i></button>';
            }
            string += '</td>';

            string += '</tr>';
            //$('#importetotal').html(toMoney(ob.importetotal));
    }
    importe_total_v = toMoney(importe_total_v);
    $('#importetotal_v').html('');
    $('#importetotal_v').html(importe_total_v);
    $('#tbodyPrinEdit').html(string);    
    toDataTable('tablePrinEdit');
    NProgress.done();
}

function validarCamposPartida(){
    console.log(formValido('formSolicitud'));
    if(!formValido('formSolicitud')){
        modalEstatus('i', 'Favor de revisar los campos marcados con rojo.','','modal_solicitud');
        return false;
    } else{
        elegir_articulo_ajax();
    }
}

function mostrarModal(id){
    console.log(id);
    clearForm('formSolicitud');  
    $('#partida').attr('disabled',true);  
    if(id>=0){
        console.log("if");
        var importe = $('#partida option:selected').attr('importe');
        id_general = id;
        json = articulos_G[id];
        sol_detail(json);
        $('#c_l').show();
        $('#cantidad_v').show();
        $('#i_l').show();
        $('#importe_v').show();
        $('#total_v').show();
        $('#t_l').show();
        $('#partida').attr('disabled',true);  
        $('#cantidad').attr('disabled',true);  
        $('#importe').attr('disabled',true);  
        $('#total').attr('disabled',true);  
        $('#justificacion').attr('disabled',true);  
        if(importe<0){
            $('#cantidad_v').attr('disabled',true);
        }
        //$('#partida').attr('disabled',true);
    }else{
        $('#partida').attr('disabled',false);  
        $('#cantidad').attr('disabled',false);  
        $('#importe').attr('disabled',false);  
        $('#total').attr('disabled',false);  
        $('#justificacion').attr('disabled',false); 
        $('#c_l').hide();
        $('#cantidad_v').hide();
        $('#i_l').hide();
        $('#importe_v').hide();
        $('#total_v').hide();
        $('#t_l').hide();
    }
    $('#modal_solicitud').modal('show');
}

function sol_detail(json){
    console.log(json);
    dpd_viaticos('partida',json.idpartida);

    $('#cantidad').val(json.cantidad);
    $('#importe').val(json.importe);
    $('#total').val(json.totalpartida);
    $('#justificacion').val(json.justificacion);
    $('#cantidad_v').val(json.cantidadautoriza);
    $('#importe_v').val(json.importeautoriza);
    $('#total_v').val(json.totalautoriza);
}

function elegir_articulo_ajax(){
    console.log(id_general);
    // destroyDT('tablePrin');
    // $('#tbodyPrin').html('');

    var partida = $('#partida').val();
    var partidaText = $('#partida').dropdown('get text');
    var cantidad = $('#cantidad').val();
    var importe = $('#importe').val();
    var justificacion = $('#justificacion').val();
    var totalpartida = $('#total').val();
    var cantidad_v = $('#cantidad_v').val();
    var importe_v = $('#importe_v').val();
    var total = $('#total').val();
    var totalpartida_v = $('#total_v').val();
    if(cantidad == ''){
        cantidad = 1;
    }
    if(id_general>=0){
        console.log(id_general);
        solic_detalle = articulos_G[id_general].idgastoscomprobardetalle;
        console.log(solic_detalle);
        var json = {
            'idpartida' : partida,
            'idgastoscomprobardetalle' : solic_detalle,
            'cantidadautoriza' : cantidad_v,
            'importeautoriza' : importe_v,
            'totalautoriza' : totalpartida_v,
            'descpartida' : partidaText,
            'cantidad' : cantidad,
            'importe' : importe,
            'totalpartida' : total
        };
    }
    else{
        solic_detalle = 0;
        var json_v = {
            'idgastoscomprobar' : idSolicitud,
            'idpartida' : partida,
            'cantidadautoriza' : cantidad,
            'importeautoriza' : importe,
            'totalautoriza' : totalpartida,
            'justificacion' : justificacion,
            'descpartida' : partidaText
        };
    }
    
    //importe_total += parseFloat(totalpartida);
    
    if(id_general>=0){
        articulos_G[id_general]=json;
        ajaxPost("verificar_edit_detail.php", nada, json);
    }else{
        console.log(json_v);
        articulos_G.push(json_v);
        ajaxPost("verificar_ins.php", carga, json_v);
    }
    //$('#importetotal').html(toMoney(importe_total));
    solicitud_elegida_v(articulos_G);
    $('#modal_solicitud').modal('hide');
}
function nada(json){
    console.log(json);
}