<table class="ui table" id="tablePrin">
    <thead>
        <tr style="border-width:0 !important;" id="agregar_tabla_articulo">            
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th class="right aligned">Servicios:</th>
            <th>
                <button class="ui blue basic icon button" onclick='mostrarModal(0);' id="btn_add">
                    <i class="plus icon"></i>
                </button>
            </th>
        </tr>
        <tr>
            <th>Clave</th>
            <th>Desc. Servicio</th>
            <th class="right aligned">Cantidad</th>
            <th class="right aligned">Precio Unitario</th>
            <th class="right aligned">Total</th>            
            <th id="th_acciones">Acciones</th>
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
        </tr>
    </tfoot>
</table>

<div class="ui tiny modal" id="modal_agregar">
    <i class="close icon"></i>
    <div class="header">
        Nuevo Registro
    </div>
    <div class="content">
        
        <div class="ui form" id="formAgregar">

            <div class="fields">
                <div class="five wide field">
                    <label>Servicio:</label>
                </div>
                <div class="eleven wide field">
                    <select id="servicio_mdl" validate="true"></select>
                </div>
            </div>
            
            <div class="fields">
                <div class="five wide field">
                    <label>Descripción del Servicio:</label>
                </div>
                <div class="eleven wide field">
                    <textarea id="desc_mdl" tabindex="1" validate="true" maxlength="100" rows="4" cols="50">
                    </textarea>
                </div>
            </div>

            <div class="fields">
                <div class="five wide field">
                    <label>Cantidad:</label>
                </div>
                <div class="eleven wide field">
                    <input type="text" id="cantidad_mdl" validate="true" tabindex="3" maxlength="15" class="number money">
                </div>
            </div>

            <div class="fields">
                <div class="five wide field">
                    <label>Precio Unitario:</label>
                </div>
                <div class="eleven wide field">
                    <input type="text" id="precio_mdl" validate="true" tabindex="3" maxlength="15" class="number money">
                </div>
            </div>

            <div class="fields">
                <div class="five wide field">
                    <label>Importe Total:</label>
                </div>
                <div class="eleven wide field">
                    <input type="text" id="total_mdl" validate="true" tabindex="3" disabled maxlength="15" class="number money">
                </div>
            </div>

        </div>

    </div>
    <div class="actions">
        <div class="ui deny basic red button">
            Regresar
        </div>
        <div class="ui positive button" onclick="agergar_json_modal();">
            Aceptar            
        </div>
    </div>
</div>