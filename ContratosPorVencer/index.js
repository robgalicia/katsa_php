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

    //var fecha_ini = $('#fecha_ini').val();
    //var fecha_fin = $('#fecha_fin').val();

    var dias = $('#dias').val();
    
    var json = {
        'dias' : dias
    };

    ajaxPost("contratosporvencer_all.php", llenar_tabla, json);
}

function llenar_tabla(json){
    destroyDTGen();
    $('#tbody').html('');
    console.log("json");
    console.log(json);
    var string = '';
    for (let i in json) {
        var ob = json[i];
        
            string += '<tr>';

            string += '<td>';
            string += ob.nombrecompleto;
            string += '</td>';

            string += '<td>';
            string += ob.descregion;
            string += '</td>';        

            string += '<td>';
            string += ob.descadscripcion;
            string += '</td>';

            string += '<td>';
            string += fechaEspanol(ob.fechacontrato)
            string += '</td>';

            string += '<td>';     
            string += fechaEspanol(ob.fechainicial)
            string += '</td>';

            string += '<td>';     
            string += fechaEspanol(ob.fechafinal)
            string += '</td>';

            string += '<td>';     
            string += ob.diascontrato
            string += '</td>';

            string += '<td>';     
            string += ob.periodocontrato
            string += '</td>';

            string += '</tr>';
    }
    $('#tbody').html(string);
    toDataTableGenExcel();
    NProgress.done();
}