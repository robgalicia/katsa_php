<div class="ui tiny modal" id="modal_region">
    <i class="close icon"></i>
    <div class="header">
        Nuevo Registro
    </div>
    <div class="content">
        
        <div class="ui form" id="formRegion">
            <div class="fields">
                <div class="five wide field">
                    <label>Descripción Documento:</label>
                </div>
                <div class="eleven wide field">
                    <input type="text" id="doc_desc" tabindex="0" >
                </div>
            </div>
            <div class="fields">
                <div class="two wide field">
                    <label>Solicita Vigencia:</label>
                </div>
                <div class="three wide field">
                    <div class="ui slider checkbox">
                        <input type="radio" name="capVigencia" id="capVigencia_si">
                        <label>SI</label>
                    </div>
                </div>
                <div class="three wide field">
                    <div class="ui slider checkbox">
                        <input type="radio" name="capVigencia" id="capVigencia_no" checked="checked">
                        <label>NO</label>
                    </div>
                </div>
                <div class="two wide field">
                    <label>Obligatorio:</label>
                </div>
                <div class="three wide field">
                    <div class="ui slider checkbox">
                        <input type="radio" name="capObligatorio" id="capObligatorio_si">
                        <label>SI</label>
                    </div>
                </div>
                <div class="three wide field">
                    <div class="ui slider checkbox">
                        <input type="radio" name="capObligatorio" id="capObligatorio_no" checked="checked">
                        <label>NO</label>
                    </div>
                </div>
            </div>
        
            <div class="fields">
                <div class="two wide field">
                    <label>SNSP:</label>
                </div>
                <div class="three wide field">
                    <div class="ui slider checkbox">
                        <input type="radio" name="capSnsp" id="capSnsp_si">
                        <label>SI</label>
                    </div>
                </div>
                <div class="three wide field">
                    <div class="ui slider checkbox">
                        <input type="radio" name="capSnsp" id="capSnsp_no" checked="checked">
                        <label>NO</label>
                    </div>
                </div>

                <div class="two wide field">
                    <label>Obligatorio Cliente:</label>
                </div>
                <div class="three wide field">
                    <div class="ui slider checkbox">
                        <input type="radio" name="capCliente" id="capCliente_si">
                        <label>SI</label>
                    </div>
                </div>
                <div class="three wide field">
                    <div class="ui slider checkbox">
                        <input type="radio" name="capCliente" id="capCliente_no" checked="checked">
                        <label>NO</label>
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
    <div class="header">ELIMINAR REGIÓN</div>
    <div class="content">
        <p>¿Desea eliminar el registro seleccionado?</p>
    </div>
    <div class="actions">
        <div class="ui cancel basic red button">Regresar</div>
        <div class="ui green button" id="btn_delete">Aceptar</div>
    </div>
</div>