<div class="ui modal" id="modal_tarjeta">
    <i class="close icon"></i>
    <div class="header">
        Nuevo Registro
    </div>
    <div class="content">
        
        <div class="ui form" id="formIncidenciasVehiculo">

            <div class="fields">
                <div class="five wide field">
                    <label>Vehículo:</label>
                </div>
                <div class="eleven wide field">
                    <input type="text" id="vehiculo_mdl" disabled>
                </div>
            </div>

            <div class="fields">
                <div class="five wide field">
                    <label>Fecha Incidencia:</label>
                </div>
                <div class="eleven wide field">
                    <input type="datetime-local" validate="true" id="fecha_incidencia_mdl">
                </div> 
            </div>   

            <div class="fields">
                <div class="five wide field">
                    <label>Tipo de Incidencia:</label>
                </div>
                <div class="eleven wide field">
                    <select id="tipo_incidencia_mdl" validate="true"></select>
                </div> 
            </div>                                                    

            <div class="fields">
                <div class="five wide field">
                    <label>Empleado Resguardo:</label>
                </div>
                <div class="eleven wide field">
                    <div class="ui fluid search selection dropdown" id="dpd_empleado">
                        <input type="hidden" name="empleado" id="empleado" validate="true">
                        <i class="dropdown icon"></i>
                        <div class="default text">Empleado</div>
                        <div class="menu" id="dpd_empleado_menu">
                        </div>
                    </div>
                </div> 
            </div> 
            <div class="fields">
                <div class="five wide field">
                    <label>Observaciones:</label>
                </div>
                <div class="eleven wide field">
                    <input id="observaciones_mdl">
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
    <div class="header">BORRAR INCIDENCIAS</div>
    <div class="content">
        <p>¿Esta seguro que desea borrar este registro?</p>
    </div>
    <div class="actions">
        <div class="ui cancel basic red button">Cancelar</div>
        <div class="ui green button" id="btn_delete">Aceptar</div>
    </div>
</div>