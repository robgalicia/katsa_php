var idempleadoG = -1;
$(document).ready(function() {

    idempleadoG = $.get("idempleadoG");

    validarInit('formGenerales');
    validarInit('formDomicilio');
    validarInit('formDatosLab');

    /* Generales */
    dpd_tipo_sangre('tipoSangre');
    dpd_estado_civil('estadoCivil');
    dpd_nacionalidad('nacionalidad');
    dpd_grado_escolaridad('gradoEscolar');
    dpd_profesion('nomCarrera');

    /* Domicilio */
    dpd_estado('estado','dpdCiudad');

    /* Laborales */
    dpd_tipo_puesto('puestoTab','T');
    dpd_banco('bancoDePago');
    dpd_cliente('cliente');
    dpd_departamento('departamento');
    dpd_tipo_puesto('puestoOrgani','O');
    dpd_tipo_puesto('puestoSNSP','R');
    dpd_region('region','lugarAds');
    dpd_empresaout('empresaOut');
    dpd_estatus_mod('estatusSNSP','SNSP');

    if(idempleadoG > 0){
        cargar_datos_ajax();
    }else{        
        console.log("else");
        $('#estado').val(28).change();
        $('#dpdCiudad').val(41).change();
        ajaxPost("recursosH_nextnum.php", nextNumEmpleado);
        NProgress.done();
    }

});

function nextNumEmpleado(json){
    console.log(json);
    var num = json.lastid;
    $('#num_empleado').val(num);
}

function validateForms(){
    
    if ( formValido('formGenerales') && formValido('formDomicilio') && formValido('formDatosLab') ){
        return true;
    }else{
        return false;
    }
        
}

function cargar_datos_ajax(){
    var json = {
        'idempleado' : idempleadoG
    }

    ajaxPost("recursosH_edit_all.php", cargar_datos, json);
}

function cargar_datos(json){
    var ob = json[0];

    console.log(json);

    dpd_region('region','lugarAds',ob.idregionactual,ob.idadscripcionactual);    
    $('#num_empleado').val(ob.numempleado)
    $('#apPaterno').val(ob.apellidopaterno)
    $('#sexo').val(ob.sexo)
    $('#apMaterno').val(ob.apellidomaterno)
    $('#tipoSangre').val(ob.idtiposangre)
    $('#nombre').val(ob.nombre)
    $('#estadoCivil').val(ob.idestadocivil).change()
    $('#rfc').val(ob.rfc)
    $('#conyuge').val(ob.nombreconyuge)
    $('#curp').val(ob.curp)
    $('#nacionalidad').val(ob.idnacionalidad).change()
    $('#cuip').val(ob.cuip)
    $('#lugarNacimiento').val(ob.lugarnacimiento)
    $('#cartilla').val(ob.numcartilla)
    $('#fechaNacimiento').val(fechaSinHora(ob.fechanacimiento))
    $('#telCasa').val(ob.telefonocasa)
    $('#gradoEscolar').val(ob.idgradoescolaridad).change()
    $('#telCel').val(ob.telefonocelular)
    $('#docProbatorio').val(ob.documentoescolaridad)
    $('#email').val(ob.correoelectronico)
    $('#emisionDoc').val(ob.aniodocumentoescolaridad)
    $('#nomCarrera').val(ob.idprofesion).change()
    $('#nombreEmergencia').val(ob.nombreemergencia)
    $('#telEmergencia').val(ob.telefonoemergencia)
    $('#emailEmergencia').val(ob.correoemergencia)
    $('#nombreCalle').val(ob.calle)
    $('#ciudad').val(ob.ciudad)
    $('#numExterior').val(ob.numexterior)
    $('#numInterior').val(ob.numinterior)
    $('#codigoPostal').val(ob.codigoPostal)
    $('#entreCalle').val(ob.entrecalles)
    $('#estado').val(ob.idestado).change()
    $('#colonia').val(ob.colonia)
    $('#dpdCiudad').val(ob.idmunicipio).change()
    $('#cp').val(ob.codigopostal)
    $('#fechaIngreso').val(fechaSinHora(ob.fechaingreso))
    $('#numIMSS').val(ob.numimss)
    $('#fechaReingreso').val(fechaSinHora(ob.fechareingreso))
    $('#sueldoDiaIMSS').val(ob.sueldodiarioimss)
    $('#departamento').val(ob.iddepartamento).change()
    $('#sueldoNetoMes').val(ob.sueldonetomensual)
    $('#puestoTab').val(ob.idpuestotabulador).change()
    $('#bancoDePago').val(ob.idbanco).change()
    $('#puestoOrgani').val(ob.idpuestoorganigrama).change()
    $('#numCuenta').val(ob.numcuenta)
    $('#puestoSNSP').val(ob.idpuestoregistro).change()
    $('#CLABE').val(ob.clabe)
    $('#region').val(ob.idregionactual).change()
    $('#tarjetaDebito').val(ob.tarjetadebito)
    //$('#lugarAds').val(ob.idadscripcionactual).change()
    $('#cliente').val(ob.idclienteactual).change()

    console.log('ob.idclienteactual: ' + ob.idclienteactual);

    $('#numInfonavit').val(ob.numcreditoinfonavit)
    $('#fechaBaja').val(ob.fechabaja)
    $('#fechaOtorgamiento').val(fechaSinHora(ob.fechacreditoinfonavit))
    $('#motivoBaja').val(ob.motivobaja)
    $('#tipoCredito').val(ob.tipocreditoinfonavit)

    if(ob.outsourcing == 'S'){
        $('#empleadoOut_si').prop('checked',true);
    }else{
        $('#empleadoOut_no').prop('checked',true);
    }
    
    $('#valorDesc').val(ob.descuentoinfonavit)
    $('#empresaOut').val(ob.idempresaoutsourcing).change()
    $('#tallaCamisa').val(ob.tallacamisa)
    $('#tallaPantalon').val(ob.tallapantalon)
    $('#tallaZapatos').val(ob.tallazapatos)
    $('#tallaChamarra').val(ob.tallachamarra)

    if(ob.capbasica == 'S'){
        $('#capaBasica_si').prop('checked',true);
    }else{
        $('#capaBasica_no').prop('checked',true);
    }
        
    if(ob.capseginmuebles == 'S'){
        $('#capBienes_si').prop('checked',true)
    }else{
        $('#capBienes_no').prop('checked',true)
    }
    
    if(ob.capmanejodefensivo == 'S'){
        $('#capDefensivo_si').prop('checked',true)
    }else{
        $('#capDefensivo_no').prop('checked',true)
    }
    
    if(ob.capprimerosauxilios == 'S'){
        $('#capAuxilios_si').prop('checked',true)
    }else{
        $('#capAuxilios_no').prop('checked',true)
    }
    
    if(ob.requiereregsnsp == 'S'){
        $('#reqSNSP_si').prop('checked',true)
    }else{
        $('#reqSNSP_no').prop('checked',true)
    }
    
    $('#estatusSNSP').val(ob.idestatusregsnsp).change()
    
    NProgress.done();
}

function agregar_empleado_ajax(){

    if(!validateForms()){
        modalEstatus('i', 'Favor de revisar los campos marcados con rojo.');
        return false;
    }

    var capDefensivo = 'N';

    if( $('#capDefensivo_si').prop('checked') ){
        capDefensivo = 'S';
    }

    var capaBasica = 'N';

    if( $('#capaBasica_si').prop('checked') ){
        capaBasica = 'S';
    }

    var capBienes = 'N';

    if( $('#capBienes_si').prop('checked') ){
        capBienes = 'S';
    }

    var capAuxilios = 'N';

    if( $('#capAuxilios_si').prop('checked') ){
        capAuxilios = 'S';
    }

    var reqSNSP = 'N';

    if( $('#reqSNSP_si').prop('checked') ){
        reqSNSP = 'S';
    }

    var empleadoOut = 'N';

    if( $('#empleadoOut_si').prop('checked') ){
        empleadoOut = 'S';
    }
    

    //formGenerales
    var json = {
        'numempleado':$('#num_empleado').val(),
        'idempleado' : idempleadoG,
        'apellidopaterno' : $('#apPaterno').val(),
        'sexo' : $('#sexo').val(),
        'apellidomaterno' : $('#apMaterno').val(),
        'idtiposangre' : $('#tipoSangre').val(),
        'nombre' : $('#nombre').val(),
        'idestadocivil' : $('#estadoCivil').val(),
        'rfc' : $('#rfc').val(),
        'nombreconyuge' : $('#conyuge').val(),
        'curp' : $('#curp').val(),
        'idnacionalidad' : $('#nacionalidad').val(),
        'cuip' : $('#cuip').val(),
        'lugarnacimiento' : $('#lugarNacimiento').val(),
        'numcartilla' : $('#cartilla').val(),
        'fechanacimiento' : $('#fechaNacimiento').val(),
        'telefonocasa' : $('#telCasa').val(),
        'idgradoescolaridad' : $('#gradoEscolar').val(),
        'telefonocelular' : $('#telCel').val(),
        'documentoescolaridad' : $('#docProbatorio').val(),
        'correoelectronico' : $('#email').val(),
        'aniodocumentoescolaridad' : $('#emisionDoc').val(),
        'idprofesion' : $('#nomCarrera').val(),
        'nombreemergencia' : $('#nombreEmergencia').val(),
        'telefonoemergencia' : $('#telEmergencia').val(),
        'correoemergencia' : $('#emailEmergencia').val(),
        'calle' : $('#nombreCalle').val(),
        'ciudad' : $('#ciudad').val(),
        'numexterior' : $('#numExterior').val(),
        'numinterior' : $('#numInterior').val(),
        'codigoPostal' : $('#codigoPostal').val(),
        'entrecalles' : $('#entreCalle').val(),
        'idestado' : $('#estado').val(),
        'colonia' : $('#colonia').val(),
        'idmunicipio' : $('#dpdCiudad').val(),
        'codigopostal' : quitarComas( $('#cp').val() ),
        'fechaingreso' : $('#fechaIngreso').val(),
        'numimss' : $('#numIMSS').val(),
        'fechareingreso' : $('#fechaReingreso').val(),
        'sueldodiarioimss' : quitarComas($('#sueldoDiaIMSS').val()),
        'iddepartamento' : $('#departamento').val(),
        'sueldonetomensual' : quitarComas($('#sueldoNetoMes').val()),
        'idpuestotabulador' : $('#puestoTab').val(),
        'idbanco' : $('#bancoDePago').val(),
        'idpuestoorganigrama' : $('#puestoOrgani').val(),
        'numcuenta' : $('#numCuenta').val(),
        'idpuestoregistro' : $('#puestoSNSP').val(),
        'clabe' : $('#CLABE').val(),
        'idregionactual' : $('#region').val(),
        'tarjetadebito' : $('#tarjetaDebito').val(),
        'idadscripcionactual' : $('#lugarAds').val(),
        'numcreditoinfonavit' : $('#numInfonavit').val(),
        'fechabaja' : $('#fechaBaja').val(),
        'fechacreditoinfonavit' : $('#fechaOtorgamiento').val(),
        'motivobaja' : $('#motivoBaja').val(),
        'tipocreditoinfonavit' : $('#tipoCredito').val(),
        'outsourcing' : empleadoOut,
        'descuentoinfonavit' : quitarComas($('#valorDesc').val()),
        'idempresaoutsourcing' : $('#empresaOut').val(),
        'tallacamisa' : $('#tallaCamisa').val(),
        'tallapantalon' : $('#tallaPantalon').val(),
        'tallazapatos' : $('#tallaZapatos').val(),
        'tallachamarra' : $('#tallaChamarra').val(),
        'capbasica' : capaBasica,
        'capseginmuebles' : capBienes,
        'capmanejodefensivo' : capDefensivo,
        'capprimerosauxilios' : capAuxilios,
        'requiereregsnsp' : reqSNSP,
        'idestatusregsnsp' : $('#estatusSNSP').val(),
        'idcliente' : $('#cliente').val()
    };
    console.log(json);
    ajaxPost("recursosH_insert.php", correctoTabla, json);
}

function correctoTabla(json){
    console.log(json);
    if(json.result){
        modalEstatus('o', 'La operación se realizó de manera correcta.');
        histBack();
    }else{
        modalEstatus('e', 'Ocurrio un error.');        
    }

    NProgress.done();
}
