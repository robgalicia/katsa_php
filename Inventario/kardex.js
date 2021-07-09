var idSolicitud='';
var almacen='';

$(document).ready(function() {   
    idSolicitud = $.get("idsoli");
    almacen = $.get("alm");
    nombre = $.get("nombre");
    console.log(nombre);
    console.log(almacen);
    console.log($.get("alm"));
    var fecha_fin = obtenerFechaCampo();
    f = new Date();
    mes = 01;
    dia = 01;
    f.getFullYear() + "-" + mes + "-" + dia
    $('#fecha_fin').val(fecha_fin);
    $('#fecha_ini').val('2021-01-01');
    $('#art').val(nombre);
    dpd_almacen('almacen',almacen);
});

function llenar_tabla_ajax(){
    destroyDTGen();
    $('#tbody').html('');
    $('#thead').html('');   

    var fecha_ini = $('#fecha_ini').val();
    var fecha_fin = $('#fecha_fin').val();

    
    var json = {
        'nombre' : idSolicitud,
        'almacen' : almacen,
        'fecha_ini' : fecha_ini,
        'fecha_fin' : fecha_fin
    };

    console.log(json);
    ajaxPost("kardex_all.php", llenar_tabla, json);
}

function llenar_tabla(json){
    var string = '';    
    for (let i in json) {
        var ob = json[i];
        
            string += '<tr>';

            string += '<td>';
            string += ob.fechamovimiento;
            string += '</td>';

            string += '<td>';
            string += ob.documentoreferencia;
            string += '</td>';        

            string += '<td>';
            string += ob.folioreferencia;
            string += '</td>';

            string += '<td>';
            string += ob.tipomovimiento;
            string += '</td>';

            string += '<td>';     
            string += ob.cantidad;
            string += '</td>';

            string += '<td>';     
            string += ob.existenciaactual;
            string += '</td>';
            
            string += '<td>';
            string += ob.costounitario;
            string += '</td>';

            string += '<td>';
            string += ob.observaciones;
            string += '</td>';


            string += '</tr>';
    }
    $('#tbody').html(string);
    toDataTableGenExcel();
    NProgress.done();
}