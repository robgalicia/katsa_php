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
                <h3>Ingenieros</h3>
            </div>            
            <div class="six wide field">
            </div>
            <div class="four wide field">
                <label>Cliente:</label>                
                <select id="cliente"></select>                    
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
                <th>Nombre</th>
                <th>Cliente</th>
                <th>Sub Contrata</th>
                <th>Activo</th>                
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody id="tbody">
            
        </tbody>
    </table>

<?php include('modal_agregar.php');?>
<?php include('../module_files/modal_agregar_files.php');?>

<?php include('../Comun/footer_fourteen.php');?>