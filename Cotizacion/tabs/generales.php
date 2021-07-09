<div class="ui segment">

    <div class="ui form" id="formGeneral">
        <div class="fields">
            <div class="three wide field">
                <label>Folio:</label>
            </div>
            <div class="five wide field">
                <input type="text" id="folio" disabled tabindex="1">
            </div>

            <div class="three wide field">
                <label>Servicio:</label>
            </div>
            <div class="five wide field">
                <input type="text" id="tipo_servicio" tabindex="8">
            </div>
            
        </div>

        <div class="fields">
            <div class="three wide field">
                <label>Lugar de Expedición:</label>
            </div>
            <div class="five wide field">
                <input type="text" id="lugar_expedicion" tabindex="2">
            </div>            

            <div class="three wide field">
                <label>Lugar de Servicio:</label>
            </div>
            <div class="five wide field">
                <input type="text" id="lugar_servicio" tabindex="9">
            </div>
            
        </div>

        <div class="fields">
            <div class="three wide field">
                <label>Fecha:</label>
            </div>
            <div class="five wide field">
                <input type="date" validate="true" id="fecha" tabindex="3">
            </div>            

            <div class="three wide field">
                <label>Ubicado en:</label>
            </div>
            <div class="five wide field">
                <input type="text" id="ubicado_en" tabindex="10">
            </div>

        </div>

        <div class="fields">

            <div class="three wide field">
                <label>Asunto:</label>
            </div>
            <div class="five wide field">
                <input type="text" id="asunto" tabindex="4">
            </div>            
            
            <div class="three wide field">
                <label>Moneda:</label>
            </div>
            <div class="five wide field">
                <select id="moneda" validate="true" tabindex="11"></select>
            </div>
            
        </div>

        <div class="fields">
            <div class="three wide field">
                <label>Cliente:</label>
            </div>
            <div class="five wide field">
                <select id="cliente" validate="true" tabindex="5"></select>
            </div>
            
            <div class="three wide field">
                <label>Fecha Inicial:</label>
            </div>
            <div class="five wide field">
                <input type="date" id="fecha_ini" validate="true" tabindex="12">
            </div>
            
            <!-- <div class="three wide field">
                <label>Tipo de Cambio:</label>
            </div>
            <div class="five wide field">
                <input type="text" id="tipo_cambio" class="number" validate="true">
            </div> -->
            
        </div>

        <div class="fields">
            <div class="three wide field">
                <label>En atención a:</label>
            </div>
            <div class="five wide field">
                <input type="text" id="atencion_a" tabindex="6">
            </div>            
            
            <div class="three wide field">
                <label>Fecha Final:</label>
            </div>
            <div class="five wide field">
                <input type="date" id="fecha_fin" validate="true" tabindex="13">
            </div>
            
        </div>

        <div class="fields">
            <div class="three wide field">
                <label>Con Copia para:</label>
            </div>
            <div class="five wide field">
                <input type="text" id="copia_para" tabindex="7">
            </div>            
            
            <div class="three wide field">
                <label>Empleado Firma:</label>
            </div>
            <div class="five wide field">
                <select id="empleado" validate="true" tabindex="14"></select>
            </div>
            
        </div>

        <div class="fields">
            
                        
            
        </div>
        

    </div>

</div>

<script>
    function getEmpleado(){
        return <?php echo $_SESSION['idempleado']; ?>
    }
</script>