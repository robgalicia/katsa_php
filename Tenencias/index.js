var id_tenencia_G = -1;

$(document).ready(function() {    
    dpd_vehiculo('vehiculo');
    validarInit('formTenencia');
    $('#vehiculo').change(function(){
        llenar_tabla_ajax();  
    });
    //llenar_tabla_ajax();
});

function llenar_tabla_ajax(){
    destroyDTGen();
    $('#tbody').html('');
    var id_vehiculo = $('#vehiculo').val();

    ajaxPost("tenencia_all.php", llenar_tabla,{'id_vehiculo' : id_vehiculo});
}

function llenar_tabla(json){
    var string = '';    

    for (let i in json) {
        var ob = json[i];            
        string += '<tr>';

        string += '<td>';
        string += fechaEspanol(ob.fechapago);
        string += '</td>';

        string += '<td>';
        string += toMoney(ob.importepagado);
        string += '</td>';

        string += '<td>';
        string += fechaEspanol(ob.fechavigencia);
        string += '</td>';        

        string += '<td>';
        string += fechaEspanol(ob.fechavigencia);
        string += '</td>';

        string += '<td>';
        string += ob.foliotarjeta;
        string += '</td>';

        string += '<td>';
        string += '<button class="ui basic green icon button" data-tooltip="Documentos" onclick="files_gen_ajax(\'08\',' + ob.idvehiculotenencia + ');"><i class="file pdf icon"></i></button>';
        string += '<button class="ui basic red icon button" data-tooltip="Eliminar" onclick="modalBorrarFN(' + ob.idvehiculotenencia + ');"><i class="close icon"></i></button>';
        string += '</td>';

        string += '</tr>';
    }
    $('#tbody').html(string);
    toDataTableGen();
    NProgress.done();
}


function mostrarModal(id){
    id_tenencia_G = id;

    var vehiculo = $('#vehiculo').val();

    if(vehiculo.length == 0){
        modalEstatus('i', 'Favor de seleccionar un vehiculo');
        return false;
    }

    var nombre = $('#vehiculo').dropdown('get text');
    var placas = $('#vehiculo option:selected').attr('placas');
    
    clearForm('formTenencia');

    $('#vehiculo_mdl').val(nombre);
    $('#placas_mdl').val(placas);
        
    $('#modal_tenencia').modal('show');
}

function agregar_ajax(){

    if (!formValido('formTenencia')){
        modalEstatus('i', 'Favor de revisar los campos marcados en rojo.','','modal_tenencia');
        return false;
    }

    var json = {
        'idvehiculo':       $('#vehiculo').val(),        
        'fechavigencia':    $('#fecha_vigencia_mdl').val(),
        'fechapago':        $('#fecha_pago_mdl').val(),
        'placas':           $('#placas_mdl').val(),
        'circulacion':           $('#circulacion_mdl').val(),
        'importepagado':    quitarComas( $('#importe_total_mdl').val() )
    }

    ajaxPost("tenencia_insert.php", correctoTabla, json);
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
    $('#btn_delete').attr('onclick', 'deleteTenencia(' + id + ')');

    $('#modal_borrar').modal('show');
}

function deleteTenencia(id){
    $('#modal_borrar').modal('hide');
    ajaxPost("tenencia_delete.php", correctoTabla, {'id' : id});
}