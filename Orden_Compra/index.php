<?php include('../Comun/header_fourteen.php');?>

<script src="index.js"></script>
<script src="../Comun/validacion.js"></script>
<script src="../Comun/dropdown.js"></script>    

    <div class="ui form">
        <div class="fields">
            <div class="two wide field">
                <h3>Orden de Compra</h3>
            </div>
        </div>
        <div class="fields">            
            <div class="three wide field">
                <label>Region:</label>
                <select id="region"></select>
            </div>
            <div class="three wide field">
                <label>Departamento:</label>
                <select id="departamento"></select>
            </div>
            <div class="three wide field">
                <label>Ejercicio:</label>
                <input type="text" maxlength="4" class="number" id="anio">
            </div>
            <div class="three wide field">
                <label>Mes:</label>
                <select id="mes">
                    <option value="01">Enero</option>
                    <option value="02">Febrero</option>
                    <option value="03">Marzo</option>
                    <option value="04">Abril</option>
                    <option value="05">Mayo</option>
                    <option value="06">Junio</option>
                    <option value="07">Julio</option>
                    <option value="08">Agosto</option>
                    <option value="09">Septiembre</option>
                    <option value="10">Octubre</option>
                    <option value="11">Noviembre</option>
                    <option value="12">Diciembre</option>                    
                </select>
            </div>
            <div class="three wide field">
                <label>Folio Requisición:</label>
                <input type="text" id="folio_requi" maxlength="12">
            </div>
            <div class="one wide field">
                <label>Acciones:</label>
                <button class="ui blue icon button" onclick='llenar_tabla_ajax();'>
                    <i class="search icon"></i>
                </button>                
            </div>            
        </div>
    </div>


    <table class="ui table">
        <thead>
            <tr>                
                <th>Clave</th>
                <th>Folio</th>
                <th>Requisición</th>
                <th>Fecha Orden</th>
                <th>Proveedor</th>                
                <th>Importe</th>
                <th>Fecha Factura</th>
                <th>Estatus</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody id="tbody">
            
        </tbody>
    </table>
    

<div class="ui mini modal" id="modal_confirmar">
    <div class="header"> AVISO </div>
    <div class="content">
        <p>¿Desea confirmar la orden de compra?</p>
    </div>
    <div class="actions">
        <div class="ui cancel basic red button">Regesar</div>
        <div class="ui green button" id="btn_delete" onclick="confirmar()";>Aceptar</div>
    </div>
</div>

<?php include('../Comun/footer_fourteen.php');?>