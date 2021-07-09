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

<div class="ui large modal" id="modal_resguardo">
    <i class="close icon"></i>
    <div class="header">
        Nuevo Registro
    </div>
    <div class="content">
        
        <div class="ui form" id="formResguardo">            

            <div class="fields">
                <div class="three wide field">
                    <label>Vehículo:</label>
                </div>
                <div class="five wide field">
                    <input type="text" id="vehiculo_mdl" tabindex="1" disabled>
                </div>

                <div class="three wide field">
                    <label>Lugar de Adscripción:</label>
                </div>
                <div class="five wide field">
                    <select id="adscripcion_mdl" validate="true" tabindex="8"></select>
                </div>
            </div>

            <div class="fields">
                <div class="three wide field">
                    <label>Placas:</label>
                </div>
                <div class="five wide field">
                    <input type="text" id="placas_mdl" disabled tabindex="2">
                </div>

                <div class="three wide field">
                    <label>Cliente:</label>
                </div>
                <div class="five wide field">
                    <select id="cliente_mdl" validate="true" tabindex="9"></select>
                </div>
            </div>

            <div class="fields">
                <div class="three wide field">
                    <label>Fecha Resguardo:</label>
                </div>
                <div class="five wide field">
                    <input type="datetime-local" id="fecha_res_mdl" tabindex="3" validate="true">
                </div>

                <div class="three wide field">
                    <label>Kms. Ultimo Servicio:</label>
                </div>
                <div class="five wide field">
                    <input type="text" id="kms_ult_serv_mdl" tabindex="10" class="number money">
                </div>
            </div>

            <div class="fields">
                <div class="three wide field">
                    <label>Tipo Resguardo:</label>
                </div>
                <div class="five wide field">
                    <select id="tipo_res_mdl" validate="true" tabindex="4">
                        <option value="I">INICIAL</option>
                        <option value="S">SUPERVISIÓN</option>
                        <option value="C">CAMBIO TEMPORAL</option>                        
                    </select>
                </div>

                <div class="three wide field">
                    <label>Fecha Último Servicio:</label>
                </div>
                <div class="five wide field">
                    <input type="date" id="fecha_ult_serv_mdl" tabindex="11">
                </div>
            </div>

            <div class="fields">
                <div class="three wide field">
                    <label>Empleado Responsable:</label>
                </div>
                <div class="five wide field">
                    <select id="empleado_resp_mdl" validate="true" tabindex="5"></select>
                </div>

                <div class="three wide field">
                    <label>Kilometraje Actual:</label>
                </div>
                <div class="five wide field">
                    <input type="text" id="km_actual_mdl" validate="true" tabindex="12" class="number money">
                </div>
            </div>

            <div class="fields">
                <div class="three wide field">
                    <label>Empleado Supervisor:</label>
                </div>
                <div class="five wide field">
                    <select id="empleado_supervisor_mdl" validate="true" tabindex="6"></select>
                </div>

                <div class="three wide field">
                    <label>Kms. Próximo Servicio:</label>
                </div>
                <div class="five wide field">
                    <input type="text" id="km_prox_serv_mdl" tabindex="13" class="number money">
                </div>
            </div>

            <div class="fields">
                <div class="three wide field">
                    <label>Región:</label>
                </div>
                <div class="five wide field">
                    <select id="region_mdl" validate="true" tabindex="7"></select>
                </div>

                <div class="three wide field">
                    <label>Observaciones:</label>
                </div>
                <div class="five wide field">
                    <input type="text" id="obs_mdl" maxlength="100" tabindex="14">
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
    <div class="header">ELIMINAR RESGUARDO</div>
    <div class="content">
        <p>¿Desea eliminar este registro?</p>
    </div>
    <div class="actions">
        <div class="ui cancel basic red button">Regresar</div>
        <div class="ui green button" id="btn_delete">Aceptar</div>
    </div>
</div>