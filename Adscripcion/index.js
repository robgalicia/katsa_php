var id_adscripcion_G = -1;

$(document).ready(function() {    
    dpd_empleado_search('dpd_empleado_menu');
    dpd_empleado_search('dpd_empleado_autoriza_mdl_menu');

    validarInit('formAdscripcion');
    //validarInit('formDocumento');
    dropzone();
    //llenar_tabla_ajax();    
});

function llenar_tabla_ajax(){
    destroyDTGen();
    $('#tbody').html('');
    var empleado = $('#empleado').val();
    ajaxPost("adscrip_all.php", llenar_tabla,{'empleado' : empleado});
}

function llenar_tabla(json){
    var string = '';
    
    var nombre = $('#dpd_empleado').dropdown('get text');

    for (let i in json) {
        var ob = json[i];            
        string += '<tr>';

        string += '<td>';
        string += ob.idempleadoadscripcion;
        string += '</td>';

        string += '<td>';
        string += nombre;
        string += '</td>';

        string += '<td>';
        string += fechaEspanol(ob.fechaadscripcion);
        string += '</td>';

        string += '<td>';
        string += ob.descpuesto;
        string += '</td>';

        string += '<td>';
        string += ob.descadscripcion;
        string += '</td>';
        
        string += '<td>';
        string += ob.nombrecliente;
        string += '</td>';        

        string += '<td>';
        string += '<button class="ui basic blue icon button" data-tooltip="Imprimir Formato" onclick="DescargarReporte_ajax(' + ob.idempleadoadscripcion + ' , ' + ob.idformatolegal + ');"><i class="file icon"></i></button>';
        string += '<button class="ui basic green icon button" data-tooltip="Documentos" onclick="files_gen_ajax(\'03\',' + ob.idempleadoadscripcion + ');"><i class="file pdf icon"></i></button>';
        string += '<button class="ui basic red icon button" data-tooltip="Eliminar" onclick="modalBorrarFN(' + ob.idempleadoadscripcion + ');"><i class="close icon"></i></button>';
        string += '</td>';

        string += '</tr>';
    }
    $('#tbody').html(string);
    toDataTableGen();
    NProgress.done();
}

function modalSubirAdscripcionFN(idadscripcion){
    id_adscripcion_G = idadscripcion;
    $('#modal_documento').modal('show');
}

function modalBorrarFN(idads){
    $('#btn_delete').attr('onclick', 'deleteAds(' + idads + ')');

    $('#modal_borrar').modal('show');
}


function deleteAds(idads){
    $('#modal_borrar').modal('hide');
    ajaxPost("adscrip_delete_all.php", correctoTabla, {'idads' : idads});
}

function mostrarModal(){
    clearForm('formAdscripcion');
    var nombre = $('#dpd_empleado').dropdown('get text');
    
    dpd_region('region_mdl','lugarAds_mdl')
    dpd_tipo_puesto('puesto_mdl', 'O')
    dpd_cliente('cliente_mdl');
    //'cliente_mdl'

    if(nombre == 'Empleado'){
        modalEstatus('i', 'Favor de seleccionar un empleado');
        return false;
    }

    $('#empleado_mdl').val(nombre);
    $('#modal_adscripcion').modal('show');
}

function agregar_ajax(){

    if (!formValido('formAdscripcion')){
        modalEstatus('i', 'Favor de revisar los campos marcados en rojo.','','modal_adscripcion');
        return false;
    }

    var json = {
        'idempleado' : $('#empleado').val(),
        'idcliente' : $('#cliente_mdl').val(),
        'fechaadscripcion' : $('#fecha_ads_mdl').val(),
        'idpuesto' : $('#puesto_mdl').val(),
        'idregion' : $('#region_mdl').val(),
        'idempleadoautoriza' : $('#empleado_autoriza_mdl').val(),
        'idadscripcion' : $('#lugarAds_mdl').val(),
        'observaciones' : $('#obs_ads_mdl').val()
    };

    ajaxPost("adscrip_insert.php", correctoTabla, json);
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

function DescargarReporte_ajax(id,idreporte){
    var json = {
        'id': id,
        'clave': idreporte,
        'deDonde':'Adscripcion/'
    };
    
    ajaxPost("../Reporteador/pruebaImprimir.php", DescargarReporte,json, false);
    
}

function DescargarReporte(result){
    for (let i in result) {
        var ob = result[i];

        var pdf = 'pdf/' + ob + '.pdf';
        
        console.log(pdf);

        window.open(pdf, '_blank');

    }

    NProgress.done();
}