var idestadocivil = -1;

$(document).ready(function() {    
    validarInit('formAgregar');
    llenar_tabla_ajax();

});

function llenar_tabla_ajax(){
    destroyDTGen();
    $('#tbody').html('');
    
    ajaxPost("estadocivil_all.php", llenar_tabla);
}

function llenar_tabla(json){
    destroyDTGen();
    $('#tbody').html('');
    var string = '';

    for (let i in json) {
        var ob = json[i];
            string += '<tr>';

            string += '<td>';
            string += ob.idestadocivil;
            string += '</td>';

            string += '<td>';
            string += ob.descestadocivil;
            string += '</td>';        

            string += '<td>';     
            string += '<button class="ui basic green icon button" data-tooltip="Editar" onclick="mostrarModal(' + ob.idestadocivil + ',\'' + ob.descestadocivil + '\');"><i class="edit icon"></i></button>';   
            string += '<button class="ui basic red icon button" data-tooltip="Eliminar" onclick="modalBorrarFN(' + ob.idestadocivil + ');"><i class="close icon"></i></button>';            
            string += '</td>';

            string += '</tr>';    
    }
    $('#tbody').html(string);
    toDataTableGen();
    NProgress.done();
}

function mostrarModal(id, value = ''){
    idestadocivil = id;

    clearForm('formAgregar');

    if(value.length > 0){
        $('#desc_mdl').val(value);    
    }
        
    $('#modal_agregar').modal('show');
}


function agregar_ajax(){

    if (!formValido('formAgregar')){
        modalEstatus('i', 'Favor de revisar los campos marcados en rojo.','','modal_region');
        return false;
    }

    var json = {       
        'idestadocivil':    idestadocivil,
        'descestadocivil': $('#desc_mdl').val()
    }

    ajaxPost("estadocivil_insert.php", correctoTabla, json);
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
    console.log(id)
    $('#btn_delete').attr('onclick', 'deleteRegistro(' + id + ')');

    $('#modal_borrar').modal('show');
}

function deleteRegistro(id){
    $('#modal_borrar').modal('hide');
    ajaxPost("estadocivil_delete.php", correctoTabla, {'idestadocivil' : id});
}
