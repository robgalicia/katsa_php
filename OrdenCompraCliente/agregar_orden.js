var id_orden_G = 0;
var id_orden_detalle_G = 0;

var json_detalle = []

$(document).ready(function() {    

    dpd_cliente('cliente')
    dpd_tipomoneda('moneda')
    dpd_empleado('empleado')

    validarInit('formGeneral');
    validarInit('formAgregar');

    id_orden_G = $.get("id_orden_G");
    
    $('#fecha').val( obtenerFechaCampo() )
    
    $('#cliente').change(function(){
        dpd_cotizacion('cotizacion',$('#cliente').val())
    })

    setTimeout(function(){
        dpd_cotizacion('cotizacion',$('#cliente').val())
        dpd_cliente_domicilio('domicilio_fiscal',$('#cliente').val())
    }, 1000);

    $('#cantidad_mdl, #precio_mdl').keyup(function(){
        var cantidad = parseFloat( quitarComas( $('#cantidad_mdl').val() ) );
        var precio = parseFloat( quitarComas( $('#precio_mdl').val() ) );

        var total = cantidad * precio;

        if ( isNaN(total) ) {
            total = 0;
        }

        $('#total_mdl').val( toMoney(total) )
    });
    
    if (id_orden_G > 0){
        setTimeout(function(){
            ajaxPost("orden_all_detail.php", cargarDatos, {'idordencompracliente' : id_orden_G});
        }, 1000);        
    }    


});

function cargarDatos(json){
    var ob = json[0]
   
    
    $('#folio').val(ob.folioordencompra)
    $('#lugar_servicio').val(ob.lugarservicio)
    $('#fecha').val( fechaSinHora(ob.fecha) )
    $('#moneda').val(ob.idtipomoneda).change()
    $('#cliente').val(ob.idcliente).change()
    $('#tipo_cambio').val(ob.tipocambio)
    // $('#domicilio_fiscal').val(ob.)
    $('#observaciones').val(ob.observaciones)
    $('#cotizacion').val(ob.idcotizacion).change()

    json_detalle = json

    llenar_tabla()

    NProgress.done();
}


function agregar_ajax(){

    if (!formValido('formGeneral')){
        modalEstatus('i', 'Favor de revisar los campos marcados en rojo.');
        return false;
    }

    var json = {
        'idordencompracliente' : id_orden_G,
        'folioordencompra' : $('#folio').val(),
        'fecha' : $('#fecha').val(),
        'idcliente' : $('#cliente').val(),
        'idclientedomiciliofiscal' : $('#domicilio_fiscal').val(),
        'idcotizacion' : $('#cotizacion').val(),
        'lugarservicio' : $('#lugar_servicio').val(),
        'idtipomoneda' : $('#moneda').val(),
        'tipocambio' : $('#tipo_cambio').val(),
        'observaciones' : $('#observaciones').val()
    };    
    
    ajaxPost("orden_insert.php", agregar_detalle_ajax, json);
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
    // id_orden_detalle_G = id

    clearForm('formAgregar');    

    dpd_servicios('servicio_mdl');

    if(id > 0){
        llenarModal(id)
        //ajaxPost("servicios_all_edit.php", llenarModal, {'idclienteservicio':idclienteservicio_G});
    }else{

        $('#servicio_mdl').change(function(){
            llenarDatosExModal()    
        })

        llenarDatosExModal()
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

    $('#item_mdl').val( toMoney( json.item ) )
}

function llenarDatosExModal(){    
    var precio = $('#servicio_mdl option:selected').attr('preciounitario');    
        
    $('#precio_mdl').val( toMoney(precio) )
    
}

function borrarServicio(id){
    id = id - 1

    var ob = json_detalle[id]

    if(ob.idordencompraclientedetalle > 0){
        ajaxPost("orden_detail_delete.php", nadaTabla, {'id':ob.idordencompraclientedetalle});
    }else{
        json_detalle.splice(id, 1);
    }        

    llenar_tabla();
}

function nadaTabla(json){
    console.log(json)
    llenar_tabla();
}

function agergar_json_modal(){

    if (!formValido('formAgregar')){
        modalEstatus('i', 'Favor de revisar los campos marcados en rojo.','','modal_agregar');
        return false;
    }

    if(id_aux_edit_G > 0){
        var id = id_aux_edit_G - 1
        
        id_orden_detalle_G = json_detalle[id].idordencompraclientedetalle;
    }else{
        id_orden_detalle_G = 0;
    }

    var json = {
        'idordencompraclientedetalle' :     id_orden_detalle_G,
        'idordencompracliente' :            id_orden_G,
        'item' :                            quitarComas( $('#item_mdl').val() ),
        'idservicio' :                      $('#servicio_mdl').val(),
        'descservicio' :                    $('#desc_mdl').val(),
        'cantidad' :                        quitarComas( $('#cantidad_mdl').val() ),
        'preciounitario' :                  quitarComas( $('#precio_mdl').val() ),
        'importetotal' :                    quitarComas( $('#total_mdl').val() ),
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

    id_orden_G = json.lastid

    for (let i in json_detalle) {
        var ob = json_detalle[i];

        ob.idordencompracliente = id_orden_G

        ajaxPost("orden_insert_detalle.php", nada, ob);
    }

    NProgress.done();

    correcto({'result':true});
}