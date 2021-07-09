<?php include('../Comun/header_fourteen.php');?>

<script src="cargar_facturas.js"></script>
<script src="../Comun/validacion.js"></script>
<script src="../Comun/dropdown.js"></script>    
<script src="../js_css/dropzone.js"></script>
<script src="../js_css/moment.min.js"></script>

<div class="ui form">
    <div class="fields">
        <div class="five wide field">
            <h3>Capturar Facturas</h3>
        </div>

        <div class="seven wide field">
        </div>

        <div class="one wide field">
            <div class="ui buttons">
                <button class="ui gray icon button" onclick="redirect('index.php');">
                    <i class="icon reply"></i>
                </button>
            </div>
        </div>
        <div class="three wide field">
            <button class="ui green icon button" onclick="validarCampos();">
                <i class="icon check"></i>Agregar
            </button>
        </div>
    </div>
</div>

<?php include('tabs/form.php');?>
<?php include('tabs/facturas.php');?>
<?php include('modal.php');?>

<?php include('../Comun/footer_fourteen.php');?>