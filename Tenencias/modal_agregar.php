<div class="ui large modal" id="modal_tenencia">
    <i class="close icon"></i>
    <div class="header">
        Nuevo Registro
    </div>
    <div class="content">
        
        <div class="ui form" id="formTenencia">

            <div class="fields">
                <div class="three wide field">
                    <label>Vehiculo:</label>
                </div>
                <div class="five wide field">
                    <input type="text" id="vehiculo_mdl" disabled tabindex="1">
                </div>

                <div class="three wide field">
                    <label>Fecha Vigencia:</label>
                </div>
                <div class="five wide field">
                    <input type="date" validate="true" id="fecha_vigencia_mdl" tabindex="4">
                </div>
            </div>

            <div class="fields">
                <div class="three wide field">
                    <label>Fecha de Pago:</label>
                </div>
                <div class="five wide field">
                    <input type="date" validate="true" id="fecha_pago_mdl" tabindex="2">
                </div>

                <div class="three wide field">
                    <label>Placas:</label>
                </div>
                <div class="five wide field">
                    <input type="text" id="placas_mdl" validate="true" maxlength="8" tabindex="5">
                </div>
            </div>

            <div class="fields">
                <div class="three wide field">
                    <label>Importe Total:</label>
                </div>
                <div class="five wide field">
                    <input type="text" id="importe_total_mdl" validate="true" maxlength="13" class="number money" tabindex="6">
                </div>

                <div class="three wide field">
                    <label>Tarjeta de Circulación:</label>
                </div>
                <div class="five wide field">
                    <input type="text" id="circulacion_mdl" validate="true" maxlength="10" tabindex="">
                </div>
                
            </div>                                                    

        </div>

    </div>
    <div class="actions">
        <div class="ui deny basic red button">
            Cancelar
        </div>
        <div class="ui positive button" onclick="agregar_ajax();">
            Aceptar            
        </div>
    </div>
</div>

<div class="ui mini modal" id="modal_borrar">
    <div class="header">BORRAR TENENCIA</div>
    <div class="content">
        <p>¿Esta seguro que desea borrar este registro?</p>
    </div>
    <div class="actions">
        <div class="ui cancel basic red button">Cancelar</div>
        <div class="ui green button" id="btn_delete">Aceptar</div>
    </div>
</div>