<div class="ui modal" id="modal_ingeniero">
    <i class="close icon"></i>
    <div class="header">
        Nuevo Registro
    </div>
    <div class="content">
        
        <div class="ui form" id="formIngeniero">            

            <div class="fields">
                <div class="six wide field">
                    <label>Cliente:</label>
                </div>
                <div class="ten wide field">
                    <input type="text" id="cliente_mdl" tabindex="1" disabled>
                </div>                
            </div>

            <div class="fields">
                <div class="six wide field">
                    <label>Nombre:</label>
                </div>
                <div class="ten wide field">
                    <input type="text" id="nombre_mdl" tabindex="2" maxlength="50">
                </div>                
            </div>

            <div class="fields">
                <div class="six wide field">
                    <label>Sub Contrata:</label>
                </div>
                <div class="ten wide field">
                    <select id="subcontrata_mdl" tabindex="3">                        
                    </select>
                </div>
            </div>

            <div class="fields">
                <div class="six wide field">
                    <label>Activo:</label>
                </div>
                <div class="ten wide field">
                    <div class="ui form">
                        <div class="inline fields">

                            <div class="field">
                                <div class="ui radio checkbox">
                                    <input type="radio" name="activo" checked="checked" id="activo_si">
                                    <label>SI</label>
                                </div>
                            </div>

                            <div class="field">
                                <div class="ui radio checkbox">
                                    <input type="radio" name="activo" id="activo_no">
                                    <label>NO</label>
                                </div>
                            </div>

                        </div>
                    </div>
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
    <div class="header">ELIMINAR INGENIERO</div>
    <div class="content">
        <p>¿Desea eliminar este registro?</p>
    </div>
    <div class="actions">
        <div class="ui cancel basic red button">Regresar</div>
        <div class="ui green button" id="btn_delete">Aceptar</div>
    </div>
</div>