var idvehiculoG = -1;
$(document).ready(function() {

    idvehiculoG = $.get("idvehiculoG");

    validarInit('formGenerales');
    
    dpd_marca_vehiculo('marca');
    dpd_tipo_combustible('tipo_combustible');
    dpd_color('color');
    
    dpd_arrendadora('propietario');//propietario

    $('input:radio[name=arrendado]').change(function() {
        if( $('#arrendado_si').prop('checked') ){
            $('#propietario').val("").change();
        }
    });

    if(idvehiculoG > 0){
        cargar_datos_ajax();
        llenar_tabla_ajax_resguardo();
        llenar_tabla_ajax_mantenimiento();
        llenar_tabla_ajax_combustible();
        llenar_tabla_ajax_incidencias();
        llenar_tabla_ajax_seguros();
        llenar_tabla_ajax_tenencias();
    }else{
        $('.tabocultar').hide();
        $("#fecha_baja").attr('disabled',true);
        $("#motivo_baja").attr('disabled',true);
    }

});

function agregar_vehiculo_ajax(){

    if (!formValido('formGenerales')){
        modalEstatus('i', 'Favor de revisar los campos marcados con rojo.');
        return false;
    }

    var arrendado = 'N';
    var tiene_GPS = 'N'

    if( $('#arrendado_si').prop('checked') ){
        arrendado = 'S';
    }

    if( $('#tiene_gps_si').prop('checked') ){
        tiene_GPS = 'S';
    }

    var json = {
        "idvehiculo" : idvehiculoG,
        "marca" : $("#marca").val(),
        "num_economico" : $("#num_economico").val(),
        "sub_marca" : $("#sub_marca").val(),
        //"region" : $("region").val(),
        "anio_modelo" : $("#anio_modelo").val(),
        //"adscripcion" : $("adscripcion").val(),
        "placas" : $("#placas").val(),
        //"cliente" : $("cliente").val(),
        "color" : $("#color").val(),
        //"empleado_resguardo" : $("empleado_resguardo").val(),
        "cilindros" : $("#cilindros").val(),
        "num_serie" : $("#num_serie").val(),
        "propietario" : $("#propietario").val(),
        "num_motor" : $("#num_motor").val(),
        //"km_actual" : $("km_actual").val(),
        "tipo_transmision" : $("#tipo_transmision").val(),
        //"fecha_km" : $("fecha_km").val(),
        "tipo_combustible" : $("#tipo_combustible").val(),
        //"km_mantenimiento" : $("km_mantenimiento").val(),
        "capacidad_tanque" : $("#capacidad_tanque").val(),
        //"utlimo_mantenimiento" : $("utlimo_mantenimiento").val(),
        "tarjeta_combustible" : $("#tarjeta_combustible").val(),
        "arrendado" : arrendado,
        "tiene_GPS" : tiene_GPS,
        "proveedor_gps" : $("#proveedor_gps").val(),
        "observaciones" : $("#observaciones").val(),
        "fecha_baja" : $("#fecha_baja").val(),
        "motivo_baja" : $("#motivo_baja").val()
        //"estatus" : $("estatus").val()
    }
    //console.log(json);
    ajaxPost("vehiculos_insert.php", correcto, json);
}

function nada(json){
    console.log(json)
}

function cargar_datos_ajax(){
    ajaxPost("vehiculos_all_edit.php", cargar_datos, {'idvehiculo':idvehiculoG});
}

function cargar_datos(json){
    var ob = json[0];    
    
    $('#marca').val(ob.idmarcavehiculo).change();
    $('#num_economico').val(ob.numeconomico);
    $('#sub_marca').val(ob.submarca);
    $('#region').val(ob.regionactual);
    $('#anio_modelo').val(ob.aniomodelo);
    $('#adscripcion').val(ob.adscripcionactual);
    $('#placas').val(ob.placas);
    $('#cliente').val(ob.nombrecliente);
    dpd_color('color',ob.idcolor)
    //$('#color').val(ob.color).change();
    $('empleado_resguardo').val(ob.empleadoresguardo);
    $('#cilindros').val(ob.cilindros);
    $('#num_serie').val(ob.numserie);
    $('#propietario').val(ob.idarrendadora).change();;
    $('#num_motor').val(ob.nummotor);
    $('#km_actual').val(ob.kilometrajeactual);
    $('#tipo_transmision').val(ob.tipotransmision).change();
    $('#fecha_km').val(fechaSinHora(ob.fechakilometraje));
    $('#tipo_combustible').val(ob.idtipocombustible).change();
    $('#km_mantenimiento').val(ob.kilometrajemtto);
    $('#capacidad_tanque').val(ob.capacidadtanque);
    $('#utlimo_mantenimiento').val(fechaSinHora(ob.fechaultimomtto));
    $('#tarjeta_combustible').val(ob.tarjetacombustible);
    $('#observaciones').val(ob.observaciones);
    $('#estatus').val(ob.estatus);
    $('#fecha_baja').val(fechaSinHora(ob.fechabaja));
    $('#motivo_baja').val(ob.motivobaja);

    $("#proveedor_gps").val(ob.proveedorgps);

    if (ob.esarrendado == 'S'){
        $('#arrendado_si').prop('checked',true)
    }

    if (ob.tienegps == 'S'){
        $('#tiene_gps_si').prop('checked',true)
    }

    NProgress.done();
}

/*==================================================*/
/*==================================================*/
/*==================================================*/
function llenar_tabla_ajax_resguardo(){
    destroyDT('table_resguardo');
    $('#tbody_resguardo').html('');    

    ajaxPost("../ResguardoVehiculos/resguardo_all.php", llenar_tabla_resguardo,{'id_vehiculo' : idvehiculoG});
}

function llenar_tabla_resguardo(json){
    var string = '';    

    for (let i in json) {
        var ob = json[i];            
        string += '<tr>';

        string += '<td>';
        string += fechaEspanol(ob.fecharesguardo,false,true);
        string += '</td>';

        string += '<td>';
        string += ob.tiporesguardo;
        string += '</td>';

        string += '<td>';
        string += ob.placas;
        string += '</td>';

        string += '<td>';
        string += ob.marcavehiculo;
        string += '</td>';

        string += '<td>';
        string += ob.aniomodelo;
        string += '</td>';

        string += '<td>';
        string += ob.numeconomico;
        string += '</td>';

        string += '<td>';
        string += ob.empleadoresguardo;
        string += '</td>';

        string += '<td>';
        string += ob.nombrecliente;
        string += '</td>';

        string += '<td>';
        string += ob.descadscripcion;
        string += '</td>';
        
        string += '<td>';
        string += '<button class="ui basic green icon button" data-tooltip="Documentos" onclick="files_gen_ajax(\'05\',' + ob.idvehiculoresguardo + ');"><i class="file pdf icon"></i></button>';        
        string += '</td>';

        string += '</tr>';
    }
    $('#tbody_resguardo').html(string);
    toDataTable('table_resguardo');
    NProgress.done();
}
/*==================================================*/
/*==================================================*/
/*==================================================*/
function llenar_tabla_ajax_mantenimiento(){
    destroyDT('table_mantenimiento');
    $('#tbody_mantenimiento').html('');    

    ajaxPost("../Mantenimiento/mante_all.php", llenar_tabla_mantenimiento,{'id_vehiculo' : idvehiculoG});
}

function llenar_tabla_mantenimiento(json){
    var string = '';    

    for (let i in json) {
        var ob = json[i];            
        string += '<tr>';

        string += '<td>';
        string += fechaEspanol(ob.fecha);
        string += '</td>';

        string += '<td>';
        string += toMoney(ob.kilometrajeactual);
        string += '</td>';

        string += '<td>';
        string += ob.descservicio;
        string += '</td>';

        string += '<td>';
        string += ob.proveedorservicio;
        string += '</td>';

        string += '<td>';
        string += toMoney(ob.importetotal);
        string += '</td>';

        string += '<td>';        
        string += '<button class="ui basic green icon button" data-tooltip="Documentos" onclick="files_gen_ajax(\'10\',' + ob.idvehiculomantenimiento + ');"><i class="file pdf icon"></i></button>';        
        string += '</td>';

        string += '</tr>';
    }
    $('#tbody_mantenimiento').html(string);    
    toDataTable('table_mantenimiento');
    NProgress.done();
}
/*==================================================*/
/*==================================================*/
/*==================================================*/
function llenar_tabla_ajax_combustible(){
    destroyDT('table_combustible');
    $('#tbody_combustible').html('');    

    ajaxPost("vehiculos_all_combustible.php", llenar_tabla_combustible,{'id_vehiculo' : idvehiculoG});
}

function llenar_tabla_combustible(json){
    var string = '';    

    for (let i in json) {
        var ob = json[i];            
        string += '<tr>';

        string += '<td>';
        string += fechaEspanol(ob.fecha);
        string += '</td>';

        string += '<td>';
        string += ob.numtarjeta;
        string += '</td>';

        string += '<td>';
        string += ob.servicio;
        string += '</td>';

        string += '<td>';
        string += ob.nombreempleado;
        string += '</td>';

        string += '<td>';
        string += ob.kilometrajeanterior;
        string += '</td>';

        string += '<td>';
        string += ob.cantidadlitros;
        string += '</td>';

        string += '<td>';
        string += ob.desctipocombustible;
        string += '</td>';

        string += '<td>';
        string += ob.preciolitro;
        string += '</td>';

        string += '<td>';
        string += ob.preciototal;
        string += '</td>';

        string += '<td>';
        string += ob.kilometrosrecorridos;
        string += '</td>';

        string += '<td>';
        string += ob.rendimientolitro;
        string += '</td>';

        string += '</tr>';
    }
    $('#tbody_combustible').html(string);    
    toDataTable('table_combustible');
    NProgress.done();
}
/*==================================================*/
/*==================================================*/
/*==================================================*/
function llenar_tabla_ajax_incidencias(){
    destroyDT('table_incidencias');
    $('#tbody_incidencias').html('');
    ajaxPost("../Incidencias_vehiculos/incidencias_all.php", llenar_tabla_incidencias,{'id_vehiculo' : idvehiculoG});
}

function llenar_tabla_incidencias(json){
    console.log("json")
    console.log(json)
    var string = '';    

    for (let i in json) {
        var ob = json[i];            
        string += '<tr>';

        string += '<td>';
        string += ob.idvehiculoincidencia;
        string += '</td>';

        string += '<td>';
        string += fechaEspanol(ob.fechaincidencia,false,true);
        string += '</td>';

        string += '<td>';
        string += ob.desctipoincidenciaveh;
        string += '</td>';        

        string += '<td>';
        string += ob.observaciones;
        string += '</td>';
        
        string += '<td>';
        string += '<button class="ui basic green icon button" data-tooltip="Documentos" onclick="files_gen_ajax(\'06\',' + ob.idvehiculoincidencia + ');"><i class="file pdf icon"></i></button>';        
        string += '</td>';

        string += '</tr>';
    }    
    $('#tbody_incidencias').html(string);
    toDataTable('table_incidencias');
    NProgress.done();
}
/*==================================================*/
/*==================================================*/
/*==================================================*/
function llenar_tabla_ajax_seguros(){
    destroyDT('table_seguros');
    $('#tbody_seguros').html('');

    ajaxPost("../Polizas/poliza_all.php", llenar_tabla_seguros,{'id_vehiculo' : idvehiculoG});
}

function llenar_tabla_seguros(json){
    var string = '';    

    for (let i in json) {
        var ob = json[i];            
        string += '<tr>';

        string += '<td>';
        string += ob.numpoliza;
        string += '</td>';

        string += '<td>';
        string += ob.descaseguradora;
        string += '</td>';

        string += '<td>';
        string += fechaEspanol(ob.fechapago);
        string += '</td>';

        string += '<td>';
        string += fechaEspanol(ob.iniciovigencia);
        string += '</td>';

        string += '<td>';
        string += fechaEspanol(ob.finalvigencia);
        string += '</td>';        

        string += '<td>';
        string += ob.observaciones;
        string += '</td>';
        
        string += '<td>';
        string += '<button class="ui basic green icon button" data-tooltip="Documentos" onclick="files_gen_ajax(\'07\',' + ob.idvehiculopoliza + ');"><i class="file pdf icon"></i></button>';        
        string += '</td>';

        string += '</tr>';
    }
    $('#tbody_seguros').html(string);
    toDataTable('table_seguros');
    NProgress.done();
}
/*==================================================*/
/*==================================================*/
/*==================================================*/
function llenar_tabla_ajax_tenencias(){
    destroyDT('table_tenencias');
    $('#tbody_tenencias').html('');

    ajaxPost("../Tenencias/tenencia_all.php", llenar_tabla_tenencias,{'id_vehiculo' : idvehiculoG});
}

function llenar_tabla_tenencias(json){
    var string = '';    

    for (let i in json) {
        var ob = json[i];            
        string += '<tr>';

        string += '<td>';
        string += fechaEspanol(ob.fechapago);
        string += '</td>';

        string += '<td>';
        string += toMoney(ob.importepagado);
        string += '</td>';

        string += '<td>';
        string += fechaEspanol(ob.fechavigencia);
        string += '</td>';        

        string += '<td>';
        string += ob.placas;
        string += '</td>';
        
        string += '<td>';
        string += '<button class="ui basic green icon button" data-tooltip="Documentos" onclick="files_gen_ajax(\'08\',' + ob.idvehiculotenencia + ');"><i class="file pdf icon"></i></button>';        
        string += '</td>';

        string += '</tr>';
    }
    $('#tbody_tenencias').html(string);
    toDataTable('table_tenencias');
    NProgress.done();
}
/*==================================================*/
/*==================================================*/
/*==================================================*/