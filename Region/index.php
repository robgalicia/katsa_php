<?php include('../Comun/header_ten.php');?>

<script src="index.js"></script>
<script src="../Comun/validacion.js"></script>
<script src="../Comun/dropdown.js"></script>    
<script src="../Comun/funciones.js"></script>

    <div class="ui form">
        <div class="fields">
            <div class="four wide field">
                <h3> Region </h3>
            </div>            
            <div class="ten wide field">                
            </div>
            <div class="two wide field">
                <label>Agregar:</label>
                <button class="ui blue icon button" onclick='mostrarModal(0, "");'>
                    <i class="plus icon"></i>
                </button>
            </div>            
        </div>
    </div>


    <table class="ui table">
        <thead>
            <tr>                
                <th>Clave</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody id="tbody">
            
        </tbody>
    </table>

<?php include('../Region/modal_agregar.php');?>

<?php include('../Comun/footer_six.php');?>