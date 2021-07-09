<div class="ui modal" id="modal_acta">
    <i class="close icon"></i>
    <div class="header">
        Nuevo Registro
    </div>
    <div class="content">
        
        <div class="ui form" id="formActas">

            <div class="fields">
                <div class="five wide field">
                    <label>Fecha:</label>
                </div>
                <div class="eleven wide field">
                    <input type="date" id="fecha_acta"tabindex="1">
                </div>
            </div>

            <div class="fields">
                <div class="five wide field">
                    <label>Número Acta:</label>
                </div>
                <div class="eleven wide field">
                    <input type="text" class="number" id="num_acta" validate="true" tabindex="2" maxlength="5">
                </div>
            </div>

            <div class="fields">
                <div class="five wide field">
                    <label>Tipo Acta:</label>
                </div>
                <div class="eleven wide field">
                    <select type="text" id="tipos" maxlength="50" tabindex="2">
                        <option value="I">Acta Inicial</option>
                        <option value="C">Acta de Conclusión</option>
                        <option value="S">Acta de Suspensión</option>
                        <option value="R">Acta de Reactivación</option>
                    </select>
                </div> 
            </div> 
            <div class="fields">
                <div class="five wide field">
                    <label>Observaciones:</label>
                </div>
                <div class="eleven wide field">
                    <input type="text" id="observaciones_acta" maxlength="200" tabindex="2">
                </div> 
            </div> 
        </div>

        <div class="actions">
            <div class="ui positive button" onclick="agregar_actas();" id="label_add">
                Agregar    
            </div>
        </div>
    
        <div class="sixteen wide column">
            <table class="ui table" id="tableActa">
                <thead>
                    <tr style="border-width:0 !important;">
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    <tr>
                        <th>Núm Acta</th>
                        <th>Fecha</th>
                        <th>Tipo Acta</th>
                        <th>Observaciones</th>
                        <th id="eliminar">Acciones</th>
                    </tr>
                </thead>
                <tbody id="tbodyV">
                    
                </tbody>
            </table>
        </div>
    </div>
</div>