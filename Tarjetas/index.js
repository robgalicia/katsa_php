var idTarjeta = -1;
var jsonTarjeta = '';

$(document).ready(function() {    
    validarInit('formTarjeta');
    llenar_tabla_ajax();

    $('#tarjeta_mdl').keyup(function(){
        llenar_tabla(jsonTarjeta);
    });
});

function llenar_tabla_ajax(){
    destroyDTGen();
    $('#tbody').html('');
    
    ajaxPost("tarjeta_all.php", llenar_tabla);
}

function llenar_tabla(json){
    destroyDTGen();
    $('#tbody').html('');
    jsonTarjeta = json;
    var tarjeta = $('#tarjeta_mdl').val();
    var string = '';

    for (let i in json) {
        var ob = json[i];
        if(ob.empleadoresguardo.includes(tarjeta.toUpperCase())){
            console.log(ob.empleadoresguardo.includes(tarjeta.trim().toUpperCase()))
            console.log(ob.empleadoresguardo)
            console.log("tarjeta")
            console.log(tarjeta)
            string += '<tr>';

            string += '<td>';
            string += ob.numtarjeta;
            string += '</td>';

            string += '<td>';
            string += ob.empleadoresguardo;
            string += '</td>';

            string += '<td>';
            string += fechaEspanol(ob.fecharesguardo);
            string += '</td>';        

            string += '<td>';
            string += fechaEspanol(ob.fechabaja);
            string += '</td>';

            string += '<td>';        
            string += '<button class="ui basic green icon button" data-tooltip="Editar" onclick="mostrarModal(' + ob.idtarjetacombustible + ');"><i class="edit icon"></i></button>';
            string += '<button class="ui basic red icon button" data-tooltip="Eliminar" onclick="modalBorrarFN(' + ob.idtarjetacombustible + ');"><i class="close icon"></i></button>';
            string += '</td>';

            string += '</tr>';
        }
        
    }
    $('#tbody').html(string);
    toDataTableGen();
    NProgress.done();
}


function mostrarModal(id){
    console.log('mostrar modal')
    console.log(id)
    idTarjeta = id;
    
    clearForm('formTarjeta');

    dpd_empleado('empleado_mdl');

    if(idTarjeta > 0){
        ajaxPost("tarjeta_all_edit.php", llenarModal, {'id':idTarjeta});
    }

        
    $('#modal_tarjeta').modal('show');
}

function llenarModal(json){
    console.log(json)
    var ob = json[0];

    $('#num_tarjeta_mdl').val(ob.numtarjeta);
    $('#empleado_mdl').val(ob.idempleadoresguardo);
    $('#fecha_resguardo_mdl').val(fechaSinHora(ob.fecharesguardo));
    $('#fecha_baja_mdl').val(fechaSinHora(ob.fechabaja));
}

function agregar_ajax(){

    if (!formValido('formTarjeta')){
        modalEstatus('i', 'Favor de revisar los campos marcados en rojo.','','modal_tarjeta');
        return false;
    }

    var json = {       
        'idtarjetacombustible' :   idTarjeta,
        'numtarjeta':    $('#num_tarjeta_mdl').val(),
        'idempleadoresguardo':        $('#empleado_mdl').val(),
        'fecharesguardo':    $('#fecha_resguardo_mdl').val(),
        'fechabaja':    $('#fecha_baja_mdl').val(),
    }

    ajaxPost("tarjeta_insert.php", correctoTabla, json);
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
    $('#btn_delete').attr('onclick', 'deleteTarjeta(' + id + ')');

    $('#modal_borrar').modal('show');
}

function deleteTarjeta(id){
    $('#modal_borrar').modal('hide');
    ajaxPost("tarjeta_delete.php", correctoTabla, {'id' : id});
}

