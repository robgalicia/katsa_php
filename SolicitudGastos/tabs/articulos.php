<table class="ui table" id="tablePrin">
    <thead>
        <tr style="border-width:0 !important;">
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th>Detalle de partidas:</th>
            <th>
                <button class="ui blue basic icon button" onclick='mostrarModal(-1);' id="btn_add">
                    <i class="plus icon"></i>
                </button>
            </th>
        </tr>
        <tr>
            <th>No</th>
            <th>Tipo Partida</th>
            <th>Cantidad</th>
            <th>Importe</th>
            <th>Total</th>
            <th>Justificación</th>
            <th id="eliminar">Acciones</th>
        </tr>
    </thead>
    <tbody id="tbodyPrin">
        
    </tbody>
    <tfoot id="tfootPrin">
        <tr>
            <th></th>
            <th></th>
            <th></th>
            <th>Total:</th>
            <th id="importetotal"></th>
            <th></th>
            <th></th>
        </tr>                    
    </tfoot>
</table>

<div class="ui large modal" id="modal_solicitud">
    <i class="close icon"></i>
    <div class="header">
        Agregar Partida
    </div>
    <div class="scrolling content">
        <div class="ui form" id="formSolicitud">

            <div class="fields">
                <div class="four wide field">
                    <label>Partida:</label>
                    <select id="partida" validate="true">
                    </select>
                </div>
                <div class="three wide field">
                    <label>Cantidad:</label>
                    <input id="cantidad" type="number"></input>
                </div>
                <div class="four wide field">
                    <label>Importe:</label>
                    <input id="importe" type="number" validate="true"> 
                </div>
                <div class="four wide field">
                    <label>Total:</label>
                    <input id="total" disabled validate="true">
                </div>
            </div>
            <div class="fields">
                <div class="nine wide field">
                    <label>Justificación:</label>
                    <input id="justificacion">
                </div>     
            </div>
        </div>

    </div>
    <div class="actions">        
        <div class="ui positive button" onclick='validarCamposPartida();'>
            Aceptar            
        </div>
    </div>
</div>