var idcuentabancaria = -1;
var jsonPartida = '';
var tipoarticulo = '';

$(document).ready(function() {    
    validarInit('formCuentaBancaria');
    llenar_tabla_ajax();

    /*$('#partida_mdl').keyup(function(){
        llenar_tabla(jsonPartida);
    });*/
});

function llenar_tabla_ajax(){
    destroyDTGen();
    $('#tbody').html('');
    
    ajaxPost("cuentasbancarias_all.php", llenar_tabla);
}

function llenar_tabla(json){
    destroyDTGen();
    $('#tbody').html('');
    jsonPartida = json;
    console.log("json")
    console.log(json)
    var string = '';

    for (let i in json) {
        var ob = json[i];
            string += '<tr>';

            string += '<td>';
            string += ob.idcuentabancaria;
            string += '</td>';

            string += '<td>';
            string += ob.descbanco;
            string += '</td>';        

            string += '<td>';
            string += ob.numerocuenta;
            string += '</td>';

            string += '<td>';
            string += ob.clabeinterbancaria;
            string += '</td>';

            string += '<td>';
            string += ob.cuentacontable;
            string += '</td>';

            string += '<td>';     
            string += '<button class="ui basic green icon button" data-tooltip="Editar" onclick="mostrarModal(' + ob.idcuentabancaria + ');"><i class="edit icon"></i></button>';   
            string += '<button class="ui basic red icon button" data-tooltip="Eliminar" onclick="modalBorrarFN(' + ob.idcuentabancaria + ');"><i class="close icon"></i></button>';            
            string += '</td>';

            string += '</tr>';    
    }
    $('#tbody').html(string);
    toDataTableGen();
    NProgress.done();
}


function mostrarModal(id){
    console.log("modal");
    console.log(id);
    idcuentabancaria = id;

    dpd_banco("banco_mdl");
    
    clearForm('formCuentaBancaria');

    if(idcuentabancaria > 0){
        ajaxPost("cuentasbancarias_all_edit.php", llenarModal, {'idcuentabancaria':idcuentabancaria});
    }

        
    $('#modal_cuentasbancarias').modal('show');
}

function llenarModal(json){
    var ob = json[0];
    console.log("ob");
    console.log(ob);

    $('#banco_mdl').val(ob.idbanco).change();
    $('#num_cuenta_mdl').val(ob.numerocuenta);
    $('#clabe_interbancaria_mdl').val(ob.clabeinterbancaria);
    $('#clabe_contable_mdl').val(ob.cuentacontable);
    NProgress.done();
}

function agregar_ajax(){

    if (!formValido('formCuentaBancaria')){
        modalEstatus('i', 'Favor de revisar los campos marcados en rojo.','','modal_cuentasbancarias');
        return false;
    }

    var json = {       
        'idcuentabancaria':    idcuentabancaria,
        'descbanco': $('#banco_mdl').val(),
        'numerocuenta': $('#num_cuenta_mdl').val(),
        'clabeinterbancaria': $('#clabe_interbancaria_mdl').val(),
        'cuentacontable': $('#clabe_contable_mdl').val()
    }
    console.log("json");
    console.log(json);

    ajaxPost("cuentasbancarias_insert.php", correctoTabla, json);
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
    $('#btn_delete').attr('onclick', 'deleteCuenta(' + id + ')');

    $('#modal_borrar').modal('show');
}

function deleteCuenta(id){
    $('#modal_borrar').modal('hide');
    ajaxPost("cuentasbancarias_delete.php", correctoTabla, {'idcuentabancaria' : id});
}

