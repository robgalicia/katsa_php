var id_g = -1;
$(document).ready(function() {    
    validarInit('formConsumo');
    $('#precio_litro_mdl').keyup(function(){
        calc_precio_total();
    });
});

function llenar_tabla_ajax(){
    destroyDTGen();
    $('#tbody').html('');
    var fecha_ini = $('#fecha_ini').val();
    var fecha_fin = $('#fecha_fin').val();
    
    var json = {
        'fecha_ini' : fecha_ini,
        'fecha_fin' : fecha_fin
    };

    ajaxPost("consumos_all.php", llenar_tabla,json);

}

function llenar_tabla(json){
    var string = '';    

    for (let i in json) {
        var ob = json[i];            
        string += '<tr>';

        string += '<td>';
        string += ob.semana;
        string += '</td>';

        string += '<td>';
        string += ob.numtarjeta;
        string += '</td>';

        string += '<td>';
        string += fechaEspanol(ob.fecha);
        string += '</td>';

        string += '<td>';
        string += ob.servicio;
        string += '</td>';

        string += '<td>';
        string += ob.nombreempleado;
        string += '</td>';        

        string += '<td>';
        string += ob.vehiculo;
        string += '</td>';        

        string += '<td>';
        //string += '<button class="ui basic green icon button" data-tooltip="Editar" onclick=\'redirect("recursosH.php?idempleadoG=' + ob.idempleado + '");\'><i class="edit icon"></i></button>';
        //string += '<button class="ui basic green icon button" data-tooltip="Referencias" onclick=\'redirect("../Referencias/index.php?idempleadoG=' + ob.idempleado + '");\'><i class="address book icon"></i></button>';
        //string += '<button class="ui basic green icon button" data-tooltip="Documentos" onclick=\'redirect("../Documentos/index.php?idempleadoG=' + ob.idempleado + '&nombre=' + ob.nombrecompleto + '");\'><i class="paperclip icon"></i></button>';
        string += '</td>';

        string += '</tr>';
    }
    $('#tbody').html(string);
    toDataTableGen();
    NProgress.done();
}

function mostrarModal(id){
    id_g = id;
    clearForm('formConsumo');
    
    dpd_region('region_mdl','adscripcion_mdl')
    dpd_tarjeta('tarjeta_mdl');
    dpd_vehiculo('vehiculo_mdl');
    dpd_tipo_combustible('tipo_combustible_mdl');
    dpd_cliente('cliente_mdl');
    dpd_empleado('empleado_mdl');

    if(id_g > 0){
        ajaxPost("consumo_all_edit.php", llenarModal, {'id':id_g});
    }
    

    $('#modal_consumo').modal('show');
}

function calc_precio_total(){
    var litros = $('#litros_mdl').val();
    var precio_litros = $('#precio_litro_mdl').val();

    litros = quitarComas(litros);
    precio_litros = quitarComas(precio_litros);

    var total = litros * precio_litros;

    $('#precio_total_mdl').val(toMoney(total));
    
}

function llenarModal(json){
    var ob = json[0];
    
    $('#semana_mdl').val(ob.semana);
    $('#fecha_mdl').val(fechaSinHora(ob.fecha));
    $('#tarjeta_mdl').val(ob.idtarjetacombustible);
    $('#vehiculo_mdl').val(ob.idvehiculo);
    $('#region_mdl').val(ob.idregion);
    $('#adscripcion_mdl').val(ob.idadscripcion);
    $('#cliente_mdl').val(ob.idcliente);
    $('#empleado_mdl').val(ob.idempleado);
    $('#km_carga_antes_mdl').val( toMoney(ob.kilometrajeanterior) );
    $('#nivel_antes_cargar_mdl').val( toMoney(ob.niveltanqueantes) );
    $('#km_al_cargar_mdl').val( toMoney(ob.kilometrajeactual) );
    $('#nivel_despues_cargar_mdl').val( toMoney(ob.niveltanquedespues) );
    $('#tipo_combustible_mdl').val(ob.idtipocombustible);
    $('#litros_mdl').val( toMoney(ob.cantidadlitros) );
    $('#precio_litro_mdl').val( toMoney(ob.preciolitro) );
    $('#precio_total_mdl').val( toMoney(ob.preciototal) );
    $('#km_recorridos_mdl').val( toMoney(ob.kilometrosrecorridos) );
    $('#rendimiento_litro_mdl').val( toMoney(ob.rendimientolitro) );
    $('#Observaciones_mdl').val(ob.observaciones)
}

function agregar_ajax(){

    if (!formValido('formConsumo')){
        modalEstatus('i', 'Favor de revisar los campos marcados en rojo.','','modal_consumo');
        return false;
    }

    var json = {
        'idvehiculogasolina' :              id_g,
        'semana' :                          $('#semana_mdl').val(),
        'fecha' :                           $('#fecha_mdl').val(),
        'idtarjetacombustible' :            $('#tarjeta_mdl').val(),
        'idvehiculo' :                      $('#vehiculo_mdl').val(),
        'idregion' :                        $('#region_mdl').val(),
        'idadscripcion' :                   $('#adscripcion_mdl').val(),
        'idcliente' :                       $('#cliente_mdl').val(),
        'idempleado' :                      $('#empleado_mdl').val(),
        'kilometrajeanterior' :             quitarComas( $('#km_carga_antes_mdl').val() ),
        'niveltanqueantes' :                quitarComas( $('#nivel_antes_cargar_mdl').val() ),
        'kilometrajeactual' :               quitarComas( $('#km_al_cargar_mdl').val() ),
        'niveltanquedespues' :              quitarComas( $('#nivel_despues_cargar_mdl').val() ),
        'idtipocombustible' :               $('#tipo_combustible_mdl').val(),
        'cantidadlitros' :                  quitarComas( $('#litros_mdl').val() ),
        'preciolitro' :                     quitarComas( $('#precio_litro_mdl').val() ),
        'preciototal' :                     quitarComas( $('#precio_total_mdl').val() ),
        'kilometrosrecorridos' :            quitarComas( $('#km_recorridos_mdl').val() ),
        'rendimientolitro' :                quitarComas( $('#rendimiento_litro_mdl').val() ),
        'observaciones' :                   $('#Observaciones_mdl').val()
    }

    ajaxPost("consumo_insert.php", correctoTabla, json);
}

function correctoTabla(json){
    console.log(json);
    if(json.result){
        $('.modal').modal('hide');
        modalEstatus('o', 'La operación se realizó de manera correcta.');
        llenar_tabla_ajax();        
    }else{
        modalEstatus('e', 'Ocurrio un error.');        
    }

    NProgress.done();
}

function modalBorrarFN(id){
    $('#btn_delete').attr('onclick', 'deleteCon(' + id + ')');

    $('#modal_borrar').modal('show');
}

function deleteCon(id){
    $('#modal_borrar').modal('hide');
    ajaxPost("consumo_delete.php", correctoTabla, {'id' : id});
}