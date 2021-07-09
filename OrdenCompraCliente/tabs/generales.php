<div class="ui segment">

    <div class="ui form" id="formGeneral">
        <div class="fields">
            <div class="three wide field">
                <label>Folio:</label>
            </div>
            <div class="five wide field">
                <input type="text" id="folio" validate="true">
            </div>

            <div class="three wide field">
                <label>Lugar de Servicio:</label>
            </div>
            <div class="five wide field">
                <input type="text" id="lugar_servicio">
            </div>
            
        </div>

        <div class="fields">
            <div class="three wide field">
                <label>Fecha:</label>
            </div>
            <div class="five wide field">
                <input type="date" validate="true" id="fecha">
            </div>            

            <div class="three wide field">
                <label>Moneda:</label>
            </div>
            <div class="five wide field">
                <select id="moneda" validate="true"></select>
            </div>
            
        </div>

        <div class="fields">
            <div class="three wide field">
                <label>Cliente:</label>
            </div>
            <div class="five wide field">
                <select id="cliente" validate="true"></select>
            </div>

            <div class="three wide field">
                <label>Tipo de Cambio:</label>
            </div>
            <div class="five wide field">
                <input type="text" id="tipo_cambio" class="number" validate="true">
            </div>

        </div>

        <div class="fields">

            <div class="three wide field">
                <label>Domicilio Fiscal:</label>
            </div>
            <div class="five wide field">
                <select id="domicilio_fiscal" validate="true"></select>
            </div>            
            
            <div class="three wide field">
                <label>Observaciones:</label>
            </div>
            <div class="five wide field">
                <input type="text" id="observaciones">
            </div>
            
        </div>        

        <div class="fields">
            <div class="three wide field">
                <label>Cotización:</label>
            </div>
            <div class="five wide field">
                <select id="cotizacion" validate="true"></select>                
            </div>            
                        
            
        </div>
        

    </div>

</div>

<script>
    function getEmpleado(){
        return <?php echo $_SESSION['idempleado']; ?>
    }
</script>