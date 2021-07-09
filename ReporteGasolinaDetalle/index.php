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
                <h3>Reporte Detallado del Consumo de Gasolina</h3>
            </div>
            <div class="five wide field">                
            </div>
            <div class="two wide field">                
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
        </div>
    </div>

    <div class="scroll">        
        <div id="spreadsheet_edit"></div>
        <div id="spreadsheet"></div>
    </div>

<?php include('../Comun/footer_fourteen.php');?>