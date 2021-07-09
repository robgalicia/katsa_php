$(document).ready(function() {
    llenar_tabla_ajax();
});

function llenar_tabla_ajax(){
    ajaxPost("usuario_all.php", llenar_tabla,{});
}

function llenar_tabla(json){
    var string = '';
    
    for (let i in json) {
        var ob = json[i];            
        string += '<tr>';

        string += '<td>';
        string += ob.login;
        string += '</td>';

        string += '<td>';
        string += ob.nombre;
        string += '</td>';

        string += '<td>';
        string += fechaEspanol(ob.fechaalta);
        string += '</td>';

        string += '<td>';
        string += ob.fechabaja;
        string += '</td>';

        string += '<td>';
        string += ob.nombreempleado;
        string += '</td>';                        

        string += '<td>';
        string += '<button class="ui basic green icon button" onclick=\'redirect("agregar_usuario.php?idUsuario=' + ob.idusuario + '");\'><i class="edit icon"></i></button>';
        string += '</td>';

        string += '</tr>';
    }            
    $('#tbody').html(string);
    toDataTableGen();
    NProgress.done();
}