<table class="ui table" id="tablePrin">
    <thead>        
        <tr>
            <th>No.</th>
            <th>Articulo</th>
            <th>Cantidad</th>
            <th class="right aligned">Importe</th>
            <th class="right aligned">Total</th>
            <th>Proveedor</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody id="tbodyPrin">
        
    </tbody>
    <tfoot id="tfootPrin">
        <tr>
            <th></th>
            <th></th>
            <th></th>
            <th class="right aligned">Total:</th>
            <th class="right aligned" id="totalPrin"></th>
            <th></th>
            <th></th>
        </tr>
    </tfoot>
</table>


<div class="ui mini modal" id="modal_admin">
    <div class="header">Actualizar Artículo</div>
    <div class="content">
        <div class="ui form">
            <div class="fields">
                <div class="four wide field">
                    <label>Cantidad:</label>
                </div>
                <div class="twelve wide field">
                    <input type="text" class="number" id="cantidad">
                </div>
            </div>
            <div class="fields">                
                <div class="four wide field">
                    <label>Importe:</label>
                </div>
                <div class="twelve wide field">
                    <input type="text" class="number" id="precio">
                </div>
            </div>            
        </div>
    </div>
    <div class="actions">
        <div class="ui cancel basic red button">Cancelar</div>
        <div class="ui green button" onclick="cambiar_articulo();">Aceptar</div>
    </div>
</div>