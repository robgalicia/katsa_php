<div class="ui small modal" id="modal_agregar">
    <i class="close icon"></i>
    <div class="header">
        Nuevo Registro
    </div>
    <div class="content">
        
        <div class="ui form" id="formAgregar">
            
            <div class="fields">
                <div class="four wide field">
                    <label>Nombre:</label>
                </div>
                <div class="four wide field">
                    <input type="text" id="nombre" tabindex="1" maxlength="100">
                </div>
                <div class="four wide field">
                    <label>Calle:</label>
                </div>
                <div class="four wide field">
                    <input type="text" id="calle" tabindex="1" maxlength="100">
                </div>
            </div>

            <div class="fields">
                <div class="four wide field">
                    <label>Núm. Ext:</label>
                </div>
                <div class="four wide field">
                    <input type="text" id="numext" tabindex="1" maxlength="20">
                </div>
                <div class="four wide field">
                    <label>Núm. Int:</label>
                </div>
                <div class="four wide field">
                    <input type="text" id="numint" tabindex="1" maxlength="20">
                </div>
            </div>

            <div class="fields">
                <div class="four wide field">
                    <label>Colonia:</label>
                </div>
                <div class="four wide field">
                    <input type="text" id="colonia" tabindex="1" maxlength="50">
                </div>
                <div class="four wide field">
                    <label>Ciudad:</label>
                </div>
                <div class="four wide field">
                    <input type="text" id="ciudad" tabindex="1" maxlength="50">
                </div>
            </div>

            <div class="fields">
                <div class="four wide field">
                    <label>Municipio:</label>
                </div>
                <div class="four wide field">
                    <select id="municipio" tabindex="1"></select>
                </div>
                <div class="four wide field">
                    <label>Estado:</label>
                </div>
                <div class="four wide field">
                <select id="estado" tabindex="1"></select>
                </div>
            </div>

            <div class="fields">
                <div class="four wide field">
                    <label>CP:</label>
                </div>
                <div class="four wide field">
                    <input type="number" id="cp" tabindex="1" >
                </div>
                <div class="four wide field">
                    <label>RFC:</label>
                </div>
                <div class="four wide field">
                    <input type="number" id="rfc" tabindex="1" >
                </div>
            </div>

            <div class="fields">
                <div class="four wide field">
                    <label>Contacto:</label>
                </div>
                <div class="four wide field">
                    <input type="text" id="contacto" tabindex="1" maxlength="50">
                </div>
                <div class="four wide field">
                    <label>Telefono Contacto:</label>
                </div>
                <div class="four wide field">
                    <input type="text" id="tel" tabindex="1" maxlength="50">
                </div>
            </div>

            <div class="fields">
                <div class="four wide field">
                    <label>Correo:</label>
                </div>
                <div class="four wide field">
                    <input type="text" id="correo" tabindex="1" maxlength="15">
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