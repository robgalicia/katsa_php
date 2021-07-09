var idtipoajusteinventario = -1;

$(document).ready(function() {    
    validarInit('formRegion');
    llenar_tabla_ajax();

});

function llenar_tabla_ajax(){
    destroyDTGen();
    $('#tbody').html('');
    
    ajaxPost("ajuste_all.php", llenar_tabla);
}

function llenar_tabla(json){
    destroyDTGen();
    $('#tbody').html('');
    var string = '';

    for (let i in json) {
        var ob = json[i];
            string += '<tr>';

            string += '<td>';
            string += ob.idtipoajusteinventario;
            string += '</td>';

            string += '<td>';
            string += ob.desctipoajusteinventario;
            string += '</td>';  
            
            string += '<td>';
            string += ob.tipomovimiento;
            string += '</td>';  

            string += '<td>';     
            string += '<button class="ui basic green icon button" data-tooltip="Editar" onclick="mostrarModal(' + ob.idtipoajusteinventario + ');"><i class="edit icon"></i></button>';   
            string += '<button class="ui basic red icon button" data-tooltip="Eliminar" onclick="modalBorrarFN(' + ob.idtipoajusteinventario + ');"><i class="close icon"></i></button>';            
            string += '</td>';

            string += '</tr>';    
    }
    $('#tbody').html(string);
    toDataTableGen();
    NProgress.done();
}

function mostrarModal(id){
    idtipoajusteinventario = id;

    clearForm('formRegion');

    if(idtipoajusteinventario > 0){
        ajaxPost("ajuste_all_edit.php", llenarModal, {'idTipoAjuste':idtipoajusteinventario});
    }
        
    $('#modal_region').modal('show');
}

function llenarModal(json){
    var ob = json[0];

    $('#idTipoAjuste_mdl').val(ob.idtipoajusteinventario);
    $('#desc_mdl').val(ob.desctipoajusteinventario);
    $('#tipomovimiento').val(ob.tipomovimiento).change();
    NProgress.done();
}

function agregar_ajax(){

    if (!formValido('formRegion')){
        modalEstatus('i', 'Favor de revisar los campos marcados en rojo.','','modal_region');
        return false;
    }

    var json = {       
        'pidtipoajusteinventario':    idtipoajusteinventario,
        'pdesctipoajusteinventario': $('#desc_mdl').val(),
        'ptipomovimiento': $('#tipomovimiento').val()
    }
    console.log(json);
    ajaxPost("ajuste_insert.php", correctoTabla, json);
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
    console.log(id)
    $('#btn_delete').attr('onclick', 'deleteRegistro(' + id + ')');

    $('#modal_borrar').modal('show');
}

function deleteRegistro(id){
    $('#modal_borrar').modal('hide');
    ajaxPost("ajuste_delete.php", correctoTabla, {'pidtipoajusteinventario' : id});
}
