<div class="ui large modal" id="modal_incidencias">
    <i class="close icon"></i>
    <div class="header">
        Nueva Incidencia
    </div>
    <div class="content">
        
        <div class="ui form" id="formIncidencias">

            <div class="fields">
                <div class="three wide field">
                    <label>Empleado:</label>
                </div>
                <div class="five wide field">
                    <input type="text" id="empleado_mdl" disabled>
                </div>

                <div class="three wide field">
                    <label>Empleado Autoriza:</label>
                </div>
                <div class="five wide field">
                    <div class="ui fluid search selection dropdown" id="dpd_empleado_autoriza_mdl">
                        <input type="hidden" name="empleado_autoriza_mdl" id="empleado_autoriza_mdl" validate="true">
                        <i class="dropdown icon"></i>
                        <div class="default text">Empleado Autoriza</div>
                        <div class="menu" id="dpd_empleado_autoriza_mdl_menu">
                        </div>
                    </div>
                </div>
            </div>

            <div class="fields">
                <div class="three wide field">
                    <label>Fecha Incidencia:</label>
                </div>
                <div class="five wide field">
                    <input type="date" id="fecha_inc_mdl" validate="true" maxlength="50" tabindex="2">
                </div>

                <div class="three wide field">
                    <label>Observaciones:</label>
                </div>
                <div class="five wide field">
                    <input type="text" id="obs_ads_mdl" maxlength="100" tabindex="8">
                </div>
            </div>

            <div class="fields">
                <div class="three wide field">
                    <label>Tipo Incidencia:</label>
                </div>
                <div class="five wide field">
                    <select id="tipo_inc_mdl" validate="true" tabindex="6"></select>
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
    <div class="header">BORRAR INCIDENCIA</div>
    <div class="content">
        <p>¿Esta seguro que desea borrar este registro?</p>
    </div>
    <div class="actions">
        <div class="ui cancel basic red button">Cancelar</div>
        <div class="ui green button" id="btn_delete">Aceptar</div>
    </div>
</div>