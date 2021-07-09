<div class="ui large modal" id="modal_editar">
    <i class="close icon"></i>
    <div class="header">
        Registrar Cumplimiento
    </div>
    <div class="content">     
        <div class="ui form" id="formEditar">
                <div class="fields" id="panel_fechas">
                    <div class="eight wide field">
                        <label>Cantidad:</label>
                        <input type="text" id="cantidad_edit" validate="true" maxlength="5" class="number" tabindex="1" validate="true">
                    </div>
                    <div class="eight wide field">
                        <label>Fecha Cumplimiento:</label>
                        <input type="date" id="mdl_fecha_edit" validate="true" tabindex="1" />
                    </div>
                </div>  
                <div class="fields" id="panel_fechas">
                    <div class="ten wide field">
                        <label>Observaciones:</label>
                        <input type="text" id="observaciones" value="0" maxlength="100" tabindex="1" />
                    </div>
                    <div class="ten wide field">
                        <label>Agregar:</label>
                        <button class="ui blue basic icon button" onclick='llenar_tabla_ajaxCumplimiento();' tabindex="1" >
                            <i class="plus icon"></i>
                        </bu tton>
                    </div>   
                </div>          
        </div>
    </div>

    <table class="ui table">
        <thead>
            <tr>
                <th>Fecha</th>        
                <th>Cantidad</th>
                <th>Observaciones</th>       
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody id="tbodyCumplimiento">
            
        </tbody>
    </table>

    <div class="actions">
        <div class="ui deny basic red button">
            Regresar
        </div>
    </div>
</div>

<div class="ui mini modal" id="modal_borrar">
    <div class="header">ELIMINAR ENTREGABLE</div>
    <div class="content">
        <p>¿Desea eliminar el registro seleccionado?</p>
    </div>
    <div class="actions">
        <div class="ui cancel basic red button">Regresar</div>
        <div class="ui green button" id="btn_delete">Aceptar</div>
    </div>
</div>