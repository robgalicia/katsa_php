<div class="ui large modal" id="modal_contratos">
    <i class="close icon"></i>
    <div class="header">
        Nuevo Contrato
    </div>
    <div class="content">
        
        <div class="ui form" id="formContratos">

            <div class="fields">
                <div class="three wide field">
                    <label>Empleado:</label>
                </div>
                <div class="five wide field">
                    <input type="text" id="empleado_mdl" disabled>
                </div>

                <div class="three wide field">
                    <label>Fecha Inicial:</label>
                </div>
                <div class="five wide field">
                    <input type="date" id="fecha_inicial_mdl" validate="true" maxlength="50" tabindex="4">
                </div>
            </div>

            <div class="fields">
                <div class="three wide field">
                    <label>Fecha Ingreso:</label>
                </div>
                <div class="five wide field">
                    <input type="date" id="fecha_ingreso_mdl" maxlength="50" tabindex="1" disabled>
                </div>

                <div class="three wide field">
                    <label>Fecha Final:</label>
                </div>
                <div class="five wide field">
                    <input type="date" id="fecha_final_mdl" maxlength="50" tabindex="5">
                </div>
            </div>

            <div class="fields">
                <div class="three wide field">
                    <label>Fecha Contrato:</label>
                </div>
                <div class="five wide field">
                    <input type="date" id="fecha_contrato_mdl" validate="true" maxlength="50" tabindex="2">
                </div>

                <div class="three wide field">
                    <label>Esquema de Pago:</label>
                </div>
                <div class="five wide field">
                    <select id="esquema_pago_mdl" validate="true">
                        <option value="Q">Quincenal</option>
                        <option value="M">Mensual</option>                        
                    </select>
                </div>                
                
            </div>

            <div class="fields">
                <div class="three wide field">
                    <label>Dias Contrato:</label>
                </div>
                <div class="five wide field">
                    <input type="text" id="dias_contrato_mdl" validate="true" class="number money" maxlength="10" tabindex="3">
                </div>

                <div class="three wide field">
                    <label>Sueldo Diario Integrado:</label>
                </div>
                <div class="five wide field">
                    <input type="text" id="sueldo_contrato_mdl" validate="true" class="number money" maxlength="10" tabindex="6">
                </div>
                
            </div>

            <div class="fields">
                <div class="three wide field">
                    <label>Tipo Periodo:</label>
                </div>
                <div class="five wide field">
                    <select id="tipo_periodo_mdl" validate="true">
                        <option value="D">Dias</option>
                        <option value="S">Semanas</option>
                        <option value="M">Meses</option>
                        <option value="A">Años</option>
                        <option value="I">Indeterminado</option>
                    </select>
                </div>

                <div class="three wide field">
                    <label>Sueldo Neto Mensual:</label>
                </div>
                <div class="five wide field">
                    <input type="text" id="sueldo_neto_mdl" validate="true" class="number money" maxlength="10" tabindex="6">
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
    <div class="header">AVISO</div>
    <div class="content">
        <p>¿Desea Eliminar el registro seleccionado?</p>
    </div>
    <div class="actions">
        <div class="ui cancel basic red button">Cancelar</div>
        <div class="ui green button" id="btn_delete">Aceptar</div>
    </div>
</div>