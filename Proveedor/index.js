var idProveedor = -1;
var jsonPartida = '';
var tipoarticulo = '';

$(document).ready(function() {    
    validarInit('formProveedor');
    //llenar_tabla_ajax();

    /*$('#partida_mdl').keyup(function(){
        llenar_tabla(jsonPartida);
    });*/
});

function llenar_tabla_ajax(){
    destroyDTGen();
    $('#tbody').html('');
    
    ajaxPost("proveedor_all.php", llenar_tabla);
}

function llenar_tabla(json){
    destroyDTGen();
    $('#tbody').html('');
    jsonPartida = json;
    var nombreproveedor = $('#nombre_proveedor').val();
    var string = '';
    for (let i in json) {
        var ob = json[i];
        if(ob.nombre.includes(nombreproveedor.toUpperCase())){          
            string += '<tr>';

            string += '<td>';
            string += ob.idproveedor;
            string += '</td>';

            string += '<td>';
            string += ob.nombre;
            string += '</td>';        

            string += '<td>';
            string += ob.representante;
            string += '</td>';

            string += '<td>';
            string += ob.rfc;
            string += '</td>';

            string += '<td>';     
            string += '<button class="ui basic green icon button" data-tooltip="Editar" onclick="mostrarModal(' + ob.idproveedor + ');"><i class="edit icon"></i></button>';
            string += '<button class="ui basic green icon button" data-tooltip="Documentos" onclick="files_gen_ajax(\'01\',' + ob.idproveedor + ');"><i class="file pdf icon"></i></button>';
            string += '<button class="ui basic red icon button" data-tooltip="Eliminar" onclick="modalBorrarProvFN(' + ob.idproveedor + ');"><i class="close icon"></i></button>';            
            string += '</td>';

            string += '</tr>';    
            
        }
    }
    $('#tbody').html(string);
    toDataTableGen();
    NProgress.done();
}


function mostrarModal(id){
    console.log("modal");
    console.log(id);
    idProveedor = id;
    dpd_estado('estado_mdl','',false);
    dpd_banco('banco_deposito_mdl',);
    
    clearForm('formProveedor');

    $('#estado_mdl').val(28).change();
    $('#tipo_persona_mdl').val('M').change();    

    if(idProveedor > 0){
        ajaxPost("proveedor_all_edit.php", llenarModal, {'id':idProveedor});
    }    
        
    $('#modal_proveedor').modal('show');
}

function llenarModal(json){
    var ob = json[0];
    console.log("ob");
    console.log(ob);

    $('#nombre_proveedor_mdl').val(ob.nombre);
    $('#representante_legal_mdl').val(ob.representante);
    $('#direccion_mdl').val(ob.direccion);
    $('#colonia_mdl').val(ob.colonia);
    $('#estado_mdl').val(ob.idestado).change();
    $('#ciudad_mdl').val(ob.ciudad);
    $('#cp_mdl').val(toMoney(ob.codigopostal));
    $('#rfc_mdl').val(ob.rfc);
    $('#telefono_mdl').val(ob.telefono);
    $('#correo_mdl').val(ob.correoelectronico);
    $('#dias_credito_mdl').val(ob.diascredito);
    $('#banco_deposito_mdl').val(ob.bancodeposito).change();
    $('#cuenta_deposito_mdl').val(ob.cuentadeposito);
    $('#cuenta_contable_mdl').val(ob.cuentacontable);
    $('#tipo_persona_mdl').val(ob.personafiscal).change();
    NProgress.done();
}

function agregar_ajax(){

    if (!formValido('formProveedor')){
        modalEstatus('i', 'Favor de revisar los campos marcados en rojo.','','modal_proveedor');
        return false;
    }

    var json = {       
        'idProveedor':    idProveedor,
        'nombre': $('#nombre_proveedor_mdl').val(),
        'representante': $('#representante_legal_mdl').val(),
        'direccion': $('#direccion_mdl').val(),
        'colonia': $('#colonia_mdl').val(),
        'estado': $('#estado_mdl').val(),
        'ciudad': $('#ciudad_mdl').val(),
        'codigopostal': quitarComas($('#cp_mdl').val()),
        'rfc': $('#rfc_mdl').val(),
        'telefono': $('#telefono_mdl').val(),
        'correoelectronico': $('#correo_mdl').val(),
        'diascredito': $('#dias_credito_mdl').val(),
        'bancodeposito': $('#banco_deposito_mdl').val(),
        'cuentadeposito': $('#cuenta_deposito_mdl').val(),
        'cuentacontable': $('#cuenta_contable_mdl').val(),
        'personafiscal': $('#tipo_persona_mdl').val(),
    }
    console.log(json);

    ajaxPost("proveedor_insert.php", correctoTabla, json);
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

function modalBorrarProvFN(id){    
    $('#btn_delete').attr('onclick', 'deleteProveedor(' + id + ')');

    $('#modal_borrar').modal('show');
}

function deleteProveedor(id){    
    $('#modal_borrar').modal('hide');
    ajaxPost("proveedor_delete.php", correctoTabla, {'id' : id});
}

function nada(json){
    console.log(json)
}
