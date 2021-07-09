var id_cotizacion_G = 0;
var id_cotizacion_detalle_G = 0;

var json_detalle = []

$(document).ready(function() {    

    dpd_cliente('cliente')
    dpd_tipomoneda('moneda')
    dpd_empleado('empleado')

    validarInit('formGeneral');
    validarInit('formAgregar');

    id_cotizacion_G = $.get("id_cotizacion_G");

    
    $('#fecha').val( obtenerFechaCampo() )
    $('#fecha_ini').val( obtenerFechaCampo() )
    $('#fecha_fin').val( obtenerFechaCampo() )

    $('#lugar_expedicion').val( 'Cd. Victoria, Tamaulipas.' )

    $('#asunto').val( 'Propuesta Económica de Servicios.' )

    $('#cantidad_mdl, #precio_mdl').keyup(function(){
        calcular_total()
    });

    $('#cliente').change(function(){
        dpd_servicios_cliente('servicio_mdl', $('#cliente').val() );
    })
    
    if (id_cotizacion_G > 0){
        ajaxPost("coti_all_detail.php", cargarDatos, {'idcotizacion' : id_cotizacion_G});
    }    


});

function calcular_total(){
    var cantidad = parseFloat( quitarComas( $('#cantidad_mdl').val() ) );
    var precio = parseFloat( quitarComas( $('#precio_mdl').val() ) );

    var total = cantidad * precio;

    if ( isNaN(total) ) {
        total = 0;
    }

    $('#total_mdl').val( toMoney(total) )
}

function cargarDatos(json){
    var ob = json[0]
   
    $('#folio').val(ob.folio)
    $('#fecha').val(fechaSinHora(ob.fecha))
    $('#lugar_expedicion').val(ob.lugarexpedicion)
    $('#asunto').val(ob.asunto)
    $('#cliente').val(ob.idcliente).change()
    $('#atencion_a').val(ob.personacontacto)
    $('#copia_para').val(ob.personacopia)
    $('#tipo_servicio').val(ob.tiposervicio)
    $('#lugar_servicio').val(ob.lugarservicio)
    $('#ubicado_en').val(ob.ubicacionlugar)
    $('#empleado').val(ob.idempleadofirma).change()
    $('#moneda').val(ob.idtipomoneda).change()
    // $('#tipo_cambio').val(ob.tipocambio)
    $('#fecha_ini').val(fechaSinHora(ob.fechainicio))
    $('#fecha_fin').val(fechaSinHora(ob.fechafinal))

    json_detalle = json

    llenar_tabla()

    NProgress.done();
}


function agregar_ajax(){

    if (!formValido('formGeneral') || json_detalle.length == 0){
        modalEstatus('i', 'Favor de revisar los campos marcados en rojo o agregar servicios a la cotizacion.');
        return false;
    }

    var json = {
        'idcotizacion' :        id_cotizacion_G,
        'fecha' :               $('#fecha').val(),
        'lugarexpedicion' :     $('#lugar_expedicion').val(),
        'asunto' :              $('#asunto').val(),
        'idcliente' :           $('#cliente').val(),
        'personacontacto' :     $('#atencion_a').val(),
        'personacopia' :        $('#copia_para').val(),
        'tiposervicio' :        $('#tipo_servicio').val(),
        'lugarservicio' :       $('#lugar_servicio').val(),
        'ubicacionlugar' :      $('#ubicado_en').val(),
        'idempleadofirma' :     $('#empleado').val(),
        'idtipomoneda' :        $('#moneda').val(),
        // 'tipocambio' :          $('#tipo_cambio').val(),
        'fechainicio' :         $('#fecha_ini').val(),
        'fechafinal' :          $('#fecha_fin').val(),
    };    
    
    ajaxPost("coti_insert.php", agregar_detalle_ajax, json);
}

function nada(json){
    console.log(json)
}

/* ========================================================================================== */
/* ========================================================================================== */
/* ========================================================================================== */
/* ========================================================================================== */
/* ========================================================================================== */
var id_aux_edit_G = -1;
function mostrarModal(id){
    
    id_aux_edit_G = id
    // id_cotizacion_detalle_G = id

    clearForm('formAgregar');    

    dpd_servicios_cliente('servicio_mdl', $('#cliente').val() );    

    if(id > 0){
        llenarModal(id)
        //ajaxPost("servicios_all_edit.php", llenarModal, {'idclienteservicio':idclienteservicio_G});
    }else{

        $('#servicio_mdl').change(function(){
            llenarDatosExModal()    
        })

        llenarDatosExModal()
        $('#cantidad_mdl').val( "1" )
        calcular_total()
    }
    
        
    $('#modal_agregar').modal('show');
}

function llenarModal(id){
    id = id - 1
    var json = json_detalle[id]

    $('#servicio_mdl').val(json.idservicio).change()
    $('#desc_mdl').val(json.descservicio)
    $('#cantidad_mdl').val( toMoney( json.cantidad ) )
    $('#precio_mdl').val( toMoney( json.preciounitario ) )
    $('#total_mdl').val( toMoney( json.importetotal ) )
}

function llenarDatosExModal(){    
    var precio = $('#servicio_mdl option:selected').attr('preciounitario');    
    var desc = $('#servicio_mdl option:selected').attr('descservicio');
        
    $('#precio_mdl').val( toMoney(precio) )
    $('#desc_mdl').val( desc )
    
    
}

function borrarServicio(id){
    id = id - 1

    var ob = json_detalle[id]

    if(ob.idcotizaciondetalle > 0){
        ajaxPost("coti_detail_delete.php", nadaTabla, {'id':ob.idcotizaciondetalle});
    }else{
        json_detalle.splice(id, 1);
    }        

    llenar_tabla();
}

function nadaTabla(json){
    console.log(json)
    llenar_tabla();
}

function validar(){
    var cantidad = parseFloat( quitarComas( $('#cantidad_mdl').val() ) );
    var precio = parseFloat( quitarComas( $('#precio_mdl').val() ) );    

    var valido = true

    if ( isNaN(cantidad) || isNaN(precio) ) {
        valido = false
    }

    if ( cantidad <= 0 || precio <= 0 ) {
        valido = false
    }

    return valido
}

function agergar_json_modal(){

    if (!formValido('formAgregar')){
        modalEstatus('i', 'Favor de revisar los campos marcados en rojo.','','modal_agregar');
        return false;
    }

    if (!validar()){
        modalEstatus('i', 'La cantidad y el precio unitario deben ser mayor a 0.','','modal_agregar');
        return false;
    }
    

    if(id_aux_edit_G > 0){
        var id = id_aux_edit_G - 1
        
        id_cotizacion_detalle_G = json_detalle[id].idcotizaciondetalle;
    }else{
        id_cotizacion_detalle_G = 0;
    }

    var json = {
        'idcotizacion' : id_cotizacion_G,
        'idcotizaciondetalle' : id_cotizacion_detalle_G,
        'idservicio' :    $('#servicio_mdl').val(),
        'descservicio' :        $('#desc_mdl').val(),
        'cantidad' :    quitarComas( $('#cantidad_mdl').val() ),
        'preciounitario' :      quitarComas( $('#precio_mdl').val() ),
        'importetotal' :       quitarComas( $('#total_mdl').val() )
    }

    if(id_aux_edit_G > 0){
        var id = id_aux_edit_G - 1

        json_detalle[id] = json
    }else{
        json_detalle.push(json)
    }
    
    llenar_tabla();
    $('#modal_agregar').modal('hide');
}

function llenar_tabla(){
    destroyDTGen();
    $('#tbodyPrin').html('');    
    var string = '';
    var total_all = 0;

    for (let i in json_detalle) {
        var ob = json_detalle[i];
        var id_aux = parseInt(i) + 1
        
            
        string += '<tr>';

        string += '<td>';
        string += i;
        string += '</td>';

        string += '<td>';
        string += ob.descservicio;
        string += '</td>';

        string += '<td class="right aligned">';
        string += toMoney(ob.cantidad);
        string += '</td>';        

        string += '<td class="right aligned">';
        string += toMoney(ob.preciounitario);
        string += '</td>';

        string += '<td class="right aligned">';
        string += toMoney(ob.importetotal);
        string += '</td>';
        
        total_all += parseFloat(ob.importetotal);        

        string += '<td>';        
        string += '<button class="ui basic green icon button" data-tooltip="Editar" onclick="mostrarModal(' + id_aux + ');"><i class="edit icon"></i></button>';
        string += '<button class="ui basic red icon button" data-tooltip="Eliminar" onclick="borrarServicio(' + id_aux + ');"><i class="close icon"></i></button>';
        string += '</td>';

        string += '</tr>'; 
        
    }
    $('#tbodyPrin').html(string);
    $('#totalPrin').html( toMoney(total_all) );
    toDataTableGen();
    NProgress.done();
}

function agregar_detalle_ajax(json){

    id_cotizacion_G = json.lastid

    for (let i in json_detalle) {
        var ob = json_detalle[i];

        ob.idcotizacion = id_cotizacion_G

        ajaxPost("coti_insert_detalle.php", nada, ob);
    }

    NProgress.done();

    correcto({'result':true});
}