var idInventario = '';
$(document).ready(function() {

    dpd_almacen('almacen');
    var fecha = new Date();
    console.log(fecha);
    var ano = fecha.getFullYear();
    var mes = fecha.getMonth()+1;
    console.log(mes);
    $('#anio').val(ano);
    $('#mes').val(mes);

});

function llenar_tabla_ajax(){
    destroyDTGen();
    $('#tbody').html('');
    $('#thead').html('');   

    var ejercicio = $('#anio').val();
    var almacen = $('#almacen').val();
    var mes = $('#mes').val();

    var json = {
        'ejercicio' : ejercicio,
        'almacen' : almacen,
        'mes' : mes
    };

    console.log(json);
    ajaxPost("ajuste_inventario_all.php", llenar_tabla, json);
}

function llenar_tabla(json){
    var string = '';    
    for (let i in json) {
        var ob = json[i];
        
            string += '<tr>';

            string += '<td>';
            string += ob.folio;
            string += '</td>';

            string += '<td>';
            string += fechaEspanol(ob.fecha);;
            string += '</td>';        

            string += '<td>';
            string += ob.desctipoajusteinventario;
            string += '</td>';

            string += '<td>';     
            string += ob.observaciones;
            string += '</td>';

            string += '<td>';     
            string += ob.fechacancelacion;
            string += '</td>';

            string += '<td>';
            string += '<button class="ui basic green icon button" data-tooltip="Detalle" onclick="redireccionar(' + ob.idajusteinventario +');"><i class="list icon"></i></button>';
            string += '<button class="ui basic green icon button" data-tooltip="Imprimir" onclick="imprimir(' + ob.idajusteinventario + ');"><i class="print icon"></i></button>';
            string += '</td>';

            string += '</tr>';
    }
    $('#tbody').html(string);
    toDataTableGen();
    NProgress.done();
}

function redireccionar(id){
    idInventario = id;
    var almacen = $('#almacen').val();

    var link = 'agregar_ajuste.php?idsoli=' + id + '&alm=' + almacen; 

    redirect(link);
}

function imprimir(id){
    console.log(id);
    //var divToPrint=document.getElementById("table");
    newWin = window.open("imprimir.html?idsolicitud="+id,"_blank","width=900,height=600");
    //newWin.document.write('<link rel="stylesheet" type="text/css" href="https://semantic-ui.com/dist/semantic.min.css">');
    //console.log(json);
    //newWin.document.write(json.html);
    setTimeout(function(){
        newWin.print();
        newWin.close();        
    }, 1000);
    NProgress.done();
}

function correct(json){
    console.log(json);
    if(json.result){
        $('.modal').modal('hide');
        modalEstatus('o', 'La operación se realizó de manera correcta.');
        llenar_tabla_ajax();    
    }else{
        modalEstatus('e', 'Ocurrio un error.');        
    }

    NProgress.done();
}


