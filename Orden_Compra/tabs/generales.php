<div class="ui segment">

    <div class="ui form" id="formGeneral">
        <div class="fields">
            <div class="three wide field">
                <label>Folio:</label>
            </div>
            <div class="five wide field">
                <input type="text" id="folio" disabled>
            </div>

            <div class="three wide field">
                <label>Proveedor:</label>
            </div>
            <div class="five wide field">
                <select id="proveedor" disabled></select>
            </div>
        </div>

        <div class="fields">
            <div class="three wide field">
                <label>Fecha Orden:</label>
            </div>
            <div class="five wide field">
                <input type="datetime-local" id="fecha_orden" disabled>
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
                <label>Departamento:</label>
            </div>
            <div class="five wide field">
                <select id="departamento" disabled></select>
            </div>

            <div class="three wide field">
                <label>Importe Total:</label>
            </div>
            <div class="five wide field">
                <input type="text" id="importe_total" disabled>
            </div>
        </div>

    </div>

</div>

<script>
    function getEmpleado(){
        return <?php echo $_SESSION['idempleado']; ?>
    }
</script>