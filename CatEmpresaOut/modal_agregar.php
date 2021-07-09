<div class="ui small modal" id="modal_agregar">
    <i class="close icon"></i>
    <div class="header">
        Nuevo Registro
    </div>
    <div class="content">
        
        <div class="ui form" id="formAgregar">
            
            <div class="fields">
                <div class="four wide field">
                    <label>Empresa:</label>
                </div>
                <div class="four wide field">
                    <input type="text" id="nombre" tabindex="1" maxlength="50">
                </div>
                <div class="four wide field">
                    <label>Nombre Corto:</label>
                </div>
                <div class="four wide field">
                    <input type="text" id="nombrecorto" tabindex="1" maxlength="50">
                </div>
            </div>

            <div class="fields">
                <div class="four wide field">
                    <label>Domicilio:</label>
                </div>
                <div class="four wide field">
                    <input type="text" id="domicilio" tabindex="1" maxlength="50">
                </div>
                <div class="four wide field">
                    <label>Colonia:</label>
                </div>
                <div class="four wide field">
                    <input type="text" id="colonia1" tabindex="1" maxlength="50">
                </div>
            </div>

            <div class="fields">
                <div class="four wide field">
                    <label>Ciudad:</label>
                </div>
                <div class="four wide field">
                    <input type="text" id="ciudad" tabindex="1" maxlength="50">
                </div>
                <div class="four wide field">
                    <label>Municipio:</label>
                </div>
                <div class="four wide field">
                    <select id="municipio"></select>
                </div>
            </div>

            <div class="fields">
                <div class="four wide field">
                    <label>Estado:</label>
                </div>
                <div class="four wide field">
                    <select id="estado"></select>
                </div>
                <div class="four wide field">
                    <label>Contacto:</label>
                </div>
                <div class="four wide field">
                    <input type="text" id="contacto" tabindex="1" maxlength="50">
                </div>
            </div>

            <div class="fields">
                <div class="four wide field">
                    <label>Telefono:</label>
                </div>
                <div class="four wide field">
                    <input type="text" id="telefono" tabindex="1" maxlength="50">
                </div>
                <div class="four wide field">
                    <label>Correo:</label>
                </div>
                <div class="four wide field">
                    <input type="text" id="correo" tabindex="1" maxlength="50">
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