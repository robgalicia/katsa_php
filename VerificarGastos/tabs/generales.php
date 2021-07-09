<div class="ui segment">

    <div class="ui form" id="formGeneral">
        <div class="fields">
        
            <div class="three wide field">
                <label>Fecha Solicitud:</label>
            </div>
            <div class="five wide field">
                <input type="date" id="fecha_solicitud" disabled>
            </div>
            <div class="three wide field">
                <label>Región:</label>
            </div>
            <div class="five wide field">
                <select id="region" tabindex="9"></select>
            </div>
            
        </div>

        <div class="fields">
        
            <div class="three wide field">
                <label>Tipo Solicitud:</label>
            </div>
            <div class="five wide field">
                <select id="tipo_solicitud" tabindex="1">
                    <option value="I">Interna</option>
                    <option value="E">Especial</option>
                </select>
            </div>
            <div class="three wide field">
                <label>Lugar de Adscripción:</label>
            </div>
            <div class="five wide field">
                <select id="adscripcion" tabindex="10"></select>
            </div> 
        </div>

        <div class="fields">
            <div class="three wide field">
                <label>Lugar del Viaje:</label>
            </div>
            <div class="five wide field">
                <input id="lugar_viaje" disabled tabindex="2"></input>
            </div>
            
            <div class="three wide field">
                <label>Departamento:</label>
            </div>
            <div class="five wide field">
                <select id="departamento" disabled tabindex="11"></select>
            </div>
        </div>

        <div class="fields">
            <div class="three wide field">
                <label>Tipo de Viaje:</label>
            </div>
            <div class="five wide field">
                <select id="tipo_viaje" tabindex="3"></select>
            </div>
            <div class="three wide field">
                <label>Cliente:</label>
            </div>
            <div class="five wide field">
                <select id="cliente" tabindex="12"></select>
            </div>  
        </div>

        <div class="fields">
            <div class="three wide field">
                <label>Motivo del Viaje:</label>
            </div>
            <div class="five wide field">
                <input id="motivo" tabindex="4"></input>
            </div>
           
            
            <div class="three wide field">
                <label>Kilometros a recorrer:</label>
            </div>
            <div class="five wide field">
                <input id="km" type="number" tabindex="15"></input>
            </div>
        </div>

        <div class="fields">
            <div class="three wide field">
                <label>Número de días:</label>
            </div>
            <div class="five wide field">
                <input id="dias" type="number" tabindex="5"></input>
            </div>
            <div class="three wide field">
                <label>Empleado Solicita:</label>
            </div>
            <div class="five wide field">
                <select id="empleado_solicita" disabled tabindex="16"></select>
            </div>
            
        </div>

        <div class="fields">
            <div class="three wide field">
                <label>Fecha Inicial:</label>
            </div>
            <div class="five wide field">
                <input type="date" id="fecha_inicial" tabindex="6">
            </div>
            <div class="three wide field">
                <label>Empleado Beneficiario:</label>
            </div>
            <div class="five wide field">
                <select id="empleado_beneficiario" tabindex="17"></select>
            </div>
            

            
        </div>

        <div class="fields">
            <div class="three wide field">
                <label>Fecha Final:</label>
            </div>
            <div class="five wide field">
                <input type="date" id="fecha_final" tabindex="7">
            </div>

            <div class="three wide field">
                <label>Correo Electronico:</label>
            </div>
            <div class="five wide field">
                <input id="correo" tabindex="18">
            </div> 

           
            
        </div>

        <div class="fields">
           
            <div class="three wide field">
                <label>Observaciones:</label>
            </div>
            <div class="five wide field">
                <input type="text" id="observaciones" tabindex="8">
            </div>
        </div>
    </div>

</div>

<script>
    function getEmpleado(){
        return <?php echo $_SESSION['idempleado']; ?>
    }
</script>