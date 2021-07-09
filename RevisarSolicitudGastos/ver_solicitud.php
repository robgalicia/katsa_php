<?php include('../Comun/header_fourteen.php');?>

<script src="ver_solicitud.js"></script>
<script src="../Comun/validacion.js"></script>
<script src="../Comun/dropdown.js"></script>    
<script src="index.js"></script>   

<div class="ui form">
    <div class="fields">
        <div class="five wide field">
            <h3>Ver Solicitud</h3>
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
            <button class="ui green icon button" onclick="modalRevisar(0);">
                <i class="icon check"></i>Aprobar
            </button>
            <button class="ui red icon button" onclick="modalRechazar(0);">
                <i class="icon close"></i>Rechazar
            </button>
        </div>
    </div>
</div>

<?php include('tabs/generales.php');?>
<?php include('tabs/articulos.php');?>
<?php include('modal.php');?>

<?php include('../Comun/footer_fourteen.php');?>