var idregion = -1;

$(document).ready(function() {    
    validarInit('formRegion');
    llenar_tabla_ajax();

});

function llenar_tabla_ajax(){
    destroyDTGen();
    $('#tbody').html('');
    
    ajaxPost("region_all.php", llenar_tabla);
}

function llenar_tabla(json){
    destroyDTGen();
    $('#tbody').html('');
    var string = '';

    for (let i in json) {
        var ob = json[i];
            string += '<tr>';

            string += '<td>';
            string += ob.idregion;
            string += '</td>';

            string += '<td>';
            string += ob.descregion;
            string += '</td>';
            
            string += '<td>';
            string += ob.prefijofolio;
            string += '</td>';

            string += '<td>';     
            string += '<button class="ui basic green icon button" data-tooltip="Editar" onclick="mostrarModal(' + ob.idregion + ');"><i class="edit icon"></i></button>';   
            string += '<button class="ui basic red icon button" data-tooltip="Eliminar" onclick="modalBorrarFN(' + ob.idregion + ');"><i class="close icon"></i></button>';            
            string += '</td>';

            string += '</tr>';    
    }
    $('#tbody').html(string);
    toDataTableGen();
    NProgress.done();
}

function mostrarModal(id){
    idregion = id;

    clearForm('formRegion');

    if(idregion > 0){
        ajaxPost("region_all_edit.php", llenarModal, {'idregion':idregion});
    }
        
    $('#modal_region').modal('show');
}

function llenarModal(json){
    var ob = json[0];

    $('#idregion_mdl').val(ob.idregion);
    $('#descregion_mdl').val(ob.descregion);
    $('#prefijo_mdl').val(ob.prefijofolio);
    NProgress.done();
}

function agregar_ajax(){

    if (!formValido('formRegion')){
        modalEstatus('i', 'Favor de revisar los campos marcados en rojo.','','modal_region');
        return false;
    }

    var json = {       
        'idregion':    idregion,
        'descregion': $('#descregion_mdl').val(),
        'prefijo': $('#prefijo_mdl').val()
    }

    ajaxPost("region_insert.php", correctoTabla, json);
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
    ajaxPost("region_delete.php", correctoTabla, {'idregion' : id});
}
