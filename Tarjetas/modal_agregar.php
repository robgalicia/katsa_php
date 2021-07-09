<div class="ui modal" id="modal_tarjeta">
    <i class="close icon"></i>
    <div class="header">
        Nuevo Registro
    </div>
    <div class="content">
        
        <div class="ui form" id="formTarjeta">

            <div class="fields">
                <div class="five wide field">
                    <label>Número de Tarjeta:</label>
                </div>
                <div class="eleven wide field">
                    <input type="text" id="num_tarjeta_mdl" class="number" validate="true" maxlength="8">
                </div>
            </div>

            <div class="fields">
                <div class="five wide field">
                    <label>Empleado Resguardado:</label>
                </div>
                <div class="eleven wide field">
                    <select id="empleado_mdl"></select>
                </div>
            </div>

            <div class="fields">
                <div class="five wide field">
                    <label>Fecha Resguardo:</label>
                </div>
                <div class="eleven wide field">
                    <input type="date" id="fecha_resguardo_mdl">
                </div> 
            </div>                                                    

            <div class="fields">
                <div class="five wide field">
                    <label>Fecha Baja:</label>
                </div>
                <div class="eleven wide field">
                    <input type="date" id="fecha_baja_mdl">
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