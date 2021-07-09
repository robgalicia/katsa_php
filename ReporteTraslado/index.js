$(document).ready(function() {        
    var fechaActual = obtenerFechaCampo();
    fechaActual = fechaActual.split('-');

    $('#anio').val( fechaActual[0] );
    $('#mes').val( fechaActual[1] ).change();
    

});


function llenar_tabla_ajax(){
    destroyDTGen();
    $('#tbody').html('');
    
    var mes = $('#mes').val();
    var anio = $('#anio').val();    

    json = {        
        'mes':mes,
        'anio':anio
    }
    
    ajaxPost("reporte_all.php", llenar_tabla, json);
}


function llenar_tabla(json){
    destroyDTGen();
    $('#tbody').html('');
    var string = '';

    for (let i in json) {
        var ob = json[i];
            string += '<tr>';

            string += '<td>'
            string += ob.folio
            string += '</td>'

            string += '<td>'
            string += fechaEspanol(ob.fechaservicio)
            string += '</td>'

            string += '<td>'
            string += ob.empresa
            string += '</td>'

            string += '<td>'
            string += ob.solicitante
            string += '</td>'

            string += '<td>'
            string += ob.descrutatraslado
            string += '</td>'

            string += '<td>'
            string += ob.importetarifa
            string += '</td>'

            string += '<td>'
            string += ob.desctipomoneda
            string += '</td>'

            string += '<td>'
            string += ob.tiposervicio
            string += '</td>'

            string += '</tr>';    
    }
    $('#tbody').html(string);
    toDataTableGenExcel();
    NProgress.done();
}
