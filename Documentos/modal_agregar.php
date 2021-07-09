<style>
.dropzoneBorder {
    background: white;
    border-radius: 5px;
    border: 2px dashed rgb(0, 135, 247);
    border-image: none;
    max-width: 500px;
    margin-left: auto;
    margin-right: auto;
}
</style>

<div class="ui large modal" id="modal_documento">
    <i class="close icon"></i>
    <div class="header">
        Nuevo Documento
    </div>
    <div class="content">
        
        <div class="ui form" id="formDocumento">
        <div class="fields">
            <div class="three wide field">
                    <label>Empleado:</label>
                </div>
                <div class="five wide field">
                    <input type="text" id="empleado" maxlength="50" tabindex="1" disabled>                    
                </div>

                <div class="three wide field">
                    <label>Fecha Emisión:</label>
                </div>
                <div class="five wide field">
                    <input type="date" id="emision" maxlength="50" tabindex="6">
                </div>

            </div>

            <div class="fields">

                <div class="three wide field">
                    <label>Tipo Documento:</label>
                </div>
                <div class="five wide field">
                    <select id="tipoDoc" validate="true" tabindex="2" disabled></select>
                </div>    

                <div class="three wide field">
                    <label>Inicio Vigencia:</label>
                </div>
                <div class="five wide field">
                    <input type="date" id="vigenciaIni" maxlength="50" tabindex="7">
                </div>
                
            </div>

            <div class="fields">
                <div class="three wide field">
                    <label>Es Original:</label>
                </div>
                <div class="two wide field">
                    <div class="ui slider checkbox">
                        <input type="radio" name="original" id="original_si" tabindex="3">
                        <label>SI</label>
                    </div>
                </div>
                <div class="two wide field">
                    <div class="ui slider checkbox">
                        <input type="radio" name="original" id="original_no" checked="checked" tabindex="4">
                        <label>NO</label>
                    </div>
                </div>
                <div class="one wide field">                        
                </div>

                <div class="three wide field">
                    <label>Final Vigencia:</label>
                </div>
                <div class="five wide field">
                    <input type="date" id="vigenciaFin" maxlength="50" tabindex="8">
                </div>

                    
            </div>

            <div class="fields">
                <div class="three wide field">
                    <label>Num. Folio:</label>
                </div>
                <div class="five wide field">
                    <input type="text" id="folio" maxlength="20" tabindex="5">
                </div>

                <div class="eight wide field">
                    <div id="dropzone" class="ui placeholder segment">
                        <div class='dz-default dz-message'>
                            <div class="ui icon center aligned header">
                                <i class="file alternate outline icon"></i>
                                <div class="content">
                                    Arrastre los archivos hasta aqui
                                    <div class="sub header">o de clic en cualquier parte</div>
                                </div>
                            </div>                
                        </div>                
                    </div>
                    <a class="ui gray label" target="_blank" href="" id="name_label"></a>
                </div>

            </div>
            <!--<div class="fields">
                <div class="three wide field">
                    <label>Empleado:</label>
                </div>
                <div class="five wide field">
                    <input type="text" id="empleado" maxlength="50" tabindex="1" disabled>                    
                </div>

                <div class="three wide field">
                    <label>Tipo Documento:</label>
                </div>
                <div class="five wide field">
                    <select id="tipoDoc" validate="true" tabindex="6"></select>
                </div>
            </div>

            <div class="fields">
                <div class="three wide field">
                        <label>Es Original:</label>
                    </div>
                    <div class="two wide field">
                        <div class="ui slider checkbox">
                            <input type="radio" name="original" id="original_si">
                            <label>SI</label>
                        </div>
                    </div>
                    <div class="two wide field">
                        <div class="ui slider checkbox">
                            <input type="radio" name="original" id="original_no" checked="checked">
                            <label>NO</label>
                        </div>
                    </div>
                    <div class="one wide field">                        
                    </div>

                <div class="three wide field">
                    <label>Num. Folio:</label>
                </div>
                <div class="five wide field">
                    <input type="text" id="folio" class="number" maxlength="20" tabindex="7">
                </div>
            </div>

            <div class="fields">
                <div class="three wide field">
                    <label>Fecha Emisión:</label>
                </div>
                <div class="five wide field">
                    <input type="date" id="emision" maxlength="50" tabindex="3">
                </div>

                <div class="three wide field">
                    <label>Inicio Vigencia:</label>
                </div>
                <div class="five wide field">
                    <input type="date" id="vigenciaIni" maxlength="50" tabindex="8">
                </div>
            </div>

            <div class="fields">
                <div class="three wide field">
                    <label>Final Vigencia:</label>
                </div>
                <div class="five wide field">
                    <input type="date" id="vigenciaFin" maxlength="50" tabindex="4">
                </div>

                <div class="eight wide field">
                    <div id="dropzone" class="ui placeholder segment">
                        <div class='dz-default dz-message'>
                            <div class="ui icon center aligned header">
                                <i class="file alternate outline icon"></i>
                                <div class="content">
                                    Arrastre los archivos hasta aqui
                                    <div class="sub header">o de clic en cualquier parte</div>
                                </div>
                            </div>                
                        </div>                
                    </div>
                </div>                
            </div>-->

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
    <div class="header">AVISO</div>
    <div class="content">
        <p>¿Desea Eliminar el registro seleccionado?</p>
    </div>
    <div class="actions">
        <div class="ui cancel basic red button">Cancelar</div>
        <div class="ui green button" id="btn_delete">Aceptar</div>
    </div>
</div>