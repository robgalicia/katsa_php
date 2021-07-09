<div class="ui small modal" id="modal_editar">
    <i class="close icon"></i>
    <div class="header">
        Actualizar Registro
    </div>
    <div class="content">     
        <div class="ui form" id="formEditar">
                <div class="fields" id="panel_fechas">
                    <div class="eight wide field">
                        <label>Cantidad:</label>
                        <input type="text" id="cantidad_edit" value="0"/>
                    </div>
                    <div class="eight wide field">
                        <label>Fecha:</label>
                        <input type="date" id="mdl_fecha_edit"/>
                    </div>
                </div>           
        </div>
    </div>

    <div class="actions">
        <div class="ui deny basic red button">
            Regresar
        </div>
        <div class="ui positive button" onclick="edit_ajax();">
            Aceptar            
        </div>
    </div>
</div>