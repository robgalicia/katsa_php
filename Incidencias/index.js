var id_incidencia_G = -1;

$(document).ready(function() {    
    dpd_empleado_search('dpd_empleado_menu');
    dpd_empleado_search('dpd_empleado_autoriza_mdl_menu');
    dpd_tipo_incidencia('tipo_inc_mdl');

    validarInit('formIncidencias');
    validarInit('formDocumento');

    dropzone();

    //llenar_tabla_ajax();    
});

function llenar_tabla_ajax(){
    destroyDTGen();
    $('#tbody').html('');
    var empleado = $('#empleado').val();
    ajaxPost("incidencia_all.php", llenar_tabla,{'empleado' : empleado});
}

function llenar_tabla(json){
    var string = '';    

    for (let i in json) {
        var ob = json[i];            
        string += '<tr>';

        string += '<td>';
        string += ob.idempleadoincidencia;
        string += '</td>';

        string += '<td>';
        string += ob.nombrecompleto;
        string += '</td>';

        string += '<td>';
        string += fechaEspanol(ob.fechaincidencia);
        string += '</td>';

        string += '<td>';
        string += ob.desctipoincidenciaemp;
        string += '</td>';

        string += '<td>';
        string += ob.observaciones;
        string += '</td>';                

        string += '<td>';
        string += '<button class="ui basic green icon button" data-tooltip="Documentos" onclick="files_gen_ajax(\'04\',' + ob.idempleadoincidencia + ');"><i class="file pdf icon"></i></button>';
        string += '<button class="ui basic red icon button" data-tooltip="Eliminar" onclick="modalBorrarFN(' + ob.idempleadoincidencia + ');"><i class="close icon"></i></button>';
        string += '</td>';

        string += '</tr>';
    }
    $('#tbody').html(string);
    toDataTableGen();
    NProgress.done();
}

function modalSubirIncidenciaFN(idempleadoincidencia){
    id_incidencia_G = idempleadoincidencia;
    $('#modal_documento').modal('show');
}

function verPDF(ruta){
    //var pdf = 'pdf/' + ob + '.pdf';
        
    console.log(ruta);

    window.open(ruta, '_blank');
}

function modalBorrarFN(id){
    $('#btn_delete').attr('onclick', 'deleteIn(' + id + ')');

    $('#modal_borrar').modal('show');
}

function deleteIn(id){
    $('#modal_borrar').modal('hide');
    ajaxPost("incidencia_delete_all.php", correctoTabla, {'id' : id});
}

function mostrarModal(){
    clearForm('formIncidencias');
    var nombre = $('#dpd_empleado').dropdown('get text');

    if(nombre == 'Empleado'){
        modalEstatus('i', 'Favor de seleccionar un empleado');
        return false;
    }

    $('#empleado_mdl').val(nombre);
    $('#modal_incidencias').modal('show');
}

function agregar_ajax(){

    if (!formValido('formIncidencias')){
        modalEstatus('i', 'Favor de revisar los campos marcados en rojo.','','modal_incidencias');
        return false;
    }

    var json = {
        'idempleado' : $('#empleado').val(),
        'idempleadoautoriza' : $('#empleado_autoriza_mdl').val(),
        'tipo_inc' : $('#tipo_inc_mdl').val(),
        'fecha_inc' : $('#fecha_inc_mdl').val(),
        'observaciones' : $('#obs_ads_mdl').val()
    };            

    ajaxPost("incidencia_insert.php", correctoTabla, json);
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