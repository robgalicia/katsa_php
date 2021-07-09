var idPartida = -1;
var jsonPartida = '';
var tipopartida = '';

$(document).ready(function() {    
    /*validarInit('formTenencia');*/
    llenar_tabla_ajax();

    $('#partida_mdl').keyup(function(){
        llenar_tabla(jsonPartida);
    });
});

function llenar_tabla_ajax(){
    destroyDTGen();
    $('#tbody').html('');
    tipopartida = $('#tipo_partida').val();

    ajaxPost("partidas_all.php", llenar_tabla, {'tipopartida':tipopartida});
}

function llenar_tabla(json){
    console.log(json);
    destroyDTGen();
    $('#tbody').html('');
    jsonPartida = json;
    var partida = $('#partidas_mdl').val();
    var string = '';

    for (let i in json) {
        var ob = json[i];
        if(ob.descpartida.includes(partida.toUpperCase())){
            string += '<tr>';

            string += '<td>';
            string += ob.idpartida;
            string += '</td>';

            string += '<td>';
            string += ob.descpartida;
            string += '</td>';

            string += '<td>';
            string += ob.cuentacontable;
            string += '</td>';        

            string += '<td>';
            string += ob.tipopartida;
            string += '</td>';

            string += '<td>';
            string += ob.importeunitario;
            string += '</td>';


            string += '<td>';       
            string += '<button class="ui basic green icon button" data-tooltip="Editar" onclick="mostrarModal(' + ob.idpartida + ');"><i class="edit icon"></i></button>'; 
            string += '<button class="ui basic red icon button" data-tooltip="Eliminar" onclick="modalBorrarFN(' + ob.idpartida + ');"><i class="close icon"></i></button>';
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
    idPartida = id;
    
    clearForm('formPartida');

    if(idPartida > 0){
        ajaxPost("partidas_all_edit.php", llenarModal, {'id':idPartida});
    }

        
    $('#modal_partida').modal('show');
}

function llenarModal(json){
    var ob = json[0];

    $('#num_partida_mdl').val(ob.idpartida);
    $('#descpartida_mdl').val(ob.descpartida);
    $('#cuenta_contable_mdl').val(ob.cuentacontable);
    $('#tipo_partida_mdl').val(ob.tipopartida);
    $('#importe_unitario').val(ob.importeunitario);

    if(ob.viaticos == 'S' ){
        $('#capviaticos_si').prop('checked',true);
    }else{
        $('#capviaticos_no').prop('checked',true);
    }
}

function agregar_ajax(){

    if (!formValido('formPartida')){
        modalEstatus('i', 'Favor de revisar los campos marcados en rojo.','','modal_partida');
        return false;
    }

    var viaticos = 'N';

    if( $('#capviaticos_si').prop('checked') ){
        viaticos = 'S';
    }

    var json = {       
        'idpartida':    idPartida,
        'descpartida':        $('#descpartida_mdl').val(),
        'cuentacontable':    $('#cuenta_contable_mdl').val(),
        'tipopartida':    $('#tipo_partida_mdl').val(),
        'viaticos' : viaticos,
        'importeunitario':    $('#importe_unitario').val()
    }
    console.log(json);

    ajaxPost("partida_insert.php", correctoTabla, json);
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
    $('#btn_delete').attr('onclick', 'deletepartida(' + id + ')');

    $('#modal_borrar').modal('show');
}

function deletepartida(id){
    $('#modal_borrar').modal('hide');
    ajaxPost("partida_delete.php", correctoTabla, {'idpartida' : id});
}

