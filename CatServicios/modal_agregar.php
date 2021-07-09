<div class="ui tiny modal" id="modal_agregar">
    <i class="close icon"></i>
    <div class="header">
        Nuevo Registro
    </div>
    <div class="content">
        
        <div class="ui form" id="formAgregar">
            
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
                    <label>Descripción Detallada:</label>
                </div>
                <div class="eleven wide field">
                    <textarea type="text" id="desc_detallada_mdl" tabindex="2" maxlength="1000" rows="4" cols="50">
                    </textarea>
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
                    <label>Tipo de Moneda:</label>
                </div>
                <div class="eleven wide field">
                    <select id="moneda_mdl" tabindex="4" validate="true"></select>
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
    <div class="header">ELIMINAR SERVICIO</div>
    <div class="content">
        <p>¿Desea eliminar el registro seleccionado?</p>
    </div>
    <div class="actions">
        <div class="ui cancel basic red button">Regresar</div>
        <div class="ui green button" id="btn_delete">Aceptar</div>
    </div>
</div>