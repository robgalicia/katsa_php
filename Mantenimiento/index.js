var id_mante_G = -1;

$(document).ready(function() {    
    dpd_vehiculo('vehiculo');
    dpd_proveedor('taller_mdl');
    dpd_empleado('empleado_comisionado');

    validarInit('formMantenimiento');
    $('#vehiculo').change(function(){
        llenar_tabla_ajax();  
    });
    //llenar_tabla_ajax();
});

function llenar_tabla_ajax(){
    destroyDTGen();
    $('#tbody').html('');
    var id_vehiculo = $('#vehiculo').val();

    ajaxPost("mante_all.php", llenar_tabla,{'id_vehiculo' : id_vehiculo});
}

function llenar_tabla(json){
    var string = '';    

    for (let i in json) {
        var ob = json[i];            
        string += '<tr>';

        string += '<td>';
        string += fechaEspanol(ob.fecha);
        string += '</td>';

        string += '<td>';
        string += toMoney(ob.kilometrajeactual);
        string += '</td>';

        string += '<td>';
        string += ob.descservicio;
        string += '</td>';

        string += '<td>';
        string += ob.proveedorservicio;
        string += '</td>';

        string += '<td>';
        string += toMoney(ob.importetotal);
        string += '</td>';        

        string += '<td>';
        string += '<button class="ui basic green icon button" data-tooltip="Editar" onclick=mostrarModal(' + ob.idvehiculomantenimiento + ');><i class="edit icon"></i></button>';
        string += '<button class="ui basic green icon button" data-tooltip="Documentos" onclick="files_gen_ajax(\'10\',' + ob.idvehiculomantenimiento + ');"><i class="file pdf icon"></i></button>';
        string += '<button class="ui basic red icon button" data-tooltip="Eliminar" onclick="modalBorrarFN(' + ob.idvehiculomantenimiento + ');"><i class="close icon"></i></button>';
        string += '</td>';

        string += '</tr>';
    }
    $('#tbody').html(string);
    toDataTableGen();
    NProgress.done();
}


function mostrarModal(id){
    id_mante_G = id;

    var vehiculo = $('#vehiculo').val();

    if(vehiculo.length == 0){
        modalEstatus('i', 'Favor de seleccionar un vehiculo');
        return false;
    }

    var nombre = $('#vehiculo').dropdown('get text');
    
    clearForm('formMantenimiento');

    $('#vehiculo_mdl').val(nombre);

    if(id > 0){
        ajaxPost("mante_all_edit.php", llenar_modal,{'id_vehiculo' : id_mante_G});
    }

        
    $('#modal_mantenimiento').modal('show');
}

function llenar_modal(json){
    console.log(json)
    var ob = json[0];

    $('#taller_mdl').val(ob.idproveedor).change();
    $('#empleado_comisionado').val(ob.idempleadocomision).change();
    $('#fecha_mdl').val( fechaSinHora(ob.fecha) );
    $('#subtotal_mdl').val( toMoney(ob.subtotal) )
    $('#iva_mdl').val( toMoney(ob.iva) )
    $('#importe_total_mdl').val( toMoney(ob.importetotal) );
    $('#km_actual_mdl').val( toMoney(ob.kilometrajeactual) );
    $('#observaciones_mdl').val(ob.observaciones);
    $('#servicio_mdl').val(ob.descservicio);

    $('#kms_prox_mantenimiento').val( toMoney(ob.kmsproxmantenimiento) )
    $('#fecha_pago_mdl').val(fechaEspanol(ob.fechapago))
    $('#ref_pago_mdl').val(ob.referenciapago)

    NProgress.done();
}

function agregar_ajax(){

    if (!formValido('formMantenimiento')){
        modalEstatus('i', 'Favor de revisar los campos marcados en rojo.','','modal_mantenimiento');
        return false;
    }

    var json = {
        'idvehiculomantenimiento' :     id_mante_G,
        'idvehiculo' :                  $('#vehiculo').val(),        
        'tallermecanico':               $('#taller_mdl').val(),
        'idempleado':                   $('#empleado_comisionado').val(),
        'fecha':                        $('#fecha_mdl').val(),
        'subtotal':                     quitarComas( $('#subtotal_mdl').val() ),
        'iva':                          quitarComas( $('#iva_mdl').val() ),
        'importetotal':                 quitarComas( $('#importe_total_mdl').val() ),
        'kilometrajeactual':            quitarComas( $('#km_actual_mdl').val() ),
        'observaciones':                $('#observaciones_mdl').val(),
        'descservicio':                 $('#servicio_mdl').val(),
        'kmsproxmantenimiento':         quitarComas( $('#kms_prox_mantenimiento').val() ),
        'fechapago':                    $('#fecha_pago_mdl').val(),
        'referenciapago':               $('#ref_pago_mdl').val()
    }
    
    ajaxPost("mante_insert.php", correctoTabla, json);
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
    $('#btn_delete').attr('onclick', 'deleteMante(' + id + ')');

    $('#modal_borrar').modal('show');
}

function deleteMante(id){
    $('#modal_borrar').modal('hide');
    ajaxPost("mante_delete.php", correctoTabla, {'id' : id});
}