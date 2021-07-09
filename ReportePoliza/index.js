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

    var fecha_ini = $('#fecha_ini').val();
    var fecha_fin = $('#fecha_fin').val();
    
    var json = {
        'fecha_ini' : fecha_ini,
        'fecha_fin' : fecha_fin
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
            string += ob.placas;
            string += '</td>';

            string += '<td>';
            string += ob.marcasubmarca
            string += '</td>';        

            string += '<td>';
            string += ob.modelo;
            string += '</td>';

            string += '<td>';
            string += ob.numeconomico;
            string += '</td>';

            string += '<td>';     
            string += ob.numpoliza
            string += '</td>';

            string += '<td>';     
            string += ob.descaseguradora
            string += '</td>';
            
            string += '<td>';
            string += fechaEspanol(ob.fechapago)
            string += '</td>';

            string += '<td>';
            string += fechaEspanol(ob.iniciovigencia)
            string += '</td>';

            string += '<td>';
            string += fechaEspanol(ob.finalvigencia)
            string += '</td>';

            string += '</tr>';
    }
    $('#tbody').html(string);
    toDataTableGenExcel();
    NProgress.done();
}