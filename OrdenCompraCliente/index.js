$(document).ready(function() {
    //llenar_tabla_ajax();
    var fechaActual = obtenerFechaCampo();
    fechaActual = fechaActual.split('-');

    $('#ejercicio').val( fechaActual[0] );
    $('#mes').val( fechaActual[1] ).change();
});

function llenar_tabla_ajax(){
    destroyDTGen();
    $('#tbody').html('');

    var json = {
        'mes' : $('#mes').val(),
        'anio' : $('#ejercicio').val()
    };    
    
    ajaxPost("orden_all.php", llenar_tabla, json);
}

function llenar_tabla(json){
    destroyDTGen();
    $('#tbody').html('');    
    var string = '';

    for (let i in json) {
        var ob = json[i];
        
            
        string += '<tr>';

        string += '<td>';
        string += ob.idordencompracliente;
        string += '</td>';

        string += '<td>';
        string += ob.folioordencompra;
        string += '</td>';

        string += '<td>';
        string += fechaEspanol(ob.fecha);
        string += '</td>';        

        string += '<td>';
        string += ob.nombrecliente;
        string += '</td>';

        string += '<td>';
        string += ob.foliocotizacion;
        string += '</td>';

        string += '<td>';
        string += ob.lugarservicio;
        string += '</td>';

        string += '<td>';        
        string += '<button class="ui basic green icon button" data-tooltip="Editar" onclick="redirect(\'agregar_orden.php?id_orden_G=' + ob.idordencompracliente + '\')"><i class="edit icon"></i></button>';
        string += '<button class="ui basic red icon button" data-tooltip="Eliminar" onclick="modalBorrarFN(' + ob.idordencompracliente + ');"><i class="close icon"></i></button>';
        string += '</td>';

        string += '</tr>'; 
        
    }
    $('#tbody').html(string);
    toDataTableGen();
    NProgress.done();
}

function modalBorrarFN(id){    
    $('#btn_delete').attr('onclick', 'deleteRegistro(' + id + ')');

    $('#modal_borrar').modal('show');
}

function deleteRegistro(id){
    $('#modal_borrar').modal('hide');
    ajaxPost("orden_delete.php", correctoTabla, {'id' : id});
}

function correctoTabla(json){
    console.log(json)
    if(json.result){
        $('.modal').modal('hide');
        modalEstatus('o', 'La operación se realizó de manera correcta.');
        llenar_tabla_ajax();        
    }else{
        modalEstatus('e', 'Ocurrio un error.');        
    }

    NProgress.done();
}