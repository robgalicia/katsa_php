<div class="ui modal" id="modal_articulo">
    <i class="close icon"></i>
    <div class="header">
        Nuevo Registro
    </div>
    <div class="content">
        
        <div class="ui form" id="formArticulo">

            <div class="fields">
                <div class="three wide field">
                    <label>Código:</label>
                </div>
                <div class="five wide field">
                    <input type="text" id="codigo_mdl" maxlength="20" tabindex="1">
                </div>
                <div class="three wide field">
                    <label>Precio Compra:</label>
                </div>
                <div class="five wide field">
                    <input type="text" id="precio_compra_mdl" class="number money" disabled>
                </div>
            </div>

            <div class="fields">
                <div class="three wide field">
                    <label>Nombre del Artículo:</label>
                </div>
                <div class="five wide field">
                    <input type="text" id="nombre_articulo_mdl" maxlength="100" tabindex="2">
                </div>
                <div class="three wide field">
                    <label>Partida Gastos:</label>
                </div>
                <div class="five wide field">
                    <select id="partida_gastos_mdl" tabindex="5"></select>
                </div>
            </div>

            <div class="fields">
                <div class="three wide field">
                    <label>Descripción Proveedor:</label>
                </div>
                <div class="five wide field">
                    <input type="text" id="desc_proveedor_mdl" maxlength="100" tabindex="3">
                </div>
                <div class="three wide field">
                    <label>Partida Costos:</label>
                </div>
                <div class="five wide field">
                    <select id="partida_costos_mdl" tabindex="6"></select>
                </div>
            </div>   

            <div class="fields">
                <div class="three wide field">
                    <label>Unidad de Medida:</label>
                </div>
                <div class="five wide field">
                    <select id="unidad_medida_mdl" tabindex="4"></select>                    
                </div>
                <div class="three wide field">
                    <label>Partida Inversiones:</label>
                </div>
                <div class="five wide field">
                    <select id="partida_inversiones_mdl" tabindex="7"></select>
                </div>
            </div> 

            <div class="fields">
                <div class="three wide field">
                    <label>Existencia:</label>
                </div>
                <div class="five wide field">
                    <input type="text" id="existencia_mdl" disabled>
                </div>
                <div class="three wide field">
                    <label>Proveedor:</label>
                </div>
                <div class="five wide field">
                    <select id="proveedor_mdl" tabindex="8"></select>
                </div>
            </div> 

            <div class="fields">
                <div class="three wide field">
                    <label>Fecha Ultima Compra:</label>
                </div>
                <div class="five wide field">
                    <input type="date" id="fecha_ult_compra_mdl" disabled>
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
    <div class="header">BORRAR TARJETAS</div>
    <div class="content">
        <p>¿Esta seguro que desea borrar este registro?</p>
    </div>
    <div class="actions">
        <div class="ui cancel basic red button">Cancelar</div>
        <div class="ui green button" id="btn_delete">Aceptar</div>
    </div>
</div>