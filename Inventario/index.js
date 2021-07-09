var charType = '';

$(document).ready(function() {

    dpd_almacen('almacen');
});

function llenar_tabla_ajax(){
    destroyDTGen();
    $('#tbody').html('');
    $('#thead').html('');   

    var tipoBusqueda = $('#desc').val();
    var almacen = $('#almacen').val();

    if ( $('#descripcion').prop('checked') ) {        
        charType = 'D';
    }else if ( $('#ambos').prop('checked') ){
        charType = 'A';
    }else{
        charType = 'N';
    }
    
    var json = {
        'desc' : tipoBusqueda,
        'almacen' : almacen,
        'tipo' : charType
    };

    console.log(json);
    ajaxPost("inventario_all.php", llenar_tabla, json);
}

function llenar_tabla(json){
    var string = '';    
    for (let i in json) {
        var ob = json[i];
        
            string += '<tr>';

            string += '<td>';
            string += ob.codigoarticulo;
            string += '</td>';

            string += '<td>';
            string += ob.nombrearticulo;
            string += '</td>';        

            string += '<td>';
            string += ob.nombreproveedor;
            string += '</td>';

            string += '<td>';
            string += toMoney(ob.preciocompra);
            string += '</td>';

            string += '<td>';     
            string += ob.descunidadmedida;
            string += '</td>';

            string += '<td>';     
            string += fechaEspanol(ob.fechaultimacompra);
            string += '</td>';
            
            string += '<td>';
            string += ob.existencia;
            string += '</td>';

            string += '<td>';
            string += '<button class="ui basic green icon button" data-tooltip="Kardex" onclick="kardex(' + ob.idarticulo  + ',\'' + ob.nombrearticulo + '\',' + ');"><i class="list icon"></i></button>';
            string += '</td>';

            string += '</tr>';
    }
    $('#tbody').html(string);
    toDataTableGenExcel();
    NProgress.done();
}

function kardex(id,nombrearticulo){
    var almacen = $('#almacen').val();
    var link = 'kardex.php?idsoli=' + id + '&alm=' + almacen + '&nombre=' + nombrearticulo;

    redirect(link);
}