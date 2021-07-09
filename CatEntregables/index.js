var identregable = -1;

$(document).ready(function() {    
    validarInit('formAgregar');
    //llenar_tabla_ajax();

    dpd_departamento('departamento');
    dpd_categoria('categoria');


});

function llenar_tabla_ajax(){
    destroyDTGen();
    $('#tbody').html('');

    var departamento = $('#departamento').val();
    var categoria = $('#categoria').val();

    json = {
        'iddepartamento':departamento,
        'idcategoria':categoria
    }
    
    ajaxPost("entregable_all.php", llenar_tabla, json);
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
            string += ob.idpuesto;
            string += '</td>';      

            string += '<td>';
            string += ob.descentregable;
            string += '</td>';  

            string += '<td>';
            string += ob.descpuesto;
            string += '</td>';  

            string += '<td>';     
            string += '<button class="ui basic green icon button" data-tooltip="Editar" onclick="mostrarModal(' + ob.identregable + ');"><i class="edit icon"></i></button>';   
            string += '<button class="ui basic green icon button" data-tooltip="Puestos" onclick="mostrarModalPuesto(' + ob.identregable + ');"><i class="tasks icon"></i></button>';   
            string += '<button class="ui basic red icon button" data-tooltip="Eliminar" onclick="modalBorrarFN(' + ob.identregable + ');"><i class="close icon"></i></button>';            
            string += '</td>';

            string += '</tr>';    
    }
    $('#tbody').html(string);
    toDataTableGen();
    NProgress.done();
}

function mostrarModalPuesto(id){

    identregable=id;
    clearForm('formAgregar');
    var departamento = $('#departamento').val();

    var json ={
        'iddepartamento': departamento,
        'identregable':id
    }
    console.log(json);
    ajaxPost("entregable_puesto_all.php", llenarModalPuesto, json);
        
    $('#modal_puesto').modal('show');
}

function llenarModalPuesto(json){
    lineas = '';
    console.log(json);
    var arr = new Array();
    for (var ob in json) {
        var o = json[ob]

        lineas += '<tr>';

        lineas += '<td class="collapsing"><div class="ui fitted slider checkbox"><input type="checkbox" id="chkP_' + o.idpuesto + '" onclick="ActualizarPuesto(' + o.identregablepuesto +', ' + o.idpuesto +')"> <label></label></div></td>';
        lineas += '<td colspan="2">' + o.descpuesto + '</td>';

        if(o.activo==1){
            arr.push('#chkP_' + o.idpuesto);
        }
        lineas += '</tr>';  
    }    

    $('#bodyPag').html(lineas);
    console.log(arr);
    for (var a in arr){
        console.log(arr[a]);
        $(arr[a]).prop('checked',true);
    }
    
    NProgress.done();
}

function ActualizarPuesto(id,idpuesto){
    console.log(id);
    console.log(idpuesto);
    var aux = $('#chkP_' + idpuesto).prop('checked');
    console.log(aux);
    if($('#chkP_' + idpuesto).prop('checked')){
        console.log("check");
        var json = {
            'identregable':identregable,
            'idpuesto':idpuesto
        }
        console.log(json);
        ajaxPost("entregablepuesto_ins.php", prueba, json);
    }else{
        console.log("unckeck");
        console.log(id);
        ajaxPost("entregablepuesto_del.php", prueba, {'identregable':id});
    }
    
}

function prueba(json){
    console.log(json);
    NProgress.done();
}

function entregables(json){
    console.log(json);
    destroyDTGen();
    $('#tbodyent').html('');
    var string = '';

    for (let i in json) {
        var ob = json[i];
            string += '<tr>';

            string += '<td>';
            string += ob.descpuesto;
            string += '</td>';      

            string += '<td>';             
            string += '</td>';

            string += '</tr>';    
    }
    $('#tbodyent').html(string);
    toDataTableGen();
    NProgress.done();
}

function mostrarModal(id, value = ''){

    identregable = id;
    console.log(identregable);

    clearForm('formAgregar');

    if(identregable > 0){
        ajaxPost("entregable_all_edit.php", llenarModal, {'identregable':identregable});
    }else{
        var categoria = $( "#categoria option:selected" ).text();
        $('#categoria_mdl').val(categoria);
    }
        
    $('#modal_agregar').modal('show');
}

function llenarModal(json){
    console.log(json);
    var ob = json[0];
    var categoria = $( "#categoria option:selected" ).text();
    console.log(categoria);
    $('#categoria_mdl').val(categoria);
    $('#entregable').val(ob.descentregable);

    NProgress.done();
}

function agregar_ajax(){
    

    if (!formValido('formAgregar')){
        modalEstatus('i', 'Favor de revisar los campos marcados en rojo.','','modal_region');
        return false;
    }
    var json = {    
        'identregable' : identregable,
        'iddepartamento' :$('#departamento').val(),
        'idcategoria': $('#categoria').val(),
        'descentregable': $('#entregable').val()
    }
    console.log(json);

    ajaxPost("entregable_insert.php", correctoTabla, json);
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
    ajaxPost("entregable_delete.php", correctoTabla, {'identregable' : id});
}
