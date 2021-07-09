var pagina = 'hojatraslado';
var idtraslado = -1;
var observaciones='';
var solicitante='';
var empresa='';
var estraslado='';
var escordillera='';
var esavanzada='';
var idhojatraslado=0;
var tipoM =-1;
var numhojatraslado =0;



$(document).ready(function() {
    validarInit('formSolicitud'); 
    var fechaActual = obtenerFechaCampo();
    fechaActual = fechaActual.split('-');

    $('#anio').val( fechaActual[0] );
    $('#mes').val( fechaActual[1] ).change();
    llenar_tabla_ajax();
});

function editarTraslado(id){
    console.log(id);
    $('#modal_traslado').modal('show');
    idtraslado = $('#folio_servicio').val()
    console.log("else");
    ajaxPost("traslados_sel.php", llenar_modal, {'idtraslado' : idtraslado});  
}

function editarHojaTraslado(id){
    console.log(id);
    $('#modal_hojatraslado').modal('show');
    ajaxPost("hojatraslado_sel.php", llenar_modalTraslado, {'idhojatraslado' : id});  
}

function llenar_modalTraslado(json){
    console.log(json);
    $('#num_hoja_traslado').val(json[0].numhojatraslado);
    $('#tipo_servicio').val(json[0].tiposervicio);
    idtraslado = json[0].idtraslado;
    idhojatraslado =json[0].idhojatraslado;
    numhojatraslado =json[0].numhojatraslado;
    NProgress.done();
}

function llenar_modal(json){
    console.log(json);
    $('#folio').val(json[0].folio);
    $('#fecha_servicio').val(fechaSinHora(json[0].fechaservicio));
    solicitante = json[0].solicitante;
    empresa=json[0].empresa;
    dpd_traslado('ruta_traslado',json[0].idrutatraslado);
    $('#tipo_servicio').val(json[0].tiposervicio);
    observaciones=json[0].observaciones;
    estraslado=json[0].estraslado;
    escordillera=json[0].escordillera;
    esavanzada=json[0].esavanzada;
    NProgress.done();
}

function llenar_tabla_ajax(boton = true){
    console.log("ajax");
    destroyDTGen();
    $('#tbody').html('');

    var json = {
        'anio' : $('#anio').val(),
        'mes' : $('#mes').val()
    }

    if (boton){

        setLS( pagina , JSON.stringify(json) );

    }else{

        json_aux = cargar_tabla_guardada(pagina)

        if (json_aux != -1) {
            json = json_aux
            $('#anio').val(json.anio)
            $('#mes').val(json.mes)
        }

    }    
    dpd_traslado_folio('folio_servicio',json.anio,json.mes);
    ajaxPost("traslado_all.php", llenar_tabla, json);
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
        string += fechaEspanol(ob.fechaservicio,false,true);
        string += '</td>';

        string += '<td>';
        string += ob.numhojatraslado;
        string += '</td>';

        string += '<td>';
        string += ob.tiposervicio;
        string += '</td>';
        
        string += '<td>';
        string += ob.solicitante;
        string += '</td>';

        string += '<td>';
        string += ob.empresa;
        string += '</td>';

        string += '<td>';
        string += ob.descrutatraslado;
        string += '</td>';

        string += '<td>';
        string += '<button class="ui basic green icon button" data-tooltip="Agregar/Editar Visitantes" onclick="mostrarModal('+ob.idhojatraslado+','+1+');"><i class="users icon"></i></button>';   
        string += '<button class="ui basic green icon button" data-tooltip="Agregar/Editar Recorridos" onclick="mostrarModal(' + ob.idhojatraslado + ',' +2+ ')";><i class="truck icon"></i></button>';
        string += '<button class="ui basic green icon button" data-tooltip="Editar Hoja de Traslado" onclick="editarHojaTraslado(' + ob.idhojatraslado + ')";><i class="edit icon"></i></button>';
        string += '<button class="ui basic red icon button" data-tooltip="Eliminar" onclick="modalBorrarFN(' + ob.idhojatraslado + ');"><i class="close icon"></i></button>';
        string += '</td>';

        string += '</tr>';
    }
    $('#tbody').html(string);
    toDataTableGen();
    NProgress.done();
}

function mostrarModal(id,tipo){
    //1=Visitantes, 2=Recorridos
    idhojatraslado = id;
    tipoM = tipo;
    if(tipo==1){
        destroyDT("tableVisitantes");
        $('#tbodyV').html('');
        ajaxPost("visitante_all.php", llenar_tabla_visitante, {'idHojaTraslado' : id});
        $('#modal_visitantes').modal('show');
    }else if(tipo==2){
        destroyDT("tableRecorridos");
        $('#tbodyR').html('');
        ajaxPost("recorrido_all.php", llenar_tabla_recorrido, {'idHojaTraslado' : id});
        $('#modal_recorridos').modal('show');
    }
}

function llenar_tabla_recorrido(json){
    var string = '';    

    for (let i in json) {
        var ob = json[i];            
        string += '<tr>';

        string += '<td>';
        string += fechaEspanol(ob.fecharecorrido,false,true);
        string += '</td>';

        string += '<td>';
        string += ob.horasalida;
        string += '</td>';

        string += '<td>';
        string += ob.horallegada;
        string += '</td>';

        string += '<td>';
        string += ob.operador;
        string += '</td>';

        string += '<td>';
        string += ob.vehiculo;
        string += '</td>';

        string += '<td>';
        string += ob.placas;
        string += '</td>';

        string += '<td>';
        string += '<button class="ui basic red icon button" data-tooltip="Eliminar" onclick="modalBorrarVI(' + ob.idtrasladorecorrido + ',' + 2 +');"><i class="close icon"></i></button>';
        string += '</td>';

        string += '</tr>';
    }
    $('#fecha_recorrido').val(''),
    $('#hora_salida').val(''),
    $('#hora_llegada').val(''),
    $('#vehiculo').val(''),
    $('#placas').val(''),
    $('#empresa_vehiculo').val(''),
    $('#operador').val(''),
    $('#recorrido').val(''),
    $('#observaciones').val(''),
    $('#tbodyR').html(string);
    toDataTable("tableRecorridos");
    NProgress.done();
}

function llenar_tabla_visitante(json){
    var string = '';    

    for (let i in json) {
        var ob = json[i];            
        string += '<tr>';

        string += '<td>';
        string += ob.nombrevisitante;
        string += '</td>';

        string += '<td>';
        string += ob.empresa;
        string += '</td>';

        string += '<td>';
        string += '<button class="ui basic red icon button" data-tooltip="Eliminar" onclick="modalBorrarVI(' + ob.idtrasladovisitante +','+1+ ');"><i class="close icon"></i></button>';
        string += '</td>';

        string += '</tr>';
    }
    $('#nombre_visitante').val(''),
    $('#empresa_visitante').val(''),
    $('#tbodyV').html(string);
    toDataTableGen();
    NProgress.done();
}

function modalBorrarVI(id,tipo){
    console.log(id)
    $('#btn_delete').attr('onclick', 'delete_v(' + id + ',' + tipo + ')');

    $('#modal_borrar').modal('show');
}

function delete_v(id,tipo){
    $('#modal_borrar').modal('hide');
    if(tipo==1){
        ajaxPost("visitante_del.php", correctoTablaInsVis, {'idtrasladoVisitante' : id});
    }else if(tipo==2){
        ajaxPost("recorrido_del.php", correctoTablaInsRec, {'idtrasladoRecorrido' : id});
    }
    
}

function modalBorrarFN(id){
    console.log(id)
    $('#btn_delete').attr('onclick', 'deletearticulo(' + id + ')');

    $('#modal_borrar').modal('show');
}

function deletearticulo(id){
    $('#modal_borrar').modal('hide');
    ajaxPost("traslado_del.php", llenar_tabla_ajax, {'idHojaTraslado' : id});
}

function agregar_ajax(){
    hojaInsert(); 
}

// function correctoTabla(json){
//     if(json.result){
//         $('.modal').modal('hide');
//         modalEstatus('o', 'La operación se realizó de manera correcta.');
//         hojaInsert();        
//     }else{
//         modalEstatus('e', 'Ocurrio un error.');        
//     }

//     NProgress.done();
// }

function hojaInsert(){

    var json={
        'idtraslado':idtraslado,
        'idhojatraslado':idhojatraslado,
        'numhojatraslado':numhojatraslado,
        'tiposervicio':$('#tipo_servicio').val()
    }
    console.log(json);
    ajaxPost("traslado_ins.php", correctoTablaIns, json);
}

function correctoTablaIns(json){
    console.log("tablains");
    if(json.result){
        $('.modal').modal('hide');
        modalEstatus('o', 'La operación se realizó de manera correcta.');
        llenar_tabla_ajax();        
    }else{
        modalEstatus('e', 'Ocurrio un error.');        
    }

    NProgress.done();
}

function correctoTablaInsVis(json){
    if(json.result){
        $('.modal').modal('hide');
        modalEstatus('o', 'La operación se realizó de manera correcta.');
        mostrarModal(idhojatraslado,tipoM);
        //llenar_tabla_ajax();        
    }else{
        modalEstatus('e', 'Ocurrio un error.');        
    }

    NProgress.done();
}

function agregar_visitante(){
    var json={
        'id':idhojatraslado,
        'nombrevisitante':$('#nombre_visitante').val(),
        'empresa' :$('#empresa_visitante').val(),
    }
    ajaxPost("visitante_ins.php", correctoTablaInsVis, json);
    
}

function agregar_recorrido(){
    var json={
        'id':idhojatraslado,
        'fecharecorrido':$('#fecha_recorrido').val(),
        'horasalida' :$('#hora_salida').val(),
        'horallegada' :$('#hora_llegada').val(),
        'vehiculo' :$('#vehiculo').val(),
        'placas' :$('#placas').val(),
        'empresavehiculo' :$('#empresa_vehiculo').val(),
        'operador' :$('#operador').val(),
        'recorrido' :$('#recorrido').val(),
        'observaciones' :$('#observaciones').val(),
    }
    ajaxPost("recorrido_ins.php", correctoTablaInsRec, json);
    
}

function correctoTablaInsRec(json){
    if(json.result){
        $('.modal').modal('hide');
        modalEstatus('o', 'La operación se realizó de manera correcta.');
        mostrarModal(idhojatraslado,tipoM);  
    }else{
        modalEstatus('e', 'Ocurrio un error.');        
    }

    NProgress.done();
}