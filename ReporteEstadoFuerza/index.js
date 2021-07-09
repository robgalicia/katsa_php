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

    var estatus = $('#estatus').val();    
    
    var json = {
        'estatus' : estatus
    };

    ajaxPost("reporte_all.php", llenar_tabla, json);
}

function llenar_tabla(json){
    destroyDTGen();
    $('#tbody').html('');    
    var string = '';    

    for (let i in json) {
        var ob = json[i];
        
            string += '<tr>';

            string += '<td>';
            string += ob.municipio;
            string += '</td>';

            string += '<td>';
            string += ob.cliente;
            string += '</td>';

            string += '<td>';
            string += ob.sitio;
            string += '</td>';

            string += '<td>';
            string += ob.nombreempleado;
            string += '</td>';

            string += '<td>';
            string += ob.tarjetacombustible;
            string += '</td>';

            string += '<td>';
            string += ob.marcasubmarca;
            string += '</td>';

            string += '<td>';
            string += ob.placas;
            string += '</td>';

            string += '<td>';
            string += ob.modelo;
            string += '</td>';

            string += '<td>';
            string += ob.propietario;
            string += '</td>';

            string += '<td>';
            string += ob.numeconomico;
            string += '</td>';

            string += '<td>';
            string += ob.capacidadtanque;
            string += '</td>';

            string += '<td>';
            string += ob.estatus;
            string += '</td>';

            string += '</tr>';
    }
    $('#tbody').html(string);
    toDataTableGenExcel();
    NProgress.done();
}