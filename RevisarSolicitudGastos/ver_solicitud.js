var articulos_G = [];
var idSolicitud = -1;
var importe_total=0;

$(document).ready(function() {   
    var region = $.get("region");
    console.log(region); 
    idSolicitud = $.get("idsoli");
    console.log(idSolicitud);
    dpd_viaje('tipo_viaje');
    dpd_cliente('cliente');
    dpd_empleado('empleado_solicita', getEmpleado() );
    dpd_adscripcion('adscripcion',region);
    dpd_empleado('empleado_beneficiario');

    ajaxPost("r_solicitud_all_detail.php", cargar_datos, {'idsolicitud':idSolicitud});

    $('#tipo_solicitud').change(function(){
        var solicitud = $('#tipo_solicitud').val();
        if(solicitud=='C'){
            $('#cliente').val('').change();
            $('#cliente').attr('disabled',false);
        }else{
            $('#cliente').attr('disabled',true);
        }
    });    
    $('#cliente').attr('disabled',true);
    $('#tipo_solicitud').attr('disabled',true);
    $('#tipo_viaje').attr('disabled',true);
    $('#observaciones').attr('disabled',true);
    $('#btn_add').attr('disabled',true);
    $('#btn_registrar').attr('disabled',true);   
    $('#motivo').attr('disabled',true);  
    $('#dias').attr('disabled',true);  
    $('#fecha_inicial').attr('disabled',true);  
    $('#fecha_final').attr('disabled',true);  
    $('#adscripcion').attr('disabled',true);  
    $('#km').attr('disabled',true);  
    $('#empleado_beneficiario').attr('disabled',true);  
    $('#correo').attr('disabled',true);  
});

function cargar_datos(json){
    console.log("cargar datos");
    console.log(json);

     

    var ob = json[0];

    dpd_viaje('tipo_viaje',ob.idtipoviaje);
    dpd_departamento('departamento', ob.iddepartamento );
    dpd_region('region',"", ob.idregion );    
    dpd_adscripcion('adscripcion',ob.idregion,ob.idadscripcion);
    $('#empleado_solicita').val(ob.idempleadosolicita);
    $('#tipo_solicitud').val(ob.tipogasto);    
    $('#observaciones').val(ob.observaciones);
    $('#correo').val(ob.correo);
    $('#empleado_beneficiario').val(ob.idempleadobeneficiario).change();
    $('#cliente').val(ob.idcliente);
    $('#fecha_solicitud').val(fechaSinHora(ob.fecha));
    $('#region').val(ob.idregion);
    $('#lugar_viaje').val(ob.lugarviaje);
    $('#motivo').val(ob.motivoviaje);
    $('#km').val(ob.distanciakms);
    $('#dias').val(ob.diasviaje);
    $('#fecha_inicial').val(fechaSinHora(ob.fechainicial));
    $('#fecha_final').val(fechaSinHora(ob.fechafinal));

    articulos_G = json;
    solicitud_elegida();

    NProgress.done();
}

function mostrarModal(){
    destroyDT('tablePrin');
    $('#tbodyPrin').html('');    
    $('#modal_solicitud').modal('show');
}

function solicitud_elegida(){
    destroyDT('tablePrin');
    $('#tbodyPrin').html('');
    
    destroyDT('tablePrin_2');
    $('#tbodyPrin_2').html('');
    var string = '';

    for (let i in articulos_G) {
        var ob = articulos_G[i];
        importe_total += parseFloat(ob.totalautoriza);
            string += '<tr>';

            string += '<td>';
            string += ob.idgastoscomprobar;
            string += '</td>';

            string += '<td>';
            string += ob.descpartida;
            string += '</td>';
            
            string += '<td>';
            string += ob.cantidadautoriza;
            string += '</td>';

            string += '<td>';
            string += ob.importeautoriza;
            string += '</td>';

            string += '<td>';
            string += ob.totalautoriza;
            string += '</td>';

            string += '<td>';
            string += ob.justificacion;
            string += '</td>';

            string += '</tr>';
            //$('#importetotal').html(toMoney(ob.importetotal));
    }
    importe_total = toMoney(importe_total);
    $('#importetotal').html('');
    $('#importetotal').html(importe_total);
    $('#tbodyPrin').html(string);    
    toDataTable('tablePrin')
    NProgress.done();
}


function elegir_articulo_ajax(){
    destroyDT('tablePrin');
    $('#tbodyPrin').html('');

    var tipoPartidaText = $('#tipoPartida').dropdown('get text');
    var tipoPartida = $('#tipoPartida').val();
    var partida = $('#partida').val();
    var partidaText = $('#partida').dropdown('get text');
    var importe = $('#importe').val();
    var justificacion = $('#justificacion').val();
    
    var json = {
        'num' : partida,
        'tipoPartida' : tipoPartidaText,
        'idTipoPartida' : tipoPartida,
        'idPartida' : partida,
        'partida' : partidaText,
        'importe' : importe,
        'justificacion' : justificacion
    };

    articulos_G.push(json);
    elegir_articulo(articulos_G);
    //ajaxPost("../Articulo/articulo_all.php", elegir_articulo, {'tipoarticulo': tipoarticulo, 'descarticulo': descarticulo});
}

function elegir_articulo(json){    
    destroyDT('tablePrin');
    $('#tbodyPrin').html('');        
    var string = '';

    for (let i in json) {
        var ob = json[i];
            string += '<tr>';

            string += '<td>';
            string += ob.num;
            string += '</td>';

            string += '<td>';
            string += ob.tipoPartida;
            string += '</td>';

            string += '<td>';
            string += ob.partida;
            string += '</td>';

            string += '<td>';
            string += ob.importe
            string += '</td>';

            string += '<td>';
            string += ob.justificacion
            string += '</td>';

            string += '</tr>';
    }
    $('#tbodyPrin').html(string);    
    toDataTable('tablePrin')
    NProgress.done();
}