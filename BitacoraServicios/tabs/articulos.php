<table class="ui table" id="tablePrin">
    <thead>
        <tr style="border-width:0 !important;">
            <th class="two wide field"></th>
            <th class="seven wide field"</th>
            <th class="four wide field">Agregar Puesto:</th>
            <th class="three wide field">
                <button class="ui blue basic icon button" onclick='mostrarModal(-1);' id="btn_add">
                    <i class="plus icon"></i>
                </button>
            </th>
        </tr>
        <tr>
            <th>No</th>
            <th>Puesto</th>
            <th>Cantidad</th>
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
            <th></th>
        </tr>                    
    </tfoot>
</table>

<div class="ui small modal" id="modal_solicitud">
    <i class="close icon"></i>
    <div class="header">
        Agregar Puesto
    </div>
    <div class="scrolling content">
        <div class="ui form" id="formSolicitud">

            <div class="fields">
                <div class="eight wide field">
                    <label>Puesto:</label>
                    <select id="puesto" validate="true">
                    </select>
                </div>
                <div class="eight wide field">
                    <label>Cantidad:</label>
                    <input id="cantidad" type="number" validate="true"></input>
                </div>
        </div>

    </div>
    <div class="actions">        
        <div class="ui positive button" onclick='validarCamposEmpleado();'>
            Aceptar            
        </div>
    </div>
</div>