var idingeniero_G = -1;


$(document).ready(function() {
    dpd_cliente('cliente');
    dpd_subcontrata('subcontrata_mdl')
    validarInit('formIngeniero');
    $('#vehiculo').change(function(){
        llenar_tabla_ajax();
    });
    //llenar_tabla_ajax();
});

function llenar_tabla_ajax(){
    destroyDTGen();
    $('#tbody').html('');
    var cliente = $('#cliente').val();

    ajaxPost("ingeniero_all.php", llenar_tabla,{'idcliente' : cliente});
}

function llenar_tabla(json){
    var string = '';    

    for (let i in json) {
        var ob = json[i];            
        string += '<tr>';

        string += '<td>';
        string += ob.nombre;
        string += '</td>';

        string += '<td>';
        string += ob.cliente;
        string += '</td>';

        string += '<td>';
        string += ob.subcontrata;
        string += '</td>';

        string += '<td>';
        string += ob.activo;
        string += '</td>';        

        string += '<td>';        
        string += '<button class="ui basic green icon button" data-tooltip="Editar" onclick=mostrarModal(' + ob.idingeniero + ');><i class="edit icon"></i></button>';
        // string += '<button class="ui basic green icon button" data-tooltip="Documentos" onclick="files_gen_ajax(\'05\',' + ob.idvehiculoresguardo + ');"><i class="file pdf icon"></i></button>';
        string += '<button class="ui basic red icon button" data-tooltip="Eliminar" onclick="modalBorrarFN(' + ob.idingeniero + ');"><i class="close icon"></i></button>';
        string += '</td>';

        string += '</tr>';
    }
    $('#tbody').html(string);
    toDataTableGen();
    NProgress.done();
}

function mostrarModal(id){
    idingeniero_G = id;
    var cliente = $('#cliente').val();

    if(cliente.length == 0){
        modalEstatus('i', 'Favor de seleccionar un cliente');
        return false;
    }

    if(idingeniero_G > 0){        
        ajaxPost("ingeniero_all_edit.php", llenarModal, {'idingeniero':idingeniero_G});
    }else{
        var nombre = $('#cliente').dropdown('get text');    

        clearForm('formIngeniero');
    
        $('#activo_si').prop('checked',true)
    
        $('#cliente_mdl').val(nombre);
    }    

    $('#modal_ingeniero').modal('show');
}

function llenarModal(json){
    var ob = json[0]

    $('#nombre_mdl').val(ob.nombre);
    $('#subcontrata_mdl').val(ob.idsubcontrata).change();
    $('#cliente_mdl').val(ob.cliente);

    if(ob.activo == 1){
        $('#activo_si').prop('checked',true)
    }else{
        $('#activo_no').prop('checked',true)
    }

    NProgress.done();
}

function agregar_ajax(){

    if (!formValido('formIngeniero')){
        modalEstatus('i', 'Favor de revisar los campos marcados en rojo.','','modal_ingeniero');
        return false;
    }

    var cliente = $('#cliente').val();
    var nombre = $('#nombre_mdl').val();
    var subcontrata = $('#subcontrata_mdl').val();
    var activo = 1;

    if ( $('#activo_no').prop('checked') ) activo = 0;

    var json = {
        'idingeniero' : idingeniero_G,
        'cliente' : cliente,
        'nombre' : nombre,
        'subcontrata' : subcontrata,
        'activo' : activo,
    }

    ajaxPost("ingeniero_insert.php", correctoTabla, json);
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

function deleteRes(id){
    $('#modal_borrar').modal('hide');
    ajaxPost("ingeniero_delete.php", correctoTabla, {'id' : id});
}