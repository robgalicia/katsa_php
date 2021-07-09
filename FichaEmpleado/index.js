var idempleadoG = -1;

$(document).ready(function() {    
    idempleadoG = $.get("idempleadoG");

    llenar_tabla_ajax_generales()
    llenar_tabla_ajax_beneficiarios()
    llenar_tabla_documentos_ajax()

});

/*-------------------------------------------------------------------------------------*/
/*-------------------------------------------------------------------------------------*/
/*----------------------GENERALES------------------------------------------------------*/
/*-------------------------------------------------------------------------------------*/
/*-------------------------------------------------------------------------------------*/
function llenar_tabla_ajax_generales(){    
    $('#tbody').html('');
    
    var json = {
        'idempleado' : idempleadoG
    }

    ajaxPost("ficha_all.php", llenar_tabla_generales, json);
}

function llenar_tabla_generales(json){
    console.log('json')
    console.log(json)

    var ob = json[0]

    $('#nombre_datos_empleado').html(ob.nombre)
    $('#calle_datos_empleado').html(ob.calle)
    $('#nacimiento_datos_empleado').html(fechaEspanol(ob.fechanacimiento))
    $('#ext_datos_empleado').html(ob.numexterior)
    $('#sexo_datos_empleado').html(ob.sexo)
    $('#int_datos_empleado').html(ob.numinterior)
    $('#edad_datos_empleado').html(ob.edad)
    $('#municipio_datos_empleado').html(ob.descmunicipio)
    $('#edocivil_datos_empleado').html(ob.descestadocivil)
    $('#entidad_datos_empleado').html(ob.ciudad)
    $('#rfc_datos_empleado').html(ob.rfc)
    $('#colonia_datos_empleado').html(ob.colonia)
    $('#curp_datos_empleado').html(ob.curp)
    $('#cp_datos_empleado').html(ob.codigopostal)
    $('#nss_datos_empleado').html(ob.numimss)
    $('#cuip_datos_empleado').html(ob.cuip)
    $('#tiposangre_datos_empleado').html(ob.desctiposangre)

    NProgress.done();

    llenar_tabla_banco(json)
    llenar_tabla_contacto(json)
    llenar_tabla_infonavit(json)
    // llenar_tabla_laborales(json)
}
/*-------------------------------------------------------------------------------------*/
/*-------------------------------------------------------------------------------------*/
/*-------------------------------------------------------------------------------------*/
/*-------------------------------------------------------------------------------------*/

/*-------------------------------------------------------------------------------------*/
/*-------------------------------------------------------------------------------------*/
/*----------------------BENEFICIARIOS--------------------------------------------------*/
/*-------------------------------------------------------------------------------------*/
/*-------------------------------------------------------------------------------------*/
function llenar_tabla_ajax_beneficiarios(){
    destroyDT('tabla_beneficiarios');
    $('#tbody_beneficiarios').html('');
    
    var json = {
        'idempleado' : idempleadoG
    }

    ajaxPost("../Referencias/referencias_all.php", llenar_tabla_beneficiarios, json);
}

function llenar_tabla_beneficiarios(json){    

    destroyDT('tabla_beneficiarios');
    $('#tbody_beneficiarios').html('');
    var string = '';

    for (let i in json) {
        var ob = json[i];
            string += '<tr>';

            string += '<td>';
            string += ob.nombre;
            string += '</td>';

            string += '<td>';
            string += ob.rfc;
            string += '</td>';
            
            string += '<td>';
            string += ob.desctipoparentesco;
            string += '</td>';

            string += '<td>';
            string += ob.telefono;
            string += '</td>';

            string += '<td>';
            string += ob.correoelectronico;
            string += '</td>';                      

            string += '</tr>';    
    }
    $('#tbody_beneficiarios').html(string);
    toDataTable('tabla_beneficiarios');
    NProgress.done();
}
/*-------------------------------------------------------------------------------------*/
/*-------------------------------------------------------------------------------------*/
/*-------------------------------------------------------------------------------------*/
/*-------------------------------------------------------------------------------------*/

/*-------------------------------------------------------------------------------------*/
/*-------------------------------------------------------------------------------------*/
/*----------------------DATOS BANCARIOS------------------------------------------------*/
/*-------------------------------------------------------------------------------------*/
/*-------------------------------------------------------------------------------------*/

function llenar_tabla_banco(json){

    var ob = json[0]

    $('#banco_bancarios').html(ob.descbanco)
    $('#cuenta_bancarios').html(ob.numcuenta)
    $('#clabe_bancarios').html(ob.clabe)
    $('#tarjeta_bancarios').html(ob.tarjetadebito)
    NProgress.done();
}
/*-------------------------------------------------------------------------------------*/
/*-------------------------------------------------------------------------------------*/
/*-------------------------------------------------------------------------------------*/
/*-------------------------------------------------------------------------------------*/

/*-------------------------------------------------------------------------------------*/
/*-------------------------------------------------------------------------------------*/
/*-----------------------------CONTACTO------------------------------------------------*/
/*-------------------------------------------------------------------------------------*/
/*-------------------------------------------------------------------------------------*/

function llenar_tabla_contacto(json){

    var ob = json[0]

    $('#telefono1_contacto').html(ob.telefonocasa)
    $('#nombre_contacto').html(ob.nombreemergencia)
    $('#telefono2_contacto').html(ob.telefonocelular)
    $('#telefono_contacto').html(ob.telefonoemergencia)
    $('#correo_contacto').html(ob.correoelectronico)
    $('#correoemer_contacto').html(ob.correoemergencia)
    NProgress.done();
}
/*-------------------------------------------------------------------------------------*/
/*-------------------------------------------------------------------------------------*/
/*-------------------------------------------------------------------------------------*/
/*-------------------------------------------------------------------------------------*/

/*-------------------------------------------------------------------------------------*/
/*-------------------------------------------------------------------------------------*/
/*-----------------------------INFONAVIT-----------------------------------------------*/
/*-------------------------------------------------------------------------------------*/
/*-------------------------------------------------------------------------------------*/

function llenar_tabla_infonavit(json){

    var ob = json[0]

    var tiene = 'NO'

    if(ob.tipocreditoinfonavit == 'null') tiene = 'SI'

    $('#tienecredito_infonavit').html(tiene)
    $('#tipo_infonavit').html(ob.tipocreditoinfonavit)
    $('#numero_infonavit').html(ob.numcreditoinfonavit)
    $('#descuento_infonavit').html(ob.descuentoinfonavit)
    $('#fecha_infonavit').html(ob.fechacreditoinfonavit)
    // $('#nosm_infonavit').html(ob.)
    NProgress.done();
}
/*-------------------------------------------------------------------------------------*/
/*-------------------------------------------------------------------------------------*/
/*-------------------------------------------------------------------------------------*/
/*-------------------------------------------------------------------------------------*/

function llenar_tabla_documentos_ajax(){
    $('#tbody_documentos').html('');
    ajaxPost("../Documentos/documentos_all.php", llenar_tabla_documentos,{'idempleado':idempleadoG});
}

function llenar_tabla_documentos(json){
    var string = '';

    for (let i in json) {
        var ob = json[i];
        string += '<tr>';

        string += '<td>';
        string += ob.idtipodocumento;
        string += '</td>';

        string += '<td>';
        string += ob.desctipodocumento;
        string += '</td>';

        string += '<td>';
        if(ob.idempleadodocumento > 0){
            string += 'SI';
        }else{
            string += 'NO';
        }        
        string += '</td>';

        var obli = 'SI'

        if(ob.obligatorioempleado == 'N') obli = 'NO'

        string += '<td>';
        string += obli;
        string += '</td>';

        string += '<td>';
        string += ob.folio;
        string += '</td>';

        string += '<td>';
        string += fechaEspanol(ob.fechaemision);
        string += '</td>';        

        string += '<td>';
        string += fechaEspanol(ob.iniciovigencia);
        string += '</td>';

        string += '<td>';
        string += fechaEspanol(ob.finalvigencia);
        string += '</td>';
        
        string += '</tr>';
    }
    $('#tbody_documentos').html(string);    
    NProgress.done();
}