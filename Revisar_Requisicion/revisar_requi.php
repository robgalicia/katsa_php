<?php include('../Comun/header_fourteen.php');?>

<script src="revisar_requi.js"></script>
<script src="../Comun/validacion.js"></script>
<script src="../Comun/dropdown.js"></script>    

<div class="ui form">
    <div class="fields">
        <div class="four wide field">
            <h3>Detalle Requisición</h3>
        </div>

        <div class="seven wide field">
        </div>

        <div class="five wide field">
            
                <button class="ui gray icon button" onclick="redirect('index.php');">
                    <i class="icon reply"></i>
                </button>
                
                <button class="ui green icon button" id="btn_aprobar" onclick="revisar();">
                    <i class="icon check"></i>
                    Aprobar
                </button>

                <button class="ui red basic icon button" id="btn_rechazar" onclick="rechazar();">
                    <i class="icon close"></i>
                    Rechazar
                </button>                
            
        </div>
    </div>
</div>
    
<?php include('tabs/generales.php');?>
<?php include('tabs/articulos.php');?>

<?php include('../Comun/footer_fourteen.php');?>