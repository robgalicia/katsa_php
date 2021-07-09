var datos_spreedsheet = ''
var json_excel_array = []
var total_datos = 0
$(document).ready(function() {    
    document.getElementById('upload').addEventListener('change', handleFileSelect, false);
});

function subir_datos_ajax(){
    var json = datos_spreedsheet.getData();    

    total_datos = json.length

    for (let i in json) {

        var ob = json[i];

        var json_excel = {
            'num'          :      i,
            'consecutivo'  :      0,
            'xlstarjeta'      :      ob[0],
            'xlsplaca'        :      ob[1],
            'xlsfecha'        :      ob[2],
            'xlsid'           :      ob[3],
            'xlscargo'        :      ob[4],
            'abono'        :      ob[5],
            'saldo'        :      ob[6],
            'tipo'         :      ob[7],
            'xlsusuario'      :      ob[8],
            'expediente'   :      ob[9],
            'concepto'     :      ob[10],
            'xlsproducto'     :      ob[11],
            'xlsprecio'       :      ob[12],
            'xlskminicio'     :      ob[13],
            'xlskmfinal'      :      ob[14],
            'xlslitros'       :      ob[15],
            'xlsrendimiento'  :      ob[16],
            'iva'          :      ob[17],
            'estacion'     :      ob[18],
            'estacionrfc'  :      ob[19],
            'estado'       :      ob[20],
            'ciudad'       :      ob[21],
            'colonia'      :      ob[22],
            'domicilio'    :      ob[23],
            'anio'         :      ob[24],
            'mes'          :      ob[25],
            'dia'          :      ob[26],
            'hora'         :      ob[27],
            'accion'       :      ""
        }

        var array_excel = [
            -1,ob[0],ob[1],ob[2],ob[3],ob[4],ob[5],ob[6],ob[7],ob[8],ob[9],ob[10],ob[11],ob[12],ob[13],ob[14],ob[15],ob[16],ob[17],ob[18],ob[19],ob[20],ob[21],ob[22],ob[23],ob[24],ob[25],ob[26],ob[27],""
        ];        

        json_excel_array.push(array_excel);

        
        ajaxPost("consumo_gasolina_insert.php", add_id, json_excel);

    }
            
}

function add_id(json){    
    
    var num = json.num;
    var lastid = json.lastid;

    json_excel_array[num][0] = lastid;
    json_excel_array[num][29] = '<button class="ui basic green icon button" data-tooltip="Documentos" onclick="files_gen_ajax(\'09\',' + lastid + ');"><i class="file pdf icon"></i></button>';
    
    if(num == (total_datos-1)){
        setTimeout(function () {
            jspreadsheet_edit();
            NProgress.done();
        }, 1000);
    }
}

function subir_file(){
    $('#upload').click();
}

var ExcelToJSON = function() {

    this.parseExcel = function(file) {
        var reader = new FileReader();

        reader.onload = function(e) {
            var data = e.target.result;
            var workbook = XLSX.read(data, {
                type: 'binary'
            });
            workbook.SheetNames.forEach(function(sheetName) {
                // Here is your object
                var XL_row_object = XLSX.utils.sheet_to_row_object_array(workbook.Sheets[sheetName]);            
                var json_object = JSON.stringify(XL_row_object);
                json_object = JSON.parse(json_object);                

                jexcel.destroy(document.getElementById('spreadsheet'), true);

                //datos_spreedsheet.getData(); //Regresa un json con los datos

                datos_spreedsheet = jspreadsheet(document.getElementById('spreadsheet'), {
                    data: json_object,
                    columns: [
                        { title : 'Tarjeta', width:250},
                        { title : 'Placa', width:250},
                        { title : 'Fecha', width:250},
                        { title : 'ID', width:250},
                        { title : 'Cargo', width:250, type: 'numeric', mask:'$ #,##.00', decimal:'.'},
                        { title : 'Abono', width:250, type: 'numeric', mask:'$ #,##.00', decimal:'.'},
                        { title : 'Saldo', width:250, type: 'numeric', mask:'$ #,##.00', decimal:'.'},
                        { title : 'Tipo', width:250},
                        { title : 'Usuario', width:250},
                        { title : 'Expediente', width:250},
                        { title : 'Concepto', width:250},
                        { title : 'Producto', width:250},
                        { title : 'Precio', width:250, type: 'numeric', mask:'$ #,##.00', decimal:'.'},
                        { title : 'Km INI', width:250, type: 'numeric', mask:'$ #,##.00', decimal:'.'},
                        { title : 'Km FIN', width:250, type: 'numeric', mask:'$ #,##.00', decimal:'.'},
                        { title : 'Litros', width:250, type: 'numeric', mask:'$ #,##.00', decimal:'.'},
                        { title : 'Rendimiento', width:250, type: 'numeric', mask:'$ #,##.00', decimal:'.'},
                        { title : 'IVA', width:250, type: 'numeric', mask:'$ #,##.00', decimal:'.'},
                        { title : 'Estacion', width:250},
                        { title : 'Estacion RFC', width:250},
                        { title : 'Estado', width:250},
                        { title : 'Ciudad', width:250},
                        { title : 'Colonia', width:250},
                        { title : 'Dimicilio', width:250},
                        { title : 'Año', width:250},
                        { title : 'Mes', width:250},
                        { title : 'Dia', width:250},
                        { title : 'Hora', width:250}
                    ],
                });
            })

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

function jspreadsheet_edit(){    
    datos_spreedsheet = jspreadsheet(document.getElementById('spreadsheet_edit'), {
        data: json_excel_array,
        columns: [
            { title : 'Consecutivo', width:250,readOnly:true},
            { title : 'Tarjeta', width:250},
            { title : 'Placa', width:250},
            { title : 'Fecha', width:250},
            { title : 'ID', width:250},
            { title : 'Cargo', width:250, type: 'numeric', mask:'$ #,##.00', decimal:'.'},
            { title : 'Abono', width:250, type: 'numeric', mask:'$ #,##.00', decimal:'.'},
            { title : 'Saldo', width:250, type: 'numeric', mask:'$ #,##.00', decimal:'.'},
            { title : 'Tipo', width:250},
            { title : 'Usuario', width:250},
            { title : 'Expediente', width:250},
            { title : 'Concepto', width:250},
            { title : 'Producto', width:250},
            { title : 'Precio', width:250, type: 'numeric', mask:'$ #,##.00', decimal:'.'},
            { title : 'Km INI', width:250, type: 'numeric', mask:'$ #,##.00', decimal:'.'},
            { title : 'Km FIN', width:250, type: 'numeric', mask:'$ #,##.00', decimal:'.'},
            { title : 'Litros', width:250, type: 'numeric', mask:'$ #,##.00', decimal:'.'},
            { title : 'Rendimiento', width:250, type: 'numeric', mask:'$ #,##.00', decimal:'.'},
            { title : 'IVA', width:250, type: 'numeric', mask:'$ #,##.00', decimal:'.'},
            { title : 'Estacion', width:250},
            { title : 'Estacion RFC', width:250},
            { title : 'Estado', width:250},
            { title : 'Ciudad', width:250},
            { title : 'Colonia', width:250},
            { title : 'Dimicilio', width:250},
            { title : 'Año', width:250},
            { title : 'Mes', width:250},
            { title : 'Dia', width:250},
            { title : 'Hora', width:250},
            { title : 'Accion', width:250, type:'html',readOnly:true}
        ],
    });
}

function subir_datos_ajax_edit(){
    var json = datos_spreedsheet.getData();    
    
    for (let i in json) {

        var ob = json[i];

        var json_excel = {
            'num'          :      i,
            'consecutivo'  :      ob[0],
            'tarjeta'      :      ob[1],
            'placa'        :      ob[2],
            'fecha'        :      ob[3],
            'id'           :      ob[4],
            'cargo'        :      ob[5],
            'abono'        :      ob[6],
            'saldo'        :      ob[7],
            'tipo'         :      ob[8],
            'usuario'      :      ob[9],
            'expediente'   :      ob[10],
            'concepto'     :      ob[11],
            'producto'     :      ob[12],
            'precio'       :      ob[13],
            'kminicio'     :      ob[14],
            'kmfinal'      :      ob[15],
            'litros'       :      ob[16],
            'rendimiento'  :      ob[17],
            'iva'          :      ob[18],
            'estacion'     :      ob[19],
            'estacionrfc'  :      ob[20],
            'estado'       :      ob[21],
            'ciudad'       :      ob[22],
            'colonia'      :      ob[23],
            'domicilio'    :      ob[24],
            'anio'         :      ob[25],
            'mes'          :      ob[26],
            'dia'          :      ob[27],
            'hora'         :      ob[28]            
        }        
        
        ajaxPost("consumo_gasolina_insert.php", nada, json_excel);

    }

    NProgress.done();

    corrector({'result':true});
            
}

function nada(json){
    console.log(json)
}

function buscar_ajax(){
    var fechaini = $('#fechaini').val();
    var fechafin = $('#fechafin').val();
    
    var json = {
        'fecha_ini' : fechaini,
        'fecha_fin' : fechafin
    }

    ajaxPost("consumo_gasolina_all.php", ver_fecha, json);
}

function ver_fecha(json){

    json_excel_array = [];

    for (let i in json) {
        var ob = json[i];

        var arr = [ob.idconsumogasolina,ob.tarjeta,ob.placa,ob.fecha,ob.id,ob.cargo,ob.abono,ob.saldo,ob.tipo,ob.usuario,ob.expediente,ob.concepto,ob.producto,ob.precio,ob.kminicio,ob.kmfinal,ob.litros,ob.rendimiento,ob.iva,ob.estacion,ob.estacionrfc,ob.estado,ob.ciudad,ob.colonia,ob.domicilio,ob.anio,ob.mes,ob.dia,ob.hora,'<button class="ui basic green icon button" data-tooltip="Documentos" onclick="files_gen_ajax(\'09\',' + ob.idconsumogasolina + ');"><i class="file pdf icon"></i></button>']
        json_excel_array.push(arr);
    }

    setTimeout(function () {
        jspreadsheet_edit();
        NProgress.done();
    }, 1000);
}