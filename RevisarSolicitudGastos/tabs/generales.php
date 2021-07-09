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
                <select id="region" disabled></select>
            </div>
        </div>

        <div class="fields">
            <div class="three wide field">
                <label>Tipo Solicitud:</label>
            </div>
            <div class="five wide field">
                <select id="tipo_solicitud">
                    <option value="I">Interna</option>
                    <option value="E">Especial</option>
                </select>
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
                <label>Lugar del Viaje:</label>
            </div>
            <div class="five wide field">
                <input id="lugar_viaje" disabled></input>
            </div>
            <div class="three wide field">
                <label>Departamento:</label>
            </div>
            <div class="five wide field">
                <select id="departamento" disabled></select>
            </div>
        </div>

        <div class="fields">
            <div class="three wide field">
                <label>Tipo de Viaje:</label>
            </div>
            <div class="five wide field">
                <select id="tipo_viaje" ></select>
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
                <label>Motivo del Viaje:</label>
            </div>
            <div class="five wide field">
                <input id="motivo"></input>
            </div>
           
            
            <div class="three wide field">
                <label>Kilometros a recorrer:</label>
            </div>
            <div class="five wide field">
                <input id="km"></input>
            </div>     
        </div>

        <div class="fields">
            <div class="three wide field">
                <label>Número de días:</label>
            </div>
            <div class="five wide field">
                <input id="dias" type="number"></input>
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
                <label>Fecha Inicial:</label>
            </div>
            <div class="five wide field">
                <input type="date" id="fecha_inicial">
            </div>
            <div class="three wide field">
                <label>Empleado Beneficiario:</label>
            </div>
            <div class="five wide field">
                <select id="empleado_beneficiario"></select>
            </div>
        </div>

        <div class="fields">
            <div class="three wide field">
                <label>Fecha Final:</label>
            </div>
            <div class="five wide field">
                <input type="date" id="fecha_final">
            </div>

            <div class="three wide field">
                <label>Correo Electronico:</label>
            </div>
            <div class="five wide field">
                <input id="correo">
            </div>             
        </div>

        <div class="fields">
           
            <div class="three wide field">
                <label>Observaciones:</label>
            </div>
            <div class="five wide field">
                <input type="text" id="observaciones">
            </div>
        </div>
    </div>
</div>

<script>
    function getEmpleado(){
        return <?php echo $_SESSION['idempleado']; ?>
    }
</script>