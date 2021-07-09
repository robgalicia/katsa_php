$(document).ready(function() {    
    validarInit('formAgregar');
    dpd_categoria('categoria');
    dpd_puesto_depto('puesto');
    var fechaActual = obtenerFechaCampo();

    console.log(fechaActual);
    $('#fecha_ini').val(fechaActual);
    $('#fecha_fin').val(fechaActual);
    
    

});


function llenar_tabla_ajax(){
    destroyDTGen();
    $('#tbody').html('');

    var puesto = $('#puesto').val();
    var categoria = $('#categoria').val();
    var fecha_ini = $('#fecha_ini').val();
    var fecha_fin = $('#fecha_fin').val();

    json = {
        'puesto':puesto,
        'categoria':categoria,
        'fecha_ini':fecha_ini,
        'fecha_fin':fecha_fin
    }
    
    ajaxPost("reporteEntregable_all.php", llenar_tabla, json);
}


function llenar_tabla(json){
    console.log(json);
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
            string += ob.descpuesto;
            string += '</td>';      

            string += '<td>';
            string += ob.descentregable;
            string += '</td>';  

            string += '<td>';
            string += ob.cantidad;
            string += '</td>';  

            string += '<td>';     
            string += ob.cumplidos;
            string += '</td>';

            string += '</tr>';    
    }
    $('#tbody').html(string);
    toDataTableGenExcel();
    NProgress.done();
}
