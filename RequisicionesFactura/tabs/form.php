<div class="ui segment">

    <div class="ui form" id="formGeneral">
        <div class="fields">
            <div class="three wide field">
                <label>Fecha:</label>
            </div>
            <div class="five wide field">
                <input type="date" id="fecha" validate="true"></input>
            </div>

            <div class="three wide field">
                <label>Tipo Venta:</label>
            </div>
            <div class="five wide field">
                <select id="tipo_venta" validate="true">
                    <option value="C">CONTADO</option>
                    <option value="P">CREDITO</option>
                </select>                
            </div>
            
        </div>

        <div class="fields">
            <div class="three wide field">
                <label>RFC Proveedor:</label>
            </div>
            <div class="five wide field">
                <input id="rfc_proveedor"></input>
            </div>

            <div class="three wide field">
                <label>Forma Pago:</label>
            </div>
            <div class="five wide field">
                <select id="forma_pago" validate="true"></select>
            </div>

        </div>

        <div class="fields">
            <div class="three wide field">
                <label>Nombre Proveedor:</label>
            </div>
            <div class="five wide field">
                <input id="nombre_proveedor"></input>
            </div>

            <div class="three wide field">
                <label>Referencia del Pago:</label>
            </div>
            <div class="five wide field">
                <input id="referencia_pago"></input>
            </div>
            
        </div>

        <div class="fields">
            
            <div class="three wide field">
                <label>UUID:</label>
            </div>
            <div class="five wide field">
                <input id="uuid"></input>
            </div>
            
            <div class="three wide field">
                <label>Dias de Crédito:</label>
            </div>
            <div class="five wide field">
                <input id="dias_credito" class="number"></input>
            </div>
            
        </div>

        <div class="fields">
            
            <div class="three wide field">
                <label>Importe:</label>
            </div>
            <div class="five wide field">
                <input id="importe" class="number money" validate="true"></input>
            </div> 

            <div class="three wide field">
                <label>Fecha Vencimiento:</label>
            </div>
            <div class="five wide field">
                <input type="date" id="fecha_vencimiento"></input>
            </div>
            

        </div>

        <div class="fields">

            <div class="three wide field">
                <label>Archivo XML:</label>
            </div>
            <div class="five wide field">
                <button class="ui green icon button" onclick="mostrarModalEdit();" id="xmlDoc">
                    <i class="icon file excel outline"></i>Agregar
                </button>
                <a class="ui label" id="xml_label">
                    <i class="file excel icon"></i>
                    N/A
                </a>
            </div>
                
            <div class="three wide field">
                <label>Observaciones:</label>
            </div>
            <div class="five wide field">
                <input id="observaciones"></input>
            </div>

        </div>

        <div class="fields">

            <div class="three wide field">
                <label>Archivo PDF:</label>
            </div>
            <div class="five wide field">
                <button class="ui green icon button" onclick="mostrarModalEdit_pdf();" id="pdfDoc">
                    <i class="icon file pdf outline"></i>Agregar
                </button>
                <a class="ui label" id="pdf_label">
                    <i class="file pdf icon"></i>
                    N/A
                </a>
            </div>
            

            
                
        </div>
        
    </div>
</div>

<script>
    function getEmpleado(){
        return <?php echo $_SESSION['idempleado']; ?>
    }
</script>

<?php include('modal.php');?>