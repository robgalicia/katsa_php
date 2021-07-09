var fecha_ingreso_G = '';
var id_empleado_contrato_G = -1;

$(document).ready(function() {

    $('#fecha_final_mdl').attr('validate','true')    

    dpd_empleado_search('dpd_empleado_menu');

    validarInit('formContratos');
    validarInit('formDocumento');        

    $('#tipo_periodo_mdl').change(function(){
        var periodo = $('#tipo_periodo_mdl').val()        

        if (periodo == 'I'){            
            $('#dias_contrato_mdl').val('0');
            $('#fecha_final_mdl').val('');
            $('#fecha_final_mdl').attr('validate','false')
        }else{            
            $('#fecha_final_mdl').attr('validate','true')
        }
        validarInit('formContratos');
    });

    //llenar_tabla_ajax();
    
});



function llenar_tabla_ajax(){
    destroyDTGen();
    $('#tbody').html('');
    var empleado = $('#empleado').val();
    ajaxPost("contrato_all.php", llenar_tabla,{'empleado' : empleado});
}

function llenar_tabla(json){
    var string = '';    

    for (let i in json) {
        var ob = json[i];            

        string += '<tr>';

        string += '<td>';
        string += ob.consecutivo;
        string += '</td>';

        string += '<td>';
        string += ob.nombrecompleto;
        string += '</td>';

        string += '<td>';
        string += fechaEspanol(ob.fechaingreso);
        string += '</td>';

        string += '<td>';
        string += fechaEspanol(ob.fechacontrato);
        string += '</td>';

        string += '<td>';
        string += toMoney(ob.diascontrato.toString());
        string += '</td>';

        string += '<td>';
        string += ob.periodocontrato;
        string += '</td>';
        
        string += '<td>';
        string += fechaEspanol(ob.fechainicial);
        string += '</td>';

        string += '<td>';
        string += fechaEspanol(ob.fechafinal);
        string += '</td>';

        string += '<td>';
        string += toMoney(ob.sueldonetomensual.toString());
        string += '</td>';

        string += '<td>';
        string += '<button class="ui basic blue icon button" data-tooltip="Imprimir Formato" onclick="DescargarReporte_ajax(' + ob.idempleadocontrato + ' , ' + ob.idformatolegal + ');"><i class="file icon"></i></button>';
        string += '<button class="ui basic green icon button" data-tooltip="Documento Firmado" onclick="files_gen_ajax(\'02\',' + ob.idempleadocontrato + ');"><i class="file pdf icon"></i></button>';
        string += '<button class="ui basic red icon button" data-tooltip="Eliminar" onclick="modalBorrarFN(' + ob.idempleadocontrato + ');"><i class="close icon"></i></button>';
        string += '</td>';

        string += '</tr>';
    }
    $('#tbody').html(string);
    toDataTableGen();
    NProgress.done();
}

function verificar_contrato_ajax(){
    var empleado = $('#empleado').val();
    ajaxPost("contrato_verify.php", verificar_contrato,{'idempleado' : empleado});

}

function verificar_contrato(json){    
    //Si valida = 1 pasa
    NProgress.done();
    
    if(json.valida == 1){
        mostrarModal();
    }else{
        modalEstatus('i', json.mensaje);
        return false;
    }

}

function modalSubirContratoFN(idcontrato){    
    id_empleado_contrato_G = idcontrato;    
    clearForm('formDocumento');
    $('#modal_documento').modal('show');
}

function modalBorrarFN(idcontrato){
    $('#btn_delete').attr('onclick', 'deleteContrato(' + idcontrato + ')');

    $('#modal_borrar').modal('show');
}

function deleteContrato(idcontrato){
    $('#modal_borrar').modal('hide');
    ajaxPost("contratos_delete_all.php", correctoTabla, {'idcontrato' : idcontrato});
}

function mostrarModal(){
    clearForm('formContratos');
    var nombre = $('#dpd_empleado').dropdown('get text');

    if(nombre == 'Empleado'){
        modalEstatus('i', 'Favor de seleccionar un empleado');
        return false;
    }

    dpd = $('#dpd_empleado').dropdown('get item')[0];
    fecha_ingreso_G = $(dpd).attr('fecha_ingreso');


    $('#fecha_ingreso_mdl').val(fechaSinHora(fecha_ingreso_G));

    $('#empleado_mdl').val(nombre);
    $('#modal_contratos').modal('show');
}

function agregar_ajax(){

    if (!formValido('formContratos')){
        modalEstatus('i', 'Favor de revisar los campos marcados en rojo.','','modal_contratos');
        return false;
    }

    var json = {
        'idempleado' : $('#empleado').val(),
        'fecha_inicial' : $('#fecha_inicial_mdl').val(),        
        'fecha_final' : $('#fecha_final_mdl').val(),
        'fecha_contrato' : $('#fecha_contrato_mdl').val(),
        'sueldo_contrato' : quitarComas($('#sueldo_contrato_mdl').val()),

        'periodo_contrato' : $('#tipo_periodo_mdl').val(),
        'esquema_pago' : $('#esquema_pago_mdl').val(),
        'sueldo_neto' : quitarComas($('#sueldo_neto_mdl').val()),

        'dias_contrato' : quitarComas($('#dias_contrato_mdl').val()),
    };

    ajaxPost("contrato_insert.php", correctoTabla, json);
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
        'deDonde':'Contratos/'
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