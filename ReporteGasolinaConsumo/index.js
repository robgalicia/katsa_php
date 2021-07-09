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

    var semana = $('#semana').val();    
    
    var json = {
        'semana' : semana
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
            string += ob.semana;
            string += '</td>';            

            string += '<td>';
            string += ob.tarjeta;
            string += '</td>';

            string += '<td>';
            string += ob.responsable;
            string += '</td>';

            string += '<td>';     
            string += ob.litros
            string += '</td>';

            string += '<td>';     
            string += toMoney(ob.importe)
            string += '</td>';            

            string += '</tr>';
    }
    $('#tbody').html(string);
    toDataTableGenExcel();
    NProgress.done();
}