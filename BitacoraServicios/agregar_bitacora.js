var idServicio = -1;
var empleados = [];
var idEmpleado = -1;
var idOrden=-1;
var empleadosIns = [];

$(document).ready(function() {
    validarInit('formGeneral'); 
    validarInit('formSolicitud'); 
    dpd_region('region');
    dpd_servicios('servicio');
    dpd_cliente('cliente','',true);
    dpd_tipo_puesto('puesto','O');
    var fechaActual = obtenerFechaCampo();
    $('#fecha_ini_servicio').val(fechaActual);
    edit=$.get("edit");
    idOrden=$.get("idorden");
    if(idOrden>0){
        ajaxPost("bitacora_sel.php", llenar_datos, {'idordenservicio':idOrden});
    }
});

function llenar_datos(json){
    console.log(json);
    $('#num_acta').val(json[0].numeroacta);
    $('#fecha_ini_servicio').val(fechaSinHora(json[0].fechainicio));
    $('#region').val(json[0].idregion);
    $('#folio').val(json[0].folio);
    $('#cliente').val(json[0].idcliente);
    $('#orden_compra').val(json[0].folioordencompra);
    $('#fecha_emision').val(fechaSinHora(json[0].fechaordencompra));
    $('#servicio').val(json[0].idservicio);
    $('#lugar_servicio').val(json[0].lugarservicio);
    $('#elementos').val(json[0].numelementos);
    $('#turno').val(json[0].tipoturno);
    $('#observaciones').val(json[0].observaciones);


    if ( json[0].rechabvehiculo == 'K') $('#capVehiculo_Prestador').prop('checked',true);
    if ( json[0].rechabvehiculo == 'C') $('#capVehiculo_Prestario').prop('checked',true);
    

    if ( json[0].rechabvehiculotipo == 'P4') {console.log("check1"); $('#tipo_vehiculo_p4').prop('checked',true) ;}
    if ( json[0].rechabvehiculotipo == 'P2') {console.log("check2"); $('#tipo_vehiculo_p2').prop('checked',true) ;}
    if ( json[0].rechabvehiculotipo == 'SE') { console.log("check3");$('#tipo_vehiculo_sedan').prop('checked',true) };
    if ( json[0].rechabvehiculotipo == 'OT') {console.log("check4");$('#tipo_vehiculo_otro').prop('checked',true) };

    if ( json[0].rechabequipocom == 'K') $('#capComunicacion_Prestador').prop('checked',true) ;
    if ( json[0].rechabequipocom == 'C') $('#capComunicacion_Prestario').prop('checked',true) ;

    if ( json[0].rechabequipocomtipo == 'T') $('#tipo_comunicacion_telefono').prop('checked',true) ;
    if ( json[0].rechabequipocomtipo == 'R') $('#tipo_comunicacion_radio').prop('checked',true) ;

    if ( json[0].rechabgps == 'K') $('#capGps_Prestador').prop('checked',true) ;
    if ( json[0].rechabgps == 'C') $('#capGps_Prestario').prop('checked',true) ;

    if ( json[0].rechabgpstipo == 'V') $('#tipo_gps_vehicular').prop('checked',true) ;
    if ( json[0].rechabgpstipo == 'P') $('#tipo_gps_app').prop('checked',true) ;
    if ( json[0].rechabgpstipo == 'A') $('#tipo_gps_personal').prop('checked',true) ;

    if ( json[0].rechabcasetavig == 'K') $('#capVigilancia_Prestador').prop('checked',true) ;
    if ( json[0].rechabcasetavig == 'C') $('#capVigilancia_Prestario').prop('checked',true) ;

    if ( json[0].rechabcasetavigtipo == 'A') $('#tipo_vigilancia_1').prop('checked',true) ;
    if ( json[0].rechabcasetavigtipo == 'B') $('#tipo_vigilancia_2').prop('checked',true) ;
    if ( json[0].rechabcasetavigtipo == 'C') $('#tipo_vigilancia_3').prop('checked',true) ;

    if ( json[0].rechabgenelectrico == 'K') $('#capGenerador_Prestador').prop('checked',true) ;
    if ( json[0].rechabgenelectrico == 'C') $('#capGenerador_Prestario').prop('checked',true) ;

    if ( json[0].rechabgenelectricotipo == 'M') $('#tipo_generador_mecanico').prop('checked',true) ;
    if ( json[0].rechabgenelectricotipo == 'F') $('#tipo_generador_fotovoltaico').prop('checked',true) ;

    if ( json[0].rechabmediorest == 'K') $('#capRestriccion_Prestador').prop('checked',true) ;
    if ( json[0].rechabmediorest == 'C') $('#capRestriccion_Prestario').prop('checked',true) ;

    if ( json[0].rechabmedioresttipo == 'P') $('#tipo_restriccion_plumas').prop('checked',true) ;
    if ( json[0].rechabmedioresttipo == 'C') $('#tipo_restriccion_conos').prop('checked',true) ;
    if ( json[0].rechabmedioresttipo == 'O') $('#tipo_restriccion_porton').prop('checked',true) ;

    llenar_puestos()
}

function llenar_puestos(){
    ajaxPost("puesto_all.php", solicitud_elegida, {'idordenservicio':idOrden});
}

function mostrarModal(id){
    destroyDT('tablePrin');
    clearForm('formSolicitud');
    if(id>=0){
        idEmpleado = id;
        json = empleados[id];
        empleado_detail(json);
    }
    NProgress.done(); 
    $('#modal_solicitud').modal('show');
}

function empleado_detail(json){
    $('#cantidad').val(json.cantidad);
    $('#puesto').val(json.idpuesto);
}

function validarCamposEmpleado(){
    console.log("camposempleado");
    if(!formValido('formSolicitud')){
        modalEstatus('i', 'Favor de revisar los campos marcados con rojo.','','modal_solicitud');
        return false;
    } else{
        elegir_articulo_ajax();
    }
}


function elegir_articulo_ajax(){
    console.log(idEmpleado);
    destroyDT('tablePrin');
    $('#tbodyPrin').html('');

    var cantidad = $('#cantidad').val();
    var puesto = $('#puesto').dropdown('get text');
    var idpuesto = $('#puesto').val();

    if(idEmpleado>=0){
        console.log(idEmpleado);
        solic_detalle = empleados[idEmpleado].idordenserviciopuesto;
    }
    else{
        solic_detalle = 0;
    }
    var json = {
        'puesto' : puesto,
        'cantidad' : cantidad,
        'idpuesto' : idpuesto
    };
    if(idEmpleado>=0){
        empleados[idEmpleado]=json;
    }else{
        empleados.push(json);
    }
    solicitud_elegida(empleados);
    $('#modal_solicitud').modal('hide');
    idEmpleado=-1;
}

function solicitud_elegida(json){
    console.log(json);
    empleados = json;
    console.log("json_emp");
    destroyDT('tablePrin');
    $('#tbodyPrin').html('');        
    var string = '';
    for (let i in json) {
        
        var ob = json[i];
            string += '<tr>';

            string += '<td class="two wide field">';
            string += ob.idpuesto;
            string += '</td>';

            string += '<td class="seven wide field">';
            string += ob.puesto;
            string += '</td>';

            string += '<td class="four wide field">';
            string += ob.cantidad;
            string += '</td>';       

            string += '<td class="three wide field">';
            string += '<button id="delete" class="ui basic red icon button" data-tooltip="Eliminar" onclick="borrar_elemento(' + i + ');"><i class="close icon"></i></button>';
            string += '</td>';

            string += '</tr>';
    }
    $('#tbodyPrin').html(string);    
    toDataTable('tablePrin')
    NProgress.done();
}

function borrar_elemento(id){
    console.log(empleados);
    if(empleados[id].idordenserviciopuesto){
        console.log("edit");
        console.log(empleados[id]);
        ajaxPost("puesto_del.php", correctPuesto, {'idordenserviciopuesto':empleados[id].idordenserviciopuesto});
    }
    else{
        empleados.splice(id, 1);
    }

    llenar_puestos();
}

function validarCampos(){
    console.log(formValido('formGeneral'));
    if(!formValido('formGeneral')){
        modalEstatus('i', 'Favor de revisar los campos marcados con rojo.');
        return false;
    } else{
        agregar_ajax();
    }
}

function agregar_ajax(){
    if(empleados.length > 0){

        var rechabvehiculo = 'N';
            if ( $('#capVehiculo_Prestador').prop('checked') ) rechabvehiculo = 'K';
            if ( $('#capVehiculo_Prestario').prop('checked') ) rechabvehiculo = 'C';
            //if ($('#capVehiculo_Prestador').prop('unchecked') && $('#capVehiculo_Prestario').prop('unchecked') )rechabvehiculo = 'N';

        var rechabvehiculotipo = '';
            if ( $('#tipo_vehiculo_p4').prop('checked') ) rechabvehiculotipo = 'P4';
            if ( $('#tipo_vehiculo_p2').prop('checked') ) rechabvehiculotipo = 'P2';
            if ( $('#tipo_vehiculo_sedan').prop('checked') ) rechabvehiculotipo = 'SE';
            if ( $('#tipo_vehiculo_otro').prop('checked') ) rechabvehiculotipo = 'OT';

        var rechabequipocom = 'N';
            if ( $('#capComunicacion_Prestador').prop('checked') ) rechabequipocom = 'K';
            if ( $('#capComunicacion_Prestario').prop('checked') ) rechabequipocom = 'C';
            //if ($('#capComunicacion_Prestador').prop('unchecked') && $('#capComunicacion_Prestario').prop('unchecked') )rechabequipocom = 'N';
                

        var rechabequipocomtip = '';
            if ( $('#tipo_comunicacion_telefono').prop('checked') ) rechabequipocomtip = 'T';
            if ( $('#tipo_comunicacion_radio').prop('checked') ) rechabequipocomtip = 'R';

        var rechabgps = 'N';
            if ( $('#capGps_Prestador').prop('checked') ) rechabgps = 'K';
            if ( $('#capGps_Prestario').prop('checked') ) rechabgps = 'C';
            //if ($('#capGps_Prestador').prop('unchecked') && $('#capGps_Prestario').prop('unchecked') ) rechabgps = 'N';

        var rechabgpstipo = '';
            if ( $('#tipo_gps_vehicular').prop('checked') ) rechabgpstipo = 'V';
            if ( $('#tipo_gps_app').prop('checked') ) rechabgpstipo = 'P';
            if ( $('#tipo_gps_personal').prop('checked') ) rechabgpstipo = 'A';

        var rechabcasetavig = 'N';
            if ( $('#capVigilancia_Prestador').prop('checked') ) rechabcasetavig = 'K';
            if ( $('#capVigilancia_Prestario').prop('checked') ) rechabcasetavig = 'C';
            //if ($('#capVigilancia_Prestador').prop('unchecked') && $('#capVigilancia_Prestario').prop('unchecked') ) rechabcasetavig = 'N';

        var rechabcasetavigtipo = 'N';
            if ( $('#tipo_vigilancia_1').prop('checked') ) rechabcasetavigtipo = 'A';
            if ( $('#tipo_vigilancia_2').prop('checked') ) rechabcasetavigtipo = 'B';
            if ( $('#tipo_vigilancia_3').prop('checked') ) rechabcasetavigtipo = 'C';

        var rechabgenelectrico = 'N';
            if ( $('#capGenerador_Prestador').prop('checked') ) rechabgenelectrico = 'K';
            if ( $('#capGenerador_Prestario').prop('checked') ) rechabgenelectrico = 'C';
            //if ($('#capGenerador_Prestador').prop('unchecked') && $('#capGenerador_Prestario').prop('unchecked') ) rechabgenelectrico = 'N';

        var rechabgenelectricotipo = '';
            if ( $('#tipo_generador_mecanico').prop('checked') ) rechabgenelectricotipo = 'M';
            if ( $('#tipo_generador_fotovoltaico').prop('checked') ) rechabgenelectricotipo = 'F';

        var rechabmediorest = 'N';
            if ( $('#capRestriccion_Prestador').prop('checked') ) rechabmediorest = 'K';
            if ( $('#capRestriccion_Prestario').prop('checked') ) rechabmediorest = 'C';
            //if ($('#capRestriccion_Prestador').prop('unchecked') && $('#capRestriccion_Prestario').prop('unchecked') ) rechabmediorest = 'N';

        var rechabmedioresttipo = '';
            if ( $('#tipo_restriccion_plumas').prop('checked') ) rechabmedioresttipo = 'P';
            if ( $('#tipo_restriccion_conos').prop('checked') ) rechabmedioresttipo = 'C';
            if ( $('#tipo_restriccion_porton').prop('checked') ) rechabmedioresttipo = 'O';

        var json = {
            'pidordenservicio' : idOrden,
            'pnumeroacta' : $('#num_acta').val(),
            'pfechainicio' : $('#fecha_ini_servicio').val(),
            'pidregion' : $('#region').val(),
            'pidcotizacion' : $('#folio').val(),
            'pidcliente' : $('#cliente').val(),
            'pfolioordencompra' : $('#orden_compra').val(),
            'pfechaordencompra' : $('#fecha_emision').val(),
            'pidservicio' : $('#servicio').val(),
            'plugarservicio' : $('#lugar_servicio').val(),
            'pnumelementos' : $('#elementos').val(),
            'ptipoturno' : $('#turno').val(),
            'prechabvehiculo' : rechabvehiculo,
            'prechabvehiculotipo' : rechabvehiculotipo,
            'prechabequipocom' : rechabequipocom,
            'prechabequipocomtipo' : rechabequipocomtip,
            'prechabgps' : rechabgps,
            'prechabgpstipo' : rechabgpstipo,
            'prechabcasetavig' : rechabcasetavig,
            'prechabcasetavigtipo' : rechabcasetavigtipo,
            'prechabgenelectrico' : rechabgenelectrico,
            'prechabgenelectricotipo' : rechabgenelectricotipo,
            'prechabmediorest' : rechabmediorest,
            'prechabmedioresttipo' : rechabmedioresttipo,
            'pobservaciones' : $('#observaciones').val()
        };
        console.log(json);
        ajaxPost("bitacora_all_edit.php", correct2, json);
    }else{
        modalEstatus('i', 'Favor de registrar al menos un puesto');
        return false;
        
    }
    
}

function correct2(json){
    console.log(json);
    if(json.result){
        for(var i = 0; i < empleados.length; i++){

            var ob = empleados[i];
    
            var json_puestos = {
                'idordenservicio' : json.lastid,
                'idpuesto' : ob.idpuesto,
                'cantidad': ob.cantidad,
                'idordenserviciopuesto':ob.idordenserviciopuesto
            };        
            if(json_puestos.idordenserviciopuesto){
                console.log("existe");
            }else{
                console.log("no existe");
                empleadosIns.push(json_puestos);
                
            }
    

        }
        insertEmpleado(json.lastid);
    }else{
        modalEstatus('e', 'Ocurrio un error.');        
    }

    NProgress.done();
}

function insertEmpleado(lastid){
    console.log("insertEmpleado");
    console.log(empleadosIns);
    if(empleadosIns.length==0){
        redirect('index.php')
    }else{
        for(var i = 0; i < empleadosIns.length; i++){

            var ob = empleadosIns[i];
    
            var json_puestos = {
                'idordenservicio' : lastid,
                'idpuesto' : ob.idpuesto,
                'cantidad': ob.cantidad,
                'idordenserviciopuesto':ob.idordenserviciopuesto
            };        
            ajaxPost("puesto_ins.php", correct, json_puestos);
        }
    }
    

}

function correct(json){
    console.log(json);
    if(json.result){
        $('.modal').modal('hide');
        modalEstatus('o', 'La operación se realizó de manera correcta.');
        //redirect('index.php')
    }else{
        modalEstatus('e', 'Ocurrio un error.');        
    }

    NProgress.done();
}

function correctPuesto(json){
    console.log(json);
    if(json.result){
        $('.modal').modal('hide');
        modalEstatus('o', 'La operación se realizó de manera correcta.');
    }else{
        modalEstatus('e', 'Ocurrio un error.');        
    }

    NProgress.done();
}