<div class="ui tiny modal" id="modal_cuentasbancarias">
    <i class="close icon"></i>
    <div class="header">
        Nuevo Registro
    </div>
    <div class="content">
        
        <div class="ui form" id="formCuentaBancaria">

            <div class="fields">
                <div class="five wide field">
                    <label>Banco:</label>
                </div>
                <div class="eleven wide field">
                    <select id="banco_mdl"></select>
                </div>
            </div>
            <div class="fields">
                <div class="five wide field">
                    <label>Número de Cuenta:</label>
                </div>
                <div class="eleven wide field">
                    <input type="text" id="num_cuenta_mdl" class="number" tabindex="1" maxlength="20">
                </div>
            </div>

            <div class="fields">
                <div class="five wide field">
                    <label>Clabe Interbancaria:</label>
                </div>
                <div class="eleven wide field">
                    <input type="text" id="clabe_interbancaria_mdl" tabindex="2" maxlength="20">
                </div>
            </div>
            <div class="fields">
                <div class="five wide field">
                    <label>Cuenta Contable:</label>
                </div>
                <div class="eleven wide field">
                    <input type="text" id="clabe_contable_mdl" tabindex="3" maxlength="20">
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
    <div class="header">ELIMINAR CUENTA BANCARIA</div>
    <div class="content">
        <p>¿Desea eliminar este registro?</p>
    </div>
    <div class="actions">
        <div class="ui cancel basic red button">Regresar</div>
        <div class="ui green button" id="btn_delete">Aceptar</div>
    </div>
</div>