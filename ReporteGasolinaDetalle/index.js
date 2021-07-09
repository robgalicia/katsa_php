var datos_spreedsheet = ''
var json_excel_array = []
var total_datos = 0
$(document).ready(function() {    
    
});

function buscar_ajax(){
    var semana = $('#semana').val();
    
    if (semana.length < 2){
        modalEstatus('i', 'Favor de poner la semana en formato de dos numeros.');
        return false;
    }

    var json = {
        'semana' : semana
    }

    ajaxPost("consumo_gasolina_all.php", ver_fecha, json);
}

function ver_fecha(json){

    json_object_G = []

    for(inx = 1; inx < json.length; inx++){
        arr = new Array()

        jQuery.each(json[inx], function(i, val) {
            arr.push(val)
        });

        json_object_G.push(arr)
    }

    jexcel.destroy(document.getElementById('spreadsheet'), true);    

    datos_spreedsheet = jspreadsheet(document.getElementById('spreadsheet'), {
        data: json_object_G,
        pagination: 10,
        columns: [
            { title : 'SEMANA' , width:250 , readOnly:true},
            { title : 'TARJETA' , width:250 , readOnly:true},
            { title : 'FECHA' , width:250 , readOnly:true},
            { title : 'SERVICIO' , width:250 , readOnly:true},
            { title : 'RESPONSABLE' , width:250 , readOnly:true},
            { title : 'VEHÍCULO' , width:250 , readOnly:true},
            { title : 'KILOMETRAJE DE LA CARGA ANTERIOR' , width:250 , readOnly:true},
            { title : 'NIVEL DEL TANQUE ANTES DE CARGAR' , width:250 , readOnly:true},
            { title : 'KILOMETRAJE AL CARGAR' , width:250 , readOnly:true},
            { title : 'NIVEL DEL TANQUE DESPUÉS DE CARGAR' , width:250 , readOnly:true},
            { title : 'LITROS' , width:250 , readOnly:true},
            { title : 'TIPO DE COMBUSTIBLE' , width:250 , readOnly:true},
            { title : 'PRECIO POR LITRO' , width:250 , readOnly:true},
            { title : 'PRECIO TOTAL' , width:250 , readOnly:true},
            { title : 'KILÓMETROS RECORRIDOS POR CARGA' , width:250 , readOnly:true},
            { title : 'RENDIMIENTO POR LITRO' , width:250 , readOnly:true},
            { title : 'OBSERVACIONES' , width:250 , readOnly:true},
        ],
    });
    NProgress.done();
}