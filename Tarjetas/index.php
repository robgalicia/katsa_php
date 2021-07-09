<?php include('../Comun/header_fourteen.php');?>

<script src="index.js"></script>
<script src="../Comun/validacion.js"></script>
<script src="../Comun/dropdown.js"></script>

    <div class="ui form">
        <div class="fields">
            <div class="four wide field">
                <h3>Tarjetas</h3>
            </div>            
            <div class="six wide field">
            </div>
            <div class="four wide field">
                <label>Tarjetas:</label>                
                <input id="tarjeta_mdl">                  
            </div>
            <div class="two wide field">
                <label>Acciones:</label>
                <button class="ui blue icon button" onclick='llenar_tabla_ajax();'>
                    <i class="search icon"></i>
                </button>
                <button class="ui blue basic icon button" onclick='mostrarModal(0);'>
                    <i class="plus icon"></i>
                </button>
            </div>            
        </div>
    </div>


    <table class="ui table">
        <thead>
            <tr>                
                <th>Num Tarjeta</th>
                <th>Empleado Resguardo</th>
                <th>Fecha Resguardo</th>
                <th>Fecha Baja</th>                
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody id="tbody">
            
        </tbody>
    </table>

<?php include('modal_agregar.php');?>

<?php include('../Comun/footer_fourteen.php');?>