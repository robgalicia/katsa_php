<div class="ui large modal" id="modal_poliza">
    <i class="close icon"></i>
    <div class="header">
        Nuevo Registro
    </div>
    <div class="content">
        
        <div class="ui form" id="formPoliza">

            <div class="fields">
                <div class="three wide field">
                    <label>Vehiculo:</label>
                </div>
                <div class="five wide field">
                    <input type="text" id="vehiculo_mdl" disabled tabindex="1">
                </div>

                <div class="three wide field">
                    <label>Final Vigencia:</label>
                </div>
                <div class="five wide field">
                    <input type="date" validate="true" id="final_vigencia_mdl" tabindex="5">
                </div>
            </div>

            <div class="fields">
                <div class="three wide field">
                    <label>Aseguradora:</label>
                </div>
                <div class="five wide field">
                    <select id="aseguradora_mdl" validate="true" tabindex="2"></select>
                </div>

                <div class="three wide field">
                    <label>Fecha de Pago:</label>
                </div>
                <div class="five wide field">
                    <input type="date" id="fecha_pago_mdl" tabindex="6">
                </div>
            </div>

            <div class="fields">
                <div class="three wide field">
                    <label>Número de Poliza:</label>
                </div>
                <div class="five wide field">
                    <input type="text" id="num_poliza_mdl" validate="true" maxlength="15" tabindex="3">
                </div>

                <div class="three wide field">
                    <label>Importe Total:</label>
                </div>
                <div class="five wide field">
                    <input type="text" id="importe_total_mdl" class="number money" tabindex="7">
                </div>
            </div>

            <div class="fields">
                <div class="three wide field">
                    <label>Inicio Vigencia:</label>
                </div>
                <div class="five wide field">
                    <input type="date" validate="true" id="inicio_vigencia_mdl" tabindex="4">
                </div>

                <div class="three wide field">
                    <label>Observaciones:</label>
                </div>
                <div class="five wide field">
                    <input type="text" id="observaciones_mdl" tabindex="8">
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
    <div class="header">BORRAR MANTENIMIENTO</div>
    <div class="content">
        <p>¿Esta seguro que desea borrar este registro?</p>
    </div>
    <div class="actions">
        <div class="ui cancel basic red button">Cancelar</div>
        <div class="ui green button" id="btn_delete">Aceptar</div>
    </div>
</div>