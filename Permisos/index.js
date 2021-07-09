var idusuarioG = -1;

$(document).ready(function() {
    llenar_tabla_menu_ajax();
    llenar_tabla_ajax();
});

function llenar_tabla_menu_ajax(){
    ajaxPost("menu_all.php", llenar_tabla_menu,{});
}

function llenar_tabla_menu(json){
    lineas = '';
    console.log(json);
    for (var ob in json) {
        var o = json[ob]

        lineas += '<tr>';

        if (o.padreid == o.menuid) {
            lineas += '<td colspan="2">' + o.nombremenu + '</td>';
            lineas += subMenu(json, o.padreid);
        }                        

        lineas += '</tr>';
    }    

    $('#bodyPag').html(lineas);
    
    NProgress.done();
}

function subMenu(json,id) {
    var lineas = '';

    for (var ob in json) {
        var o = json[ob]

        if (o.padreid == id && o.menuid != id) {

            lineas += '<tr>';
            
            lineas += '<td class="collapsing"><div class="ui fitted slider checkbox"><input type="checkbox" id="chkP_' + o.menuid + '" onclick="ActualizarPagXUsuario(' + o.menuid+ ')"> <label></label></div></td>';
            lineas += '<td>' + o.nombremenu + '</td>';
        }                        

        lineas += '</tr>';                                
    }

    return lineas;
}

function ActualizarPagXUsuario(menuid){    
    var json = {
        'idusuario':idusuarioG,
        'idmenu':menuid
    }
    ajaxPost("menu_ins.php", actualiza,json);
}

function actualiza(json){    
    console.log(json);
    NProgress.done();
}

function llenar_tabla_ajax(){
    ajaxPost("../Usuarios/usuario_all.php", llenar_tabla,{});
}

function llenar_tabla(json){
    var string = '';
    
    for (let i in json) {
        var ob = json[i];
        string += '<tr>';        

        string += '<td>';
        string += ob.nombre;
        string += '</td>';

        string += '<td>';
        string += ob.nombreempleado;
        string += '</td>';                        

        string += '<td>';
        string += '<button class="ui basic green icon button" onclick="abrirModalAjax(' + ob.idusuario + ');"><i class="tasks icon"></i></button>';
        string += '</td>';

        string += '</tr>';
    }            
    $('#tbody').html(string);
    toDataTable('tableP');
    NProgress.done();
}

function abrirModalAjax(idusuario){
    $("input[type=checkbox]").prop('checked', false);
    idusuarioG = idusuario;
    var json = {'idusuario':idusuario};

    $.ajax({
        beforeSend: function(){
            NProgress.start();
        },
        type: "POST",
        async: true,
        url: "menu_lst.php",
        data:json
    }).done(function (data) {
        try{
            if(data.length > 0){
                var jsonData = JSON.parse(data);
                abrirModal(jsonData);
            }else{
                $('#modal_paginas').modal('show');
                NProgress.done();
            }
            
        }catch(err){
            console.log(url);
            console.log(data);
            console.log(err);
            NProgress.done();
        }     
    });    
}

function abrirModal(json){
    for (let i in json) {
        var ob = json[i];
        $('#chkP_'+ob.menuid).prop('checked',true);
    }
    $('#modal_paginas').modal('show');
    NProgress.done();
}