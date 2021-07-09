<?php include('../Comun/header_six.php');?>

<script src="index.js"></script>
<script src="../Comun/validacion.js"></script>
<script src="../Comun/dropdown.js"></script>

    <div class="ui form">
        <div class="fields">
            <div class="six wide field">
                <h3>Puestos</h3>
            </div>              
            <div class="eight wide field">
                <label>Departamento:</label>
                <select id="departamento"></select>
            </div>
            <div class="two wide field">
                <label>Agregar:</label>
                <button class="ui blue basic icon button" onclick='mostrarModal(0);'>
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
                <th>Tipo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody id="tbody">
            
        </tbody>
    </table>

<?php include('modal_agregar.php');?>

<?php include('../Comun/footer_six.php');?>