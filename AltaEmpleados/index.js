var idProveedor = -1;
var jsonPartida = '';
var tipoarticulo = '';

$(document).ready(function() {    
    
    
    $('#sua_div').hide();

    $('#tipo_alta').change(function(){
        var tipo = $('#tipo_alta').val()

        if(tipo == 'S'){
            $('#sua_div').show();
            $('#nomipaq_div').hide();
        }else{
            $('#sua_div').hide();
            $('#nomipaq_div').show();
        }

    });
});

function buscar(){
    var tipo = $('#tipo_alta').val()

    if(tipo == 'S'){
        llenar_tabla_ajax_sua()
    }else{
        llenar_tabla_ajax()
    }
}

function llenar_tabla_ajax_sua(){
    destroyDT('sua');
    $('#tbody_sua').html('');

    var fecha_ini = $('#fecha_ini').val();
    var fecha_fin = $('#fecha_fin').val();
    
    var json = {
        'fecha_ini' : fecha_ini,
        'fecha_fin' : fecha_fin
    };

    ajaxPost("altaempleados_all_sua.php", llenar_tabla_sua, json);
}

function llenar_tabla_sua(json){
    destroyDT('sua');
    $('#tbody_sua').html('');    
    var string = '';
    var txt = '';

    console.log(json)

    for (let i in json) {
        var ob = json[i];
        
            string += '<tr>';

            string += '<td>'
            string += ob.datosempleado
            string += '</td>'
            
            txt += ob.datosempleado + '\n';

            string += '</tr>';
    }
    $('#tbody_sua').html(string);    
    toDataTableButtonTXT('sua','TXT','SUA',txt)
    NProgress.done();
}

function llenar_tabla_ajax(){
    destroyDT('nomipaq');
    $('#tbody_nomipaq').html('');

    var fecha_ini = $('#fecha_ini').val();
    var fecha_fin = $('#fecha_fin').val();
    
    var json = {
        'fecha_ini' : fecha_ini,
        'fecha_fin' : fecha_fin
    };

    ajaxPost("altaempleados_all_nomi.php", llenar_tabla, json);
}

function llenar_tabla(json){
    destroyDT('nomipaq');
    $('#tbody_nomipaq').html('');    
    var string = '';
    for (let i in json) {
        var ob = json[i];
        
            string += '<tr>';

            string += '<td>'
            string += ob.Codigo
            string += '</td>'

            string += '<td>'
            string += ob.Fechadealta
            string += '</td>'

            string += '<td>'
            string += ob.Fechadebaja
            string += '</td>'

            string += '<td>'
            string += ob.Fechadereingreso
            string += '</td>'

            string += '<td>'
            string += ob.Tipodecontrato
            string += '</td>'

            string += '<td>'
            string += ob.Apellidopaterno
            string += '</td>'

            string += '<td>'
            string += ob.Apellidomaterno
            string += '</td>'

            string += '<td>'
            string += ob.Nombre
            string += '</td>'

            string += '<td>'
            string += ob.Tipodeperiodo
            string += '</td>'

            string += '<td>'
            string += ob.Salariodiario
            string += '</td>'

            string += '<td>'
            string += ob.SBCpartefija
            string += '</td>'

            string += '<td>'
            string += ob.Basedecotización
            string += '</td>'

            string += '<td>'
            string += ob.Estatusempleado
            string += '</td>'

            string += '<td>'
            string += ob.Departamento
            string += '</td>'

            string += '<td>'
            string += ob.Sindicalizado
            string += '</td>'

            string += '<td>'
            string += ob.Basedepago
            string += '</td>'

            string += '<td>'
            string += ob.Metododepago
            string += '</td>'

            string += '<td>'
            string += ob.Turnodetrabajo
            string += '</td>'

            string += '<td>'
            string += ob.Zonadesalario
            string += '</td>'

            string += '<td>'
            string += ob.Campoextra1
            string += '</td>'

            string += '<td>'
            string += ob.Campoextra2
            string += '</td>'

            string += '<td>'
            string += ob.Campoextra3
            string += '</td>'

            string += '<td>'
            string += ob.Afore
            string += '</td>'

            string += '<td>'
            string += ob.Expediente
            string += '</td>'

            string += '<td>'
            string += ob.Numseguridadsocial
            string += '</td>'

            string += '<td>'
            string += ob.rfc
            string += '</td>'

            string += '<td>'
            string += ob.curp
            string += '</td>'

            string += '<td>'
            string += ob.sexo
            string += '</td>'

            string += '<td>'
            string += ob.Ciudaddenacimiento
            string += '</td>'

            string += '<td>'
            string += ob.Fechadenacimiento
            string += '</td>'

            string += '<td>'
            string += ob.UMF
            string += '</td>'

            string += '<td>'
            string += ob.Nombredelpadre
            string += '</td>'

            string += '<td>'
            string += ob.Nombredelamadre
            string += '</td>'

            string += '<td>'
            string += ob.Direccion
            string += '</td>'

            string += '<td>'
            string += ob.Puesto
            string += '</td>'

            string += '<td>'
            string += ob.Poblacion
            string += '</td>'

            string += '<td>'
            string += ob.Entidadfederativadeldomicilio
            string += '</td>'

            string += '<td>'
            string += ob.Cp
            string += '</td>'

            string += '<td>'
            string += ob.Estadocivil
            string += '</td>'

            string += '<td>'
            string += ob.Telefono
            string += '</td>'

            string += '<td>'
            string += ob.Avisopendientemodificacionsbc
            string += '</td>'

            string += '<td>'
            string += ob.Avisopendientereingresoimss
            string += '</td>'

            string += '<td>'
            string += ob.Avisopendientebajaimss
            string += '</td>'

            string += '<td>'
            string += ob.Avisopendientecambiobasecotiza
            string += '</td>'

            string += '<td>'
            string += ob.Fechadelsalariodiario
            string += '</td>'

            string += '<td>'
            string += ob.Fechasbcpartefija
            string += '</td>'

            string += '<td>'
            string += ob.Salariovariable
            string += '</td>'

            string += '<td>'
            string += ob.Fechasalariovariable
            string += '</td>'

            string += '<td>'
            string += ob.Salariopromedio
            string += '</td>'

            string += '<td>'
            string += ob.Fechasalariopromedio
            string += '</td>'

            string += '<td>'
            string += ob.Salariobaseliquidacion
            string += '</td>'

            string += '<td>'
            string += ob.Saldodelajustealneto
            string += '</td>'

            string += '<td>'
            string += ob.Calculoptu
            string += '</td>'

            string += '<td>'
            string += ob.Calculoaguinaldo
            string += '</td>'

            string += '<td>'
            string += ob.Bancoparapagoelectronico
            string += '</td>'

            string += '<td>'
            string += ob.Numerodecuentaparapagoelectronico
            string += '</td>'

            string += '<td>'
            string += ob.Sucursalparapagoelectronico
            string += '</td>'

            string += '<td>'
            string += ob.Causadelaultimabaja
            string += '</td>'

            string += '<td>'
            string += ob.Campoextranumerico1
            string += '</td>'

            string += '<td>'
            string += ob.Campoextranumerico2
            string += '</td>'

            string += '<td>'
            string += ob.Campoextranumerico3
            string += '</td>'

            string += '<td>'
            string += ob.Campoextranumerico4
            string += '</td>'

            string += '<td>'
            string += ob.Campoextranumerico5
            string += '</td>'

            string += '<td>'
            string += ob.Fechasalariomixto
            string += '</td>'

            string += '<td>'
            string += ob.Salariomixto
            string += '</td>'

            string += '<td>'
            string += ob.Registropatronaldelimss
            string += '</td>'

            string += '<td>'
            string += ob.Numerofonacot
            string += '</td>'

            string += '<td>'
            string += ob.Correoelectronico
            string += '</td>'

            string += '<td>'
            string += ob.Tipoderegimen
            string += '</td>'

            string += '<td>'
            string += ob.Clabeinterbancaria
            string += '</td>'

            string += '<td>'
            string += ob.Entidadfederativadenacimiento
            string += '</td>'

            string += '<td>'
            string += ob.Tipodeprestacion
            string += '</td>'

            string += '<td>'
            string += ob.Extranjerosincurp
            string += '</td>'

            string += '</tr>';
    }
    $('#tbody_nomipaq').html(string);
    toDataTableGenExcelId('nomipaq');
    NProgress.done();
}