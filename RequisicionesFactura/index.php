<?php include('../Comun/header_fourteen.php');?>

<script src="../Comun/validacion.js"></script>
<script src="../Comun/dropdown.js"></script>    
<script src="index.js"></script>  


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
        </div>
        <div class="three wide field">
        <div class="ui buttons">
                <button class="ui gray icon button" onclick="redirect('../Orden_Compra/index.php');">
                    <i class="icon reply"></i>
                </button>
                <button class="ui blue icon button" onclick="agregarFactura();">
                <i class="icon plus"></i>Registrar
            </button>
            </div>            
        </div>
    </div>
</div>

<?php include('tabs/form.php');?>
<?php include('modal.php');?>

<?php include('../Comun/footer_fourteen.php');?>