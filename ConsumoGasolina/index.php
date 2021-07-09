<?php include('../Comun/header_fourteen.php');?>

<script src="index.js"></script>
<script src="../Comun/validacion.js"></script>
<script src="../Comun/dropdown.js"></script>

<script src="../js_css/jszip.js"></script>
<script src="../js_css/xlsx.js"></script>

<script src="../js_css/jexcel.js"></script>
<script src="../js_css/jsuites.js"></script>
<link rel="stylesheet" href="../js_css/jexcel.css" type="text/css"/>
<link rel="stylesheet" href="../js_css/jsuites.css" type="text/css"/>

    <div class="ui form">        
        <div class="fields">
            <div class="three wide field">
                <h3>Consumo de Gasolina</h3>
            </div>            
            <div class="two wide field">
                <label>Semana</label>
                <input type="text" id="semana" maxlength="2">
            </div>            
            <div class="four wide field">
                <label>Acciones</label>
                <div class="ui buttons">
                    <button class="ui basic blue icon button" onclick='buscar_ajax();'>
                        <i class="search icon"></i> Buscar
                    </button>                    
                </div>
            </div>
            <div class="five wide field">
                <a class="ui red label">Llenar campos vacíos con N/A o 0 (cero) según corresponda</a>
            </div>
            <div class="two wide field">
                <label>Cargar</label>
                <label for="file" id="file_label" class="ui icon button" onclick="subir_file();">
                    <i class="file excel outline green icon"></i>
                    Subir Excel
                </label>
                <input id="upload" type="file" style="display:none" name="files[]">
            </div>            
        </div>
    </div>

    <div class="scroll">        
        <div id="spreadsheet_edit"></div>
        <div id="spreadsheet"></div>
    </div>
    
<?php include('../module_files/modal_agregar_files.php');?>

<?php include('../Comun/footer_fourteen.php');?>