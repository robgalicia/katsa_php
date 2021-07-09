<?php include('../Comun/header_fourteen.php');?>
<script src="../Comun/dropdown.js"></script>
<script src="../Comun/validacion.js"></script>
<script src="agregar_usuario.js"></script>
<script>
    $(document).ready(function() {
        
    });
</script>    

    <div class="ui form">
        <div class="fields">
            <div class="four wide field">
                <h3>Registro de Usuario</h3>
            </div>
            <div class="ten wide field">
            </div>
            <div class="two wide field">
                <div class="ui buttons">
                    <button class="ui gray icon button" onclick="redirect('index.php');">
                        <i class="icon reply"></i>
                    </button>
                    <button class="ui blue icon button" onclick="agregar_usuario_ajax();">
                        <i class="icon plus"></i>
                        Registrar
                    </button>
                </div>
            </div>
        </div>
    </div>    

    <div class="ui segment">
        <div class="ui form" id="formUsuario">
            <div class="fields">
                <div class="three wide field">
                    <label>Login:</label>                    
                </div>
                <div class="five wide field">
                    <input type="text" id="login" maxlength="15" tabindex="1">
                </div>
            </div>

            <div class="fields">
                <div class="three wide field">
                    <label>Password:</label>                    
                </div>
                <div class="five wide field">                    
                    <input type="password" id="password" maxlength="50" tabindex="2">
                </div>
            </div>

            <div id="panel_nuevo_pass">                

                <div class="fields">
                    <div class="three wide field">
                        <label>Nuevo Password:</label>                    
                    </div>
                    <div class="five wide field">
                        <input type="text" id="nuevo_password" maxlength="50" tabindex="2">
                    </div>
                </div>
            </div>

            <div class="fields">
                <div class="three wide field">
                    <label>Nombre:</label>                    
                </div>
                <div class="five wide field">                    
                    <input type="text" id="nombre" maxlength="30" tabindex="3">
                </div>
            </div>

            <div class="fields">
                <div class="three wide field">
                    <label>Fecha de Alta:</label>
                </div>
                <div class="five wide field">
                    <input type="date" id="fechaalta" tabindex="4">
                </div>
            </div>

            <div class="fields">
                <div class="three wide field">
                    <label>Fecha de Baja:</label>
                </div>
                <div class="five wide field">
                    <input type="date" id="fechabaja" tabindex="5">
                </div>
            </div>

            <div class="fields">
                <div class="three wide field">
                    <label>Empleado:</label>                    
                </div>
                <div class="five wide field">                    
                    <select class="ui dropdown" id="idempleado" tabindex="6"></select>
                </div>
            </div>
        </div>
    </div>

    <div class="ui hidden divider"></div>

<?php include('../Comun/footer_fourteen.php');?>