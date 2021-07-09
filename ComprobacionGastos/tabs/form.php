<div class="ui segment">

    <div class="ui form" id="formGeneral">
        <div class="fields">
            <div class="three wide field">
                <label>Tipo de comprobante:</label>
            </div>
            <div class="five wide field">
                <select id="tipo_comprobante" validate="true">
                    <option value="F">FACTURA</option>
                    <option value="N">NOTA</option>
                </select>
            </div>
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
            
        </div>

        <div class="fields">
            <div class="three wide field">
                <label>Folio:</label>
            </div>
            <div class="five wide field">
                <input id="folio"></input>
            </div>
            
            <div class="three wide field">
                <label>Archivo PDF:</label>
            </div>
            <div class="five wide field">
                <button class="ui green icon button" onclick="mostrarModalEditPdf();" id="pdfDoc">
                    <i class="icon file excel outline"></i>Agregar
                </button>
                <a class="ui label" id="pdf_label">
                    <i class="file pdf icon" id="pdf_label2"></i>
                    N/A
                </a>
            </div>   
            
        </div>

        <div class="fields">
            <div class="three wide field">
                <label>Fecha:</label>
            </div>
            <div class="five wide field">
                <input type="date" id="fecha" validate="true">
            </div>
            <div class="three wide field">
                <label>UUID:</label>
            </div>
            <div class="five wide field">
                <input id="uuid"></input>
            </div>
            

           
        </div>

        <div class="fields">
            <div class="three wide field">
                <label>RFC:</label>
            </div>
            <div class="five wide field">
                <input id="rfc"></input>
            </div>
            <div class="three wide field">
                <label>Partida de Gastos:</label>
            </div>
            <div class="five wide field">
                <select id="partida" validate="true"> </select> 
            </div>  
            
        </div>

        <div class="fields">
            <div class="three wide field">
                <label>Proveedor:</label>
            </div>
            <div class="five wide field">
                <input id="proveedor"></input>
            </div>
            <div class="three wide field">
                <label>Observaciones:</label>
            </div>
            <div class="five wide field">
                <input id="observaciones">
            </div>

                  
        </div>

        <div class="fields">
            <div class="three wide field">
                <label>Importe:</label>
            </div>
            <div class="five wide field">
                <input id="importe" validate="true"></input>
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