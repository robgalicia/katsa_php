<div class="ui large modal" id="modal_agregar">
    <i class="close icon"></i>
    <div class="header">
        Nuevo Registro
    </div>
    <div class="content">
        
        <div class="ui form" id="formAgregar">
            
            <div class="fields">
                <div class="two wide field">
                    <label>Región:</label>
                </div>
                <div class="six wide field">
                    <select id="region" tabindex="1"></select>
                </div>

                <div class="two wide field">
                    <label>Empleado Revisa:</label>
                </div>
                <div class="six wide field">
                    <select id="empleado_revisa" tabindex="4"></select>
                </div>
            </div>

            <div class="fields">
                <div class="two wide field">
                    <label>Departamento:</label>
                </div>
                <div class="six wide field">
                    <select id="departamento" tabindex="2"></select>
                </div>
                <div class="two wide field">
                    <label>Empleado Autoriza:</label>
                </div>
                <div class="six wide field">
                    <select id="empleado_autoriza" tabindex="5"></select>
                </div>
                
            </div>

            <div class="fields">
                <div class="two wide field">
                    <label>Tipo de Solicitud:</label>
                </div>
                <div class="six wide field">
                    <select id="tipo_solicitud" tabindex="3">
                        <option value="R" selected>REQUISICIÓN</option>
                        <option value="G">GASTOS POR COMPROBAR (VIATICOS) </option>
                    </select>
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
    <div class="header">ELIMINAR REGISTRO</div>
    <div class="content">
        <p>¿Desea eliminar el registro seleccionado?</p>
    </div>
    <div class="actions">
        <div class="ui cancel basic red button">Regresar</div>
        <div class="ui green button" id="btn_delete">Aceptar</div>
    </div>
</div>