<?php include('../Comun/header_ten.php');?>

<script src="../Comun/funciones.js"></script>
<script src="index.js"></script>
<script src="../Comun/validacion.js"></script>
<script src="../Comun/dropdown.js"></script>

    <div class="ui form">
        <div class="fields">
            <div class="four wide field">
                <h3>Referencias</h3>
            </div>            
            <div class="eight wide field">
            </div>
            <div class="four wide field">
                <label>Acciones:</label>
                <button class="ui gray icon button" onclick="histBack();">
                    <i class="icon reply"></i>
                </button>                
                <button class="ui blue icon button" onclick='nuevaReferencia(0)'>
                    <i class="plus icon"></i>
                </button>
            </div>            
        </div>
    </div>


    <table class="ui table">
        <thead>
            <tr>
                <th>Parentesco</th> 
                <th>Nombre</th>
                <th>Teléfono</th>
                <th>Beneficiario</th>
                <th>Porcentaje</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody id="tbody">
            
        </tbody>
    </table>

    <?php include('modal_agregar.php');?>

<?php include('../Comun/footer_ten.php');?>