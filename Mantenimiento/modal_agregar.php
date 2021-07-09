<style>
.dropzoneBorder {
    background: white;
    border-radius: 5px;
    border: 2px dashed rgb(0, 135, 247);
    border-image: none;
    max-width: 500px;
    margin-left: auto;
    margin-right: auto;
}
</style>

<div class="ui large modal" id="modal_mantenimiento">
    <i class="close icon"></i>
    <div class="header">
        Nuevo Registro
    </div>
    <div class="content">
        
        <div class="ui form" id="formMantenimiento">

            <div class="fields">
                <div class="three wide field">
                    <label>Vehículo:</label>
                </div>
                <div class="five wide field">
                    <input type="text" id="vehiculo_mdl" disabled tabindex="1">
                </div>

                <div class="three wide field">
                    <label>SubTotal:</label>
                </div>
                <div class="five wide field">
                    <input type="text" id="subtotal_mdl" maxlength="13" validate="true" class="number money" tabindex="8">
                </div>
            </div>

            <div class="fields">
                <div class="three wide field">
                    <label>Fecha:</label>
                </div>
                <div class="five wide field">
                    <input type="date" id="fecha_mdl" validate="true" tabindex="2">
                </div>

                <div class="three wide field">
                    <label>IVA:</label>
                </div>
                <div class="five wide field">
                    <input type="text" id="iva_mdl" maxlength="13" validate="true" class="number money" tabindex="9">
                </div>

                
            </div>

            <div class="fields">
                <div class="three wide field">
                    <label>Kilometraje Actual:</label>
                </div>
                <div class="five wide field">
                    <input type="text" id="km_actual_mdl" validate="true" class="number money" tabindex="3">
                </div>

                <div class="three wide field">
                    <label>Importe Total:</label>
                </div>
                <div class="five wide field">
                    <input type="text" id="importe_total_mdl" maxlength="13" validate="true" class="number money" tabindex="10">
                </div>                

                
            </div>

            <div class="fields">
                <div class="three wide field">
                    <label>Servicio:</label>
                </div>
                <div class="five wide field">
                    <input type="text" validate="true" id="servicio_mdl" maxlength="100" tabindex="4">
                </div>
                
                <div class="three wide field">
                    <label>Fecha de Pago:</label>
                </div>
                <div class="five wide field">
                    <input type="date" id="fecha_pago_mdl" tabindex="11">
                </div>
                
            </div>

            <div class="fields">
                <div class="three wide field">
                    <label>Empleado Comisionado:</label>
                </div>
                <div class="five wide field">
                    <select id="empleado_comisionado" validate="true"></select>
                </div>

                <div class="three wide field">
                    <label>Referencia de Pago:</label>
                </div>
                <div class="five wide field">
                    <input type="text" id="ref_pago_mdl" maxlength="30" tabindex="12">
                </div>

                
            </div>

            <div class="fields">
                <div class="three wide field">
                    <label>Proveedor Servicio:</label>
                </div>
                <div class="five wide field">
                    <select id="taller_mdl" tabindex="5" validate="true"></select>
                </div>

                <div class="three wide field">
                    <label>Observaciones:</label>
                </div>
                <div class="five wide field">
                    <input type="text" id="observaciones_mdl" tabindex="13">
                </div>                

                
            </div>

            <div class="fields">
                <div class="three wide field">
                    <label>Kms. Prox. Mantenimiento:</label>
                </div>
                <div class="five wide field">
                    <input type="text" id="kms_prox_mantenimiento" class="number money" tabindex="7">
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
    <div class="header">ELIMINAR MANTENIMIENTO</div>
    <div class="content">
        <p>¿Esta seguro que desea eliminar este registro?</p>
    </div>
    <div class="actions">
        <div class="ui cancel basic red button">Regresar</div>
        <div class="ui green button" id="btn_delete">Aceptar</div>
    </div>
</div>