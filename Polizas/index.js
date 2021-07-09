var id_poliza_G = -1;

$(document).ready(function() {    
    dpd_vehiculo('vehiculo');
    validarInit('formPoliza');
    $('#vehiculo').change(function(){
        llenar_tabla_ajax();  
    });
    //llenar_tabla_ajax();
});

function llenar_tabla_ajax(){
    destroyDTGen();
    $('#tbody').html('');
    var id_vehiculo = $('#vehiculo').val();

    ajaxPost("poliza_all.php", llenar_tabla,{'id_vehiculo' : id_vehiculo});
}

function llenar_tabla(json){
    var string = '';    

    for (let i in json) {
        var ob = json[i];            
        string += '<tr>';

        string += '<td>';
        string += ob.numpoliza;
        string += '</td>';

        string += '<td>';
        string += ob.descaseguradora;
        string += '</td>';

        string += '<td>';
        string += fechaEspanol(ob.fechapago);
        string += '</td>';

        string += '<td>';
        string += fechaEspanol(ob.iniciovigencia);
        string += '</td>';

        string += '<td>';
        string += fechaEspanol(ob.finalvigencia);
        string += '</td>';        

        string += '<td>';
        string += ob.observaciones;
        string += '</td>';

        string += '<td>';
        string += '<button class="ui basic green icon button" data-tooltip="Documentos" onclick="files_gen_ajax(\'07\',' + ob.idvehiculopoliza + ');"><i class="file pdf icon"></i></button>';
        string += '<button class="ui basic red icon button" data-tooltip="Eliminar" onclick="modalBorrarFN(' + ob.idvehiculopoliza + ');"><i class="close icon"></i></button>';
        string += '</td>';

        string += '</tr>';
    }
    $('#tbody').html(string);
    toDataTableGen();
    NProgress.done();
}


function mostrarModal(id){
    id_poliza_G = id;

    var vehiculo = $('#vehiculo').val();

    if(vehiculo.length == 0){
        modalEstatus('i', 'Favor de seleccionar un vehiculo');
        return false;
    }

    var nombre = $('#vehiculo').dropdown('get text');
    
    clearForm('formPoliza');

    $('#vehiculo_mdl').val(nombre);
    dpd_aseguradora('aseguradora_mdl');
        
    $('#modal_poliza').modal('show');
}

function llenar_modal(json){
    var ob = json[0];

    $('#taller_mdl').val(ob.tallermecanico);
    $('#fecha_mdl').val( fechaSinHora(ob.fecha) );
    $('#importe_total_mdl').val( toMoney(ob.importetotal) );
    $('#km_actual_mdl').val( toMoney(ob.kilometrajeactual) );
    $('#observaciones_mdl').val(ob.observaciones);
    $('#servicio_mdl').val(ob.descservicio);

    NProgress.done();
}

function agregar_ajax(){

    if (!formValido('formPoliza')){
        modalEstatus('i', 'Favor de revisar los campos marcados en rojo.','','modal_poliza');
        return false;
    }

    var json = {
        'idvehiculo':       $('#vehiculo').val(),
        'finalvigencia':    $('#final_vigencia_mdl').val(),
        'idaseguradora':    $('#aseguradora_mdl').val(),
        'fechapago':        $('#fecha_pago_mdl').val(),
        'numpoliza':        $('#num_poliza_mdl').val(),
        'importetotal':     quitarComas( $('#importe_total_mdl').val() ),
        'iniciovigencia':   $('#inicio_vigencia_mdl').val(),
        'observaciones':    $('#observaciones_mdl').val()
    }

    ajaxPost("poliza_insert.php", correctoTabla, json);
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
    $('#btn_delete').attr('onclick', 'deletePoliza(' + id + ')');

    $('#modal_borrar').modal('show');
}

function deletePoliza(id){
    $('#modal_borrar').modal('hide');
    ajaxPost("poliza_delete.php", correctoTabla, {'id' : id});
}