$(document).ready(function() {        
    var fechaActual = obtenerFechaCampo();
    
    $('#fecha_ini').val(fechaActual);
    $('#fecha_fin').val(fechaActual);
    
    

});


function llenar_tabla_ajax(){
    destroyDTGen();
    $('#tbody').html('');
    
    var fecha_ini = $('#fecha_ini').val();
    var fecha_fin = $('#fecha_fin').val();

    json = {        
        'fecha_ini':fecha_ini,
        'fecha_fin':fecha_fin
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
            string += ob.nombrecompleto
            string += '</td>'

            string += '<td>'
            string += ob.rfc
            string += '</td>'

            string += '<td>'
            string += ob.curp
            string += '</td>'

            string += '<td>'
            string += ob.descdepartamento
            string += '</td>'

            string += '<td>'
            string += ob.puestoorganigrama
            string += '</td>'

            string += '<td>'
            string += ob.descregion
            string += '</td>'

            string += '<td>'
            string += ob.descadscripcion
            string += '</td>'

            string += '<td>'
            string += fechaEspanol(ob.fechanacimiento)
            string += '</td>'

            string += '<td>'
            string += ob.edad
            string += '</td>'            

            string += '</tr>';    
    }
    $('#tbody').html(string);
    toDataTableGenExcel();
    NProgress.done();
}
