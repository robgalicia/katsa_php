<div class="ui modal" id="modal_solicitud">
    <i class="close icon"></i>
    <div class="header">
        Nuevo Registro
    </div>
    <div class="content">
        
        <div class="ui form" id="formSolicitud">

            <div class="fields">
                <div class="five wide field">
                    <label>Folio Servicio:</label>
                </div>
                <div class="eleven wide field">
                    <input type="text" id="folio" class="number" maxlength="8">
                </div>
            </div>

            <div class="fields">
                <div class="five wide field">
                    <label>Fecha Servicio:</label>
                </div>
                <div class="eleven wide field">
                    <input type="date" id="fecha_servicio" validate="true">
                </div>
            </div>

            <div class="fields">
                <div class="five wide field">
                    <label>Solicitante:</label>
                </div>
                <div class="eleven wide field">
                    <input type="text" id="solicitante" maxlength="50">
                </div> 
            </div>                                                    

            <div class="fields">
                <div class="five wide field">
                    <label>Empresa:</label>
                </div>
                <div class="eleven wide field">
                    <input type="text" id="empresa" maxlength="50">
                </div> 
            </div> 
            
            <div class="fields">
                <div class="five wide field">
                    <label>Tipo de Servicio:</label>
                </div>
                <div class="eleven wide field">
                    <select id="tipo_servicio" validate="true">
                        <option value="P">Personal</option>
                        <option value="M">Material</option>
                    </select>
                </div> 
            </div> 

            <div class="fields">
                <div class="five wide field">
                    <label>Ruta de traslado:</label>
                </div>
                <div class="eleven wide field">
                    <select id="ruta_traslado" validate="true"></select>
                </div> 
            </div> 

            <div class="fields">
                <div class="six wide field">
                    <label>Traslado:</label>
                </div>
                <div class="two wide field">
                    <div class="ui slider checkbox">
                        <input type="radio" name="capTraslado" id="capTraslado_si">
                        <label>SI</label>
                    </div>
                </div>
                <div class="teo wide field">
                    <div class="ui slider checkbox">
                        <input type="radio" name="capTraslado" id="capTraslado_no" checked="checked">
                        <label>NO</label>
                    </div>
                </div>
            </div>
            <div class="fields">
                <div class="six wide field">
                    <label>Cordillera:</label>
                </div>
                <div class="two wide field">
                    <div class="ui slider checkbox">
                        <input type="radio" name="capCordillera" id="capCordillera_si">
                        <label>SI</label>
                    </div>
                </div>
                <div class="two wide field">
                    <div class="ui slider checkbox">
                        <input type="radio" name="capCordillera" id="capCordillera_no" checked="checked">
                        <label>NO</label>
                    </div>
                </div>
            </div>
            <div class="fields">
                <div class="six wide field">
                    <label>Avanzada:</label>
                </div>
                <div class="two wide field">
                    <div class="ui slider checkbox">
                        <input type="radio" name="capAvanzada" id="capAvanzada_si">
                        <label>SI</label>
                    </div>
                </div>
                <div class="two wide field">
                    <div class="ui slider checkbox">
                        <input type="radio" name="capAvanzada" id="capAvanzada_no" checked="checked">
                        <label>NO</label>
                    </div>
                </div>
            </div>

            <div class="fields">
                <div class="five wide field">
                    <label>Observaciones:</label>
                </div>
                <div class="eleven wide field">
                    <input type="text" id="observaciones" maxlength="500">
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
    <div class="header">BORRAR TRASLADO</div>
    <div class="content">
        <p>¿Esta seguro que desea borrar este registro?</p>
    </div>
    <div class="actions">
        <div class="ui cancel basic red button">Cancelar</div>
        <div class="ui green button" id="btn_delete">Aceptar</div>
    </div>
</div>