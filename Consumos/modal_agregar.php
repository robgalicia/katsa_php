<div class="ui large modal" id="modal_consumo">
    <i class="close icon"></i>
    <div class="header">
        Nuevo Registro
    </div>
    <div class="content">
        
        <div class="ui form" id="formConsumo">            

            <div class="fields">
                <div class="three wide field">
                    <label>Semana:</label>
                </div>
                <div class="five wide field">
                    <input type="text" class="number" validate="true" id="semana_mdl" tabindex="1" maxlength="2">
                </div>

                <div class="three wide field">
                    <label>Kilometraje al Cargar:</label>
                </div>
                <div class="five wide field">
                    <input type="text" class="number money" id="km_al_cargar_mdl" maxlength="14" tabindex="11">
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
                    <label>Nivel del Tanque Despues de Cargar:</label>
                </div>
                <div class="five wide field">
                    <input type="text" id="nivel_despues_cargar_mdl" tabindex="12" maxlength="10">
                </div>
            </div>

            <div class="fields">
                <div class="three wide field">
                    <label>Num. Tarjeta:</label>
                </div>
                <div class="five wide field">
                    <select id="tarjeta_mdl" tabindex="3"></select>
                </div>

                <div class="three wide field">
                    <label>Litros:</label>
                </div>
                <div class="five wide field">
                    <input type="text" class="number money" tabindex="13" validate="true" id="litros_mdl" maxlength="14">
                </div>
            </div>

            <div class="fields">
                <div class="three wide field">
                    <label>Vehiculo:</label>
                </div>
                <div class="five wide field">
                    <select id="vehiculo_mdl" validate="true" tabindex="4"></select>
                </div>

                <div class="three wide field">
                    <label>Tipo de Combustible:</label>
                </div>
                <div class="five wide field">
                    <select id="tipo_combustible_mdl" validate="true" tabindex="14"></select>
                </div>
            </div>

            <div class="fields">
                <div class="three wide field">
                    <label>Region:</label>
                </div>
                <div class="five wide field">
                    <select id="region_mdl" tabindex="5"></select>
                </div>

                <div class="three wide field">
                    <label>Precio por Litro:</label>
                </div>
                <div class="five wide field">
                    <input type="text" class="number money" validate="true" tabindex="15" id="precio_litro_mdl" maxlength="14">
                </div>
            </div>

            <div class="fields">
                <div class="three wide field">
                    <label>Adscripción:</label>
                </div>
                <div class="five wide field">
                    <select id="adscripcion_mdl" tabindex="6"></select>
                </div>

                <div class="three wide field">
                    <label>Precio Total:</label>
                </div>
                <div class="five wide field">
                    <input type="text" class="number money" tabindex="16" validate="true" id="precio_total_mdl" maxlength="14" disabled>
                </div>
            </div>

            <div class="fields">
                <div class="three wide field">
                    <label>Cliente:</label>
                </div>
                <div class="five wide field">
                    <select id="cliente_mdl" tabindex="7"></select>
                </div>

                <div class="three wide field">
                    <label>Kilómetros Recorridos:</label>
                </div>
                <div class="five wide field">
                    <input type="text" class="number money" tabindex="17" id="km_recorridos_mdl" maxlength="14">
                </div>
                
            </div>

            <div class="fields">
                <div class="three wide field">
                    <label>Empleado:</label>
                </div>
                <div class="five wide field">
                    <select id="empleado_mdl" tabindex="8"></select>
                </div>

                <div class="three wide field">
                    <label>Rendimiento por Litro:</label>
                </div>
                <div class="five wide field">
                    <input type="text" class="number money" tabindex="18" id="rendimiento_litro_mdl" maxlength="14">
                </div>
            </div>

            <div class="fields">
                <div class="three wide field">
                    <label>kilometraje Carga Anterior:</label>
                </div>
                <div class="five wide field">
                    <input type="text" class="number money" tabindex="9" id="km_carga_antes_mdl" maxlength="14">
                </div>

                <div class="three wide field">
                    <label>Observaciones:</label>
                </div>
                <div class="five wide field">
                    <input type="text" id="Observaciones_mdl" tabindex="19" maxlength="100">
                </div>
            </div>
            
            <div class="fields">
                <div class="three wide field">
                    <label>Nivel del Tanque Antes de Cargar:</label>
                </div>
                <div class="five wide field">
                    <input type="text" tabindex="10" id="nivel_antes_cargar_mdl" maxlength="10">
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
    <div class="header">BORRAR CONSUMO</div>
    <div class="content">
        <p>¿Esta seguro que desea borrar este registro?</p>
    </div>
    <div class="actions">
        <div class="ui cancel basic red button">Cancelar</div>
        <div class="ui green button" id="btn_delete">Aceptar</div>
    </div>
</div>