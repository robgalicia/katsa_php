<div class="ui small modal" id="modal_agregar">
    <i class="close icon"></i>
    <div class="header">
        Nuevo Registro
    </div>
    <div class="content">
        
        <div class="ui form" id="formAgregar">
            
            <div class="fields">
                <div class="four wide field">
                    <label>Categoría:</label>
                </div>
                <div class="ten wide field">
                    <input type="text" id="categoria_mdl" tabindex="1" maxlength="50" disabled>
                </div>
            </div>
            <div class="fields">
                <div class="four wide field">
                    <label>Entregable:</label>
                </div>
                <div class="ten wide field">
                    <input type="text" id="entregable" tabindex="1" maxlength="50">
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


<div class="ui mini modal" id="modal_puesto">
        <i class="close icon"></i>
        <div class="header">
            Puestos
        </div>
        <div class="content">
            <table class="ui selectable celled definition table">
                <thead>
                    <th></th>
                    <th>Paginas</th>
                </thead>
                <tbody id="bodyPag"></tbody>
            </table>
        </div>
        <div class="actions">
            <a class="ui blue left labeled icon cancel button" id="btn_cancelar_dep">
                <i class="reply icon"></i>
                Aceptar
            </a>        
        </div>
    </div>

<div class="ui mini modal" id="modal_borrar">
    <div class="header">ELIMINAR REGIÓN</div>
    <div class="content">
        <p>¿Desea eliminar el registro seleccionado?</p>
    </div>
    <div class="actions">
        <div class="ui cancel basic red button">Regresar</div>
        <div class="ui green button" id="btn_delete">Aceptar</div>
    </div>
</div>