<?php include('../Comun/header_fourteen.php');?>

<script src="../Comun/funciones.js"></script>
<script src="index.js"></script>
<script src="../Comun/validacion.js"></script>
<script src="../Comun/dropdown.js"></script>

<script src="../js_css/dropzone.js"></script>
<script src="../js_css/moment.min.js"></script>
<link rel="stylesheet" type="text/css" href="../js_css/dropzone.css">

    <div class="ui form">
        <div class="fields">
            <div class="four wide field">
                <h3>Documentos</h3>
            </div>
            <div class="eight wide field">
            </div>
            <div class="four wide field">
                <label>Acciones:</label>
                <button class="ui gray icon button" onclick="histBack();">
                    <i class="icon reply"></i>
                </button>                
                <!--<button class="ui blue icon button" onclick='nuevoDocumento()'>
                    <i class="plus icon"></i>
                </button>-->
            </div>            
        </div>
    </div>


    <table class="ui table">
        <thead>
            <tr>
                <th>Clave</th>
                <th>Documento</th>
                <th>Entregado</th>
                <th>Es Obligatorio</th>
                <th>Num. Folio</th>
                <th>Fec. Emisión</th>
                <th>Inicio Vigencia</th>
                <th>Final Vigencia</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody id="tbody">
            
        </tbody>
    </table>

    <?php include('modal_agregar.php');?>

<?php include('../Comun/footer_fourteen.php');?>