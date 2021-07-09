<div class="ui medium modal" id="modal_agregar">
    <i class="close icon"></i>
    <div class="header">
        Nuevo Registro
    </div>
    <div class="content">
        
        <div class="ui form" id="formAgregar">
        <div class="ui form">
                <div class="fields">
                    <div class="eight wide field" id="Div1">
                        <label>Entregable:</label>
                        <input type="text" id="mdl_entregable" disabled/>
                    </div>
                    <div class="eight wide field">
                        
                    </div>
                </div>

                <div class="fields" id="panel_fechas">
                    <div class="four wide field">
                        <label>Cantidad:</label>
                        <input type="text" id="cantidad" value="0"/>
                    </div>
                    <div class="four wide field">
                        <label>Fecha Inicial:</label>
                        <input type="date" id="mdl_fecha"/>
                    </div>
                    <div class="four wide field">
                        <label>Fecha Final:</label>
                        <input type="date" id="mdl_fechafin"/>
                    </div>
                    <div class="two wide field">
                        <label>&nbsp;</label>                    
                        <div class="ui radio checkbox">
                            <input type="radio" name="gpoTipoEvento" id="rbTipoEvento1" checked="checked">
                            <label>Evento Único</label>
                        </div>
                    </div>
                    <div class="two wide field">   
                        <label>&nbsp;</label>                 
                        <div class="ui radio checkbox">
                            <input type="radio" name="gpoTipoEvento" id="rbTipoEvento2">
                            <label>Repetir Evento</label>
                        </div>
                    </div>
                </div>
                                
                <div class="sixteen wide field" id="panel_repetir_evento_todos">
                    <label>Repetir Evento</label>
                    <div class="ui radio checkbox">
                        <input type="radio" name="gpoRepetirEvento" id="rbRepetirEvento1" checked="checked">
                        <label>Todos los días del año</label>
                    </div>
                </div>
                <div class="sixteen wide field" id="panel_repetir_evento_laborable">
                    <div class="ui radio checkbox">
                        <input type="radio" name="gpoRepetirEvento" id="rbRepetirEvento2">
                        <label>Cada día laborable (lunes a viernes)</label>
                    </div>
                </div>

                <div class="fields" id="panel_cada_semana">
                    <div class="three wide field">
                        <div class="ui radio checkbox">
                            <input type="radio" name="gpoRepetirEvento" id="rbRepetirEvento3">
                            <label>Cada semana</label>
                        </div>
                    </div>
                    <div class="two wide field">
                        <div class="ui checkbox">
                            <input type="checkbox" id="chkDomingo">
                            <label>Domingo</label>
                        </div>              
                    </div>
                    <div class="two wide field">
                        <div class="ui checkbox">
                            <input type="checkbox" id="chkLunes">
                            <label>Lunes</label>
                        </div>              
                    </div>
                    <div class="two wide field">
                        <div class="ui checkbox">
                            <input type="checkbox" id="chkMartes">
                            <label>Martes</label>
                        </div>              
                    </div>
                    <div class="two wide field">
                        <div class="ui checkbox">
                            <input type="checkbox" id="chkMiercoles">
                            <label>Miércoles</label>
                        </div>              
                    </div>
                    <div class="two wide field">
                        <div class="ui checkbox">
                            <input type="checkbox" id="chkJueves">
                            <label>Jueves</label>
                        </div>              
                    </div>
                    <div class="two wide field">
                        <div class="ui checkbox">
                            <input type="checkbox" id="chkViernes">
                            <label>Viernes</label>
                        </div>              
                    </div>
                    <div class="two wide field">
                        <div class="ui checkbox">
                            <input type="checkbox" id="chkSabado">
                            <label>Sábado</label>
                        </div>              
                    </div>
                </div>

                <div class="fields" id="panel_cada_mes">
                    <div class="three wide field">
                        <div class="ui radio checkbox">
                            <input type="radio" name="gpoRepetirEvento" id="rbRepetirEvento4">
                            <label>Cada mes</label>
                        </div>
                    </div>
                    <div class="four wide field">
                        <div class="ui radio checkbox">
                            <input type="radio" name="gpoCadaMes" id="rbCadaMes1" checked="checked">
                            <label>a) Mismo día del mes (fecha)</label>
                        </div>
                    </div>
                    <div class="six wide field">
                        <div class="ui radio checkbox">
                            <input type="radio" name="gpoCadaMes" id="rbCadaMes2">
                            <label>b) Cada primer día (dom,lun,etc.) del mes</label>
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
    <div class="header">ELIMINAR ENTREGABLE</div>
    <div class="content">
        <p>¿Desea eliminar el registro seleccionado?</p>
    </div>
    <div class="actions">
        <div class="ui cancel basic red button">Regresar</div>
        <div class="ui green button" id="btn_delete">Aceptar</div>
    </div>
</div>