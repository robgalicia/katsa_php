var idProveedor = -1;
var jsonPartida = '';
var tipoarticulo = '';

$(document).ready(function() {    
    //validarInit('formProveedor');
    //llenar_tabla_ajax();

    /*$('#partida_mdl').keyup(function(){
        llenar_tabla(jsonPartida);
    });*/
});

function llenar_tabla_ajax(){
    destroyDTGen();
    $('#tbody').html('');
    var tipo = '';
    var activo=$("#activo").prop('checked');
    var inactivo=$("#inactivo").prop('checked');

    if(activo){
        console.log("activo");
        tipo = $("#activo").val();
    }else{
        console.log("no");
        tipo = $("#inactivo").val();
    }
    ajaxPost("estadofuerza_all.php", llenar_tabla, {'tipo':tipo});
}

function llenar_tabla(json){
    destroyDTGen();
    $('#tbody').html('');
    console.log(json);
    var string = '';
    for (let i in json) {
        var ob = json[i];
        
            string += '<tr>';

            string += '<td>';
            string += ob.idempleado;
            string += '</td>';

            string += '<td>';
            string += ob.descestatus;
            string += '</td>';        

            string += '<td>';
            string += ob.empresa;
            string += '</td>';

            string += '<td>';
            string += ob.entidad;
            string += '</td>';

            string += '<td>';     
            string += ob.municipio
            string += '</td>';

            string += '<td>';     
            string += ob.nombrecliente
            string += '</td>';

            string += '<td>';     
            string += ob.descadscripcion
            string += '</td>';

            string += '<td>';     
            string += ob.conclusionservicio
            string += '</td>';

            string += '<td>';     
            string += ob.nombreempleado
            string += '</td>';

            string += '<td>';     
            string += ob.sueldonetomensual
            string += '</td>';

            string += '<td>';     
            string += ob.puestotabulador
            string += '</td>';

            string += '<td>';     
            string += ob.puestoorganigrama
            string += '</td>';

            string += '<td>';     
            string += ob.funcionespuesto
            string += '</td>';

            string += '<td>';     
            string += ob.puestoregistro
            string += '</td>';

            string += '<td>';     
            string += ob.requiereregsnsp
            string += '</td>';

            string += '<td>';     
            string += ob.estatusregsnsp
            string += '</td>';

            string += '<td>';     
            string += ob.capbasica
            string += '</td>';

            string += '<td>';     
            string += ob.capseginmuebles
            string += '</td>';

            string += '<td>';     
            string += ob.capmanejodefensivo
            string += '</td>';

            string += '<td>';     
            string += ob.capprimerosauxilios
            string += '</td>';

            string += '<td>';     
            string += ob.cuip
            string += '</td>';

            string += '<td>';     
            string += ob.curp
            string += '</td>';

            string += '<td>';     
            string += ob.rfc
            string += '</td>';

            string += '<td>';     
            string += ob.numimss
            string += '</td>';

            string += '<td>';     
            string += ob.gruposanguineo
            string += '</td>';

            string += '<td>';     
            string += fechaEspanol(ob.fechaalta);
            string += '</td>';

            string += '<td>';     
            string += fechaEspanol(ob.fechabaja);
            string += '</td>';

            string += '<td>';     
            string += ob.vehiculoasignado
            string += '</td>';

            string += '<td>';     
            string += ob.marcasubmarca
            string += '</td>';

            string += '<td>';     
            string += ob.placas
            string += '</td>';

            string += '<td>';     
            string += ob.gasolina
            string += '</td>';

            string += '<td>';     
            string += ob.diesel
            string += '</td>';

            string += '<td>';     
            string += ob.consumomes
            string += '</td>';

            string += '<td>';     
            string += ob.modalidadasigna
            string += '</td>';

            string += '<td>';     
            string += ob.propietarioveh
            string += '</td>';

            string += '</tr>';
    }
    $('#tbody').html(string);
    toDataTableGenExcel();
    NProgress.done();
}