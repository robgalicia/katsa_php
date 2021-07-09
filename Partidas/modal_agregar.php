<div class="ui modal" id="modal_partida">
    <i class="close icon"></i>
    <div class="header">
        Nuevo Registro
    </div>
    <div class="content">
        
        <div class="ui form" id="formPartida">

            <div class="fields">
                <div class="five wide field">
                    <label>Clave:</label>
                </div>
                <div class="eleven wide field">
                    <input type="text" id="num_partida_mdl" class="number" disabled>
                </div>
            </div>

            <div class="fields">
                <div class="five wide field">
                    <label>Descripción Partida:</label>
                </div>
                <div class="eleven wide field">
                    <input type="text" id="descpartida_mdl" tabindex="1">
                </div>
            </div>

            <div class="fields">
                <div class="five wide field">
                    <label>Cuenta Contable:</label>
                </div>
                <div class="eleven wide field">
                    <input type="text" id="cuenta_contable_mdl" tabindex="2">
                </div> 
            </div>                                                    

            <div class="fields">
                <div class="five wide field">
                    <label>Tipo Partida:</label>
                </div>
                <div class="eleven wide field">
                    <select id="tipo_partida_mdl" tabindex="3">
                        <option value="G">GASTOS</option>
                        <option value="C">COSTOS</option>
                        <option value="I">INVERSIONES</option>
                    </select>  
                </div> 
            </div>   
            <div class="fields">
                <div class="two wide field">
                    <label>Viaticos:</label>
                </div>
                <div class="three wide field">
                    <div class="ui slider checkbox">
                        <input type="radio" name="capviaticos" id="capviaticos_si">
                        <label>SI</label>
                    </div>
                </div>
                <div class="three wide field">
                    <div class="ui slider checkbox">
                        <input type="radio" name="capviaticos" id="capviaticos_no" checked="checked">
                        <label>NO</label>
                    </div>
                </div>
            </div>

            <div class="fields">
                <div class="five wide field">
                    <label>Importe unitario:</label>
                </div>
                <div class="eleven wide field">
                    <input type="number" id="importe_unitario" tabindex="5">
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
    <div class="header">BORRAR TARJETAS</div>
    <div class="content">
        <p>¿Esta seguro que desea borrar este registro?</p>
    </div>
    <div class="actions">
        <div class="ui cancel basic red button">Cancelar</div>
        <div class="ui green button" id="btn_delete">Aceptar</div>
    </div>
</div>