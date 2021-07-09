<div class="ui long modal" id="modal_bitacora">
    <i class="close icon"></i>
    <div class="header">
        Detalle de Sesión
    </div>
    <div class="scrolling content">
        
        <table class="ui table" id="table_detalle">
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Opcion del Sistema</th>
                    <th>Acción</th>
                    <th>Query</th>
                    <th>Detalle</th>
                </tr>
            </thead>
            <tbody id="tbody_detalle">
                
            </tbody>
        </table>

    </div>
    <div class="actions">        
        <div class="ui positive button">
            Regresar
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