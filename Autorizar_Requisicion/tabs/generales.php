<div class="ui segment">

    <div class="ui form" id="formGeneral">
        <div class="fields">
            <div class="three wide field">
                <label>Región:</label>
            </div>
            <div class="five wide field">
                <select id="region" disabled></select>
            </div>

            <div class="three wide field">
                <label>Tipo Requisición:</label>
            </div>
            <div class="five wide field">
                <select id="tipo_reque">
                    <option value="I">INTERNA</option>
                    <option value="O">OPERACIONES</option>
                    <!-- <option value="E">ESPECIAL</option> -->
                    <!-- <option value="C">CLIENTE</option> -->
                </select>
            </div>
            
        </div>

        <div class="fields">
            <div class="three wide field">
                <label>Fecha:</label>
            </div>
            <div class="five wide field">
                <input type="datetime-local" id="fecha" disabled>
            </div>

            <div class="three wide field">
                <label>Tipo Entrega:</label>
            </div>
            <div class="five wide field">
                <select id="tipo_entrega">
                    <option value="N">NORMAL</option>
                    <option value="U">URGENTE</option>                    
                </select>
            </div>
            
        </div>

        <div class="fields">
            <div class="three wide field">
                <label>Departamento:</label>
            </div>
            <div class="five wide field">
                <select id="departamento" disabled></select>
            </div>

            <div class="three wide field">
                <label>Plazo de Entrega (dias):</label>
            </div>
            <div class="five wide field">
                <input type="text" id="plazo_entrega" class="number" maxlength="10">
            </div>

        </div>

        <div class="fields">
            <div class="three wide field">
                <label>Empleado Solicita:</label>
            </div>
            <div class="five wide field">
                <select id="empleado_solicita" disabled></select>
            </div>
            
            <div class="three wide field">
                <label>Cliente:</label>
            </div>
            <div class="five wide field">
                <select id="cliente"></select>
            </div>
            
        </div>

        <div class="fields">
            <div class="three wide field">
                <label>Centro de Costos:</label>
            </div>
            <div class="five wide field">
                <input id="centro_costos" class="number" maxlength="15"/>
            </div>
            
            <div class="three wide field">
                <label>Lugar de Adscripción:</label>
            </div>
            <div class="five wide field">
                <select id="adscripcion"></select>
            </div>
            
        </div>

        <div class="fields">
            
        <div class="three wide field">
                
            </div>
            <div class="five wide field">
                
            </div>

            <div class="three wide field">
                <label>Observaciones:</label>
            </div>
            <div class="five wide field">
                <input type="text" id="observaciones">
            </div>
            
        </div>

        <hr class="ui divider">

        <div class="fields">
            <div class="three wide field">
                <label>Empleado Revisa:</label>
            </div>
            <div class="five wide field">
                <input type="text" id="empleado_revisa" disabled>
            </div>
            
        </div>

        <div class="fields">
            <div class="three wide field">
                <label>Fecha Revisión:</label>
            </div>
            <div class="five wide field">
                <input type="datetime-local" id="fecha_revisa" disabled>
            </div>            
            
        </div>
    </div>

</div>

<script>
    function getEmpleado(){
        return <?php echo $_SESSION['idempleado']; ?>
    }
</script>