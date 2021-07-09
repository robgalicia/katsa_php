<div class="ui mini modal" id="modal_programar_pago">
    <i class="close icon"></i>
    <div class="header">
        Programar el Pago
    </div>
    <div class="content">
        
        <div class="ui form" id="form_programar_pago">

            <div class="fields">

                <div class="five wide field">
                    <label>Fecha de Pago Programado:</label>
                </div>
                <div class="eleven wide field">
                    <input type="date" id="fecha_pago_programado">
                </div>
                
            </div>

        </div>

    </div>
    <div class="actions">
        <div class="ui deny basic red button">
            Regresar
        </div>
        <div class="ui positive button" onclick="agregar_pago_programado_ajax();">
            Aceptar            
        </div>
    </div>
</div>

<div class="ui mini modal" id="modal_aplicar_pago">
    <i class="close icon"></i>
    <div class="header">
        Aplicar el Pago
    </div>
    <div class="content">
        
        <div class="ui form" id="form_aplicar_pago">

            <div class="fields">

                <div class="five wide field">
                    <label>Fecha de Pago:</label>
                </div>
                <div class="eleven wide field">
                    <input type="date" id="fecha_pago">
                </div>
                
            </div>

            <div class="fields">

                <div class="five wide field">
                    <label>Forma de Pago:</label>
                </div>
                <div class="eleven wide field">
                    <select id="forma_pago_lst"></select>
                </div>
                
            </div>

            <div class="fields">

                <div class="five wide field">
                    <label>Referencia de Pago:</label>
                </div>
                <div class="eleven wide field">
                    <input id="referencia"></input>
                </div>
                
            </div>

            <div class="fields">

                <div class="five wide field">
                    <label>Observaciones:</label>
                </div>
                <div class="eleven wide field">
                    <input id="observaciones"></input>
                </div>
                
            </div>

        </div>

    </div>
    <div class="actions">
        <div class="ui deny basic red button">
            Regresar
        </div>
        <div class="ui positive button" onclick="aplicar_pago_ajax();">
            Aceptar            
        </div>
    </div>
</div>