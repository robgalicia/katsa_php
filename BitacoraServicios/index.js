var pagina = 'bitacoraServicios';
var region;
var departamento;
var idordenservicio=0;
var idactaservicio=0;

$(document).ready(function() {
    dpd_estatus_mod('estatus','BITS');
    validarInit('formActas'); 
    var fechaActual = obtenerFechaCampo();
    $('#fecha_ini').val(fechaActual);
    $('#fecha_fin').val(fechaActual);
    $('#fecha_acta').val(fechaActual);
    llenar_tabla_ajax(false);
});

//edit=1
//add=-1
function redireccionar(id,edit,status){
    console.log(status);
    if(edit==1){
        console.log("edit");
        // if(status!=26){
        //     if(status!=15){
        //         modalEstatus('i', 'La solicitud ya no se puede editar');
        //         return false;
        //     }
            
        // }
    }

    var link = 'agregar_bitacora.php?idorden=' + id + '&edit=' + edit;

    redirect(link);
}

function llenar_tabla_ajax(boton = true){
    destroyDTGen();
    $('#tbody').html('');

    var json = {
        'fecha_ini' : $('#fecha_ini').val(),
        'fecha_fin' : $('#fecha_fin').val(),
        'idestatus' : $('#estatus').val(),
        'folio' : $('#orden_servicio').val()
    
    }
    console.log(json);
    if (boton){
        setLS( pagina , JSON.stringify(json) );

    }else{
        json_aux = cargar_tabla_guardada(pagina)
        console.log(json_aux);

        if (json_aux != -1) {
            json = json_aux
            $('#estatus').val(json.idestatus)
            $('#fecha_fin').val(json.fecha_fin)
            $('#orden_servicio').val(json.folio)
            $('#fecha_ini').val(json.fecha_ini)
            console.log(json);
        }

    }    

    ajaxPost("bitacora_all.php", llenar_tabla, json);
}

function llenar_tabla(json){
    console.log(json);
    var string = '';    

    for (let i in json) {
        var ob = json[i];            
        string += '<tr>';

        string += '<td>';
        string += ob.folio;
        string += '</td>';

        string += '<td>';
        string += fechaEspanol(ob.fechainicio,false,false);
        string += '</td>';

        string += '<td>';
        string += ob.descregion;
        string += '</td>';

        string += '<td>';
        string += ob.nombrecliente;
        string += '</td>';

        string += '<td>';
        string += ob.servicio;
        string += '</td>';

        string += '<td>';
        string += ob.lugarservicio;
        string += '</td>';

        string += '<td>';
        string += '<button class="ui basic green icon button" data-tooltip="Editar" onclick="redireccionar(' + ob.idordenservicio  +','+ 1 +' ,' + 0 +')";><i class="edit icon"></i></button>';
        string += '<button class="ui basic green icon button" data-tooltip="Agregar Acta" onclick="actas(' + ob.idordenservicio +','+ 0 +','+0+')";><i class="clipboard icon"></i></button>';
        string += '<button class="ui basic red icon button" data-tooltip="Eliminar" onclick="modalBorrarFN(' + ob.idordenservicio + ');"><i class="close icon"></i></button>';
        string += '</td>';

        string += '</tr>';
    }
    $('#tbody').html(string);
    toDataTableGenExcel("tablePrinc");
    NProgress.done();
}

function actas(id){
    idordenservicio=id;
    console.log("actas");
    fill_data();
    //ajaxPost("acta_all.php", llenar_tabla_acta, {'idordenservicio':idordenservicio});
}

function fill_data(){
    $('#label_add').html("Agregar");
    $('#modal_acta').modal('show');
    ajaxPost("acta_all.php", llenar_tabla_acta, {'idordenservicio':idordenservicio});
}

function agregar_actas(){
    if(!formValido('formActas')){
        modalEstatus('i', 'Favor de revisar los campos marcados con rojo.','','modal_acta');
        return false;
    } else{
        var fecha_acta  = $('#fecha_acta').val();
        var tipo_acta = $('#tipos').val();
        var obs_acta = $('#observaciones_acta').val();
        var num_acta = $('#num_acta').val();

        var json = {
            'pidactaservicio': idactaservicio,
            'pidordenservicio':idordenservicio,
            'pnumeroacta': num_acta,
            'pfechaacta':fecha_acta,
            'ptipoacta':tipo_acta,
            'pobservaciones':obs_acta
        }
        ajaxPost("acta_ups.php", fill_data, json);
    }
    
    
}

function llenar_tabla_acta(json){
    $('#observaciones_acta').val('');
    $('#num_acta').val('');
    destroyDTGen("tableActa");
    $('#tbodyV').html('');
    var string = '';    

    for (let i in json) {
        var ob = json[i];            
        string += '<tr>';

        string += '<td>';
        string += ob.numeroacta;
        string += '</td>';

        string += '<td>';
        string += fechaEspanol(ob.fechaacta,false,false);
        string += '</td>';
   
        string += '<td>';
        string += ob.tipoacta;
        string += '</td>';

        string += '<td>';
        string += ob.observaciones;
        string += '</td>';

        string += '<td>';
        string += '<button class="ui basic green icon button" data-tooltip="Editar" onclick="show_data(' + ob.idactaservicio  +')";><i class="edit icon"></i></button>';
        string += '<button class="ui basic red icon button" data-tooltip="Eliminar" onclick="modalBorrarFNActa(' + ob.idactaservicio + ',\'' +ob.tipoacta +'\' ' +');"><i class="close icon"></i></button>';
        string += '</td>';

        string += '</tr>';
    }

    $('#tbodyV').html(string);
    toDataTableGen("tableActa");
    NProgress.done();
   // $('#modal_acta').modal('show');
}

function show_data(id){
    $('#label_add').html("Editar");
    idactaservicio=id;
    ajaxPost("acta_sel.php", llenar_modal_acta, {'idactaservicio':id});
}

function llenar_modal_acta(json){
    console.log(json);

    $('#fecha_acta').val(fechaSinHora(json[0].fechaacta));
    $('#observaciones_acta').val(json[0].observaciones);
    $('#num_acta').val(json[0].numeroacta);
    $('#tipoacta').val(json[0].tipoacta).change();
      
    NProgress.done();
}

function validarActaInicio(){
    modalEstatus('e', 'No es posible eliminar el acta de inicio','','modal_acta');        
    return false;
    NProgress.done();
}

function modalBorrarFN(id){
    console.log(id)
    $('#btn_delete').attr('onclick', 'deletearticulo(' + id + ')');

    $('#modal_borrar').modal('show');
}

function deletearticulo(id){
    $('#modal_borrar').modal('hide');
    ajaxPost("bitacora_delete.php", llenar_tabla_ajax, {'idordenservicio' : id});
}


function modalBorrarFNActa(id,tipoacta){
    console.log(tipoacta);
    if (tipoacta == 'Inicial') {
        validarActaInicio();
    }else{
        $('#btn_delete_acta').attr('onclick', 'deleteacta(' + id + ')');

        $('#modal_borrar_acta').modal('show');
    }

}

function deleteacta(id){
    $('#modal_borrar_acta').modal('hide');
    ajaxPost("acta_del.php", fill_data, {'idactaservicio' : id});
}