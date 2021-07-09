<?php include('../Comun/header_fourteen.php');?>

<script src="agregar_orden.js"></script>
<script src="../Comun/validacion.js"></script>
<script src="../Comun/dropdown.js"></script>    

<div class="ui form">
    <div class="fields">
        <div class="four wide field">
            <h3 id="titulo">Agregar Cotización de Servicios</h3>
        </div>

        <div class="ten wide field">
        </div>

        <div class="two wide field">
            <div class="ui buttons">
                <button class="ui gray icon button" onclick="histBack();">
                    <i class="icon reply"></i>
                </button>

                <button class="ui blue icon button" id="btn_registrar" onclick="agregar_ajax();">
                    <i class="icon plus"></i>
                    Registrar
                </button>
            </div>
        </div>
    </div>
</div>
    
<?php include('tabs/generales.php');?>
<?php include('tabs/articulos.php');?>

<?php include('../Comun/footer_fourteen.php');?>