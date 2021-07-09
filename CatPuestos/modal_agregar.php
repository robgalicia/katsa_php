<div class="ui tiny modal" id="modal_agregar">
    <i class="close icon"></i>
    <div class="header">
        Nuevo Registro
    </div>
    <div class="content">
        
        <div class="ui form" id="formAgregar">

            <div class="fields">
                <div class="five wide field">
                    <label>Departamento:</label>
                </div>
                <div class="eleven wide field">
                    <input type="text" id="departamento_text" disabled>
                </div>
            </div>
            
            <div class="fields">
                <div class="five wide field">
                    <label>Descripción:</label>
                </div>
                <div class="eleven wide field">
                    <input type="text" id="desc_mdl" tabindex="1" maxlength="50">
                </div>
            </div>
            <div class="fields">
                <div class="five wide field">
                    <label>Tipo Puesto:</label>
                </div>
                <div class="eleven wide field">
                    <select id="tipopuesto">
                        <option value="T">Tabulador</option>
                        <option value="O">Organigrama</option>
                        <option value="R">Registro</option>
                    </select>
                </div>
            </div>
            <div class="fields">
                <div class="five wide field">
                    <label>Descripción Funciones:</label>
                </div>
                <div class="eleven wide field">
                    <input type="text" id="descfunciones" tabindex="1" maxlength="500">
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