var idunidadmedida = -1;

$(document).ready(function() {    
    validarInit('formAgregar');
    llenar_tabla_ajax();
    dpd_region('region');

});

function llenar_tabla_ajax(){
    destroyDTGen();
    $('#tbody').html('');
    
    ajaxPost("unidad_all.php", llenar_tabla);
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
            string += ob.idunidadmedida;
            string += '</td>';

            string += '<td>';
            string += ob.descunidadmedida;
            string += '</td>';  
            
            string += '<td>';
            string += ob.nombrecorto;
            string += '</td>';  

            string += '<td>';     
            string += '<button class="ui basic green icon button" data-tooltip="Editar" onclick="mostrarModal(' + ob.idunidadmedida + ',\'' + ob.descunidadmedida + '\',\' ' + ob.nombrecorto + '\');"><i class="edit icon"></i></button>';   
            string += '<button class="ui basic red icon button" data-tooltip="Eliminar" onclick="modalBorrarFN(' + ob.idunidadmedida + ');"><i class="close icon"></i></button>';            
            string += '</td>';

            string += '</tr>';    
    }
    $('#tbody').html(string);
    toDataTableGen();
    NProgress.done();
}

function mostrarModal(id, value = '', nombre){
    idunidadmedida = id;
    console.log(value);
    console.log(nombre);


    clearForm('formAgregar');

    if(value.length > 0){
        $('#desc_mdl').val(value);  
        $('#nombre').val(nombre);    
    }
        
    $('#modal_agregar').modal('show');
}

function agregar_ajax(){

    if (!formValido('formAgregar')){
        modalEstatus('i', 'Favor de revisar los campos marcados en rojo.','','modal_region');
        return false;
    }
    var json = {       
        'idunidadmedida':    idunidadmedida,
        'nombrecorto': $('#nombre').val(),
        'descunidadmedida': $('#desc_mdl').val()
    }
    console.log(json);

    ajaxPost("unidad_ins.php", correctoTabla, json);
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
    ajaxPost("unidad_delete.php", correctoTabla, {'idunidadmedida' : id});
}
