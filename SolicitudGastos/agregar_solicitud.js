var articulos_G = [];
var idSolicitud = -1;
var edit = -1;
var total=0;
var importe_total=0;
var solic_detalle=0;
var id_general=-1;
var id_edit = -1;
$(document).ready(function() {   
    validarInit('formGeneral'); 
    validarInit('formSolicitud'); 
    
    var region = $.get("region");
    idSolicitud = $.get("idsoli");
    edit=$.get("edit");
    dpd_cliente('cliente');
    dpd_empleado('empleado_solicita', getEmpleado() );
    dpd_viaje('tipo_viaje');
    dpd_empleado('empleado_beneficiario');
    //dpd_adscripcion('adscripcion',region);
    dpd_viaticos('partida');
    var ads = $( "#adscripcion option:selected" ).text();
    //console.log(ads);
    $('#lugar_viaje').val(ads);

    
    var fechaActual = obtenerFechaCampo();
    $('#fecha_solicitud').val(fechaActual);

    $('#partida').change(function(){
        $('#cantidad').val("");
        $('#total').val("");
        var importe = $('#partida option:selected').attr('importe');
        if(importe>0){
            //console.log(importe)
            $('#importe').val(importe);
            $('#importe').attr('disabled',true);
            $('#cantidad').attr('disabled',false);
        }else{
            $('#importe').val("");
            $('#cantidad').attr('disabled',true);
            $('#importe').attr('disabled',false);
        }
        
    });    

    $('#importe').keyup(function(){
        var importe = $('#importe').val();
        //console.log(importe);
        $('#total').val(importe);
    }); 

    /*$('#adscripcion').change(function(){
        var kms = $('#adscripcion option:selected').attr('kms');
        //console.log(kms)
        var ads = $( "#adscripcion option:selected" ).text();
        //console.log(ads);
        $('#lugar_viaje').val(ads);
        $('#km').val(kms);
    }); */

    $('#cantidad').keyup(function(){
        //console.log("key");
        var importe = $('#partida option:selected').attr('importe');
        var cantidad = $('#cantidad').val();
        total = importe * cantidad;
        $('#total').val(total);
    });

    if(idSolicitud > 0){
        //$('#eliminar').hide();
        ajaxPost("solicitud_all_detail.php", cargar_datos, {'idsolicitud':idSolicitud});
    }else{
        ads = $.get("adsc");
        dpd_departamento('departamento', $.get("dpo") );
        dpd_region('region','adscripcion', $.get("region") ,ads);
        $('#fecha').val( obtenerFechaCampo() );

        /*cambiar_partida()
        $('#tipoPartida').change(function(){
            cambiar_partida()
        });*/

        $('#empleado_beneficiario').change(function(){
            var correo = $('#empleado_beneficiario option:selected').attr('correo');
            $('#correo').val(correo);
        });
    }

    /*$('#tipo_solicitud').change(function(){
        var solicitud = $('#tipo_solicitud').val();
        if(solicitud=='E'){
            $('#lugar_viaje').attr('disabled',false);
            $('#lugar_viaje').val('');
            $('#adscripcion').val('');
            $('#adscripcion').attr('disabled',true);
        }else{
            var ads = $( "#adscripcion option:selected" ).text();
            $('#lugar_viaje').val(ads);
            $('#lugar_viaje').attr('disabled',true);
            $('#adscripcion').attr('disabled',false);
        }
    });   */


});

function cargar_datos(json){
    // console.log("json");
    // console.log(json);
    if(edit==0){
        $('#cliente').attr('disabled',true);
        $('#adscripcion').attr('disabled',true);
        $('#region').attr('disabled',true);
        $('#tipo_solicitud').attr('disabled',true);
        $('#observaciones').attr('disabled',true);
        $('#btn_add').attr('disabled',true);
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
        $('#edit').attr('disabled',true); 
        $('#delete').attr('disabled',true); 
    }

    var ob = json[0];
    var km = Number(ob.distanciakms);
    dpd_departamento('departamento', ob.iddepartamento );
    dpd_region('region','adscripcion', ob.idregion,ob.idadscripcion);   
    //dpd_adscripcion('adscripcion',ob.idregion,ob.idadscripcion);
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
    $('#km').val(km);
    $('#dias').val(ob.diasviaje);
    $('#fecha_inicial').val(fechaSinHora(ob.fechainicial));
    $('#fecha_final').val(fechaSinHora(ob.fechafinal));


    articulos_G = json
    solicitud_elegida(articulos_G);

    NProgress.done();
}

function cambiar_partida(){
    var tipoPartida = $('#tipoPartida').val();

    dpd_partida('partida', tipoPartida);
}

function mostrarModal(id){
    // console.log("id");
    console.log(id);
    destroyDT('tablePrin');
    clearForm('formSolicitud');
    var json='';
    if(id>=0){
        //console.log("if mostrar modal");
        id_general = id;
        //console.log(articulos_G[id]);
        json = articulos_G[id];
        id_edit = articulos_G[id].idgastoscomprobardetalle;
        sol_detail(json);
        // ajaxPost("solicitud_detail_sel.php", sol_detail, {'idsolicitud':id});
    }
    NProgress.done();
    //$('#tbodyPrin').html('');    
    $('#modal_solicitud').modal('show');
}

function sol_detail(json){
    dpd_viaticos('partida',json.idpartida);
    $('#cantidad').val(json.cantidad);
    $('#importe').val(json.importe);
    $('#total').val(json.totalpartida);
    $('#justificacion').val(json.justificacion);
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

            string += '<td>';
            string += ob.justificacion;
            string += '</td>';

            string += '<td class="">';
            if(edit==1){
                string += '<button id="edit" class="ui basic green icon button" data-tooltip="Editar" onclick="mostrarModal(' + i + ');"><i class="edit icon"></i></button>';
                string += '<button id="delete" class="ui basic red icon button" data-tooltip="Eliminar" onclick="borrar_elemento(' + i + ');"><i class="close icon"></i></button>';
            }
            string += '</td>';

            string += '</tr>';
            //$('#importetotal').html(toMoney(ob.importetotal));
    }
    importe_total = toMoney(importe_total);
    $('#importetotal').html('');
    $('#importetotal').html(importe_total);
    $('#tbodyPrin').html(string);    
    toDataTable('tablePrin')
    NProgress.done();
}

function borrar_elemento(id){
    console.log(articulos_G[id].idgastoscomprobardetalle);
    if(articulos_G[id].idgastoscomprobardetalle>0){
        ajaxPost("solicitud_detail_delete.php", nada, {'idsolicitud':articulos_G[id].idgastoscomprobardetalle});
    }
    if (id > -1) {
        articulos_G.splice(id, 1);
    }

    solicitud_elegida(articulos_G);
}


function elegir_articulo_ajax(){
    console.log(id_general);
    destroyDT('tablePrin');
    $('#tbodyPrin').html('');

    var partida = $('#partida').val();
    var partidaText = $('#partida').dropdown('get text');
    var cantidad = $('#cantidad').val();
    var importe = $('#importe').val();
    var justificacion = $('#justificacion').val();
    var totalpartida = $('#total').val();

    if(id_general>=0){
        console.log(id_general);
        solic_detalle = articulos_G[id_general].idgastoscomprobardetalle;
    }
    else{
        solic_detalle = 0;
    }
    if(cantidad == ''){
        cantidad = 1;
    }
    //importe_total += parseFloat(totalpartida);
    var json = {
        'idgastoscomprobardetalle' : solic_detalle,
        'idpartida' : partida,
        'cantidad' : cantidad,
        'partida' : partida,
        'descpartida' : partidaText,
        'importe' : importe,
        'totalpartida':(importe*cantidad),
        'justificacion' : justificacion
    };
    if(id_general>=0){
        articulos_G[id_general]=json;
    }else{
        console.log("else");
        articulos_G.push(json);
    }
    console.log(articulos_G);
    //$('#importetotal').html(toMoney(importe_total));
    solicitud_elegida(articulos_G);
    $('#modal_solicitud').modal('hide');
    id_general=-1;
}

function agregar_ajax(){
    if(articulos_G.length > 0){
        var ptipogasto = $('#tipo_solicitud').val();
        var plugarviaje = $('#lugar_viaje').val();
        var pidtipoviaje = $('#tipo_viaje').val();
        var pidempleadosolicita = $('#empleado_solicita').val();
        var pidempleadobeneficiario = $('#empleado_beneficiario').val();
        var pidregion = $('#region').val();
        var piddepartamento = $('#departamento').val();
        var pobservaciones = $('#observaciones').val();
        var pidcliente = $('#cliente').val();
        var pcorreo = $('#correo').val();
        var pfechainicial = $('#fecha_inicial').val();
        var pfechafinal = $('#fecha_final').val();
        var pdistanciakms = $('#km').val();
        var pidadscripcion = $('#adscripcion').val();
        var pmotivoviaje = $('#motivo').val();
        var pdiasviaje = $('#dias').val();
    
    
        var json = {
            'idgastoscomprobar':idSolicitud,
            'ptipogasto' : ptipogasto,
            'plugarviaje' : plugarviaje,
            'pidtipoviaje' : pidtipoviaje,
            'pmotivoviaje' : pmotivoviaje,
            'pdiasviaje' : pdiasviaje,
            'pfechainicial' : pfechainicial,
            'pfechafinal' : pfechafinal,
            'pdistanciakms' : pdistanciakms,
            'pidregion' : pidregion,
            'pidadscripcion' : pidadscripcion,
            'piddepartamento' : piddepartamento,
            'pidcliente' : pidcliente,
            'pidempleadosolicita' : pidempleadosolicita,
            'pidempleadobeneficiario' : pidempleadobeneficiario,
            'pcorreoelectronico' : pcorreo,
            'pobservaciones' : pobservaciones
        };
    
        ajaxPost("solicitud_insert.php", agregar_detalle_ajax, json);
    }else{
        modalEstatus('i', 'Favor de registrar una partida');
        return false;
        
    }
    
}

function agregar_detalle_ajax(json){
    console.log("articulos_G");
    console.log(articulos_G);

    var solic = json.lastid;

    for(var i = 0; i < articulos_G.length; i++){

        var ob = articulos_G[i];

        var json = {
            'pidgastoscomprobardetalle' : ob.idgastoscomprobardetalle,
            'pidgastoscomprobar' : solic,
            'pidpartida' : ob.idpartida,
            'pcantidad': ob.cantidad,
            'pimporte' : ob.importe,
            'ptotal' : ob.totalpartida,
            'pjustificacion' : ob.justificacion
        };        

        ajaxPost("solicitud_insert_detail.php", nada, json);
    }
    //correct(json);
    correcto({'result':true});
}

function validarCampos(){
    console.log(formValido('formGeneral'));
    if(!formValido('formGeneral')){
        modalEstatus('i', 'Favor de revisar los campos marcados con rojo.');
        return false;
    } else{
        agregar_ajax();
    }
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
}

function nada(json){
    console.log(json);
}

function modalBorrarFN(id){
    console.log(id)
    $('#btn_delete').attr('onclick', 'deletearticulo(' + id + ')');

    $('#modal_borrar').modal('show');
}

function deletearticulo(id){
    $('#modal_borrar').modal('hide');
    ajaxPost("solicitud_detail_delete.php", elegir_articulo_ajax, {'idsolicitud' : id});
}