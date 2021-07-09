<div class="ui large modal" id="modal_adscripcion">
    <i class="close icon"></i>
    <div class="header">
        Nueva Adscripción
    </div>
    <div class="content">
        
        <div class="ui form" id="formAdscripcion">

            <div class="fields">
                <div class="three wide field">
                    <label>Empleado:</label>
                </div>
                <div class="five wide field">
                    <input type="text" id="empleado_mdl" disabled>
                </div>

                <div class="three wide field">
                    <label>Cliente:</label>
                </div>
                <div class="five wide field">
                    <select id="cliente_mdl" tabindex="4"></select>
                </div>
            </div>

            <div class="fields">
                <div class="three wide field">
                    <label>Fecha Adscripción:</label>
                </div>
                <div class="five wide field">
                    <input type="date" id="fecha_ads_mdl" validate="true" maxlength="50" tabindex="1">
                </div>

                <div class="three wide field">
                    <label>Puesto:</label>
                </div>
                <div class="five wide field">
                    <select id="puesto_mdl" tabindex="5"></select>
                </div>
            </div>

            <div class="fields">
                <div class="three wide field">
                    <label>Region:</label>
                </div>
                <div class="five wide field">
                    <select id="region_mdl" tabindex="2"></select>
                </div>

                <div class="three wide field">
                    <label>Empleado Autoriza:</label>
                </div>
                <div class="five wide field">
                    <div class="ui fluid search selection dropdown" id="dpd_empleado_autoriza_mdl" tabindex="6">
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
                    <label>Lugar de Adscripción:</label>
                </div>
                <div class="five wide field">
                    <select id="lugarAds_mdl" tabindex="3" validate="true"></select>                    
                </div>

                <div class="three wide field">
                    <label>Observaciones:</label>
                </div>
                <div class="five wide field">
                    <input type="text" id="obs_ads_mdl" maxlength="100" tabindex="7">
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