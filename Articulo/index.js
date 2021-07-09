var idArticulo = -1;
var jsonPartida = '';
var tipoarticulo = '';

$(document).ready(function() {    
    validarInit('formArticulo');
    dpd_unidadmedida('unidad_medida_mdl');
    
});

function llenar_tabla_ajax(){
    destroyDTGen();
    $('#tbody').html('');

    //tipoarticulo = $('#tipo_articulo').val();
    descarticulo = $('#desc_articulo').val();
    var tipoarticulo = '';

    var nombre = $('#tipo_articulo_nombre').prop('checked');
    var descripcion = $('#tipo_articulo_descripcion').prop('checked');
    var ambos = $('#tipo_articulo_ambos').prop('checked');

    if(nombre) tipoarticulo = 'N';
    if(descripcion) tipoarticulo = 'D';
    if(ambos) tipoarticulo = 'A';
    
    ajaxPost("articulo_all.php", llenar_tabla, {'tipoarticulo':tipoarticulo, 'descarticulo': descarticulo});
}

function llenar_tabla(json){
    destroyDTGen();
    $('#tbody').html('');
    jsonPartida = json;    
    var string = '';

    for (let i in json) {
        var ob = json[i];
            string += '<tr>';

            string += '<td>';
            string += ob.codigoarticulo;
            string += '</td>';

            string += '<td>';
            string += ob.nombrearticulo;
            string += '</td>';        

            string += '<td>';
            string += ob.descripcionproveedor;
            string += '</td>';

            string += '<td>';
            string += ob.nombreproveedor;
            string += '</td>';

            string += '<td>';     
            string += '<button class="ui basic green icon button" data-tooltip="Editar" onclick="mostrarModal(' + ob.idarticulo + ');"><i class="edit icon"></i></button>';   
            string += '<button class="ui basic red icon button" data-tooltip="Eliminar" onclick="modalBorrarFN(' + ob.idarticulo + ');"><i class="close icon"></i></button>';            
            string += '</td>';

            string += '</tr>';    
    }
    $('#tbody').html(string);
    toDataTableGen();
    NProgress.done();
}


function mostrarModal(id){    
    idArticulo = id;    
    
    clearForm('formArticulo');

    dpd_proveedor("proveedor_mdl");
    dpd_partida("partida_gastos_mdl","G");
    dpd_partida("partida_costos_mdl","C");
    dpd_partida("partida_inversiones_mdl","I");

    if(idArticulo > 0){
        setTimeout(function () {
            ajaxPost("articulo_all_edit.php", llenarModal, {'id':idArticulo});
        }, 0500);
    }
        
    $('#modal_articulo').modal('show');
}

function llenarModal(json){
    var ob = json[0];    

    $('#codigo_mdl').val(ob.codigoarticulo);
    $('#nombre_articulo_mdl').val(ob.descarticulo);
    $('#desc_proveedor_mdl').val(ob.descarticuloprov);
    $('#unidad_medida_mdl').val(ob.idunidadmedida);
    $('#existencia_mdl').val(ob.existencia);
    $('#fecha_ult_compra_mdl').val(ob.fechaultimacompra);
    $('#precio_compra_mdl').val(toMoney(ob.preciocompra));
    $('#partida_gastos_mdl').val(ob.idpartidagto).change();
    $('#partida_costos_mdl').val(ob.idpartidacto).change();
    $('#partida_inversiones_mdl').val(ob.idpartidainv).change();
    $('#proveedor_mdl').val(ob.idproveedor).change();
    NProgress.done();
}

function agregar_ajax(){

    if (!formValido('formArticulo')){
        modalEstatus('i', 'Favor de revisar los campos marcados en rojo.','','modal_articulo');
        return false;
    }

    var json = {       
        'idArticulo':    idArticulo,
        'codigo': $('#codigo_mdl').val(),
        'nombre_articulo': $('#nombre_articulo_mdl').val(),
        'desc_proveedor': $('#desc_proveedor_mdl').val(),
        'unidad_medida': $('#unidad_medida_mdl').val(),
        'partida_gastos_mdl': $('#partida_gastos_mdl').val(),
        'partida_costos_mdl': $('#partida_costos_mdl').val(),
        'partida_inversiones_mdl': $('#partida_inversiones_mdl').val(),
        'proveedor_mdl': $('#proveedor_mdl').val()
    }    

    ajaxPost("articulo_insert.php", correctoTabla, json);
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
    $('#btn_delete').attr('onclick', 'deletearticulo(' + id + ')');

    $('#modal_borrar').modal('show');
}

function deletearticulo(id){
    $('#modal_borrar').modal('hide');
    ajaxPost("articulo_delete.php", correctoTabla, {'idarticulo' : id});
}

