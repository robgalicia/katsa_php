$(document).ready(function() {    
           
});

function llenar_tabla_ajax(){
    destroyDT('table_bit');
    $('#tbody_bit').html('');
    
    var json = {
        'fecha_ini': $('#fecha_ini').val()
    }

    ajaxPost("bitacora_all.php", llenar_tabla, json);
}

function llenar_tabla(json){
    destroyDT('table_bit');
    $('#tbody_bit').html('');    
    var string = '';

    for (let i in json) {
        var ob = json[i];
        
            
        string += '<tr>';

        string += '<td>';
        string += ob.idsesion;
        string += '</td>';

        string += '<td>';
        string += ob.nombre;
        string += '</td>';

        string += '<td>';
        string += ob.login;
        string += '</td>';

        string += '<td>';
        string += fechaEspanol(ob.fechalogin,false,true);
        string += '</td>';               

        string += '<td>';
        string += '<button class="ui basic green icon button" data-tooltip="Ver Detalle" onclick="mostrarModal(' + ob.idsesion + ');"><i class="list icon"></i></button>';
        string += '</td>';

        string += '</tr>';        
        
    }
    $('#tbody_bit').html(string);
    toDataTable('table_bit');
    NProgress.done();
}


function mostrarModal(id){

    var json = {
        'idsesion': id
    }

    ajaxPost("bitacora_all_detalle.php", llenar_tabla_detalle, json);

        
    $('#modal_bitacora').modal('show');
}

function llenar_tabla_detalle(json){
    destroyDT('table_detalle');
    $('#tbody_detalle').html('');    
    var string = '';

    for (let i in json) {
        var ob = json[i];
        
            
        string += '<tr>';

        string += '<td>';
        string += fechaEspanol(ob.fecha,false,true);
        string += '</td>';

        string += '<td>';
        string += ob.opcionsistema;
        string += '</td>';

        string += '<td>';
        string += ob.opcionpantalla;
        string += '</td>';

        string += '<td>';
        string += ob.query;
        string += '</td>';

        string += '<td>';
        string += ob.detalleaccion;
        string += '</td>';

        string += '</tr>';        
        
    }
    $('#tbody_detalle').html(string);
    toDataTable('table_detalle');
    NProgress.done();
}