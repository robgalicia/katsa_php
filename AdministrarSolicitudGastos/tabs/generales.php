<div class="ui segment" id="generales">

    <div class="ui form" id="formGeneral">
        <div class="fields">
            <div class="three wide field">
                <label>Folio:</label>
            </div>
            <div class="five wide field">
                <input type="text" id="folio" disabled>
            </div>
            <div class="three wide field">
                <label>Empleado Solicita:</label>
            </div>
            <div class="five wide field">
                <select id="empleado_solicita" disabled></select>
            </div>
        </div>

        <div class="fields">
            <div class="three wide field">
                <label>Sucursal/Departamento:</label>
            </div>
            <div class="five wide field">
                <select id="departamento" disabled></select>
            </div>

            <div class="three wide field">
                <label>Observaciones Solicitud:</label>
            </div>
            <div class="five wide field">
                <input type="text" id="observaciones">
            </div>
        </div>

        <div class="fields">
            <div class="three wide field">
                <label>Beneficiario:</label>
            </div>
            <div class="five wide field">
                <input type="text" id="beneficiario" disabled>
            </div>

            <div class="three wide field">
                <label>Fecha de Entrega:</label>
            </div>
            <div class="five wide field">
                <input type="date" id="fecha_entrega" disabled>
            </div>
        </div>

        <div class="fields">
            <div class="three wide field">
                <label>Correo:</label>
            </div>
            <div class="five wide field">
                <input type="text" id="correo" disabled>
            </div> 
            

            <div class="three wide field">
                <label>Banco:</label>
            </div>
            <div class="five wide field">
                <select id="banco" validate="true"></select>
            </div>
            
        </div>

        <div class="fields">
            <div class="three wide field">
                <label>Fecha Límite Comprobación:</label>
            </div>
            <div class="five wide field">
                <input type="date" id="fecha_comprobacion" validate="true">
            </div>
            <div class="three wide field">
                <label>Cuenta Bancaria:</label>
            </div>
            <div class="five wide field">
                <select id="cuenta_bancaria" validate="true"></select>
            </div> 

                  
        </div>

        <div class="fields">
            <div class="three wide field">
                <label></label>
            </div>
            <div class="five wide field">
                
            </div> 
            <div class="three wide field">
                <label>Referencia de Entrega:</label>
            </div>
            <div class="five wide field">
                <input type="text" id="referencia">
            </div>  
            
      
        </div>
        <div class="fields">
            <div class="three wide field">
                <label>Centro de costos:</label>
            </div>
            <div class="five wide field">
                <input id="centro_costos" type="number" maxlength="3">
            </div> 
            <div class="three wide field">
            </div>
            <div class="five wide field">
            </div>  
            
      
        </div>
    </div>
</div>

<script>
    function getEmpleado(){
        return <?php echo $_SESSION['idempleado']; ?>
    }
</script>