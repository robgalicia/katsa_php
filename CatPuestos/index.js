var idpuesto = -1;

$(document).ready(function() {
    dpd_departamento('departamento')
    validarInit('formAgregar');
    llenar_tabla_ajax();

    $('#departamento').change(function(){
        llenar_tabla_ajax()
    });
});

function llenar_tabla_ajax(){
    destroyDTGen();
    $('#tbody').html('');

    var dep = $('#departamento').val()

    if (dep == null) dep = 1

    var json = {
        'departamento' : dep
    }
    
    ajaxPost("puestos_all.php", llenar_tabla,json);
}

function llenar_tabla(json){
    destroyDTGen();
    $('#tbody').html('');
    var string = '';

    for (let i in json) {
        var ob = json[i];
            string += '<tr>';

            string += '<td>';
            string += ob.idpuesto;
            string += '</td>';

            string += '<td>';
            string += ob.descpuesto;
            string += '</td>';

            string += '<td>';
            string += ob.tipopuesto;
            string += '</td>';

            string += '<td>';     
            string += '<button class="ui basic green icon button" data-tooltip="Editar" onclick="mostrarModal(' + ob.idpuesto + ',\'' + ob.descpuesto + '\');"><i class="edit icon"></i></button>';   
            string += '<button class="ui basic red icon button" data-tooltip="Eliminar" onclick="modalBorrarFN(' + ob.idpuesto + ');"><i class="close icon"></i></button>';            
            string += '</td>';

            string += '</tr>';    
    }
    $('#tbody').html(string);
    toDataTableGen();
    NProgress.done();
}

function mostrarModal(id, value = ''){
    idpuesto = id;

    clearForm('formAgregar');

    if(idpuesto > 0){
        ajaxPost("puestos_all_edit.php", llenarModal, {'idpuesto':idpuesto});
    }

    var deptext = $('#departamento').dropdown('get text')

    $('#departamento_text').val(deptext);
        
    $('#modal_agregar').modal('show');
}

function llenarModal(json){
    console.log(json);
    var ob = json[0];

    $('#desc_mdl').val(ob.descpuesto);
    $('#tipopuesto').val(ob.tipopuesto).change();
    $('#descfunciones').val(ob.descfunciones);
    NProgress.done();
}

function agregar_ajax(){

    if (!formValido('formAgregar')){
        modalEstatus('i', 'Favor de revisar los campos marcados en rojo.','','modal_region');
        return false;
    }

    var json = {       
        'idpuesto':    idpuesto,
        'desc': $('#desc_mdl').val(),
        'tipopuesto': $('#tipopuesto').val(),
        'funciones': $('#descfunciones').val(),
        'departamento': $('#departamento').val()
    }

    ajaxPost("puestos_insert.php", correctoTabla, json);
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
    ajaxPost("puestos_delete.php", correctoTabla, {'idpuesto' : id});
}
