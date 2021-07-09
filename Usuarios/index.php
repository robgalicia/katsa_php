<?php include('../Comun/header_fourteen.php');?>

<script src="index.js"></script>
<script src="../Comun/validacion.js"></script>    

    <div class="ui form">
        <div class="fields">
            <div class="two wide field">
                <h3>Usuarios del Sistema</h3>    
            </div>
            <div class="twelve wide field"></div>
            <div class="two wide field">
                <label>Agregar:</label>
                <button class="ui blue icon button" onclick='redirect("agregar_usuario.php?idUsuario=0");'>
                    <i class="plus icon"></i>
                </button>
            </div>
        </div>
    </div>


    <table class="ui table">
        <thead>
            <tr>
                <th>Login</th>                
                <th>Nombre</th>
                <th>Fecha Alta</th>
                <th>Fecha Baja</th>
                <th>Empleado</th>
                <th>Acciones</th>            
            </tr>
        </thead>
        <tbody id="tbody">
            
        </tbody>
    </table>
    
<?php include('../Comun/footer_fourteen.php');?>