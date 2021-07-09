<div class="ui tiny modal" id="modal_agregar">
    <i class="close icon"></i>
    <div class="header">
        Nuevo Registro
    </div>
    <div class="content">
        
        <div class="ui form" id="formAgregar">
            
            <div class="fields">
                <div class="five wide field">
                    <label>Descripción Ruta:</label>
                </div>
                <div class="eleven wide field">
                    <input type="text" id="desc_mdl" tabindex="1" maxlength="50">
                </div>
            </div>
            <div class="fields">
                <div class="five wide field">
                    <label>Importe Tarifa:</label>
                </div>
                <div class="eleven wide field">
                    <input type="number" id="importe" tabindex="1" maxlength="5">
                </div>
            </div>
            <div class="fields">
                <div class="five wide field">
                    <label>Tipo Moneda:</label>
                </div>
                <div class="eleven wide field">
                    <select id="tipomoneda"></select>
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
    <div class="header">ELIMINAR TIPO MONEDA</div>
    <div class="content">
        <p>¿Desea eliminar el registro seleccionado?</p>
    </div>
    <div class="actions">
        <div class="ui cancel basic red button">Regresar</div>
        <div class="ui green button" id="btn_delete">Aceptar</div>
    </div>
</div>