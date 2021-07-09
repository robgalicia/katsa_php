<div class="ui tiny modal" id="modal_region">
    <i class="close icon"></i>
    <div class="header">
        Nuevo Registro
    </div>
    <div class="content">
        
        <div class="ui form" id="formRegion">
            <div class="fields">
                <div class="five wide field">
                    <label>Clave:</label>
                </div>
                <div class="eleven wide field">
                    <input type="text" id="idregion_mdl" class="number" tabindex="0" readonly="true">
                </div>
            </div>
            <div class="fields">
                <div class="five wide field">
                    <label>Prefijo de Folios:</label>
                </div>
                <div class="eleven wide field">
                    <input type="text" id="prefijo_mdl" tabindex="1" maxlength="1">
                </div>
            </div>
            <div class="fields">
                <div class="five wide field">
                    <label>Descripción:</label>
                </div>
                <div class="eleven wide field">
                    <input type="text" id="descregion_mdl" tabindex="1" maxlength="50">
                </div>
            </div>
        </div>

    </div>
    <div class="actions">
        <div class="ui deny basic red button">
            Regresar
        </div>
        <div class="ui positive button" onclick="agregar_ajax();">
            Aceptar            
        </div>
    </div>
</div>

<div class="ui mini modal" id="modal_borrar">
    <div class="header">ELIMINAR REGIÓN</div>
    <div class="content">
        <p>¿Desea eliminar el registro seleccionado?</p>
    </div>
    <div class="actions">
        <div class="ui cancel basic red button">Regresar</div>
        <div class="ui green button" id="btn_delete">Aceptar</div>
    </div>
</div>