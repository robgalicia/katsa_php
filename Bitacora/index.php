<?php include('../Comun/header_six.php');?>

<script src="index.js"></script>
<script src="../Comun/validacion.js"></script>
<script src="../Comun/dropdown.js"></script>

    <div class="ui form">
        <div class="fields">
            <div class="four wide field">
                <h3>Tarjetas</h3>
            </div>            
            <div class="two wide field">
            </div>            
            <div class="eight wide field">
                <label>Fecha Inicial:</label>
                <input type="date" id="fecha_ini">                
            </div>
            <div class="two wide field">
                <label>Acciones:</label>
                <button class="ui blue icon button" onclick='llenar_tabla_ajax();'>
                    <i class="search icon"></i>
                </button>                
            </div>            
        </div>
    </div>


    <table class="ui table" id="table_bit">
        <thead>
            <tr>
                <th>Sesión</th>
                <th>Nombre</th>
                <th>Login</th>
                <th>Fecha de Login</th>                
                <th>Detalle</th>
            </tr>
        </thead>
        <tbody id="tbody_bit">
            
        </tbody>
    </table>

<?php include('modal_agregar.php');?>

<?php include('../Comun/footer_six.php');?>