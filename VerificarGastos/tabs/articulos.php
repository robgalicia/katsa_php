<div class="ui grid" id="edit_disabled">
    <div class="eight wide column">
        <table class="ui table" id="tablePrin">
            <thead>
                <tr style="border-width:0 !important;">
                    <th></th>
                    <th></th>
                    <th></th>
                    <th>Detalle de la Solicitud:</th>
                    <th></th>
                </tr>
                <tr>
                    <th>No</th>
                    <th>Tipo Partida</th>
                    <th>Cantidad</th>
                    <th>Importe</th>
                    <th>Total</th>
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
                </tr>                    
            </tfoot>
        </table>
    </div>
    <div class="eight wide column">
        <table class="ui table" id="tablePrinEdit">
            <thead>
                <tr style="border-width:0 !important;">
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th>Importes Autorizados:</th>
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
                    <th id="eliminar">Acciones</th>
                </tr>
            </thead>
            <tbody id="tbodyPrinEdit">
                
            </tbody>
            <tfoot id="tfootPrinEdit">
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th>Total:</th>
                    <th id="importetotal_v"></th>
                    <th></th>
                </tr>                    
            </tfoot>
        </table>
    </div>
</div>

<div class="ui grid" id="detail">
    <div class="sixteen wide column">
        <table class="ui table" id="tablePrin_detail">
            <thead>
                <tr style="border-width:0 !important;">
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                <tr>
                    <th>No</th>
                    <th>Tipo Partida</th>
                    <th>Cantidad</th>
                    <th>Importe</th>
                    <th>Total</th>
                    <th>Justificación</th>
                </tr>
            </thead>
            <tbody id="tbodyPrin_detail">
                
            </tbody>
            <tfoot id="tfootPrin_detail">
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th>Total:</th>
                    <th id="importetotal_detail"></th>
                    <th></th>
                </tr>                    
            </tfoot>
        </table>
    </div>
</div>    

<div class="ui large modal" id="modal_solicitud">
    <i class="close icon"></i>
    <div class="header">
        Verificar Partida
    </div>
    <div class="scrolling content">
        <div class="ui form" id="formSolicitud">

            <div class="fields">
                <div class="four wide field">
                    <label>Partida:</label>
                    <select id="partida" validate="true"></select>
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
                    <input id="total" validate="true">
                </div>
            </div>
            <div class="fields">
                <div class="nine wide field">
                    <label>Justificación:</label>
                    <input id="justificacion">
                </div>     
            </div>
            <div class="fields">
                <div class="three wide field">
                    <label id="c_l">Cantidad Verificada:</label>
                    <input id="cantidad_v" type="number"></input>
                </div>
                <div class="four wide field">
                    <label id="i_l">Importe Verificado:</label>
                    <input id="importe_v" type="number">
                </div>
                <div class="four wide field">
                    <label id="t_l">Total Verificado:</label>
                    <input id="total_v" disabled>
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