<div class="ui tiny modal" id="modal_adscripcion">
    <i class="close icon"></i>
    <div class="header">
        Nueva Adscripcion
    </div>
    <div class="content">
        
        <div class="ui form" id="formAdscripcion">

            <div class="fields">
                <div class="five wide field">
                    <label>Descripción:</label>
                </div>
                <div class="eleven wide field">
                    <input type="text" id="descripcion_mdl" validate="true">
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
    <div class="header"> AVISO </div>
    <div class="content">
        <p>¿Desea Eliminar el registro seleccionado?</p>
    </div>
    <div class="actions">
        <div class="ui cancel basic red button">Cancelar</div>
        <div class="ui green button" id="btn_delete" onclick="eliminar_ajax()";>Aceptar</div>
    </div>
</div>