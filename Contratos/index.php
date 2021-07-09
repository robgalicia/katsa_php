<?php include('../Comun/header_fourteen.php');?>

<script src="index.js"></script>
<script src="../Comun/validacion.js"></script>
<script src="../Comun/dropdown.js"></script>


    <div class="ui form">
        <div class="fields">
            <div class="four wide field">
                <h3>Contratos del Empleado</h3>
            </div>            
            <div class="six wide field">
            </div>
            <div class="four wide field">
                <label>Nombre:</label>
                <div class="ui fluid search selection dropdown" id="dpd_empleado">
                    <input type="hidden" name="empleado" id="empleado">
                    <i class="dropdown icon"></i>
                    <div class="default text">Empleado</div>
                    <div class="menu" id="dpd_empleado_menu">
                    </div>
                </div>
            </div>
            <div class="two wide field">
                <label>Acciones:</label>
                <button class="ui blue basic icon button" onclick='llenar_tabla_ajax();'>
                    <i class="search icon"></i>
                </button>
                <button class="ui blue icon button" onclick='verificar_contrato_ajax();'>
                    <i class="plus icon"></i>
                </button>
            </div>            
        </div>
    </div>


    <table class="ui table">
        <thead>
            <tr>                
                <th>Num.</th>
                <th>Nombre</th>
                <th>Fecha Ingreso</th>
                <th>Fecha Contrato</th>
                <th>Tiempo</th>
                <th>Periodo</th>
                <th>Fecha Inicial</th>
                <th>Fecha Final</th>
                <th>Sueldo Neto</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody id="tbody">
            
        </tbody>
    </table>

    <?php include('modal_agregar.php');?>
    <?php include('../module_files/modal_agregar_files.php');?>

<?php include('../Comun/footer_fourteen.php');?>