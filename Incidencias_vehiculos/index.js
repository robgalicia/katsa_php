var idIncidencia = -1;

$(document).ready(function() {   
    dpd_vehiculo('vehiculo'); 
    validarInit('formIncidenciasVehiculo');
    //llenar_tabla_ajax();
});

function llenar_tabla_ajax(){
    destroyDTGen();
    $('#tbody').html('');
    var id_vehiculo = $('#vehiculo').val();    
    ajaxPost("incidencias_all.php", llenar_tabla,{'id_vehiculo' : id_vehiculo});
}

function llenar_tabla(json){
    console.log("json")
    console.log(json)
    var string = '';    

    for (let i in json) {
        var ob = json[i];            
        string += '<tr>';

        string += '<td>';
        string += ob.idvehiculoincidencia;
        string += '</td>';

        string += '<td>';
        string += fechaEspanol(ob.fechaincidencia,false,true);
        string += '</td>';

        string += '<td>';
        string += ob.desctipoincidenciaveh;
        string += '</td>';        

        string += '<td>';
        string += ob.observaciones;
        string += '</td>';

        string += '<td>';
        string += '<button class="ui basic green icon button" data-tooltip="Documentos" onclick="files_gen_ajax(\'06\',' + ob.idvehiculoincidencia + ');"><i class="file pdf icon"></i></button>';
        string += '<button class="ui basic red icon button" data-tooltip="Eliminar" onclick="modalBorrarFN(' + ob.idvehiculoincidencia + ');"><i class="close icon"></i></button>';
        string += '</td>';

        string += '</tr>';
    }
    $('#tbody').html(string);
    toDataTableGen();
    NProgress.done();
}


function mostrarModal(id){
    var vehiculo = $('#vehiculo').val();

    if(vehiculo.length == 0){
        modalEstatus('i', 'Favor de seleccionar un vehiculo');
        return false;
    }

    var nombre = $('#vehiculo').dropdown('get text');    

    idIncidencia = id;
    
    clearForm('formIncidenciasVehiculo');
    $('#vehiculo_mdl').val(nombre);
    dpd_empleado_search('dpd_empleado_menu');
    dpd_tipo_incidencia_vehiculo('tipo_incidencia_mdl');  

    if(idIncidencia > 0){
        ajaxPost("tarjeta_all_edit.php", llenarModal, {'id':idIncidencia});
    }

        
    $('#modal_tarjeta').modal('show');
}

function llenarModal(json){
    
    var ob = json[0];

    $('#num_tarjeta_mdl').val(ob.numtarjeta);
    $('#empleado_mdl').val(ob.idempleadoresguardo);
    $('#fecha_resguardo_mdl').val(fechaSinHora(ob.fecharesguardo));
    $('#fecha_baja_mdl').val(fechaSinHora(ob.fechabaja));
}

function agregar_ajax(){

    if (!formValido('formIncidenciasVehiculo')){
        modalEstatus('i', 'Favor de revisar los campos marcados en rojo.','','modal_tarjeta');
        return false;
    }

    var fecha = $('#fecha_incidencia_mdl').val();
    fecha = fecha.replace('T',' ');

    var json = {       
        'pidvehiculo' :   $('#vehiculo').val(),
        'pfechaincidencia':    fecha,
        'pidtipoincidenciaveh':        $('#tipo_incidencia_mdl').val(),
        'pidempleadoregistra':    $('#empleado').val(),
        'pobservaciones':    $('#observaciones_mdl').val(),
    }

    ajaxPost("incidenciasvehiculo_insert.php", correctoTabla, json);
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
    $('#btn_delete').attr('onclick', 'deleteIncidenciaVehiculo(' + id + ')');

    $('#modal_borrar').modal('show');
}

function deleteIncidenciaVehiculo(id){
    $('#modal_borrar').modal('hide');
    ajaxPost("incidenciasvehiculo_delete.php", correctoTabla, {'id' : id});
}

