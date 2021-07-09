var datos_spreedsheet = ''
var json_excel_array = []
var total_datos = 0
$(document).ready(function() {    
    document.getElementById('upload').addEventListener('change', handleFileSelect, false);
});

function subir_datos_ajax(){    

    for (var i = 0; i < json_object_G.length; i++) {

        var ob = json_object_G[i];

        var json_excel = {
            'semana':               ob[0],
            'tarjeta':              ob[1],
            'fecha':                ob[2],
            'servicio':             ob[3],
            'responsable':          ob[4],
            'vehiculo':             ob[5],
            'kilometrajeanterior':  ob[6],
            'niveltanqueantes':     ob[7],
            'kilometrajecargar':    ob[8],
            'niveltanquedespues':   ob[9],
            'litros':               ob[10],
            'tipocombustible':      ob[11],
            'preciolitro':          formatear_dinero(ob[12]),
            'preciototal':          formatear_dinero(ob[13]),
            'kilometrosrecorridos': ob[14],
            'rendimientolitro':     ob[15],
            'observaciones':        ob[16],
        }
            
        ajaxPost("consumo_gasolina_insert.php", nada, json_excel, false);                

    }
            
}

function formatear_dinero(dinero){
    dinero = quitarComas(dinero)
    dinero = dinero.replace('$','')
    return dinero
}

function subir_file(){
    $('#upload').click();
}

json_object_G = []

var ExcelToJSON = function() {

    this.parseExcel = function(file) {
        var reader = new FileReader();

        reader.onload = function(e) {
            var data = e.target.result;
            var workbook = XLSX.read(data, {
                type: 'binary'
            });
            // workbook.SheetNames.forEach(function(sheetName) {
                // Here is your object                

                modalEstatus('i', 'Los datos se estan cargando, esto podria tardar algunos segundos.');

                var XL_row_object = XLSX.utils.sheet_to_row_object_array(workbook.Sheets['Reporte de Combustible']);                
                var json_object = JSON.stringify(XL_row_object);
                json_object = JSON.parse(json_object);

                for(inx = 1; inx < json_object.length; inx++){
                    arr = new Array()

                    jQuery.each(json_object[inx], function(i, val) {
                        arr.push(val)
                    });

                    json_object_G.push(arr)
                }

                jexcel.destroy(document.getElementById('spreadsheet'), true);

                //datos_spreedsheet.getData(); //Regresa un json con los datos

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
            // })

            subir_datos_ajax();
        };

        reader.onerror = function(ex) {
            console.log(ex);
        };

        reader.readAsBinaryString(file);
    };
};

function handleFileSelect(evt) {
  
    var files = evt.target.files; // FileList object
    var xl2json = new ExcelToJSON();
    xl2json.parseExcel(files[0]);
}

function nada(json){    
    if(!json.result){console.log(json)}
    NProgress.done();
}

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