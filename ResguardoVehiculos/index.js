var myDropzone;
var file_name = '';
var valid_file;
var idvehiculoresguardo_G = -1;


$(document).ready(function() {    
    dpd_vehiculo('vehiculo');
    validarInit('formResguardo');
    $('#vehiculo').change(function(){
        llenar_tabla_ajax();
    });
    //llenar_tabla_ajax();
});

function llenar_tabla_ajax(){
    destroyDTGen();
    $('#tbody').html('');
    var id_vehiculo = $('#vehiculo').val();

    ajaxPost("resguardo_all.php", llenar_tabla,{'id_vehiculo' : id_vehiculo});
}

function llenar_tabla(json){
    var string = '';    

    for (let i in json) {
        var ob = json[i];            
        string += '<tr>';

        string += '<td>';
        string += fechaEspanol(ob.fecharesguardo,false,true);
        string += '</td>';

        string += '<td>';
        string += ob.tiporesguardo;
        string += '</td>';

        string += '<td>';
        string += ob.placas;
        string += '</td>';

        string += '<td>';
        string += ob.marcavehiculo;
        string += '</td>';

        string += '<td>';
        string += ob.aniomodelo;
        string += '</td>';

        string += '<td>';
        string += ob.numeconomico;
        string += '</td>';

        string += '<td>';
        string += ob.empleadoresguardo;
        string += '</td>';

        string += '<td>';
        string += ob.nombrecliente;
        string += '</td>';

        string += '<td>';
        string += ob.descadscripcion;
        string += '</td>';

        string += '<td>';        
        //string += '<button class="ui basic green icon button" data-tooltip="Resguardo" onclick=mostrarModalEdit(' + ob.idvehiculoresguardo + ');><i class="paperclip icon"></i></button>';
        string += '<button class="ui basic green icon button" data-tooltip="Documentos" onclick="files_gen_ajax(\'05\',' + ob.idvehiculoresguardo + ');"><i class="file pdf icon"></i></button>';
        string += '<button class="ui basic red icon button" data-tooltip="Eliminar" onclick="modalBorrarFN(' + ob.idvehiculoresguardo + ');"><i class="close icon"></i></button>';
        string += '</td>';

        string += '</tr>';
    }
    $('#tbody').html(string);
    toDataTableGen();
    NProgress.done();
}

function mostrarModalEdit(id){
    idvehiculoresguardo_G = id;
    $('#modal_editar').modal('show');
}

function mostrarModal(){
    var vehiculo = $('#vehiculo').val();

    if(vehiculo.length == 0){
        modalEstatus('i', 'Favor de seleccionar un vehículo');
        return false;
    }

    var nombre = $('#vehiculo').dropdown('get text');
    var placas = $('#vehiculo option:selected').attr('placas');

    clearForm('formResguardo');

    $('#vehiculo_mdl').val(nombre);
    $('#placas_mdl').val(placas);

    
    dpd_region('region_mdl','adscripcion_mdl');
    dpd_cliente('cliente_mdl');    
    dpd_empleado('empleado_resp_mdl');
    dpd_empleado('empleado_supervisor_mdl');

    

    $('#modal_resguardo').modal('show');
}

function agregar_ajax(){

    if (!formValido('formResguardo')){
        modalEstatus('i', 'Favor de revisar los campos marcados en rojo.','','modal_resguardo');
        return false;
    }

    var kmActual = parseFloat(quitarComas($('#km_actual_mdl').val()));
    var kmUltServ = parseFloat(quitarComas($('#kms_ult_serv_mdl').val()));
    var kmProxServ = parseFloat(quitarComas($('#km_prox_serv_mdl').val()));

    if (kmUltServ > kmActual){
        modalEstatus('i', 'El kilometraje actual debe ser mayor al kilometraje del ultimo servicio.','','modal_resguardo');
        return false;
    }

    if (kmActual > kmProxServ){
        modalEstatus('i', 'El kilometraje del proximo servicio debe ser mayor al kilometraje actual.','','modal_resguardo');
        return false;
    }

    var fechares = $('#fecha_res_mdl').val();

    fechares = fechares.replace('T', ' ');

    var json = {
        'idvehiculo' :                      $('#vehiculo').val(),
        'placas' :                          $('#placas_mdl').val(),
        'fecharesguardo' :                  fechares,
        'tiporesguardo' :                   $('#tipo_res_mdl').val(),
        'idempleadoresguardo' :             $('#empleado_resp_mdl').val(),
        'idempleadosupervisor' :            $('#empleado_supervisor_mdl').val(),
        'idregion' :                        $('#region_mdl').val(),
        'idadscripcion' :                   $('#adscripcion_mdl').val(),
        'idcliente' :                       $('#cliente_mdl').val(),
        'kilometrajeultimoservicio' :       quitarComas($('#kms_ult_serv_mdl').val()),
        'fechaultimoservicio' :             $('#fecha_ult_serv_mdl').val(),
        'kilometrajeactual' :               quitarComas($('#km_actual_mdl').val()),
        'kilometrajeproximoservicio' :      quitarComas($('#km_prox_serv_mdl').val()),
        'observaciones' :                   $('#obs_mdl').val(),
    }

    ajaxPost("resguardo_insert.php", correctoTabla, json);
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
    $('#btn_delete').attr('onclick', 'deleteRes(' + id + ')');

    $('#modal_borrar').modal('show');
}

function updRes(name){    
    ajaxPost("resguardo_upd.php", correctoTabla, {'id' : idvehiculoresguardo_G,'nombre':name});
}

function deleteRes(id){
    $('#modal_borrar').modal('hide');
    ajaxPost("resguardo_delete.php", correctoTabla, {'id' : id});
}