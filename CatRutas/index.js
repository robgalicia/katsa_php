var idrutatraslado = -1;

$(document).ready(function() {    
    validarInit('formAgregar');
    llenar_tabla_ajax();
    dpd_tipomoneda('tipomoneda');
    console.log(idrutatraslado);

});

function llenar_tabla_ajax(){
    destroyDTGen();
    $('#tbody').html('');
    
    ajaxPost("rutas_all.php", llenar_tabla);
}

function llenar_tabla(json){
    console.log(json);
    destroyDTGen();
    $('#tbody').html('');
    var string = '';

    for (let i in json) {
        var ob = json[i];
            string += '<tr>';

            string += '<td>';
            string += ob.idrutatraslado;
            string += '</td>';

            string += '<td>';
            string += ob.descrutatraslado;
            string += '</td>';  

            string += '<td>';
            string += ob.importetarifa + ' ' + ob.tipomoneda;
            string += '</td>'; 

            string += '<td>';     
            string += '<button class="ui basic green icon button" data-tooltip="Editar" onclick="mostrarModal(' + ob.idrutatraslado +',' + ob.importetarifa +',' +  ob.idtipomoneda + ',\'' + ob.descrutatraslado + '\');"><i class="edit icon"></i></button>';   
            string += '<button class="ui basic red icon button" data-tooltip="Eliminar" onclick="modalBorrarFN(' + ob.idrutatraslado + ');"><i class="close icon"></i></button>';            
            string += '</td>';

            string += '</tr>';    
    }
    $('#tbody').html(string);
    toDataTableGen();
    NProgress.done();
}

function mostrarModal(id, value = '',value2 = '',value3 = ''){
    idrutatraslado = id;
    console.log(id);
    console.log(value);
    console.log(value2);
    console.log(value3);

    clearForm('formAgregar');

    if(id.length > 0){
        $('#desc_mdl').val(value3);  
        $('#importe').val(value);  
        $('#tipomoneda').val(value2).change();  
    }
        
    $('#modal_agregar').modal('show');
}

function agregar_ajax(){

    if (!formValido('formAgregar')){
        modalEstatus('i', 'Favor de revisar los campos marcados en rojo.','','modal_region');
        return false;
    }
    var json = {       
        'idrutatraslado':    idrutatraslado,
        'descrutatraslado': $('#desc_mdl').val(),
        'importetarifa': $('#importe').val(),
        'idtipomoneda':  $('#tipomoneda').val()
    }
    console.log(json);

    ajaxPost("rutas_ins.php", correctoTabla, json);
}

function correctoTabla(json){
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
    console.log(id);
    $('#btn_delete').attr('onclick', 'deleteRegistro(' + id + ')');

    $('#modal_borrar').modal('show');
}

function deleteRegistro(id){
    console.log(id);
    $('#modal_borrar').modal('hide');
    ajaxPost("rutas_delete.php", correctoTabla, {'id' : id});
}
