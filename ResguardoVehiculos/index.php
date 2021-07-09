<?php include('../Comun/header_fourteen.php');?>

<script src="index.js"></script>
<script src="../Comun/validacion.js"></script>
<script src="../Comun/dropdown.js"></script>

<script src="../js_css/dropzone.js"></script>
<script src="../js_css/moment.min.js"></script>
<link rel="stylesheet" type="text/css" href="../js_css/dropzone.css">

    <div class="ui form">
        <div class="fields">
            <div class="four wide field">
                <h3>Resguardo de Vehículos</h3>
            </div>            
            <div class="six wide field">
            </div>
            <div class="four wide field">
                <label>Vehículo:</label>                
                <select id="vehiculo"></select>                    
            </div>
            <div class="two wide field">
                <label>Acciones:</label>
                <button class="ui blue icon button" onclick='llenar_tabla_ajax();'>
                    <i class="search icon"></i>
                </button>
                <button class="ui blue basic icon button" onclick='mostrarModal();'>
                    <i class="plus icon"></i>
                </button>
            </div>            
        </div>
    </div>


    <table class="ui table">
        <thead>
            <tr>                
                <th>Fecha Resguardo</th>
                <th>Tipo Resguardo</th>
                <th>Placas</th>
                <th>Marca y Submarca</th>
                <th>Modelo</th>
                <th>Num. Económico</th>
                <th>Empleado Resguardo</th>
                <th>Cliente</th>
                <th>Lugar de Adscripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody id="tbody">
            
        </tbody>
    </table>

<?php include('modal_agregar.php');?>
<?php include('../module_files/modal_agregar_files.php');?>

<?php include('../Comun/footer_fourteen.php');?>