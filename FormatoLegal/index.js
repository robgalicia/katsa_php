$(document).ready(function() {    
    llenar_tabla_ajax();
});

function llenar_tabla_ajax(){
    ajaxPost("formatoLegal_all.php", llenar_tabla,{});
}

function llenar_tabla(json){
    var string = '';    

    for (let i in json) {
        var ob = json[i];            
        string += '<tr>';

        string += '<td>';
        string += ob.claveformato;
        string += '</td>';

        string += '<td>';
        string += ob.nombreformatolegal;
        string += '</td>';                                

        string += '<td>';
        string += '<button class="ui basic green icon button" onclick=\'redirect("editarformatoLegal.php?idReporte=' + ob.idformatolegal + '");\'><i class="edit icon"></i></button>';
        string += '</td>';

        string += '</tr>';
    }
    $('#tbody').html(string);
    NProgress.done();
}