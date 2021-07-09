<div class="ui modal" id="modal_proveedor">
    <i class="close icon"></i>
    <div class="header">
        Nuevo Registro
    </div>
    <div class="content">
        
        <div class="ui form" id="formProveedor">

            <div class="fields">
                <div class="three wide field">
                    <label>Nombre Proveedor:</label>
                </div>
                <div class="five wide field">
                    <input type="text" id="nombre_proveedor_mdl" tabindex="1" maxlength="100">
                </div>
                <div class="three wide field">
                    <label>Teléfono:</label>
                </div>
                <div class="five wide field">
                    <input type="text" id="telefono_mdl" tabindex="9" maxlength="30">
                </div>
            </div>

            <div class="fields">
                <div class="three wide field">
                    <label>Representante Legal:</label>
                </div>
                <div class="five wide field">
                    <input type="text" id="representante_legal_mdl" tabindex="2" maxlength="50">
                </div>
                <div class="three wide field">
                    <label>Correo Electrónico:</label>
                </div>
                <div class="five wide field">
                    <input type="text" id="correo_mdl" tabindex="10" maxlength="50">
                </div> 
            </div>

            <div class="fields">
                <div class="three wide field">
                    <label>Dirección:</label>
                </div>
                <div class="five wide field">
                    <input type="text" id="direccion_mdl" tabindex="3" maxlength="100">
                </div>
                <div class="three wide field">
                    <label>Días de Crédito:</label>
                </div>
                <div class="five wide field">
                    <input type="text" id="dias_credito_mdl" class="number" tabindex="11">
                </div>
            </div>                                                    

            <div class="fields">
                <div class="three wide field">
                    <label>Colonia:</label>
                </div>
                <div class="five wide field">
                    <input type="text" id="colonia_mdl" tabindex="4" maxlength="50">
                </div>
                <div class="three wide field">
                    <label>Banco Depósito:</label>
                </div>
                <div class="five wide field">
                    <select id="banco_deposito_mdl" tabindex="12"></select>
                </div>
            </div> 
            <div class="fields">
                <div class="three wide field">
                    <label>Ciudad:</label>
                </div>
                <div class="five wide field">
                    <input type="text" id="ciudad_mdl" tabindex="5" maxlength="50">
                </div>
                <div class="three wide field">
                    <label>Cuenta Depósito:</label>
                </div>
                <div class="five wide field">
                    <input type="text" id="cuenta_deposito_mdl" tabindex="13" maxlength="20">
                </div>
            </div>                                                    

            <div class="fields">
                <div class="three wide field">
                    <label>Estado:</label>
                </div>
                <div class="five wide field">
                    <select id="estado_mdl" tabindex="6"></select>
                </div>
                <div class="three wide field">
                    <label>Cuenta Contable:</label>
                </div>
                <div class="five wide field">
                    <input type="text" id="cuenta_contable_mdl" tabindex="14" maxlength="15">
                </div>
            </div>  

            <div class="fields">
                <div class="three wide field">
                    <label>Código Postal:</label>
                </div>
                <div class="five wide field">
                    <input type="text" id="cp_mdl" maxlength="5" class="number" tabindex="7">
                </div>
                <div class="three wide field">
                    <label>Tipo de Persona:</label>
                </div>
                <div class="five wide field">
                    <select id="tipo_persona_mdl" tabindex="15">
                        <option value="F">FISICA</option>
                        <option value="M">MORAL</option>
                    </select>  
                </div>
            </div> 

            <div class="fields">
                <div class="three wide field">
                    <label>RFC:</label>
                </div>
                <div class="five wide field">
                    <input type="text" id="rfc_mdl" tabindex="8" maxlength="13">
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
    <div class="header">ELIMINAR</div>
    <div class="content">
        <p>¿Esta seguro que desea eliminar este registro?</p>
    </div>
    <div class="actions">
        <div class="ui cancel basic red button">Regresar</div>
        <div class="ui green button" id="btn_delete">Aceptar</div>
    </div>
</div>