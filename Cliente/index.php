<?php include('../Comun/header_fourteen.php');?>

<script src="index.js"></script>
<script src="../Comun/validacion.js"></script>
<script src="../Comun/dropdown.js"></script>    

    <div class="ui form">
        <div class="fields">
            <div class="four wide field">
                <h3>Clientes</h3>
            </div>            
            <div class="six wide field">
            </div>
            <div class="four wide field">
                <!--<label>Nombre:</label>
                <div class="ui icon input">
                    <input type="text" id="buscarNombre">
                    <i class="inverted circular search link icon" onclick="llenar_tabla_ajax();"></i>
                </div>-->
            </div>
            <div class="two wide field">
                <label>Agregar:</label>
                <button class="ui blue icon button" onclick='redirect("cliente.php?idclienteG=0");'>
                    <i class="plus icon"></i>
                </button>
            </div>            
        </div>
    </div>


    <table class="ui table">
        <thead>
            <tr>                
                <th>Nombre</th>
                <th>Calle</th>
                <th>Num. Ext.</th>
                <th>Num. Int.</th>
                <th>Ciudad</th>
                <th>RFC</th>
                <th>Contacto</th>                
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody id="tbody">
            
        </tbody>
    </table>
    
<?php include('../Comun/footer_fourteen.php');?>