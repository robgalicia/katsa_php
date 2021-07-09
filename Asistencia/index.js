var id_servicio_G = -1;

$(document).ready(function() {    
    
    dpd_region('region','adscripcion')
    dpd_cliente('cliente')

    $('#fecha').val( obtenerFechaCampoHora() )
});

function llenar_tabla_ajax(){
    destroyDTGen();
    $('#tbody').html('');

    var json = {
        'idregion' : $('#region').val(),
        'idadscripcion' : $('#adscripcion').val(),
        'idcliente' : $('#cliente').val(),
        'fecha' : $('#fecha').val(),
        'grupo' : $('#grupo').val(),
        'tipolista' : $('#lista').val(),
    }

    ajaxPost("asistencia_all_rpt.php", llenar_tabla,json);
}

function llenar_tabla(json){
    destroyDTGen();
    $('#tbody').html('');
    var string = '';

    for (let i in json) {
        var ob = json[i];
            string += '<tr>';

            string += '<td>';
            string += fechaEspanol(ob.fecha);
            string += '</td>';

            string += '<td>';
            string += ob.tipovehiculo;
            string += '</td>';

            string += '<td>';
            string += ob.nombreingeniero;
            string += '</td>';

            string += '<td>';
            string += ob.numeconomico
            string += '</td>';

            string += '<td>';
            string += ob.grupo;
            string += '</td>';
            
            string += '<td>';
            string += ob.tipolista;
            string += '</td>';

            string += '<td>';
            if (ob.latitud.length > 0){
                string += '<li><button class="circular ui icon button" onclick=abrirDoc("https://www.google.com/maps/search/?api=1&query=' + ob.latitud + ',' + ob.longitud + '")><i class="icon crosshairs"></i> Ver Mapa</button></li>';
            }
            string += '</td>';

            string += '</tr>';    
    }
    $('#tbody').html(string);
    toDataTableGenExcel();
    NProgress.done();
}

function abrirDoc(ruta){
    window.open(ruta, '_blank', 'location=yes');    
}