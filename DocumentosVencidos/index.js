var idProveedor = -1;
var jsonPartida = '';
var tipoarticulo = '';

$(document).ready(function() {    
    //validarInit('formProveedor');
    llenar_tabla_ajax();

    /*$('#partida_mdl').keyup(function(){
        llenar_tabla(jsonPartida);
    });*/
});

function llenar_tabla_ajax(){
    destroyDTGen();
    $('#tbody').html('');

    ajaxPost("documentosvencidos_all.php", llenar_tabla);
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
            string += ob.nombrecompleto;
            string += '</td>';

            string += '<td>';
            string += ob.descregion;
            string += '</td>';        

            string += '<td>';
            string += ob.descadscripcion;
            string += '</td>';

            string += '<td>';
            string += ob.desctipodocumento;
            string += '</td>';

            string += '<td>';     
            string += ob.fechaemision
            string += '</td>';

            string += '<td>';     
            string += ob.iniciovigencia
            string += '</td>';

            string += '</tr>';
    }
    $('#tbody').html(string);
    toDataTableGenExcel();
    NProgress.done();
}